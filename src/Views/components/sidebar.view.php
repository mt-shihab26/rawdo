<div
    id="sidebar-overlay"
    class="fixed inset-0 z-30 hidden bg-foreground/50 lg:hidden"
></div>

<aside
    id="sidebar"
    class="group fixed inset-y-0 left-0 z-40 flex w-72 -translate-x-full transform flex-col border-r border-sidebar-border bg-sidebar text-sidebar-foreground transition-all duration-200 lg:sticky lg:top-0 lg:h-screen lg:w-72 lg:translate-x-0"
    data-collapsed="false"
>
    <div
        class="flex items-center justify-between gap-2 px-5 py-5 group-data-[collapsed=true]:justify-center group-data-[collapsed=true]:px-0"
    >
        <x-logo />
        <x-sidebar-toggle-buttons />
    </div>
    <div class="px-4 group-data-[collapsed=true]:px-2">
        <button
            data-modal-open="add-task-modal"
            class="flex h-8 w-full items-center justify-center gap-2 rounded-lg bg-primary px-4 text-sm font-semibold text-primary-foreground shadow-sm shadow-primary/20 transition hover:bg-primary/90 group-data-[collapsed=true]:mx-auto group-data-[collapsed=true]:w-8 group-data-[collapsed=true]:px-0"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2.5"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 4.5v15m7.5-7.5h-15"
                />
            </svg>
            <span class="group-data-[collapsed=true]:hidden">Add task</span>
        </button>
    </div>
    <nav
        class="mt-6 flex-1 space-y-6 overflow-y-auto px-3 pb-4 group-data-[collapsed=true]:px-2"
    >
        <div class="space-y-1">
            <a
                href="{{ route('home.index') }}"
                class="flex items-center justify-between rounded-lg bg-sidebar-primary/10 px-3 py-2 text-sm font-semibold text-sidebar-primary group-data-[collapsed=true]:justify-center group-data-[collapsed=true]:px-2"
                ><span class="flex items-center gap-3"
                    ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-6.364-.386 1.591-1.591M3 12h2.25m.386-6.364 1.591 1.591M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                        /></svg
                    ><span class="group-data-[collapsed=true]:hidden">Today</span></span
                ><span
                    class="rounded-full bg-sidebar-primary px-2 py-0.5 text-xs font-bold text-sidebar-primary-foreground group-data-[collapsed=true]:hidden"
                    >5</span
                ></a
            >
            <a
                href="{{ route('calendar.index') }}"
                class="flex items-center justify-between rounded-lg px-3 py-2 text-sm font-medium text-sidebar-foreground/70 hover:bg-sidebar-accent hover:text-sidebar-accent-foreground group-data-[collapsed=true]:justify-center group-data-[collapsed=true]:px-2"
                ><span class="flex items-center gap-3"
                    ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"
                        /></svg
                    ><span class="group-data-[collapsed=true]:hidden"
                        >Upcoming</span
                    ></span
                ></a
            >
            <a
                href="{{ route('tasks.index') }}"
                class="flex items-center justify-between rounded-lg px-3 py-2 text-sm font-medium text-sidebar-foreground/70 hover:bg-sidebar-accent hover:text-sidebar-accent-foreground group-data-[collapsed=true]:justify-center group-data-[collapsed=true]:px-2"
                ><span class="flex items-center gap-3"
                    ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"
                        /></svg
                    ><span class="group-data-[collapsed=true]:hidden"
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
                    ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                        /></svg
                    ><span class="group-data-[collapsed=true]:hidden"
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
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2.5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 4.5v15m7.5-7.5h-15"
                        />
                    </svg>
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
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 0 1 0 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 0 1 0-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.213-1.28Z"
                />
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                />
            </svg>
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
        <button
            data-sidebar-collapse-toggle
            class="mt-1 hidden w-full items-center justify-center rounded-lg p-1.5 text-muted-foreground hover:bg-sidebar-accent hover:text-sidebar-accent-foreground lg:group-data-[collapsed=true]:flex"
            aria-label="Expand sidebar"
        >
            <x-icons.collapse-icon />
        </button>
    </div>
</aside>
