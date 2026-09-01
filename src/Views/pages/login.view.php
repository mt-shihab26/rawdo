<x-root-layout title="Log in" description="Log in to keep on top of your tasks.">
    <div class="flex min-h-screen flex-col items-center justify-center px-4 py-12">
        <a href="{{ route('home.index') }}" class="mb-8 flex items-center gap-2">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-lg bg-primary text-base font-bold text-primary-foreground"
                >R</span
            >
            <span class="text-xl font-bold tracking-tight">Rawdo</span>
        </a>

        <div class="w-full max-w-sm rounded-xl border border-border bg-card p-6 shadow-sm">
            <h1 class="text-xl font-bold tracking-tight">Welcome back</h1>
            <p class="mt-1 text-sm text-muted-foreground">
                Log in to keep on top of your tasks.
            </p>

            <div class="mt-6 space-y-2.5">
                <button
                    class="flex w-full items-center justify-center gap-2 rounded-lg border border-input bg-background px-4 py-2.5 text-sm font-medium hover:bg-accent"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24">
                        <path
                            fill="#4285F4"
                            d="M23.52 12.27c0-.85-.08-1.67-.22-2.45H12v4.64h6.47c-.28 1.5-1.13 2.78-2.42 3.63v3.02h3.9c2.28-2.1 3.57-5.2 3.57-8.84z"
                        />
                        <path
                            fill="#34A853"
                            d="M12 24c3.27 0 6-1.08 8-2.9l-3.9-3.02c-1.08.73-2.47 1.16-4.1 1.16-3.15 0-5.82-2.13-6.77-4.99H1.2v3.13C3.2 21.3 7.3 24 12 24z"
                        />
                        <path
                            fill="#FBBC05"
                            d="M5.23 14.25a7.2 7.2 0 0 1 0-4.5V6.62H1.2a12 12 0 0 0 0 10.76z"
                        />
                        <path
                            fill="#EA4335"
                            d="M12 4.75c1.78 0 3.37.61 4.63 1.81l3.47-3.47C18 1.19 15.27 0 12 0 7.3 0 3.2 2.7 1.2 6.62l4.03 3.13C6.18 6.88 8.85 4.75 12 4.75z"
                        />
                    </svg>
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
