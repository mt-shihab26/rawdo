@props(['id' => '', 'name' => '', 'value' => '', 'checked' => false, 'error' => '', 'class' => '', 'attrs' => array()])
<div class="space-y-1.5">
    <label class="flex items-start gap-2 text-sm text-muted-foreground">
        <x-ui.checkbox :id="$id" :name="$name" :value="$value" :checked="$checked" :class="$class" :attrs="$attrs" />
        <span><?= $slot ?? '' ?></span>
    </label>
    <x-ui.input-error :error="$error" />
</div>
