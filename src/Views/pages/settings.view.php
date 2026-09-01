<x-app-layout title="Settings" description="Manage your account and app preferences.">
    <div class="mx-auto max-w-3xl">
        <h1 class="mb-6 text-2xl font-bold tracking-tight sm:text-3xl">Settings</h1>

        <div
            data-tabs
            id="settings-tabs"
            class="mb-6 flex items-center gap-1 rounded-lg bg-muted p-1"
        >
            <button
                data-tab="profile"
                data-tabs-for="settings-tabs"
                class="rounded-md bg-card px-3.5 py-1.5 text-sm font-semibold text-foreground shadow-sm"
            >
                Profile
            </button>
            <button
                data-tab="preferences"
                data-tabs-for="settings-tabs"
                class="rounded-md px-3.5 py-1.5 text-sm font-medium text-muted-foreground"
            >
                Preferences
            </button>
            <button
                data-tab="notifications"
                data-tabs-for="settings-tabs"
                class="rounded-md px-3.5 py-1.5 text-sm font-medium text-muted-foreground"
            >
                Notifications
            </button>
            <button
                data-tab="account"
                data-tabs-for="settings-tabs"
                class="rounded-md px-3.5 py-1.5 text-sm font-medium text-muted-foreground"
            >
                Account
            </button>
        </div>

        <!-- Profile -->
        <div
            data-tab-panel="profile"
            data-tabs-for="settings-tabs"
            class="space-y-6"
        >
            <div class="rounded-xl border border-border bg-card p-5">
                <h2 class="mb-4 text-sm font-semibold">Profile</h2>
                <div class="mb-5 flex items-center gap-4">
                    <img
                        src="https://i.pravatar.cc/128?img=12"
                        alt=""
                        class="h-16 w-16 rounded-full"
                    />
                    <div>
                        <x-ui.button variant="outline" size="sm">
                            Change photo
                        </x-ui.button>
                        <p class="mt-1 text-xs text-muted-foreground">
                            JPG or PNG. Max 2MB.
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label
                            class="mb-1.5 block text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                            >Full name</label
                        >
                        <input
                            type="text"
                            value="Alex Morgan"
                            placeholder="e.g. Alex Morgan"
                            class="w-full rounded-lg border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring/30"
                        />
                    </div>
                    <div>
                        <label
                            class="mb-1.5 block text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                            >Email</label
                        >
                        <input
                            type="email"
                            value="test@example.com"
                            placeholder="you@example.com"
                            class="w-full rounded-lg border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring/30"
                        />
                    </div>
                    <div class="sm:col-span-2">
                        <label
                            class="mb-1.5 block text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                            >Timezone</label
                        >
                        <select
                            class="w-full rounded-lg border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring/30"
                        >
                            <option>(GMT-05:00) Eastern Time</option>
                            <option>(GMT-06:00) Central Time</option>
                            <option>(GMT-08:00) Pacific Time</option>
                            <option>(GMT+00:00) UTC</option>
                            <option>(GMT+06:00) Dhaka</option>
                        </select>
                    </div>
                </div>
                <div class="mt-5 flex justify-end border-t border-border pt-4">
                    <x-ui.button>
                        Save changes
                    </x-ui.button>
                </div>
            </div>
        </div>

        <!-- Preferences -->
        <div
            data-tab-panel="preferences"
            data-tabs-for="settings-tabs"
            class="hidden space-y-6"
        >
            <div class="rounded-xl border border-border bg-card p-5">
                <h2 class="mb-4 text-sm font-semibold">Appearance</h2>
                <div class="flex items-center justify-between py-3">
                    <div>
                        <p class="text-sm font-medium">Theme</p>
                        <p class="text-xs text-muted-foreground">
                            Choose light, dark, or match your system
                        </p>
                    </div>
                    <div
                        role="group"
                        aria-label="Theme"
                        class="flex items-center gap-0.5 rounded-lg bg-muted p-1"
                    >
                        <button
                            data-theme-set="light"
                            class="flex items-center gap-1.5 rounded-md px-2.5 py-1.5 text-xs font-medium text-muted-foreground"
                        >
                            <x-icons.sun-icon />
                            Light
                        </button>
                        <button
                            data-theme-set="system"
                            class="flex items-center gap-1.5 rounded-md px-2.5 py-1.5 text-xs font-medium text-muted-foreground"
                        >
                            <x-icons.card-icon />
                            System
                        </button>
                        <button
                            data-theme-set="dark"
                            class="flex items-center gap-1.5 rounded-md px-2.5 py-1.5 text-xs font-medium text-muted-foreground"
                        >
                            <x-icons.moon-icon />
                            Dark
                        </button>
                    </div>
                </div>
                <div
                    class="flex items-center justify-between border-t border-border py-3"
                >
                    <div>
                        <p class="text-sm font-medium">Compact task rows</p>
                        <p class="text-xs text-muted-foreground">
                            Show more tasks per screen
                        </p>
                    </div>
                    <button
                        class="relative inline-flex h-6 w-11 items-center rounded-full bg-muted transition"
                    >
                        <span
                            class="inline-block h-4 w-4 translate-x-1 rounded-full bg-card shadow transition"
                        ></span>
                    </button>
                </div>
                <div
                    class="flex items-center justify-between border-t border-border py-3"
                >
                    <div>
                        <p class="text-sm font-medium">Show completed tasks</p>
                        <p class="text-xs text-muted-foreground">
                            Keep finished tasks visible in lists
                        </p>
                    </div>
                    <button
                        class="relative inline-flex h-6 w-11 items-center rounded-full bg-primary transition"
                    >
                        <span
                            class="inline-block h-4 w-4 translate-x-6 rounded-full bg-primary-foreground shadow transition"
                        ></span>
                    </button>
                </div>
            </div>
            <div class="rounded-xl border border-border bg-card p-5">
                <h2 class="mb-4 text-sm font-semibold">Default view</h2>
                <div class="grid grid-cols-3 gap-3">
                    <label
                        class="flex cursor-pointer flex-col items-center gap-2 rounded-lg border-2 border-primary bg-primary/5 p-3 text-center text-xs font-medium"
                    >
                        <input
                            type="radio"
                            name="default-view"
                            class="sr-only"
                            checked
                        />
                        Today
                    </label>
                    <label
                        class="flex cursor-pointer flex-col items-center gap-2 rounded-lg border border-border p-3 text-center text-xs font-medium text-muted-foreground hover:bg-accent"
                    >
                        <input type="radio" name="default-view" class="sr-only" />
                        All tasks
                    </label>
                    <label
                        class="flex cursor-pointer flex-col items-center gap-2 rounded-lg border border-border p-3 text-center text-xs font-medium text-muted-foreground hover:bg-accent"
                    >
                        <input type="radio" name="default-view" class="sr-only" />
                        Calendar
                    </label>
                </div>
            </div>
        </div>

        <!-- Notifications -->
        <div
            data-tab-panel="notifications"
            data-tabs-for="settings-tabs"
            class="hidden space-y-6"
        >
            <div class="rounded-xl border border-border bg-card p-5">
                <h2 class="mb-4 text-sm font-semibold">Email notifications</h2>
                <div class="flex items-center justify-between py-3">
                    <div>
                        <p class="text-sm font-medium">Daily digest</p>
                        <p class="text-xs text-muted-foreground">
                            A morning summary of today's tasks
                        </p>
                    </div>
                    <button
                        class="relative inline-flex h-6 w-11 items-center rounded-full bg-primary transition"
                    >
                        <span
                            class="inline-block h-4 w-4 translate-x-6 rounded-full bg-primary-foreground shadow transition"
                        ></span>
                    </button>
                </div>
                <div
                    class="flex items-center justify-between border-t border-border py-3"
                >
                    <div>
                        <p class="text-sm font-medium">Due date reminders</p>
                        <p class="text-xs text-muted-foreground">
                            Get notified before tasks are due
                        </p>
                    </div>
                    <button
                        class="relative inline-flex h-6 w-11 items-center rounded-full bg-primary transition"
                    >
                        <span
                            class="inline-block h-4 w-4 translate-x-6 rounded-full bg-primary-foreground shadow transition"
                        ></span>
                    </button>
                </div>
                <div
                    class="flex items-center justify-between border-t border-border py-3"
                >
                    <div>
                        <p class="text-sm font-medium">Comment mentions</p>
                        <p class="text-xs text-muted-foreground">
                            When someone mentions you on a task
                        </p>
                    </div>
                    <button
                        class="relative inline-flex h-6 w-11 items-center rounded-full bg-muted transition"
                    >
                        <span
                            class="inline-block h-4 w-4 translate-x-1 rounded-full bg-card shadow transition"
                        ></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Account -->
        <div
            data-tab-panel="account"
            data-tabs-for="settings-tabs"
            class="hidden space-y-6"
        >
            <div class="rounded-xl border border-border bg-card p-5">
                <h2 class="mb-4 text-sm font-semibold">Password</h2>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label
                            class="mb-1.5 block text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                            >Current password</label
                        >
                        <div class="relative">
                            <input
                                type="password"
                                placeholder="••••••••"
                                class="w-full rounded-lg border border-input bg-background px-3 py-2 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-ring/30"
                            />
                            <x-ui.button
                                variant="ghost"
                                size="icon-sm"
                                rounded="sm"
                                class="absolute right-2.5 top-1/2 -translate-y-1/2"
                                :attrs="['type' => 'button', 'data-password-toggle' => '', 'aria-label' => 'Show password']"
                            >
                                <x-icons.eye-icon />
                                <x-icons.eye-off-icon />
                            </x-ui.button>
                        </div>
                    </div>
                    <div>
                        <label
                            class="mb-1.5 block text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                            >New password</label
                        >
                        <div class="relative">
                            <input
                                type="password"
                                placeholder="At least 8 characters"
                                class="w-full rounded-lg border border-input bg-background px-3 py-2 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-ring/30"
                            />
                            <x-ui.button
                                variant="ghost"
                                size="icon-sm"
                                rounded="sm"
                                class="absolute right-2.5 top-1/2 -translate-y-1/2"
                                :attrs="['type' => 'button', 'data-password-toggle' => '', 'aria-label' => 'Show password']"
                            >
                                <x-icons.eye-icon />
                                <x-icons.eye-off-icon />
                            </x-ui.button>
                        </div>
                    </div>
                    <div>
                        <label
                            class="mb-1.5 block text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                            >Confirm password</label
                        >
                        <div class="relative">
                            <input
                                type="password"
                                placeholder="••••••••"
                                class="w-full rounded-lg border border-input bg-background px-3 py-2 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-ring/30"
                            />
                            <x-ui.button
                                variant="ghost"
                                size="icon-sm"
                                rounded="sm"
                                class="absolute right-2.5 top-1/2 -translate-y-1/2"
                                :attrs="['type' => 'button', 'data-password-toggle' => '', 'aria-label' => 'Show password']"
                            >
                                <x-icons.eye-icon />
                                <x-icons.eye-off-icon />
                            </x-ui.button>
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex justify-end border-t border-border pt-4">
                    <x-ui.button>
                        Update password
                    </x-ui.button>
                </div>
            </div>

            <div
                class="rounded-xl border border-destructive/30 bg-destructive/5 p-5"
            >
                <h2 class="mb-1 text-sm font-semibold text-destructive">
                    Danger zone
                </h2>
                <p class="mb-4 text-sm text-muted-foreground">
                    Permanently delete your account and all associated data. This
                    cannot be undone.
                </p>
                <x-ui.button variant="destructive">
                        Delete account
                    </x-ui.button>
            </div>
        </div>
    </div>
</x-app-layout>
