@props(['prompt' => '', 'label' => '', 'href' => '#'])
<p class="text-sm text-muted-foreground">
    {{ $prompt }}
    <x-ui.link :href="$href" class="font-semibold">{{ $label }}</x-ui.link>
</p>
