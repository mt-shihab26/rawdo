<div
    id="add-task-modal"
    class="js-modal-backdrop fixed inset-0 z-50 hidden items-start justify-center bg-foreground/50 p-4 pt-24 backdrop-blur-sm"
>
    <div class="w-full max-w-lg rounded-xl border border-border bg-card shadow-xl">
        <form class="space-y-3 p-4">
            <div class="space-y-1">
                <input
                    type="text"
                    placeholder="e.g. Finalize Q3 investor deck"
                    class="w-full border-none bg-transparent text-base font-medium placeholder:text-muted-foreground focus:outline-none focus:ring-0"
                    autofocus
                />
                <textarea
                    placeholder="e.g. Pull the latest numbers from finance and update slide 4"
                    rows="2"
                    class="w-full resize-none border-none bg-transparent text-sm text-muted-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-0"
                ></textarea>
            </div>
            <div class="flex flex-wrap gap-2">
                <x-ui.button variant="outline" size="sm" rounded="md" :attrs="['type' => 'button']">
                    <x-icons.due-date-icon />
                    Due date
                </x-ui.button>
                <x-ui.button variant="outline" size="sm" rounded="md" :attrs="['type' => 'button']">
                    <span class="inline-block h-2.5 w-2.5 rounded-full bg-chart-4"></span>
                    Priority
                </x-ui.button>
                <x-ui.button variant="outline" size="sm" rounded="md" :attrs="['type' => 'button']">
                    <span class="h-2.5 w-2.5 rounded-full bg-chart-1"></span>
                    Project
                </x-ui.button>
            </div>
            <div
                class="flex items-center justify-end gap-2 border-t border-border pt-4"
            >
                <x-ui.button variant="ghost" size="sm" :attrs="['type' => 'button', 'data-modal-close' => '']">
                    Cancel
                </x-ui.button>
                <x-ui.button size="sm" :attrs="['type' => 'submit']">
                    Add task
                </x-ui.button>
            </div>
        </form>
    </div>
</div>
