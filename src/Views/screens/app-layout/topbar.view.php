<header
    class="sticky top-0 z-20 flex items-center gap-3 border-b border-border bg-background/80 px-4 py-3 backdrop-blur lg:px-8"
>
    <button
        data-sidebar-toggle
        class="rounded-lg p-2 text-muted-foreground hover:bg-accent hover:text-accent-foreground lg:hidden"
        aria-label="Open menu"
    >
        <x-icons.menu-icon />
    </button>
    <div class="relative max-w-md flex-1">
        <x-icons.search-icon />
        <input
            type="search"
            placeholder="Search tasks..."
            class="w-full rounded-lg border border-input bg-muted py-2 pl-9 pr-3 text-sm placeholder:text-muted-foreground focus:bg-background focus:outline-none focus:ring-2 focus:ring-ring/30"
        />
    </div>
    <div class="ml-auto flex items-center gap-2">
        <button
            class="rounded-lg p-2 text-muted-foreground hover:bg-accent hover:text-accent-foreground"
            aria-label="Notifications"
        >
            <x-icons.bell-icon />
        </button>
    </div>
</header>
