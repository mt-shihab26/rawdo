@props(['title' => null, 'description' => null])

<x-root-layout :title="$title" :description="$description">
    <div class="flex min-h-screen flex-col items-center justify-center gap-8 px-4 py-12">
        <x-elements.logo />
        {!! $slot !!}
    </div>
</x-root-layout>
