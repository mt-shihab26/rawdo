<?php

namespace Src\Core;

class View
{
    /**
     * Base directories searched, in order, when resolving a <x-name> tag; the last is used as the fallback
     *
     * @var string[]
     */
    private const COMPONENT_DIRECTORIES = ['components', 'layouts', 'screens'];

    /**
     * Base directory the view() helper renders page names from
     */
    public const PAGES_DIRECTORY = 'pages';

    /**
     * Render a view file to a string, passing $data in as local variables
     */
    public function render(string $name, array $data = []): string
    {
        $this->ensureCompiled($name);

        // Extract array keys as variables for the template
        extract($data);

        // Start output buffering
        ob_start();

        include $this->cachePath($name);

        // Get the contents of the buffer and turn it off
        return ob_get_clean();
    }

    /**
     * Render a page view, proxying render() with the pages/ base directory prefixed
     */
    public function renderPage(string $name, array $data = []): string
    {
        return $this->render(self::PAGES_DIRECTORY."/$name", $data);
    }

    /**
     * Compile a view into the cache if it's missing or older than its source
     */
    public function ensureCompiled(string $name): void
    {
        $source = $this->filePath($name);
        $cached = $this->cachePath($name);

        if (is_file($cached) && filemtime($cached) >= filemtime($source)) {
            return;
        }

        $compiled = (new Compiler)->compile(file_get_contents($source));

        if (! is_dir(dirname($cached))) {
            mkdir(dirname($cached), recursive: true);
        }

        file_put_contents($cached, $compiled);
    }

    /**
     * Render a <x-name> component, layout, or screen, passing its slot content if given
     *
     * Dots in the name address a subdirectory, e.g. "icons.logo-icon" -> components/icons/logo-icon.view.php
     */
    public function component(string $name, array $props = [], ?string $slot = null): string
    {
        if ($slot !== null) {
            $props['slot'] = $slot;
        }

        $name = str_replace('.', '/', $name);

        foreach (self::COMPONENT_DIRECTORIES as $directory) {
            $path = "$directory/$name";

            if ($this->exists($path)) {
                break;
            }
        }

        return $this->render($path, $props);
    }

    /**
     * Whether a view file exists for the given name
     */
    public function exists(string $name): bool
    {
        return is_file($this->filePath($name));
    }

    /**
     * Resolve a view name to its source file path (e.g. "pages/home" -> .../Views/pages/home.view.php)
     */
    private function filePath(string $name): string
    {
        return __DIR__.'/../Views/'.$name.'.view.php';
    }

    /**
     * Resolve a view name to its compiled cache path (e.g. "pages/home" -> .../storage/views/pages/home.php)
     */
    private function cachePath(string $name): string
    {
        return __DIR__.'/../../storage/views/'.$name.'.php';
    }
}
