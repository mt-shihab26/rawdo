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
        $template = file_get_contents($this->filePath($name));

        $compiled = (new Compiler)->compile($template);

        // Extract array keys as variables for the template
        extract($data);

        // Start output buffering
        ob_start();

        eval('?>'.$compiled);

        // Get the contents of the buffer and turn it off
        return ob_get_clean();
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
     * Resolve a view name to its file path (e.g. "pages/home" -> .../Views/pages/home.view.php)
     */
    private function filePath(string $name): string
    {
        return __DIR__.'/../Views/'.$name.'.view.php';
    }
}
