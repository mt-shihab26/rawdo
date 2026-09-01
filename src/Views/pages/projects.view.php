<x-app-layout title="Projects" description="See all your projects and their progress.">
    <div class="mx-auto max-w-5xl">
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <h1 class="text-2xl font-bold tracking-tight sm:text-3xl">Projects</h1>
            <x-ui.button :attrs="['data-modal-open' => 'new-project-modal']">
                <x-icons.plus-icon />
                New project
            </x-ui.button>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <a
                href="{{ route('project-detail.index') }}"
                class="group rounded-xl border border-border bg-card p-5 transition hover:border-chart-1/40 hover:shadow-sm"
            >
                <div class="mb-4 flex items-center justify-between">
                    <span
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-chart-1/15"
                    >
                        <span class="h-3 w-3 rounded-full bg-chart-1"></span>
                    </span>
                    <x-ui.button variant="ghost" size="icon-sm" rounded="sm" class="opacity-0 group-hover:opacity-100" :attrs="['aria-label' => 'Project options']">
                        <x-icons.more-icon />
                    </x-ui.button>
                </div>
                <h2 class="font-semibold">Website Redesign</h2>
                <p class="mt-1 text-sm text-muted-foreground">
                    Marketing site rebuild for the Q4 launch
                </p>
                <div
                    class="mt-4 flex items-center justify-between text-xs text-muted-foreground"
                >
                    <span>7 of 12 tasks</span>
                    <span>58%</span>
                </div>
                <div
                    class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-muted"
                >
                    <div
                        class="h-full rounded-full bg-chart-1"
                        style="width: 58%"
                    ></div>
                </div>
            </a>

            <a
                href="{{ route('project-detail.index') }}"
                class="group rounded-xl border border-border bg-card p-5 transition hover:border-chart-4/40 hover:shadow-sm"
            >
                <div class="mb-4 flex items-center justify-between">
                    <span
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-chart-4/15"
                    >
                        <span class="h-3 w-3 rounded-full bg-chart-4"></span>
                    </span>
                    <x-ui.button variant="ghost" size="icon-sm" rounded="sm" class="opacity-0 group-hover:opacity-100" :attrs="['aria-label' => 'Project options']">
                        <x-icons.more-icon />
                    </x-ui.button>
                </div>
                <h2 class="font-semibold">Marketing Plan</h2>
                <p class="mt-1 text-sm text-muted-foreground">
                    Campaigns, content calendar, and launch assets
                </p>
                <div
                    class="mt-4 flex items-center justify-between text-xs text-muted-foreground"
                >
                    <span>5 of 9 tasks</span>
                    <span>56%</span>
                </div>
                <div
                    class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-muted"
                >
                    <div
                        class="h-full rounded-full bg-chart-4"
                        style="width: 56%"
                    ></div>
                </div>
            </a>

            <a
                href="{{ route('project-detail.index') }}"
                class="group rounded-xl border border-border bg-card p-5 transition hover:border-chart-2/40 hover:shadow-sm"
            >
                <div class="mb-4 flex items-center justify-between">
                    <span
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-chart-2/15"
                    >
                        <span class="h-3 w-3 rounded-full bg-chart-2"></span>
                    </span>
                    <x-ui.button variant="ghost" size="icon-sm" rounded="sm" class="opacity-0 group-hover:opacity-100" :attrs="['aria-label' => 'Project options']">
                        <x-icons.more-icon />
                    </x-ui.button>
                </div>
                <h2 class="font-semibold">Personal</h2>
                <p class="mt-1 text-sm text-muted-foreground">
                    Errands, appointments, and life admin
                </p>
                <div
                    class="mt-4 flex items-center justify-between text-xs text-muted-foreground"
                >
                    <span>4 of 6 tasks</span>
                    <span>67%</span>
                </div>
                <div
                    class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-muted"
                >
                    <div
                        class="h-full rounded-full bg-chart-2"
                        style="width: 67%"
                    ></div>
                </div>
            </a>

            <button
                data-modal-open="new-project-modal"
                class="flex min-h-[168px] flex-col items-center justify-center gap-2 rounded-xl border border-dashed border-border text-muted-foreground transition hover:border-primary/40 hover:text-primary"
            >
                <x-icons.plus-large-icon />
                <span class="text-sm font-medium">New project</span>
            </button>
        </div>
    </div>
</x-app-layout>
