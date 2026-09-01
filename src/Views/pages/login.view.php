<x-auth-layout title="Log in" description="Log in to keep on top of your tasks.">
    <div class="w-full max-w-sm rounded-xl border border-border bg-card p-6 shadow-sm">
        <x-elements.heading heading="Welcome back" subheading="Log in to keep on top of your tasks." />

        <div class="mt-6 space-y-2.5">
            <x-ui.button variant="outline" class="w-full">
                <x-icons.google-icon />
                Continue with Google
            </x-ui.button>
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
            <label class="flex items-center gap-2 text-sm text-muted-foreground">
                <input
                    type="checkbox"
                    class="h-4 w-4 rounded border-input accent-primary focus:ring-2 focus:ring-ring/30"
                />
                Remember me for 30 days
            </label>
            <x-ui.button class="w-full" :attrs="['type' => 'submit']">
                Log in
            </x-ui.button>
        </form>
    </div>

    <p class="mt-6 text-sm text-muted-foreground">
        Don't have an account?
        <a href="{{ route('signup.index') }}" class="font-semibold text-primary hover:underline">Sign up</a>
    </p>
</x-auth-layout>
