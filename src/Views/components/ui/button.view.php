@props(['variant' => 'default', 'size' => 'default', 'rounded' => 'lg', 'justify' => 'center', 'display' => 'inline-flex', 'class' => '', 'attrs' => []])

<?php
$variantClasses = [
    'default' => 'bg-primary text-primary-foreground hover:bg-primary/90',
    'secondary' => 'bg-secondary text-secondary-foreground hover:bg-secondary/80',
    'destructive' => 'bg-destructive text-primary-foreground hover:bg-destructive/90',
    'outline' => 'border border-input bg-background hover:bg-accent hover:text-accent-foreground',
    'ghost' => 'text-muted-foreground hover:bg-accent hover:text-accent-foreground',
    'ghost-sidebar' => 'text-muted-foreground hover:bg-sidebar-accent hover:text-sidebar-accent-foreground',
    'link' => 'text-primary underline-offset-4 hover:underline',
][$variant] ?? '';

$sizeClasses = [
    'default' => 'gap-2 px-4 py-2 text-sm font-semibold',
    'sm' => 'gap-1.5 px-3 py-1.5 text-sm font-semibold',
    'lg' => 'gap-2 px-6 py-2.5 text-base font-semibold',
    'icon-sm' => 'p-1',
    'icon' => 'p-1.5',
    'icon-lg' => 'p-2',
][$size] ?? '';

$roundedClass = [
    'sm' => 'rounded',
    'md' => 'rounded-md',
    'lg' => 'rounded-lg',
    'full' => 'rounded-full',
    'none' => 'rounded-none',
][$rounded] ?? 'rounded-lg';

$justifyClass = [
    'center' => 'justify-center',
    'start' => 'justify-start',
    'between' => 'justify-between',
][$justify] ?? 'justify-center';

$classes = trim("{$display} items-center {$justifyClass} whitespace-nowrap transition {$roundedClass} {$variantClasses} {$sizeClasses} {$class}");
?>

<button<?php foreach ($attrs as $key => $value) { ?> <?= htmlspecialchars($key, ENT_QUOTES) ?>="<?= htmlspecialchars($value, ENT_QUOTES) ?>"<?php } ?> class="<?= htmlspecialchars($classes, ENT_QUOTES) ?>"><?= $slot ?? '' ?></button>
