<x-app-layout title="Website Redesign" description="Track tasks and progress for the Website Redesign project.">
    <div class="mx-auto max-w-3xl">
        <div class="mb-6 flex items-start gap-4">
            <span
                class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-chart-1/15"
            >
                <span class="h-4 w-4 rounded-full bg-chart-1"></span>
            </span>
            <div class="min-w-0 flex-1">
                <h1 class="text-2xl font-bold tracking-tight sm:text-3xl">
                    Website Redesign
                </h1>
                <p class="mt-1 text-sm text-muted-foreground">
                    Marketing site rebuild for the Q4 launch
                </p>
            </div>
        </div>

        <div class="mb-8 rounded-xl border border-border bg-card p-5">
            <div class="flex items-center justify-between text-sm">
                <span class="font-medium">7 of 12 tasks complete</span>
                <span class="text-muted-foreground">58%</span>
            </div>
            <div class="mt-2 h-2 w-full overflow-hidden rounded-full bg-muted">
                <div
                    class="h-full rounded-full bg-chart-1"
                    style="width: 58%"
                ></div>
            </div>
        </div>

        <div class="mb-5 flex items-center gap-2 border-b border-border">
            <button
                class="border-b-2 border-primary px-1 pb-3 text-sm font-semibold text-primary"
            >
                Active <span class="text-muted-foreground">5</span>
            </button>
            <button
                class="border-b-2 border-transparent px-1 pb-3 text-sm font-medium text-muted-foreground hover:text-foreground"
            >
                Completed <span>7</span>
            </button>
        </div>

        <div
            class="mb-4 flex items-center gap-3 rounded-xl border border-border bg-card px-4 py-3"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 text-muted-foreground"
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
            <input
                type="text"
                placeholder="e.g. Set up staging environment"
                class="w-full border-none bg-transparent p-0 text-sm placeholder:text-muted-foreground focus:outline-none focus:ring-0"
            />
        </div>

        <div class="rounded-xl border border-border bg-card">
            <ul class="divide-y divide-border">
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
                            Medium <span>·</span> <span>11:30 AM</span>
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
                            Medium <span>·</span> <span>2:00 PM</span>
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
                            class="mt-1 flex flex-wrap items-center gap-2 text-xs text-destructive"
                        >
                            Due 2 days ago
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
                            Set up staging environment
                        </p>
                        <div
                            class="mt-1 flex flex-wrap items-center gap-2 text-xs text-muted-foreground"
                        >
                            <span
                                class="inline-block h-2 w-2 rounded-full bg-muted-foreground/40"
                            ></span>
                            Low
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
                            Write launch announcement blog post
                        </p>
                        <div
                            class="mt-1 flex flex-wrap items-center gap-2 text-xs text-muted-foreground"
                        >
                            <span
                                class="inline-block h-2 w-2 rounded-full bg-muted-foreground/40"
                            ></span>
                            Low <span>·</span> <span>Sep 12</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</x-app-layout>
