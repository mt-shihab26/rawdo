<x-app-layout title="Today" description="See today's tasks, streaks, and progress at a glance.">
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
                        <x-icons.progress-ring-icon />
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
                <x-icons.sparkline-icon />
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
                    <a href="{{ route('task-detail.index') }}" class="min-w-0 flex-1">
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
                        <x-icons.more-icon />
                    </button>
                </li>

                <li data-task-row class="group flex items-start gap-3 px-5 py-3.5">
                    <input
                        type="checkbox"
                        data-task-checkbox
                        class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                    />
                    <a href="{{ route('task-detail.index') }}" class="min-w-0 flex-1">
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
                        <x-icons.more-icon />
                    </button>
                </li>

                <li data-task-row class="group flex items-start gap-3 px-5 py-3.5">
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
                    <a href="{{ route('task-detail.index') }}" class="min-w-0 flex-1">
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
                        <x-icons.more-icon />
                    </button>
                </li>

                <li data-task-row class="group flex items-start gap-3 px-5 py-3.5">
                    <input
                        type="checkbox"
                        data-task-checkbox
                        class="mt-1 h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                    />
                    <a href="{{ route('task-detail.index') }}" class="min-w-0 flex-1">
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
                        <x-icons.more-icon />
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
                    <x-icons.clock-icon />
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
                    <a href="{{ route('task-detail.index') }}" class="min-w-0 flex-1">
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
                    <a href="{{ route('task-detail.index') }}" class="min-w-0 flex-1">
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
</x-app-layout>
