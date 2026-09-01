@props(['href' => '#', 'class' => '', 'attrs' => array()])
<?php
$classes = trim("text-primary hover:underline {$class}");
?>
<a
    href="<?= htmlspecialchars($href, ENT_QUOTES) ?>"<?php foreach ($attrs as $key => $value) { ?> <?= htmlspecialchars($key, ENT_QUOTES) ?>="<?= htmlspecialchars($value, ENT_QUOTES) ?>"<?php } ?>
    class="<?= htmlspecialchars($classes, ENT_QUOTES) ?>"
><?= $slot ?? '' ?></a>
