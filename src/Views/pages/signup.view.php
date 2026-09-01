<x-root-layout title="Sign up" description="Create a Rawdo account to start tracking your tasks.">
    <div class="flex min-h-screen flex-col items-center justify-center px-4 py-12">
        <a href="{{ route('home.index') }}" class="mb-8 flex items-center gap-2">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-lg bg-primary text-base font-bold text-primary-foreground"
                >R</span
            >
            <span class="text-xl font-bold tracking-tight">Rawdo</span>
        </a>

        <div class="w-full max-w-sm rounded-xl border border-border bg-card p-6 shadow-sm">
            <h1 class="text-xl font-bold tracking-tight">Create your account</h1>
            <p class="mt-1 text-sm text-muted-foreground">
                Start organizing your work in minutes.
            </p>

            <div class="mt-6 space-y-2.5">
                <button
                    class="flex w-full items-center justify-center gap-2 rounded-lg border border-input bg-background px-4 py-2.5 text-sm font-medium hover:bg-accent"
                >
                    <x-icons.google-icon />
                    Continue with Google
                </button>
            </div>

            <div class="my-5 flex items-center gap-3">
                <div class="h-px flex-1 bg-border"></div>
                <span class="text-xs font-medium text-muted-foreground">OR</span>
                <div class="h-px flex-1 bg-border"></div>
            </div>

            <form class="space-y-4">
                <div>
                    <label
                        class="mb-1.5 block text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                        >Full name</label
                    >
                    <input
                        type="text"
                        placeholder="Alex Morgan"
                        class="w-full rounded-lg border border-input bg-background px-3 py-2.5 text-sm placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring/30"
                    />
                </div>
                <div>
                    <label
                        class="mb-1.5 block text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                        >Email</label
                    >
                    <input
                        type="email"
                        placeholder="you@example.com"
                        class="w-full rounded-lg border border-input bg-background px-3 py-2.5 text-sm placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring/30"
                    />
                </div>
                <div>
                    <label
                        class="mb-1.5 block text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                        >Password</label
                    >
                    <div class="relative">
                        <input
                            type="password"
                            placeholder="At least 8 characters"
                            class="w-full rounded-lg border border-input bg-background px-3 py-2.5 pr-10 text-sm placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring/30"
                        />
                        <button
                            type="button"
                            data-password-toggle
                            class="absolute right-2.5 top-1/2 -translate-y-1/2 rounded p-1 text-muted-foreground hover:text-foreground"
                            aria-label="Show password"
                        >
                            <x-icons.eye-icon />
                            <x-icons.eye-off-icon />
                        </button>
                    </div>
                </div>
                <label class="flex items-start gap-2 text-sm text-muted-foreground">
                    <input
                        type="checkbox"
                        class="mt-0.5 h-4 w-4 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                    />
                    <span
                        >I agree to the
                        <a href="#" class="font-medium text-primary hover:underline"
                            >Terms of Service</a
                        >
                        and
                        <a href="#" class="font-medium text-primary hover:underline"
                            >Privacy Policy</a
                        ></span
                    >
                </label>
                <button
                    type="submit"
                    class="w-full rounded-lg bg-primary px-4 py-2.5 text-sm font-semibold text-primary-foreground hover:bg-primary/90"
                >
                    Create account
                </button>
            </form>
        </div>

        <p class="mt-6 text-sm text-muted-foreground">
            Already have an account?
            <a href="{{ route('login.index') }}" class="font-semibold text-primary hover:underline">Log in</a>
        </p>
    </div>
</x-root-layout>
