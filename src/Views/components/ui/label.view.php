@props(['for' => '', 'required' => false])

<label for="<?= htmlspecialchars($for, ENT_QUOTES) ?>" class="block text-xs font-semibold uppercase tracking-wider text-muted-foreground"><?= $slot ?? '' ?><?php if ($required) { ?> <span class="text-destructive">*</span><?php } ?></label>
