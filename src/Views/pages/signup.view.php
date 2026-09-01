<x-auth-layout title="Sign up" description="Create a Rawdo account to start tracking your tasks.">
    <div class="w-full max-w-sm space-y-6 rounded-xl border border-border bg-card p-6 shadow-sm">
        <x-elements.heading 
            heading="Create your account"
            subheading="Start organizing your work in minutes."
        />
        <x-auth-layout.google-login />
        <x-auth-layout.or-separator />
        <form class="space-y-4" method="POST" action="{{ route('signup.store') }}">
            {!! csrf_field() !!}
            <x-elements.text-input
                label="Full name"
                id="name"
                name="name"
                placeholder="Alex Morgan"
                autocomplete="name"
                :required="true"
                :value="$old['name'] ?? ''"
                :error="$errors['name'] ?? ''"
            />
            <x-elements.email-input
                id="email"
                name="email"
                :required="true"
                :value="$old['email'] ?? ''"
                :error="$errors['email'] ?? ''"
            />
            <x-elements.password-input
                id="password"
                name="password"
                placeholder="At least 8 characters"
                autocomplete="new-password"
                minlength="8"
                :required="true"
                :error="$errors['password'] ?? ''"
            />
            <x-elements.password-input
                label="Confirm password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Re-enter your password"
                autocomplete="new-password"
                minlength="8"
                :required="true"
            />
            <x-elements.checkbox id="terms" name="terms" :error="$errors['terms'] ?? ''">
                I agree to the <x-ui.link href="#" class="font-medium">Terms of Service</x-ui.link> and <x-ui.link href="#" class="font-medium">Privacy Policy</x-ui.link>
            </x-elements.checkbox>
            <x-ui.button class="w-full" :attrs="['type' => 'submit']">
                Create account
            </x-ui.button>
        </form>
    </div>
    <x-auth-layout.footer-link
        prompt="Already have an account?"
        label="Log in"
        :href="route('login.index')"
    />
</x-auth-layout>
