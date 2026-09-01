<x-app-layout title="Finalize Q3 investor deck" description="View and edit details for this task.">
    <div class="mx-auto grid max-w-4xl grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Main column -->
        <div class="space-y-6 lg:col-span-2">
            <div class="rounded-xl border border-border bg-card p-5">
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
                    class="mt-3 w-full resize-none rounded-lg border-none bg-transparent p-0 text-sm text-muted-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-0"
                >
Pull final numbers from finance, tighten the growth narrative on slides 4-9, and get design polish on the closing slide before the 9am sync with the board.</textarea>
            </div>

            <div class="rounded-xl border border-border bg-card p-5">
                <div class="mb-3 flex items-center justify-between">
                    <h2 class="text-sm font-semibold">Subtasks</h2>
                    <span class="text-xs font-medium text-muted-foreground"
                        >2 / 4 done</span
                    >
                </div>
                <div
                    class="mb-3 h-1.5 w-full overflow-hidden rounded-full bg-muted"
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
                    class="mt-2 flex items-center gap-1.5 text-sm font-medium text-muted-foreground hover:text-foreground"
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
                    Add subtask
                </button>
            </div>

            <div class="rounded-xl border border-border bg-card p-5">
                <h2 class="mb-4 text-sm font-semibold">Activity</h2>
                <ul class="space-y-4">
                    <li class="flex gap-3">
                        <img
                            src="https://i.pravatar.cc/64?img=12"
                            alt=""
                            class="h-7 w-7 flex-shrink-0 rounded-full"
                        />
                        <div class="min-w-0 flex-1">
                            <p class="text-sm">
                                <span class="font-semibold">Alex Morgan</span>
                                <span class="text-muted-foreground"
                                    >completed subtask "Draft growth narrative
                                    outline"</span
                                >
                            </p>
                            <p class="mt-0.5 text-xs text-muted-foreground">
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
                        <div class="min-w-0 flex-1">
                            <div class="rounded-lg bg-muted px-3 py-2 text-sm">
                                Numbers from finance are in the shared drive — let
                                me know if the Q3 churn figure looks off to you.
                            </div>
                            <p class="mt-1 text-xs text-muted-foreground">
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
                        <div class="min-w-0 flex-1">
                            <p class="text-sm">
                                <span class="font-semibold">Alex Morgan</span>
                                <span class="text-muted-foreground"
                                    >created this task</span
                                >
                            </p>
                            <p class="mt-0.5 text-xs text-muted-foreground">
                                Aug 27 at 9:03 AM
                            </p>
                        </div>
                    </li>
                </ul>
                <div
                    class="mt-4 flex items-center gap-2 border-t border-border pt-4"
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
                    <div>
                        <dt
                            class="mb-1.5 text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                        >
                            Due date
                        </dt>
                        <dd>
                            <button
                                class="flex w-full items-center gap-2 rounded-lg border border-border px-3 py-2 text-left hover:bg-accent"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-destructive"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"
                                    />
                                </svg>
                                Today, 9:00 AM
                            </button>
                        </dd>
                    </div>
                    <div>
                        <dt
                            class="mb-1.5 text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                        >
                            Priority
                        </dt>
                        <dd>
                            <button
                                class="flex w-full items-center gap-2 rounded-lg border border-border px-3 py-2 text-left hover:bg-accent"
                            >
                                <span
                                    class="h-2.5 w-2.5 rounded-full bg-destructive"
                                ></span>
                                High
                            </button>
                        </dd>
                    </div>
                    <div>
                        <dt
                            class="mb-1.5 text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                        >
                            Project
                        </dt>
                        <dd>
                            <button
                                class="flex w-full items-center gap-2 rounded-lg border border-border px-3 py-2 text-left hover:bg-accent"
                            >
                                <span
                                    class="h-2.5 w-2.5 rounded-full bg-chart-4"
                                ></span>
                                Marketing Plan
                            </button>
                        </dd>
                    </div>
                    <div>
                        <dt
                            class="mb-1.5 text-xs font-semibold uppercase tracking-wider text-muted-foreground"
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
                    <div>
                        <dt
                            class="mb-1.5 text-xs font-semibold uppercase tracking-wider text-muted-foreground"
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
                            <button
                                class="rounded-full border border-dashed border-border px-2.5 py-1 text-xs font-medium text-muted-foreground hover:bg-accent"
                            >
                                + Add
                            </button>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
