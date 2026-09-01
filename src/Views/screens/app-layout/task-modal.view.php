<div
    id="add-task-modal"
    class="js-modal-backdrop fixed inset-0 z-50 hidden items-start justify-center bg-foreground/50 p-4 pt-24 backdrop-blur-sm"
>
    <div class="w-full max-w-lg rounded-xl border border-border bg-card shadow-xl">
        <form class="p-4">
            <input
                type="text"
                placeholder="e.g. Finalize Q3 investor deck"
                class="w-full border-none bg-transparent text-base font-medium placeholder:text-muted-foreground focus:outline-none focus:ring-0"
                autofocus
            />
            <textarea
                placeholder="e.g. Pull the latest numbers from finance and update slide 4"
                rows="2"
                class="mt-1 w-full resize-none border-none bg-transparent text-sm text-muted-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-0"
            ></textarea>
            <div class="mt-3 flex flex-wrap gap-2">
                <button
                    type="button"
                    class="inline-flex items-center gap-1.5 rounded-md border border-border px-2.5 py-1.5 text-xs font-medium text-foreground/80 hover:bg-accent"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-3.5 w-3.5"
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
                    Due date
                </button>
                <button
                    type="button"
                    class="inline-flex items-center gap-1.5 rounded-md border border-border px-2.5 py-1.5 text-xs font-medium text-foreground/80 hover:bg-accent"
                >
                    <span class="inline-block h-2.5 w-2.5 rounded-full bg-chart-4"></span>
                    Priority
                </button>
                <button
                    type="button"
                    class="inline-flex items-center gap-1.5 rounded-md border border-border px-2.5 py-1.5 text-xs font-medium text-foreground/80 hover:bg-accent"
                >
                    <span class="h-2.5 w-2.5 rounded-full bg-chart-1"></span>
                    Project
                </button>
            </div>
            <div
                class="mt-4 flex items-center justify-end gap-2 border-t border-border pt-4"
            >
                <button
                    type="button"
                    data-modal-close
                    class="rounded-lg px-3.5 py-2 text-sm font-medium text-muted-foreground hover:bg-accent hover:text-accent-foreground"
                >
                    Cancel
                </button>
                <button
                    type="submit"
                    class="rounded-lg bg-primary px-3.5 py-2 text-sm font-semibold text-primary-foreground hover:bg-primary/90"
                >
                    Add task
                </button>
            </div>
        </form>
    </div>
</div>
