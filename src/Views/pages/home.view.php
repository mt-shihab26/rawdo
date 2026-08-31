<x-app-layout>
    <div class="flex min-w-0 flex-1 flex-col">
        <!-- Topbar -->
        <header
            class="sticky top-0 z-20 flex items-center gap-3 border-b border-border bg-background/80 px-4 py-3 backdrop-blur lg:px-8"
        >
            <button
                data-sidebar-toggle
                class="rounded-lg p-2 text-muted-foreground hover:bg-accent hover:text-accent-foreground lg:hidden"
                aria-label="Open menu"
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
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                    />
                </svg>
            </button>
            <div class="relative max-w-md flex-1">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                    />
                </svg>
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
                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                        />
                    </svg>
                </button>
            </div>
        </header>

        <main class="flex-1 px-4 py-6 lg:px-8 lg:py-8">
            <div class="mx-auto max-w-3xl">
                <div class="mb-8 flex flex-col gap-1">
                    <h1 class="text-2xl font-bold tracking-tight sm:text-3xl">
                        Good afternoon, Alex
                    </h1>
                    <p class="text-sm text-muted-foreground">
                        Monday, August 31 — you have
                        <span
                            data-task-count-scope="#today-list"
                            data-task-count-remaining
                            class="font-semibold text-primary"
                            >5</span
                        >
                        tasks left today.
                    </p>
                </div>

                <!-- Stats -->
                <div class="mb-8 grid grid-cols-2 gap-3 sm:grid-cols-4">
                    <div class="rounded-xl border border-border bg-card p-4">
                        <div class="flex items-center gap-3">
                            <div class="relative flex h-12 w-12 shrink-0 items-center justify-center">
                                <svg viewBox="0 0 36 36" class="h-12 w-12 -rotate-90">
                                    <circle
                                        cx="18"
                                        cy="18"
                                        r="15.9155"
                                        fill="none"
                                        class="stroke-primary/15"
                                        stroke-width="3.5"
                                    />
                                    <circle
                                        cx="18"
                                        cy="18"
                                        r="15.9155"
                                        fill="none"
                                        class="stroke-primary"
                                        stroke-width="3.5"
                                        stroke-linecap="round"
                                        stroke-dasharray="20 100"
                                    />
                                </svg>
                                <span class="absolute text-[10px] font-bold">1/5</span>
                            </div>
                            <div>
                                <p class="text-2xl font-bold">5</p>
                                <p class="text-xs font-medium text-muted-foreground">Due today</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-xl border border-border bg-card p-4">
                        <p class="text-2xl font-bold text-destructive">2</p>
                        <p class="text-xs font-medium text-muted-foreground">Overdue</p>
                    </div>
                    <div class="rounded-xl border border-border bg-card p-4">
                        <p class="text-2xl font-bold text-chart-2">8</p>
                        <p class="text-xs font-medium text-muted-foreground">Completed</p>
                        <svg viewBox="0 0 120 36" class="mt-2 h-8 w-full" aria-hidden="true">
                            <polyline
                                points="4,20.8 22.7,9.6 41.3,15.2 60,4 78.7,20.8 97.3,26.4"
                                fill="none"
                                class="stroke-muted-foreground/40"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <line
                                x1="97.3"
                                y1="26.4"
                                x2="116"
                                y2="32"
                                class="stroke-primary"
                                stroke-width="2"
                                stroke-linecap="round"
                            />
                            <circle cx="116" cy="32" r="4" class="fill-primary stroke-card" stroke-width="2" />
                        </svg>
                    </div>
                    <div class="rounded-xl border border-border bg-card p-4">
                        <p class="text-2xl font-bold">3</p>
                        <p class="text-xs font-medium text-muted-foreground">Upcoming</p>
                    </div>
                </div>

                <!-- Today's tasks -->
                <div class="mb-8 rounded-xl border border-border bg-card">
                    <div
                        class="flex items-center justify-between border-b border-border px-5 py-4"
                    >
                        <h2 class="text-sm font-semibold">Today</h2>
                        <span class="text-xs font-medium text-muted-foreground"
                            >5 tasks</span
                        >
                    </div>
                    <ul id="today-list" class="divide-y divide-border">
                        <li data-task-row class="group flex items-start gap-3 px-5 py-3.5">
                            <input
                                type="checkbox"
                                data-task-checkbox
                                class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                                aria-label="Mark task complete"
                            />
                            <a href="task-detail.html" class="min-w-0 flex-1">
                                <p data-task-title class="truncate text-sm font-medium">
                                    Finalize Q3 investor deck
                                </p>
                                <div
                                    class="mt-1 flex flex-wrap items-center gap-2 text-xs text-muted-foreground"
                                >
                                    <span
                                        class="inline-block h-2 w-2 rounded-full bg-destructive"
                                    ></span>
                                    High
                                    <span>·</span>
                                    <span
                                        class="inline-flex items-center gap-1 rounded bg-destructive/10 px-1.5 py-0.5 text-destructive"
                                        >9:00 AM</span
                                    >
                                    <span>·</span>
                                    <span class="text-foreground/80">Marketing Plan</span>
                                </div>
                            </a>
                            <button
                                class="rounded p-1 text-muted-foreground opacity-0 hover:bg-accent group-hover:opacity-100"
                                aria-label="More options"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M10 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"
                                    />
                                </svg>
                            </button>
                        </li>

                        <li data-task-row class="group flex items-start gap-3 px-5 py-3.5">
                            <input
                                type="checkbox"
                                data-task-checkbox
                                class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                            />
                            <a href="task-detail.html" class="min-w-0 flex-1">
                                <p data-task-title class="truncate text-sm font-medium">
                                    Review pull request #482
                                </p>
                                <div
                                    class="mt-1 flex flex-wrap items-center gap-2 text-xs text-muted-foreground"
                                >
                                    <span
                                        class="inline-block h-2 w-2 rounded-full bg-chart-4"
                                    ></span>
                                    Medium
                                    <span>·</span>
                                    <span>11:30 AM</span>
                                    <span>·</span>
                                    <span class="text-foreground/80">Website Redesign</span>
                                </div>
                            </a>
                            <button
                                class="rounded p-1 text-muted-foreground opacity-0 hover:bg-accent group-hover:opacity-100"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M10 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"
                                    />
                                </svg>
                            </button>
                        </li>

                        <li data-task-row class="group flex items-start gap-3 px-5 py-3.5">
                            <input
                                type="checkbox"
                                data-task-checkbox
                                checked
                                class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                            />
                            <a href="task-detail.html" class="min-w-0 flex-1">
                                <p
                                    data-task-title
                                    class="truncate text-sm font-medium line-through text-muted-foreground"
                                >
                                    Water the office plants
                                </p>
                                <div
                                    class="mt-1 flex flex-wrap items-center gap-2 text-xs text-muted-foreground"
                                >
                                    <span
                                        class="inline-block h-2 w-2 rounded-full bg-muted-foreground/40"
                                    ></span>
                                    Low
                                    <span>·</span>
                                    <span class="text-foreground/80">Personal</span>
                                </div>
                            </a>
                        </li>

                        <li data-task-row class="group flex items-start gap-3 px-5 py-3.5">
                            <input
                                type="checkbox"
                                data-task-checkbox
                                class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                            />
                            <a href="task-detail.html" class="min-w-0 flex-1">
                                <p data-task-title class="truncate text-sm font-medium">
                                    Sync with design team on new icons
                                </p>
                                <div
                                    class="mt-1 flex flex-wrap items-center gap-2 text-xs text-muted-foreground"
                                >
                                    <span
                                        class="inline-block h-2 w-2 rounded-full bg-chart-4"
                                    ></span>
                                    Medium
                                    <span>·</span>
                                    <span>2:00 PM</span>
                                    <span>·</span>
                                    <span class="text-foreground/80">Website Redesign</span>
                                </div>
                            </a>
                            <button
                                class="rounded p-1 text-muted-foreground opacity-0 hover:bg-accent group-hover:opacity-100"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M10 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"
                                    />
                                </svg>
                            </button>
                        </li>

                        <li data-task-row class="group flex items-start gap-3 px-5 py-3.5">
                            <input
                                type="checkbox"
                                data-task-checkbox
                                class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                            />
                            <a href="task-detail.html" class="min-w-0 flex-1">
                                <p data-task-title class="truncate text-sm font-medium">
                                    Book flights for conference
                                </p>
                                <div
                                    class="mt-1 flex flex-wrap items-center gap-2 text-xs text-muted-foreground"
                                >
                                    <span
                                        class="inline-block h-2 w-2 rounded-full bg-muted-foreground/40"
                                    ></span>
                                    Low
                                    <span>·</span>
                                    <span>5:00 PM</span>
                                    <span>·</span>
                                    <span class="text-foreground/80">Personal</span>
                                </div>
                            </a>
                            <button
                                class="rounded p-1 text-muted-foreground opacity-0 hover:bg-accent group-hover:opacity-100"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M10 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"
                                    />
                                </svg>
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Overdue -->
                <div class="rounded-xl border border-destructive/20 bg-destructive/5">
                    <div
                        class="flex items-center justify-between border-b border-destructive/20 px-5 py-4"
                    >
                        <h2
                            class="flex items-center gap-2 text-sm font-semibold text-destructive"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"
                                />
                            </svg>
                            Overdue
                        </h2>
                        <span class="text-xs font-medium text-destructive/70">2 tasks</span>
                    </div>
                    <ul class="divide-y divide-destructive/10">
                        <li data-task-row class="group flex items-start gap-3 px-5 py-3.5">
                            <input
                                type="checkbox"
                                data-task-checkbox
                                class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                            />
                            <a href="task-detail.html" class="min-w-0 flex-1">
                                <p data-task-title class="truncate text-sm font-medium">
                                    Send client invoice #1092
                                </p>
                                <div
                                    class="mt-1 flex flex-wrap items-center gap-2 text-xs text-destructive/80"
                                >
                                    <span>Due yesterday</span>
                                    <span>·</span>
                                    <span class="text-foreground/80">Personal</span>
                                </div>
                            </a>
                        </li>
                        <li data-task-row class="group flex items-start gap-3 px-5 py-3.5">
                            <input
                                type="checkbox"
                                data-task-checkbox
                                class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                            />
                            <a href="task-detail.html" class="min-w-0 flex-1">
                                <p data-task-title class="truncate text-sm font-medium">
                                    Renew domain registration
                                </p>
                                <div
                                    class="mt-1 flex flex-wrap items-center gap-2 text-xs text-destructive/80"
                                >
                                    <span>Due 2 days ago</span>
                                    <span>·</span>
                                    <span class="text-foreground/80">Website Redesign</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
