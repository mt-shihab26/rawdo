@props(['type' => 'text', 'id' => '', 'name' => '', 'value' => '', 'placeholder' => '', 'required' => false, 'class' => '', 'attrs' => array()])
<?php
$classes = trim("w-full rounded-lg border border-input bg-background px-3 py-2.5 text-sm placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring/30 {$class}");

$attrs = array_filter(['id' => $id, 'name' => $name, 'value' => $value], fn ($value) => $value !== '') + $attrs;
?>
<input
    type="<?= htmlspecialchars($type, ENT_QUOTES) ?>"
    placeholder="<?= htmlspecialchars($placeholder, ENT_QUOTES) ?>"<?php foreach ($attrs as $key => $value) { ?> <?= htmlspecialchars($key, ENT_QUOTES) ?>="<?= htmlspecialchars($value, ENT_QUOTES) ?>"<?php } ?><?php if ($required) { ?> required<?php } ?>
    class="<?= htmlspecialchars($classes, ENT_QUOTES) ?>"
/>
