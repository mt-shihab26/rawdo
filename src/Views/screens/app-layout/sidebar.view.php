<div
    id="sidebar-overlay"
    class="fixed inset-0 z-30 hidden bg-foreground/50 lg:hidden"
></div>

<aside
    id="sidebar"
    class="group fixed inset-y-0 left-0 z-40 flex w-72 -translate-x-full transform flex-col border-r border-sidebar-border bg-sidebar text-sidebar-foreground transition-all duration-200 lg:sticky lg:top-0 lg:h-screen lg:w-72 lg:translate-x-0"
    data-collapsed="false"
>
    <div class="flex items-center justify-between gap-2 px-5 py-5 group-data-[collapsed=true]:justify-center group-data-[collapsed=true]:px-0">
        <x-elements.logo />
        <x-app-layout.header-controls />
    </div>
    <x-app-layout.task-modal />
    <nav
        class="mt-6 flex-1 space-y-6 overflow-y-auto px-3 pb-4 group-data-[collapsed=true]:px-2"
    >
        <div class="space-y-1">
            <a
                href="{{ route('home.index') }}"
                class="flex items-center justify-between rounded-lg bg-sidebar-primary/10 px-3 py-2 text-sm font-semibold text-sidebar-primary group-data-[collapsed=true]:justify-center group-data-[collapsed=true]:px-2"
                ><span class="flex items-center gap-3"
                    ><x-icons.today-icon /><span class="group-data-[collapsed=true]:hidden">Today</span></span
                ><span
                    class="rounded-full bg-sidebar-primary px-2 py-0.5 text-xs font-bold text-sidebar-primary-foreground group-data-[collapsed=true]:hidden"
                    >5</span
                ></a
            >
            <a
                href="{{ route('calendar.index') }}"
                class="flex items-center justify-between rounded-lg px-3 py-2 text-sm font-medium text-sidebar-foreground/70 hover:bg-sidebar-accent hover:text-sidebar-accent-foreground group-data-[collapsed=true]:justify-center group-data-[collapsed=true]:px-2"
                ><span class="flex items-center gap-3"
                    ><x-icons.upcoming-icon /><span class="group-data-[collapsed=true]:hidden"
                        >Upcoming</span
                    ></span
                ></a
            >
            <a
                href="{{ route('tasks.index') }}"
                class="flex items-center justify-between rounded-lg px-3 py-2 text-sm font-medium text-sidebar-foreground/70 hover:bg-sidebar-accent hover:text-sidebar-accent-foreground group-data-[collapsed=true]:justify-center group-data-[collapsed=true]:px-2"
                ><span class="flex items-center gap-3"
                    ><x-icons.list-icon /><span class="group-data-[collapsed=true]:hidden"
                        >All tasks</span
                    ></span
                ><span
                    class="rounded-full bg-sidebar-accent px-2 py-0.5 text-xs font-semibold text-sidebar-accent-foreground group-data-[collapsed=true]:hidden"
                    >12</span
                ></a
            >
            <a
                href="{{ route('completed.index') }}"
                class="flex items-center justify-between rounded-lg px-3 py-2 text-sm font-medium text-sidebar-foreground/70 hover:bg-sidebar-accent hover:text-sidebar-accent-foreground group-data-[collapsed=true]:justify-center group-data-[collapsed=true]:px-2"
                ><span class="flex items-center gap-3"
                    ><x-icons.check-circle-icon /><span class="group-data-[collapsed=true]:hidden"
                        >Completed</span
                    ></span
                ></a
            >
        </div>
        <div class="group-data-[collapsed=true]:hidden">
            <div class="flex items-center justify-between px-3 pb-2">
                <span
                    class="text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                    >Projects</span
                >
                <a
                    href="{{ route('projects.index') }}"
                    class="rounded p-0.5 text-muted-foreground hover:bg-sidebar-accent hover:text-sidebar-accent-foreground"
                    aria-label="Add project"
                >
                    <x-icons.plus-icon />
                </a>
            </div>
            <div class="space-y-1">
                <a
                    href="{{ route('project-detail.index') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-sidebar-foreground/70 hover:bg-sidebar-accent hover:text-sidebar-accent-foreground"
                    ><span
                        class="h-2.5 w-2.5 shrink-0 rounded-full bg-chart-1"
                    ></span
                    >Website Redesign</a
                >
                <a
                    href="{{ route('project-detail.index') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-sidebar-foreground/70 hover:bg-sidebar-accent hover:text-sidebar-accent-foreground"
                    ><span
                        class="h-2.5 w-2.5 shrink-0 rounded-full bg-chart-4"
                    ></span
                    >Marketing Plan</a
                >
                <a
                    href="{{ route('project-detail.index') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-sidebar-foreground/70 hover:bg-sidebar-accent hover:text-sidebar-accent-foreground"
                    ><span
                        class="h-2.5 w-2.5 shrink-0 rounded-full bg-chart-2"
                    ></span
                    >Personal</a
                >
                <a
                    href="{{ route('projects.index') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-muted-foreground hover:bg-sidebar-accent hover:text-sidebar-accent-foreground"
                >
                    View all projects
                </a>
            </div>
        </div>
    </nav>
    <div class="border-t border-sidebar-border p-3">
        <a
            href="{{ route('settings.index') }}"
            class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-sidebar-foreground/70 hover:bg-sidebar-accent hover:text-sidebar-accent-foreground group-data-[collapsed=true]:justify-center group-data-[collapsed=true]:px-2"
        >
            <x-icons.gear-icon />
            <span class="group-data-[collapsed=true]:hidden">Settings</span>
        </a>
        <div
            class="flex items-center gap-3 rounded-lg px-3 py-2 group-data-[collapsed=true]:justify-center group-data-[collapsed=true]:gap-0 group-data-[collapsed=true]:px-0"
        >
            <img
                src="https://i.pravatar.cc/64?img=12"
                alt=""
                class="h-8 w-8 shrink-0 rounded-full ring-2 ring-sidebar"
            />
            <div class="min-w-0 flex-1 group-data-[collapsed=true]:hidden">
                <p class="truncate text-sm font-semibold">Alex Morgan</p>
                <p class="truncate text-xs text-muted-foreground">test@example.com</p>
            </div>
        </div>
        <x-app-layout.footer-controls />
    </div>
</aside>
