<x-root-layout title="Log in" description="Log in to keep on top of your tasks.">
    <div class="flex min-h-screen flex-col items-center justify-center px-4 py-12">
        <div class="mb-8">
            <x-elements.logo />
        </div>

        <div class="w-full max-w-sm rounded-xl border border-border bg-card p-6 shadow-sm">
            <h1 class="text-xl font-bold tracking-tight">Welcome back</h1>
            <p class="mt-1 text-sm text-muted-foreground">
                Log in to keep on top of your tasks.
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
                        >Email</label
                    >
                    <input
                        type="email"
                        placeholder="you@example.com"
                        class="w-full rounded-lg border border-input bg-background px-3 py-2.5 text-sm placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring/30"
                    />
                </div>
                <div>
                    <div class="mb-1.5 flex items-center justify-between">
                        <label
                            class="block text-xs font-semibold uppercase tracking-wider text-muted-foreground"
                            >Password</label
                        >
                        <a href="#" class="text-xs font-medium text-primary hover:underline"
                            >Forgot?</a
                        >
                    </div>
                    <div class="relative">
                        <input
                            type="password"
                            placeholder="••••••••"
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
                <label class="flex items-center gap-2 text-sm text-muted-foreground">
                    <input
                        type="checkbox"
                        class="h-4 w-4 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                    />
                    Remember me for 30 days
                </label>
                <button
                    type="submit"
                    class="w-full rounded-lg bg-primary px-4 py-2.5 text-sm font-semibold text-primary-foreground hover:bg-primary/90"
                >
                    Log in
                </button>
            </form>
        </div>

        <p class="mt-6 text-sm text-muted-foreground">
            Don't have an account?
            <a href="{{ route('signup.index') }}" class="font-semibold text-primary hover:underline">Sign up</a>
        </p>
    </div>
</x-root-layout>
