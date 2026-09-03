<?php

namespace Src\Core;

class View
{
    private const PAGES_DIRECTORY = 'pages';

    private const COMPONENT_DIRECTORIES = ['components', 'layouts', 'screens'];

    /**
     * Render a page view and return it as a Response object
     */
    public function page(string $name, ?array $data = null): Response
    {
        return new Response(
            renderedString: $this->render($this->pagePath($name), $data ?? []),
            statusCode: 200,
        );
    }

    /**
     * Does the page exists on the pages directory
     */
    public function pageExists(string $name)
    {
        $this->exists($this->pagePath($name));
    }

    /**
     * Render a <x-name> component, layout, or screen, passing its slot content if given; dots in the name address a subdirectory, e.g. "icons.logo-icon" -> components/icons/logo-icon.view.php
     */
    public function component(string $name, array $props = [], ?string $slot = null): string
    {
        if ($slot !== null) {
            $props['slot'] = $slot;
        }

        return $this->render($this->componentPath($name), $props);
    }

    /**
     * Does a <x-name> component, layout, or screen exist for the given name
     */
    public function componentExists(string $name): bool
    {
        return $this->exists($this->componentPath($name));
    }

    /**
     * Resolve a page name to its path within the pages directory
     */
    private function pagePath(string $name): string
    {
        return self::PAGES_DIRECTORY."/$name";
    }

    /**
     * Resolve a component name to its first matching directory, falling back to the last if none match
     */
    private function componentPath(string $name): string
    {
        $name = str_replace('.', '/', $name);

        $path = '';

        foreach (self::COMPONENT_DIRECTORIES as $directory) {
            $path = "$directory/$name";

            if ($this->exists($path)) {
                break;
            }
        }

        return $path;
    }

    /**
     * Whether a view file exists for the given name
     */
    private function exists(string $name): bool
    {
        return is_file($this->filePath($name));
    }

    /**
     * Render a view file to a string, passing $data in as local variables
     */
    private function render(string $name, array $data = []): string
    {
        $this->ensureCompiled($name);

        // Resolve the cache path before extract() below, since $data may itself
        // contain a "name" key (e.g. a form input's name prop) that would
        // otherwise overwrite this method's $name parameter
        $__path = $this->cachePath($name);

        // Extract array keys as variables for the template
        extract($data);

        // Start output buffering
        ob_start();

        include $__path;

        // Get the contents of the buffer and turn it off
        return ob_get_clean();
    }

    /**
     * Compile a view into the cache if it's missing or older than its source
     */
    private function ensureCompiled(string $name): void
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
