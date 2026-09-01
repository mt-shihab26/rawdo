@props(['label' => 'Password', 'id' => '', 'name' => '', 'value' => '', 'placeholder' => '••••••••', 'autocomplete' => 'current-password', 'minlength' => '', 'maxlength' => '', 'required' => false, 'error' => '', 'class' => '', 'attrs' => array()])

<div class="space-y-1.5">
    <div class="flex items-center justify-between">
        <x-ui.label :for="$id" :required="$required">{{ $label }}</x-ui.label>
        <?= $slot ?? '' ?>
    </div>
    <div class="relative">
        <x-ui.input type="password" :id="$id" :name="$name" :value="$value" :placeholder="$placeholder" :autocomplete="$autocomplete" :minlength="$minlength" :maxlength="$maxlength" :required="$required" :class="'pr-10 '.$class" :attrs="$attrs" />
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
    <x-ui.input-error :error="$error" />
</div>
