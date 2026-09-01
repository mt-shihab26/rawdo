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
     * Get a value from the session and remove it
     */
    public function pull(string $key, mixed $default = null): mixed
    {
        $value = $this->get($key, $default);

        $this->forget($key);

        return $value;
    }

    /**
     * Remove a value from the session
     */
    public function forget(string $key): void
    {
        unset($_SESSION[$key]);
    }

    /**
     * Put a value into the session that's readable via get() for exactly the next
     * request, then automatically removed even if nothing ever reads it
     */
    public function flash(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
        $_SESSION['_flash']['new'][] = $key;
    }

    /**
     * Age flash data by one request: drop whatever was readable this request (it's now
     * two requests old), then promote what was flashed last request to be readable now
     *
     * Called once by App::handle(), after the response has rendered, so data flashed
     * during this request survives to be read on the very next one.
     */
    public function flashClear(): void
    {
        foreach ($_SESSION['_flash']['old'] ?? [] as $key) {
            unset($_SESSION[$key]);
        }

        $_SESSION['_flash']['old'] = $_SESSION['_flash']['new'] ?? [];
        $_SESSION['_flash']['new'] = [];
    }

    /**
     * Get the current request's CSRF token, creating one if none exists yet
     */
    public function token(): string
    {
        if (! isset($_SESSION['_token'])) {
            $_SESSION['_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['_token'];
    }

    /**
     * Rotate the session ID (fixation protection) and issue a fresh CSRF token
     */
    public function regenerate(): void
    {
        session_regenerate_id(true);

        $this->forget('_token');
    }
}
