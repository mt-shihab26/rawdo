<x-auth-layout title="Sign up" description="Create a Rawdo account to start tracking your tasks.">
    <div class="w-full max-w-sm space-y-6 rounded-xl border border-border bg-card p-6 shadow-sm">
        <x-elements.heading heading="Create your account" subheading="Start organizing your work in minutes." />

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
            <x-elements.text-input
                label="Full name"
                id="name"
                name="name"
                placeholder="Alex Morgan"
                :required="true"
                :attrs="['autocomplete' => 'name']"
            />
            <x-elements.email-input
                id="email"
                name="email"
                :required="true"
                :attrs="['autocomplete' => 'email']"
            />
            <x-elements.password-input
                id="password"
                name="password"
                placeholder="At least 8 characters"
                :required="true"
                :attrs="['minlength' => '8', 'autocomplete' => 'new-password']"
            />
            <x-elements.password-input
                label="Confirm password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Re-enter your password"
                :required="true"
                :attrs="['minlength' => '8', 'autocomplete' => 'new-password']"
            />
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
            <x-ui.button class="w-full" :attrs="['type' => 'submit']">
                Create account
            </x-ui.button>
        </form>
    </div>

    <p class="text-sm text-muted-foreground">
        Already have an account?
        <a href="{{ route('login.index') }}" class="font-semibold text-primary hover:underline">Log in</a>
    </p>
</x-auth-layout>
