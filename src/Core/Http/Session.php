<?php

namespace Src\Core\Http;

class Session
{
    /**
     * Start the session with hardened cookie params, unless one is already active
     */
    public function __construct(
        private Request $request
    ) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_set_cookie_params([
                'httponly' => true,
                'samesite' => 'Lax',
                'secure' => $this->request->secure,
            ]);

            session_start();
        }
    }

    /**
     * Get a value from the session
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Put a value into the session
     */
    public function put(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Remove a value from the session
     */
    public function forget(string $key): void
    {
        unset($_SESSION[$key]);
    }

    /**
     * Get a value from the session and remove it
     */
    public function pull(string $key, mixed $default = null): mixed
    {
        $value = $this->get($key, $default);
        $this->forget($key);

        return $value;
    }

    /**
     * Get the current request's CSRF token, creating one if none exists yet
     */
    public function csrfToken(): string
    {
        /** @var string|null $token */
        $token = $this->get('_token');

        if ($token === null) {
            $token = bin2hex(random_bytes(32));
            $this->put('_token', $token);
        }

        return $token;
    }

    /**
     * Build the hidden input field carrying the CSRF token, for use inside a <form>
     */
    public function csrfField(): string
    {
        return '<input type="hidden" name="_token" value="'.htmlspecialchars($this->csrfToken(), ENT_QUOTES).'">';
    }

    /**
     * Abort with a 419 if the request's _token doesn't match the session's CSRF token
     */
    public function verifyCsrf(): void
    {
        if (! hash_equals($this->csrfToken(), (string) $this->request->input('_token', ''))) {
            HttpException::abort(419, 'Page expired. Please refresh and try again.');
        }
    }

    /**
     * Get a value flashed as old input on the previous request's validation failure, or the whole old-input array when called with no key, reading (and clearing) the session only once per request
     */
    public function old(?string $key = null, mixed $default = ''): mixed
    {
        /** @var array<string, mixed>|null $old */
        static $old = null;

        $old ??= $this->pull('old', []);

        return $key === null ? $old : ($old[$key] ?? $default);
    }

    /**
     * Get a validation error flashed on the previous request's failed submission, or the whole errors array when called with no key, reading (and clearing) the session only once per request
     */
    public function errors(?string $key = null, mixed $default = ''): mixed
    {
        /** @var array<string, string>|null $errors */
        static $errors = null;

        $errors ??= $this->pull('errors', []);

        return $key === null ? $errors : ($errors[$key] ?? $default);
    }

    /**
     * Rotate the session ID (fixation protection) and clear all session data
     */
    public function regenerate(): void
    {
        session_regenerate_id(true);

        session_unset();
    }

    /**
     * Re-issue the session cookie to expire in the given number of seconds instead of when the browser closes
     */
    public function remember(int $seconds): void
    {
        setcookie(session_name(), session_id(), [
            'expires' => time() + $seconds,
            'path' => '/',
            'httponly' => true,
            'samesite' => 'Lax',
            'secure' => $this->request->secure,
        ]);
    }
}
