@props(['title' => null, 'description' => null])

<x-root-layout :title="$title" :description="$description">
    <div class="flex min-h-screen">
        <x-app-layout.sidebar />
        <div class="flex min-w-0 flex-1 flex-col">
            <x-app-layout.topbar />
            <main class="flex-1 px-4 py-6 lg:px-8 lg:py-8">
                {!! $slot !!}
            </main>
        </div>
        <x-app-layout.task-modal-content />
    </div>
</x-root-layout>
