<x-root-layout title="Page not found" description="The page you're looking for doesn't exist, moved, or the link is out of date.">
    <div class="flex min-h-screen flex-col items-center justify-center px-4 py-12 text-center">
        <div class="mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-muted">
            <x-icons.search-off-icon />
        </div>
        <p class="text-sm font-semibold uppercase tracking-wider text-primary">404</p>
        <h1 class="mt-1 text-2xl font-bold tracking-tight">Page not found</h1>
        <p class="mt-2 max-w-xs text-sm text-muted-foreground">
            The page you're looking for doesn't exist, moved, or the link is out of date.
        </p>
        <a
            class="mt-6 rounded-lg bg-primary px-5 py-2.5 text-sm font-semibold text-primary-foreground hover:bg-primary/90"
            href="{{ route('home.index') }}"
        >
            Back to dashboard
        </a>
    </div>
</x-root-layout>
