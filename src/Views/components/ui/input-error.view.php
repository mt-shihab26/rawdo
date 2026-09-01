@props(['error' => ''])

<?php if ($error !== '') { ?>
<p class="text-xs text-destructive"><?= htmlspecialchars($error, ENT_QUOTES) ?></p>
<?php } ?>
