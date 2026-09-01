<x-root-layout title="Page expired" description="Your session has expired. Please go back and try again.">
    <div class="flex min-h-screen flex-col items-center justify-center gap-6 px-4 py-12 text-center">
        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-muted">
            <x-icons.clock-icon />
        </div>
        <div class="space-y-2">
            <div class="space-y-1">
                <p class="text-sm font-semibold uppercase tracking-wider text-primary">419</p>
                <h1 class="text-2xl font-bold tracking-tight">Page expired</h1>
            </div>
            <p class="max-w-xs text-sm text-muted-foreground">
                Your session has expired. Please go back and try again.
            </p>
        </div>
        <a
            class="rounded-lg bg-primary px-5 py-2.5 text-sm font-semibold text-primary-foreground hover:bg-primary/90"
            href="{{ route('login.index') }}"
        >
            Back to login
        </a>
    </div>
</x-root-layout>
