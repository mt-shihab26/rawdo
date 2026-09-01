@props(['title' => null, 'description' => null])

<x-root-layout :title="$title" :description="$description">
    <div class="flex min-h-screen">
        <x-sidebar />
        <div class="flex min-w-0 flex-1 flex-col">
            <x-topbar />
            <main class="flex-1 px-4 py-6 lg:px-8 lg:py-8">
                {!! $slot !!}
            </main>
        </div>
    </div>
    <x-task-modal />
</x-root-layout>
