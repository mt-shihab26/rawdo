<x-app-layout title="All Tasks" description="Browse and manage all your tasks.">
    <div class="mx-auto max-w-4xl">
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <h1 class="text-2xl font-bold tracking-tight sm:text-3xl">All Tasks</h1>
            <div class="flex items-center gap-2">
                <div class="relative">
                    <x-ui.button variant="outline" size="sm" :attrs="['data-dropdown-trigger' => 'sort-menu']">
                        <x-icons.list-check-icon />
                        Sort
                    </x-ui.button>
                    <div
                        id="sort-menu"
                        class="js-dropdown-menu absolute right-0 z-10 mt-1 hidden w-40 rounded-lg border border-border bg-card py-1 shadow-lg"
                    >
                        <a
                            href="#"
                            class="block px-3 py-1.5 text-sm text-foreground/80 hover:bg-accent"
                            >Due date</a
                        >
                        <a
                            href="#"
                            class="block px-3 py-1.5 text-sm text-foreground/80 hover:bg-accent"
                            >Priority</a
                        >
                        <a
                            href="#"
                            class="block px-3 py-1.5 text-sm text-foreground/80 hover:bg-accent"
                            >Project</a
                        >
                        <a
                            href="#"
                            class="block px-3 py-1.5 text-sm text-foreground/80 hover:bg-accent"
                            >Alphabetical</a
                        >
                    </div>
                </div>
                <x-ui.button size="sm" :attrs="['data-modal-open' => 'add-task-modal']">
                    <x-icons.plus-icon />
                    Add task
                </x-ui.button>
            </div>
        </div>

        <!-- Filter chips -->
        <div class="mb-5 flex flex-wrap gap-2">
            <x-ui.button size="sm" rounded="full">
                All <span class="opacity-75">12</span>
            </x-ui.button>
            <x-ui.button variant="outline" size="sm" rounded="full">
                Active <span class="opacity-60">9</span>
            </x-ui.button>
            <x-ui.button variant="outline" size="sm" rounded="full">
                High priority <span class="opacity-60">3</span>
            </x-ui.button>
            <x-ui.button variant="outline" size="sm" rounded="full">
                No due date <span class="opacity-60">2</span>
            </x-ui.button>
        </div>

        <!-- Grouped list -->
        <div class="space-y-6">
            <div>
                <h2
                    class="mb-2 px-1 text-xs font-semibold uppercase tracking-wider text-destructive"
                >
                    Overdue
                </h2>
                <div class="rounded-xl border border-border bg-card">
                    <ul class="divide-y divide-border">
                        <li
                            data-task-row
                            class="group flex items-start gap-3 px-5 py-3.5"
                        >
                            <input
                                type="checkbox"
                                data-task-checkbox
                                class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                            />
                            <a href="{{ route('task-detail.index') }}" class="min-w-0 flex-1">
                                <p
                                    data-task-title
                                    class="truncate text-sm font-medium"
                                >
                                    Send client invoice #1092
                                </p>
                                <div
                                    class="mt-1 flex flex-wrap items-center gap-2 text-xs text-destructive/80"
                                >
                                    <span>Due yesterday</span><span>·</span
                                    ><span class="text-foreground/80"
                                        >Personal</span
                                    >
                                </div>
                            </a>
                        </li>
                        <li
                            data-task-row
                            class="group flex items-start gap-3 px-5 py-3.5"
                        >
                            <input
                                type="checkbox"
                                data-task-checkbox
                                class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                            />
                            <a href="{{ route('task-detail.index') }}" class="min-w-0 flex-1">
                                <p
                                    data-task-title
                                    class="truncate text-sm font-medium"
                                >
                                    Renew domain registration
                                </p>
                                <div
                                    class="mt-1 flex flex-wrap items-center gap-2 text-xs text-destructive/80"
                                >
                                    <span>Due 2 days ago</span><span>·</span
                                    ><span class="text-foreground/80"
                                        >Website Redesign</span
                                    >
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div>
                <h2
                    class="mb-2 px-1 text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                >
                    Today
                </h2>
                <div class="rounded-xl border border-border bg-card">
                    <ul class="divide-y divide-border">
                        <li
                            data-task-row
                            class="group flex items-start gap-3 px-5 py-3.5"
                        >
                            <input
                                type="checkbox"
                                data-task-checkbox
                                class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                            />
                            <a href="{{ route('task-detail.index') }}" class="min-w-0 flex-1">
                                <p
                                    data-task-title
                                    class="truncate text-sm font-medium"
                                >
                                    Finalize Q3 investor deck
                                </p>
                                <div
                                    class="mt-1 flex flex-wrap items-center gap-2 text-xs text-muted-foreground"
                                >
                                    <span
                                        class="inline-block h-2 w-2 rounded-full bg-destructive"
                                    ></span>
                                    High<span>·</span><span>9:00 AM</span
                                    ><span>·</span
                                    ><span class="text-foreground/80"
                                        >Marketing Plan</span
                                    >
                                </div>
                            </a>
                        </li>
                        <li
                            data-task-row
                            class="group flex items-start gap-3 px-5 py-3.5"
                        >
                            <input
                                type="checkbox"
                                data-task-checkbox
                                class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                            />
                            <a href="{{ route('task-detail.index') }}" class="min-w-0 flex-1">
                                <p
                                    data-task-title
                                    class="truncate text-sm font-medium"
                                >
                                    Review pull request #482
                                </p>
                                <div
                                    class="mt-1 flex flex-wrap items-center gap-2 text-xs text-muted-foreground"
                                >
                                    <span
                                        class="inline-block h-2 w-2 rounded-full bg-chart-4"
                                    ></span>
                                    Medium<span>·</span><span>11:30 AM</span
                                    ><span>·</span
                                    ><span class="text-foreground/80"
                                        >Website Redesign</span
                                    >
                                </div>
                            </a>
                        </li>
                        <li
                            data-task-row
                            class="group flex items-start gap-3 px-5 py-3.5"
                        >
                            <input
                                type="checkbox"
                                data-task-checkbox
                                checked
                                class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                            />
                            <a href="{{ route('task-detail.index') }}" class="min-w-0 flex-1">
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
                                    Low<span>·</span
                                    ><span class="text-foreground/80"
                                        >Personal</span
                                    >
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div>
                <h2
                    class="mb-2 px-1 text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                >
                    This week
                </h2>
                <div class="rounded-xl border border-border bg-card">
                    <ul class="divide-y divide-border">
                        <li
                            data-task-row
                            class="group flex items-start gap-3 px-5 py-3.5"
                        >
                            <input
                                type="checkbox"
                                data-task-checkbox
                                class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                            />
                            <a href="{{ route('task-detail.index') }}" class="min-w-0 flex-1">
                                <p
                                    data-task-title
                                    class="truncate text-sm font-medium"
                                >
                                    Prepare onboarding docs for new hire
                                </p>
                                <div
                                    class="mt-1 flex flex-wrap items-center gap-2 text-xs text-muted-foreground"
                                >
                                    <span
                                        class="inline-block h-2 w-2 rounded-full bg-chart-4"
                                    ></span>
                                    Medium<span>·</span><span>Wed, Sep 2</span
                                    ><span>·</span
                                    ><span class="text-foreground/80"
                                        >Personal</span
                                    >
                                </div>
                            </a>
                        </li>
                        <li
                            data-task-row
                            class="group flex items-start gap-3 px-5 py-3.5"
                        >
                            <input
                                type="checkbox"
                                data-task-checkbox
                                class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                            />
                            <a href="{{ route('task-detail.index') }}" class="min-w-0 flex-1">
                                <p
                                    data-task-title
                                    class="truncate text-sm font-medium"
                                >
                                    Quarterly budget review meeting
                                </p>
                                <div
                                    class="mt-1 flex flex-wrap items-center gap-2 text-xs text-muted-foreground"
                                >
                                    <span
                                        class="inline-block h-2 w-2 rounded-full bg-destructive"
                                    ></span>
                                    High<span>·</span><span>Fri, Sep 4</span
                                    ><span>·</span
                                    ><span class="text-foreground/80"
                                        >Marketing Plan</span
                                    >
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div>
                <h2
                    class="mb-2 px-1 text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                >
                    No due date
                </h2>
                <div class="rounded-xl border border-border bg-card">
                    <ul class="divide-y divide-border">
                        <li
                            data-task-row
                            class="group flex items-start gap-3 px-5 py-3.5"
                        >
                            <input
                                type="checkbox"
                                data-task-checkbox
                                class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                            />
                            <a href="{{ route('task-detail.index') }}" class="min-w-0 flex-1">
                                <p
                                    data-task-title
                                    class="truncate text-sm font-medium"
                                >
                                    Read "Deep Work"
                                </p>
                                <div
                                    class="mt-1 flex flex-wrap items-center gap-2 text-xs text-muted-foreground"
                                >
                                    <span
                                        class="inline-block h-2 w-2 rounded-full bg-muted-foreground/40"
                                    ></span>
                                    Low<span>·</span
                                    ><span class="text-foreground/80"
                                        >Personal</span
                                    >
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
