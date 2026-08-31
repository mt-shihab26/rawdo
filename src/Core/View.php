<?php

namespace Src\Core;

class View
{
    /**
     * Render a view file to a string, passing $data in as local variables
     */
    public function render(string $name, ?array $data = null): string
    {
        // Extract array keys as variables for the template
        extract($data ?? []);

        // Start output buffering
        ob_start();

        $filePath = $this->filePath($name);

        // Include the PHP file
        include $filePath;

        // Get the contents of the buffer and turn it off
        return ob_get_clean();
    }

    /**
     * Resolve a view name to its file path (e.g. "tasks/index" -> .../Views/pages/tasks/index.view.php)
     */
    private function filePath(string $name): string
    {
        return __DIR__.'/../Views/pages/'.$name.'.view.php';
    }
}
