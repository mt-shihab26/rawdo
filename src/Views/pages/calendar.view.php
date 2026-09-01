<x-app-layout title="Calendar" description="View your tasks laid out across the calendar.">
    <div class="mx-auto max-w-5xl">
        <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-bold tracking-tight sm:text-3xl">
                    August 2026
                </h1>
                <div class="flex items-center gap-1">
                    <x-ui.button variant="ghost" size="icon" :attrs="['aria-label' => 'Previous month']">
                        <x-icons.chevron-left-icon />
                    </x-ui.button>
                    <x-ui.button variant="ghost" size="icon" :attrs="['aria-label' => 'Next month']">
                        <x-icons.chevron-right-icon />
                    </x-ui.button>
                    <x-ui.button variant="outline" size="sm" class="ml-1">
                        Today
                    </x-ui.button>
                </div>
            </div>
            <div
                data-tabs
                id="calendar-view-tabs"
                class="flex items-center gap-1 rounded-lg bg-muted p-1"
            >
                <button
                    data-tab="month"
                    data-tabs-for="calendar-view-tabs"
                    class="rounded-md bg-card px-3 py-1.5 text-xs font-semibold text-foreground shadow-sm"
                >
                    Month
                </button>
                <button
                    data-tab="week"
                    data-tabs-for="calendar-view-tabs"
                    class="rounded-md px-3 py-1.5 text-xs font-medium text-muted-foreground"
                >
                    Week
                </button>
                <button
                    data-tab="day"
                    data-tabs-for="calendar-view-tabs"
                    class="rounded-md px-3 py-1.5 text-xs font-medium text-muted-foreground"
                >
                    Day
                </button>
            </div>
        </div>

        <!-- Legend -->
        <div class="mb-3 flex flex-wrap items-center gap-4 text-xs text-muted-foreground">
            <span class="flex items-center gap-1.5">
                <span class="h-2 w-2 rounded-full bg-destructive"></span>
                Deadline
            </span>
            <span class="flex items-center gap-1.5">
                <span class="h-2 w-2 rounded-full bg-chart-1"></span>
                Launch
            </span>
            <span class="flex items-center gap-1.5">
                <span class="h-2 w-2 rounded-full bg-primary"></span>
                Today
            </span>
        </div>

        <!-- Month view -->
        <div
            data-tab-panel="month"
            data-tabs-for="calendar-view-tabs"
            class="overflow-hidden rounded-xl border border-border bg-card"
        >
            <div
                class="grid grid-cols-7 border-b border-border text-center text-xs font-semibold uppercase tracking-wider text-muted-foreground"
            >
                <div class="py-2.5">Sun</div>
                <div class="py-2.5">Mon</div>
                <div class="py-2.5">Tue</div>
                <div class="py-2.5">Wed</div>
                <div class="py-2.5">Thu</div>
                <div class="py-2.5">Fri</div>
                <div class="py-2.5">Sat</div>
            </div>
            <div
                class="grid grid-cols-7 [&>*:nth-child(7n+1)]:bg-muted/30 [&>*:nth-child(7n)]:bg-muted/30"
            >
                <!-- Week 1 -->
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs text-muted-foreground/50 sm:min-h-28"
                >
                    26
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs text-muted-foreground/50 sm:min-h-28"
                >
                    27
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs text-muted-foreground/50 sm:min-h-28"
                >
                    28
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs text-muted-foreground/50 sm:min-h-28"
                >
                    29
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs text-muted-foreground/50 sm:min-h-28"
                >
                    30
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs text-muted-foreground/50 sm:min-h-28"
                >
                    31
                </div>
                <div
                    class="min-h-24 border-b border-border p-2 text-xs text-muted-foreground/50 sm:min-h-28"
                >
                    1
                </div>

                <!-- Week 2 -->
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    2
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    3
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    <span
                        class="mb-1 inline-flex h-5 w-5 items-center justify-center rounded-full font-semibold"
                        >4</span
                    >
                    <div
                        class="rounded border-l-2 border-destructive bg-destructive/10 px-1.5 py-0.5 text-[11px] font-medium text-destructive"
                    >
                        Budget review
                    </div>
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    5
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    6
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    7
                </div>
                <div
                    class="min-h-24 border-b border-border p-2 text-xs sm:min-h-28"
                >
                    8
                </div>

                <!-- Week 3 -->
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    9
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    10
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    11
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    12
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    <span
                        class="mb-1 inline-flex h-5 w-5 items-center justify-center rounded-full font-semibold"
                        >13</span
                    >
                    <div
                        class="rounded border-l-2 border-chart-1 bg-chart-1/15 px-1.5 py-0.5 text-[11px] font-medium text-chart-1"
                    >
                        Blog launch
                    </div>
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    14
                </div>
                <div
                    class="min-h-24 border-b border-border p-2 text-xs sm:min-h-28"
                >
                    15
                </div>

                <!-- Week 4 -->
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    16
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    17
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    18
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    19
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    20
                </div>
                <div
                    class="min-h-24 border-b border-r border-border p-2 text-xs sm:min-h-28"
                >
                    21
                </div>
                <div
                    class="min-h-24 border-b border-border p-2 text-xs sm:min-h-28"
                >
                    22
                </div>

                <!-- Week 5 -->
                <div
                    class="min-h-24 border-r border-border p-2 text-xs sm:min-h-28"
                >
                    23
                </div>
                <div
                    class="min-h-24 border-r border-border p-2 text-xs sm:min-h-28"
                >
                    24
                </div>
                <div
                    class="min-h-24 border-r border-border p-2 text-xs sm:min-h-28"
                >
                    25
                </div>
                <div
                    class="min-h-24 border-r border-border p-2 text-xs sm:min-h-28"
                >
                    26
                </div>
                <div
                    class="min-h-24 border-r border-border p-2 text-xs sm:min-h-28"
                >
                    27
                </div>
                <div
                    class="min-h-24 border-r border-border p-2 text-xs sm:min-h-28"
                >
                    28
                </div>
                <div
                    class="min-h-24 border-primary !bg-primary/5 p-2 text-xs ring-1 ring-inset ring-primary/30 sm:min-h-28"
                >
                    <span
                        class="mb-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-primary font-semibold text-primary-foreground"
                        >29</span
                    >
                </div>
            </div>
        </div>

        <!-- Week / Day placeholders -->
        <div
            data-tab-panel="week"
            data-tabs-for="calendar-view-tabs"
            class="hidden rounded-xl border border-dashed border-border bg-card p-12 text-center text-sm text-muted-foreground"
        >
            Week view — coming soon
        </div>
        <div
            data-tab-panel="day"
            data-tabs-for="calendar-view-tabs"
            class="hidden rounded-xl border border-dashed border-border bg-card p-12 text-center text-sm text-muted-foreground"
        >
            Day view — coming soon
        </div>
    </div>
</x-app-layout>
