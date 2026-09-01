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
                        <button
                            class="rounded-lg border border-border px-3 py-1.5 text-sm font-medium hover:bg-accent"
                        >
                            Change photo
                        </button>
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
                    <button
                        class="rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-primary-foreground hover:bg-primary/90"
                    >
                        Save changes
                    </button>
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
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <circle cx="12" cy="12" r="3.5" />
                                <path
                                    stroke-linecap="round"
                                    d="M12 3v1.5M12 19.5V21M4.219 4.219l1.061 1.061M18.72 18.72l1.061 1.061M3 12h1.5M19.5 12H21M4.219 19.781l1.061-1.061M18.72 5.28l1.061-1.061"
                                />
                            </svg>
                            Light
                        </button>
                        <button
                            data-theme-set="system"
                            class="flex items-center gap-1.5 rounded-md px-2.5 py-1.5 text-xs font-medium text-muted-foreground"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <rect
                                    x="3"
                                    y="4.5"
                                    width="18"
                                    height="12"
                                    rx="1.5"
                                />
                                <path
                                    stroke-linecap="round"
                                    d="M8.25 19.5h7.5M12 16.5V19.5"
                                />
                            </svg>
                            System
                        </button>
                        <button
                            data-theme-set="dark"
                            class="flex items-center gap-1.5 rounded-md px-2.5 py-1.5 text-xs font-medium text-muted-foreground"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"
                                />
                            </svg>
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
                            <button
                                type="button"
                                data-password-toggle
                                class="absolute right-2.5 top-1/2 -translate-y-1/2 rounded p-1 text-muted-foreground hover:text-foreground"
                                aria-label="Show password"
                            >
                                <svg
                                    data-eye-icon
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                    />
                                </svg>
                                <svg
                                    data-eye-off-icon
                                    class="hidden h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.243 4.243L9.88 9.88"
                                    />
                                </svg>
                            </button>
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
                            <button
                                type="button"
                                data-password-toggle
                                class="absolute right-2.5 top-1/2 -translate-y-1/2 rounded p-1 text-muted-foreground hover:text-foreground"
                                aria-label="Show password"
                            >
                                <svg
                                    data-eye-icon
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                    />
                                </svg>
                                <svg
                                    data-eye-off-icon
                                    class="hidden h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.243 4.243L9.88 9.88"
                                    />
                                </svg>
                            </button>
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
                            <button
                                type="button"
                                data-password-toggle
                                class="absolute right-2.5 top-1/2 -translate-y-1/2 rounded p-1 text-muted-foreground hover:text-foreground"
                                aria-label="Show password"
                            >
                                <svg
                                    data-eye-icon
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                    />
                                </svg>
                                <svg
                                    data-eye-off-icon
                                    class="hidden h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.243 4.243L9.88 9.88"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex justify-end border-t border-border pt-4">
                    <button
                        class="rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-primary-foreground hover:bg-primary/90"
                    >
                        Update password
                    </button>
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
                <button
                    class="rounded-lg bg-destructive px-4 py-2 text-sm font-semibold text-primary-foreground hover:bg-destructive/90"
                >
                    Delete account
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
