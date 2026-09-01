@props(['id' => '', 'name' => '', 'value' => '', 'checked' => false, 'class' => '', 'attrs' => array()])
<?php
$classes = trim("mt-0.5 h-4 w-4 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30 {$class}");

$attrs = array_filter(['id' => $id, 'name' => $name, 'value' => $value], fn ($value) => $value !== '') + $attrs;
?>
<input
    type="checkbox"<?php foreach ($attrs as $key => $value) { ?> <?= htmlspecialchars($key, ENT_QUOTES) ?>="<?= htmlspecialchars($value, ENT_QUOTES) ?>"<?php } ?><?php if ($checked) { ?> checked<?php } ?>
    class="<?= htmlspecialchars($classes, ENT_QUOTES) ?>"
/>
