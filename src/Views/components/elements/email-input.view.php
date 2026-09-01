@props(['label' => 'Email', 'id' => '', 'name' => '', 'value' => '', 'placeholder' => 'you@example.com', 'autocomplete' => 'email', 'minlength' => '', 'maxlength' => '', 'required' => false, 'error' => '', 'class' => '', 'attrs' => array()])

<div class="space-y-1.5">
    <x-ui.label :for="$id" :required="$required">{{ $label }}</x-ui.label>
    <x-ui.input type="email" :id="$id" :name="$name" :value="$value" :placeholder="$placeholder" :autocomplete="$autocomplete" :minlength="$minlength" :maxlength="$maxlength" :required="$required" :class="$class" :attrs="$attrs" />
    <x-ui.input-error :error="$error" />
</div>
