<?php

namespace Src\Core\Http;

use Src\Core\Database\Model;
use Src\Core\Foundation\App;
use Src\Core\Validation\ValidationException;

class Auth
{
    /**
     * Verify the password against the given user (already looked up by email) and return it, or throw a
     * ValidationException with a generic "credentials don't match" message if the user is missing or the
     * password is wrong - the same message either way, so it can't be used to enumerate registered emails
     *
     * @param  array{email: string, password: string}  $credentials
     */
    public static function attempt(?Model $user, array $credentials): void
    {
        if (! $user || ! password_verify($credentials['password'], $user->password)) {
            throw new ValidationException(
                [
                    'email' => 'These credentials do not match our records.',
                    'password' => 'These credentials do not match our records.',
                ],
                ['email' => $credentials['email']],
            );
        }
    }

    /**
     * Regenerate the session (fixation protection) and remember the given model as the logged-in user
     */
    public static function login(Model $user): void
    {
        /** @var Session $session */
        $session = App::get(Session::class);

        $session->regenerate();
        $session->put('user_id', $user->id);
    }

    /**
     * Log the current user out by regenerating the session, which also clears all its data
     */
    public static function logout(): void
    {
        /** @var Session $session */
        $session = App::get(Session::class);

        $session->regenerate();
    }
}
