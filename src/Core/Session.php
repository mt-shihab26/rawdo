<?php

namespace Src\Core;

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
     * Rotate the session ID (fixation protection) and clear all session data
     */
    public function regenerate(): void
    {
        session_regenerate_id(true);

        session_unset();
    }
}
