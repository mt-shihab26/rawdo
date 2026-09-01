@props(['heading' => '', 'subheading' => ''])

<div class="space-y-1">
    <h1 class="text-xl font-bold tracking-tight">{{ $heading }}</h1>
    <p class="text-sm text-muted-foreground">
        {{ $subheading }}
    </p>
</div>
