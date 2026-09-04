<?php

namespace Src\Core;

class Compiler
{
    /**
     * Compile @props(...), <x-name> component tags, and {{ }} / {!! !!} echoes into plain PHP
     */
    public function compile(string $template): string
    {
        $template = $this->compilePropsDirective($template);

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
     * Compile @props(['name' => default, ...]) into code that fills in any prop not already passed in, so a component can declare its own defaults
     */
    private function compilePropsDirective(string $template): string
    {
        return preg_replace(
            '/^@props\((.+)\)\s*$/m',
            '<?php foreach ($1 as $__prop => $__default) { if (! isset($$__prop)) { $$__prop = $__default; } } ?>',
            $template
        );
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
        $props = $this->compileAttributes($attributes);

        if ($slot === null) {
            return "<?= \$this->component('{$name}', {$props}) ?>";
        }

        return "<?php ob_start(); ?>{$slot}<?php echo \$this->component('{$name}', {$props}, ob_get_clean()); ?>";
    }

    /**
     * Turn a tag's attribute string into a PHP array literal; a plain attr="..." becomes a literal string, a :attr="..." is evaluated as a raw PHP expression
     */
    private function compileAttributes(string $attributes): string
    {
        preg_match_all('/(:?)([\w-]+)="([^"]*)"/', $attributes, $matches, PREG_SET_ORDER);

        $pairs = array_map(
            fn ($match) => var_export($match[2], true).' => '.($match[1] === ':' ? $match[3] : var_export($match[3], true)),
            $matches
        );

        return '['.implode(', ', $pairs).']';
    }
}
