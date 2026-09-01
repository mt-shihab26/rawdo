<x-auth-layout title="Log in" description="Log in to keep on top of your tasks.">
    <div class="w-full max-w-sm space-y-6 rounded-xl border border-border bg-card p-6 shadow-sm">
        <x-elements.heading heading="Welcome back" subheading="Log in to keep on top of your tasks." />

        <div class="space-y-2.5">
            <x-ui.button variant="outline" class="w-full">
                <x-icons.google-icon />
                Continue with Google
            </x-ui.button>
        </div>

        <div class="flex items-center gap-3">
            <div class="h-px flex-1 bg-border"></div>
            <span class="text-xs font-medium text-muted-foreground">OR</span>
            <div class="h-px flex-1 bg-border"></div>
        </div>

        <form class="space-y-4">
            <x-elements.email-input
                id="email"
                name="email"
                :required="true"
                :attrs="['autocomplete' => 'email']"
            />
            <x-elements.password-input
                id="password"
                name="password"
                placeholder="••••••••"
                :required="true"
                :attrs="['autocomplete' => 'current-password']"
            >
                <a href="#" class="text-xs font-medium text-primary hover:underline">Forgot?</a>
            </x-elements.password-input>
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

    <p class="text-sm text-muted-foreground">
        Don't have an account?
        <a href="{{ route('signup.index') }}" class="font-semibold text-primary hover:underline">Sign up</a>
    </p>
</x-auth-layout>
