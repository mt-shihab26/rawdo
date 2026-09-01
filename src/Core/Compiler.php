<?php

namespace Src\Core;

class Compiler
{
    /**
     * Compile <x-name> component tags and {{ }} / {!! !!} echoes into plain PHP
     */
    public function compile(string $template): string
    {
        $template = preg_replace('/\{!!\s*(.+?)\s*!!\}/', '<?= $1 ?>', $template);

        $template = preg_replace('/\{\{\s*(.+?)\s*\}\}/', '<?= htmlspecialchars($1, ENT_QUOTES) ?>', $template);

        $template = preg_replace_callback(
            '/<x-([\w.-]+)((?:\s+:?[\w-]+="[^"]*")*)\s*\/>/',
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
            '/<x-([\w.-]+)((?:\s+:?[\w-]+="[^"]*")*)\s*>(.*?)<\/x-\1>/s',
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

        return "<?php ob_start(); ?>{$slot}<?php echo \$this->component('{$name}', {$props}, ob_get_clean()); ?>";
    }

    /**
     * Turn a tag's attribute string into a PHP array literal
     *
     * A plain attr="..." becomes a literal string; a :attr="..." is evaluated
     * as a raw PHP expression, so pages can forward variables into a component.
     */
    private function compileProps(string $attributes): string
    {
        preg_match_all('/(:?)([\w-]+)="([^"]*)"/', $attributes, $matches, PREG_SET_ORDER);

        $pairs = array_map(
            fn ($match) => var_export($match[2], true).' => '.($match[1] === ':' ? $match[3] : var_export($match[3], true)),
            $matches
        );

        return '['.implode(', ', $pairs).']';
    }
}
