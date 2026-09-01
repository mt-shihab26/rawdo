<x-app-layout title="Completed" description="Browse the tasks you've already finished.">
    <div class="mx-auto max-w-3xl space-y-6">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div class="space-y-1">
                <h1 class="text-2xl font-bold tracking-tight sm:text-3xl">
                    Completed
                </h1>
                <p class="text-sm text-muted-foreground">
                    42 tasks completed this month
                </p>
            </div>
            <select
                class="rounded-lg border border-input bg-card px-3 py-1.5 text-sm font-medium text-foreground/80 focus:outline-none focus:ring-2 focus:ring-ring/30"
            >
                <option>Today</option>
                <option selected>This week</option>
                <option>This month</option>
                <option>All time</option>
            </select>
        </div>

        <div class="space-y-6">
            <div class="space-y-2">
                <h2
                    class="px-1 text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                >
                    Today — Aug 31
                </h2>
                <div class="rounded-xl border border-border bg-card">
                    <ul class="divide-y divide-border">
                        <li class="flex items-start gap-3 px-5 py-3.5">
                            <span
                                class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-chart-2 text-primary-foreground"
                            >
                                <x-icons.check-icon />
                            </span>
                            <div class="min-w-0 flex-1 space-y-1">
                                <p
                                    class="truncate text-sm font-medium text-muted-foreground line-through"
                                >
                                    Water the office plants
                                </p>
                                <p class="text-xs text-muted-foreground">
                                    Completed at 8:14 AM · Personal
                                </p>
                            </div>
                            <x-ui.button variant="outline" size="sm">
                                Restore
                            </x-ui.button>
                        </li>
                        <li class="flex items-start gap-3 px-5 py-3.5">
                            <span
                                class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-chart-2 text-primary-foreground"
                            >
                                <x-icons.check-icon />
                            </span>
                            <div class="min-w-0 flex-1 space-y-1">
                                <p
                                    class="truncate text-sm font-medium text-muted-foreground line-through"
                                >
                                    Publish blog post: "Q3 roadmap"
                                </p>
                                <p class="text-xs text-muted-foreground">
                                    Completed at 9:47 AM · Marketing Plan
                                </p>
                            </div>
                            <x-ui.button variant="outline" size="sm">
                                Restore
                            </x-ui.button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="space-y-2">
                <h2
                    class="px-1 text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                >
                    Yesterday — Aug 30
                </h2>
                <div class="rounded-xl border border-border bg-card">
                    <ul class="divide-y divide-border">
                        <li class="flex items-start gap-3 px-5 py-3.5">
                            <span
                                class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-chart-2 text-primary-foreground"
                            >
                                <x-icons.check-icon />
                            </span>
                            <div class="min-w-0 flex-1 space-y-1">
                                <p
                                    class="truncate text-sm font-medium text-muted-foreground line-through"
                                >
                                    Merge feature/auth-refresh branch
                                </p>
                                <p class="text-xs text-muted-foreground">
                                    Completed at 4:32 PM · Website Redesign
                                </p>
                            </div>
                            <x-ui.button variant="outline" size="sm">
                                Restore
                            </x-ui.button>
                        </li>
                        <li class="flex items-start gap-3 px-5 py-3.5">
                            <span
                                class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-chart-2 text-primary-foreground"
                            >
                                <x-icons.check-icon />
                            </span>
                            <div class="min-w-0 flex-1 space-y-1">
                                <p
                                    class="truncate text-sm font-medium text-muted-foreground line-through"
                                >
                                    Book dentist appointment
                                </p>
                                <p class="text-xs text-muted-foreground">
                                    Completed at 1:05 PM · Personal
                                </p>
                            </div>
                            <x-ui.button variant="outline" size="sm">
                                Restore
                            </x-ui.button>
                        </li>
                        <li class="flex items-start gap-3 px-5 py-3.5">
                            <span
                                class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-chart-2 text-primary-foreground"
                            >
                                <x-icons.check-icon />
                            </span>
                            <div class="min-w-0 flex-1 space-y-1">
                                <p
                                    class="truncate text-sm font-medium text-muted-foreground line-through"
                                >
                                    Update pricing page copy
                                </p>
                                <p class="text-xs text-muted-foreground">
                                    Completed at 11:20 AM · Marketing Plan
                                </p>
                            </div>
                            <x-ui.button variant="outline" size="sm">
                                Restore
                            </x-ui.button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
