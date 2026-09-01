<x-app-layout title="Finalize Q3 investor deck" description="View and edit details for this task.">
    <div class="mx-auto grid max-w-4xl grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Main column -->
        <div class="space-y-6 lg:col-span-2">
            <div class="space-y-3 rounded-xl border border-border bg-card p-5">
                <div class="flex items-start gap-3">
                    <input
                        type="checkbox"
                        data-task-checkbox
                        class="mt-1.5 h-5 w-5 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                    />
                    <div data-task-row class="min-w-0 flex-1">
                        <input
                            type="text"
                            value="Finalize Q3 investor deck"
                            placeholder="e.g. Finalize Q3 investor deck"
                            data-task-title
                            class="w-full border-none bg-transparent p-0 text-xl font-bold tracking-tight focus:outline-none focus:ring-0"
                        />
                    </div>
                </div>
                <textarea
                    rows="3"
                    placeholder="e.g. Pull the latest numbers from finance and update slide 4"
                    class="w-full resize-none rounded-lg border-none bg-transparent p-0 text-sm text-muted-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-0"
                >
Pull final numbers from finance, tighten the growth narrative on slides 4-9, and get design polish on the closing slide before the 9am sync with the board.</textarea>
            </div>

            <div class="space-y-3 rounded-xl border border-border bg-card p-5">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-semibold">Subtasks</h2>
                    <span class="text-xs font-medium text-muted-foreground"
                        >2 / 4 done</span
                    >
                </div>
                <div
                    class="h-1.5 w-full overflow-hidden rounded-full bg-muted"
                >
                    <div class="h-full w-1/2 rounded-full bg-primary"></div>
                </div>
                <ul class="divide-y divide-border">
                    <li class="flex items-center gap-3 py-2.5">
                        <input
                            type="checkbox"
                            checked
                            class="h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                        />
                        <span
                            class="flex-1 text-sm text-muted-foreground line-through"
                            >Pull Q3 revenue numbers from finance</span
                        >
                    </li>
                    <li class="flex items-center gap-3 py-2.5">
                        <input
                            type="checkbox"
                            checked
                            class="h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                        />
                        <span
                            class="flex-1 text-sm text-muted-foreground line-through"
                            >Draft growth narrative outline</span
                        >
                    </li>
                    <li class="flex items-center gap-3 py-2.5">
                        <input
                            type="checkbox"
                            class="h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                        />
                        <span class="flex-1 text-sm"
                            >Polish closing slide design</span
                        >
                    </li>
                    <li class="flex items-center gap-3 py-2.5">
                        <input
                            type="checkbox"
                            class="h-4 w-4 shrink-0 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                        />
                        <span class="flex-1 text-sm"
                            >Send draft to board for review</span
                        >
                    </li>
                </ul>
                <button
                    class="flex items-center gap-1.5 text-sm font-medium text-muted-foreground hover:text-foreground"
                >
                    <x-icons.plus-icon />
                    Add subtask
                </button>
            </div>

            <div class="space-y-4 rounded-xl border border-border bg-card p-5">
                <h2 class="text-sm font-semibold">Activity</h2>
                <ul class="space-y-4">
                    <li class="flex gap-3">
                        <img
                            src="https://i.pravatar.cc/64?img=12"
                            alt=""
                            class="h-7 w-7 flex-shrink-0 rounded-full"
                        />
                        <div class="min-w-0 flex-1 space-y-0.5">
                            <p class="text-sm">
                                <span class="font-semibold">Alex Morgan</span>
                                <span class="text-muted-foreground"
                                    >completed subtask "Draft growth narrative
                                    outline"</span
                                >
                            </p>
                            <p class="text-xs text-muted-foreground">
                                Today at 10:42 AM
                            </p>
                        </div>
                    </li>
                    <li class="flex gap-3">
                        <img
                            src="https://i.pravatar.cc/64?img=5"
                            alt=""
                            class="h-7 w-7 flex-shrink-0 rounded-full"
                        />
                        <div class="min-w-0 flex-1 space-y-1">
                            <div class="rounded-lg bg-muted px-3 py-2 text-sm">
                                Numbers from finance are in the shared drive — let
                                me know if the Q3 churn figure looks off to you.
                            </div>
                            <p class="text-xs text-muted-foreground">
                                Priya Shah · Yesterday at 4:15 PM
                            </p>
                        </div>
                    </li>
                    <li class="flex gap-3">
                        <img
                            src="https://i.pravatar.cc/64?img=12"
                            alt=""
                            class="h-7 w-7 flex-shrink-0 rounded-full"
                        />
                        <div class="min-w-0 flex-1 space-y-0.5">
                            <p class="text-sm">
                                <span class="font-semibold">Alex Morgan</span>
                                <span class="text-muted-foreground"
                                    >created this task</span
                                >
                            </p>
                            <p class="text-xs text-muted-foreground">
                                Aug 27 at 9:03 AM
                            </p>
                        </div>
                    </li>
                </ul>
                <div
                    class="flex items-center gap-2 border-t border-border pt-4"
                >
                    <img
                        src="https://i.pravatar.cc/64?img=12"
                        alt=""
                        class="h-7 w-7 flex-shrink-0 rounded-full"
                    />
                    <input
                        type="text"
                        placeholder="e.g. Looks good — one note on slide 4"
                        class="w-full rounded-lg border border-input bg-background px-3 py-1.5 text-sm placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring/30"
                    />
                </div>
            </div>
        </div>

        <!-- Meta sidebar -->
        <div class="space-y-4 lg:col-span-1">
            <div class="rounded-xl border border-border bg-card p-5">
                <dl class="space-y-4 text-sm">
                    <div class="space-y-1.5">
                        <dt
                            class="text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                        >
                            Due date
                        </dt>
                        <dd>
                            <x-ui.button variant="outline" justify="start" class="w-full">
                                <x-icons.calendar-icon />
                                Today, 9:00 AM
                                </x-ui.button>
                        </dd>
                    </div>
                    <div class="space-y-1.5">
                        <dt
                            class="text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                        >
                            Priority
                        </dt>
                        <dd>
                            <x-ui.button variant="outline" justify="start" class="w-full">
                                <span
                                    class="h-2.5 w-2.5 rounded-full bg-destructive"
                                ></span>
                                High
                                </x-ui.button>
                        </dd>
                    </div>
                    <div class="space-y-1.5">
                        <dt
                            class="text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                        >
                            Project
                        </dt>
                        <dd>
                            <x-ui.button variant="outline" justify="start" class="w-full">
                                <span
                                    class="h-2.5 w-2.5 rounded-full bg-chart-4"
                                ></span>
                                Marketing Plan
                                </x-ui.button>
                        </dd>
                    </div>
                    <div class="space-y-1.5">
                        <dt
                            class="text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                        >
                            Assignee
                        </dt>
                        <dd
                            class="flex items-center gap-2 rounded-lg border border-border px-3 py-2"
                        >
                            <img
                                src="https://i.pravatar.cc/64?img=12"
                                alt=""
                                class="h-5 w-5 rounded-full"
                            />
                            Alex Morgan
                        </dd>
                    </div>
                    <div class="space-y-1.5">
                        <dt
                            class="text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                        >
                            Tags
                        </dt>
                        <dd class="flex flex-wrap gap-1.5">
                            <span
                                class="rounded-full bg-secondary px-2.5 py-1 text-xs font-medium text-secondary-foreground"
                                >investors</span
                            >
                            <span
                                class="rounded-full bg-secondary px-2.5 py-1 text-xs font-medium text-secondary-foreground"
                                >deck</span
                            >
                            <x-ui.button variant="outline" size="sm" rounded="full" class="border-dashed">
                                + Add
                            </x-ui.button>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
