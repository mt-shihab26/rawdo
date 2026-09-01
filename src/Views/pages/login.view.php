<x-auth-layout title="Log in" description="Log in to keep on top of your tasks.">
    <div class="w-full max-w-sm space-y-6 rounded-xl border border-border bg-card p-6 shadow-sm">
        <x-elements.heading heading="Welcome back" subheading="Log in to keep on top of your tasks." />
        <x-auth-layout.google-login />
        <x-auth-layout.or-separator />
        <form class="space-y-4" method="POST" action="{{ route('login.store') }}">
            {!! csrf_field() !!}
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
                :required="true"
            >
                <x-ui.link href="#" class="text-xs font-medium">Forgot?</x-ui.link>
            </x-elements.password-input>
            <x-elements.checkbox id="remember" name="remember">
                Remember me for 30 days
            </x-elements.checkbox>
            <x-ui.button class="w-full" :attrs="['type' => 'submit']">
                Log in
            </x-ui.button>
        </form>
    </div>
    <x-auth-layout.footer-link
        prompt="Don't have an account?"
        label="Sign up"
        :href="route('signup.index')"
    />
</x-auth-layout>
