@props(['id' => '', 'name' => '', 'value' => '', 'checked' => false, 'class' => '', 'attrs' => array()])
<label class="flex items-start gap-2 text-sm text-muted-foreground">
    <x-ui.checkbox :id="$id" :name="$name" :value="$value" :checked="$checked" :class="$class" :attrs="$attrs" />
    <span><?= $slot ?? '' ?></span>
</label>
