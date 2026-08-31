<?php

namespace Src\Core;

use Closure;

class View
{
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
     * Render a <x-name> component or layout, passing its slot content if given
     */
    public function component(string $name, array $props = [], ?Closure $slot = null): string
    {
        if ($slot) {
            ob_start();
            $slot();
            $props['slot'] = ob_get_clean();
        }

        $path = $this->exists("components/$name") ? "components/$name" : "layouts/$name";

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
