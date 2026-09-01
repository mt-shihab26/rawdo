@props(['label' => 'Email', 'id' => '', 'name' => '', 'value' => '', 'placeholder' => 'you@example.com', 'required' => false, 'class' => '', 'attrs' => array()])

<div class="space-y-1.5">
    <label for="<?= htmlspecialchars($id, ENT_QUOTES) ?>" class="block text-xs font-semibold uppercase tracking-wider text-muted-foreground">{{ $label }}<?php if ($required) { ?> <span class="text-destructive">*</span><?php } ?></label>
    <x-ui.input type="email" :id="$id" :name="$name" :value="$value" :placeholder="$placeholder" :required="$required" :class="$class" :attrs="$attrs" />
</div>
