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

        $compiled = $this->compile($template);

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

    /**
     * Compile <x-name> component tags and {{ }} echoes into plain PHP
     */
    private function compile(string $template): string
    {
        $template = preg_replace('/\{\{\s*(.+?)\s*\}\}/', '<?= htmlspecialchars($1, ENT_QUOTES) ?>', $template);

        $template = preg_replace_callback(
            '/<x-([\w.-]+)((?:\s+[\w-]+="[^"]*")*)\s*\/>/',
            fn ($m) => $this->compileTag($m[1], $m[2]),
            $template
        );

        return $this->compilePairedTags($template);
    }

    /**
     * Compile <x-name>slot</x-name> tags, recursing into the slot first so nested tags are compiled too
     */
    private function compilePairedTags(string $template): string
    {
        return preg_replace_callback(
            '/<x-([\w.-]+)((?:\s+[\w-]+="[^"]*")*)\s*>(.*?)<\/x-\1>/s',
            fn ($m) => $this->compileTag($m[1], $m[2], $this->compilePairedTags($m[3])),
            $template
        );
    }

    /**
     * Turn a single component tag's name, attributes, and optional slot into a component() call
     */
    private function compileTag(string $name, string $attributes, ?string $slot = null): string
    {
        $props = $this->compileProps($attributes);

        if ($slot === null) {
            return "<?= \$this->component('{$name}', {$props}) ?>";
        }

        return "<?php echo \$this->component('{$name}', {$props}, function () { ?>{$slot}<?php }); ?>";
    }

    /**
     * Turn a tag's attribute string into a PHP array literal
     */
    private function compileProps(string $attributes): string
    {
        preg_match_all('/([\w-]+)="([^"]*)"/', $attributes, $matches, PREG_SET_ORDER);

        $pairs = array_map(
            fn ($match) => var_export($match[1], true).' => '.var_export($match[2], true),
            $matches
        );

        return '['.implode(', ', $pairs).']';
    }
}
