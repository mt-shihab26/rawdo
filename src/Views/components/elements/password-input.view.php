@props(['label' => 'Password', 'id' => '', 'name' => '', 'value' => '', 'placeholder' => '', 'required' => false, 'class' => '', 'attrs' => array()])

<div class="space-y-1.5">
    <div class="flex items-center justify-between">
        <label for="<?= htmlspecialchars($id, ENT_QUOTES) ?>" class="block text-xs font-semibold uppercase tracking-wider text-muted-foreground">{{ $label }}<?php if ($required) { ?> <span class="text-destructive">*</span><?php } ?></label>
        <?= $slot ?? '' ?>
    </div>
    <div class="relative">
        <x-ui.input type="password" :id="$id" :name="$name" :value="$value" :placeholder="$placeholder" :required="$required" :class="'pr-10 '.$class" :attrs="$attrs" />
        <x-ui.button
            variant="ghost"
            size="icon-sm"
            rounded="sm"
            class="absolute right-2.5 top-1/2 -translate-y-1/2"
            :attrs="['type' => 'button', 'data-password-toggle' => '', 'aria-label' => 'Show password']"
        >
            <x-icons.eye-icon />
            <x-icons.eye-off-icon />
        </x-ui.button>
    </div>
</div>
