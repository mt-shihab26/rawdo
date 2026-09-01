@props(['title' => null, 'description' => null])

<x-root-layout :title="$title" :description="$description">
    <div class="flex min-h-screen flex-col items-center justify-center px-4 py-12">
        <div class="mb-8">
            <x-elements.logo />
        </div>
        {!! $slot !!}
    </div>
</x-root-layout>
