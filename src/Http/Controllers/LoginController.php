<?php

namespace Src\Http\Controllers;

use Src\Core\Http\Request;
use Src\Core\Http\Response;
use Src\Core\Http\Session;
use Src\Core\Validation\ValidationException;
use Src\Models\User;

class LoginController
{
    /**
     * Show the login page
     */
    public function index(): Response
    {
        return view('login');
    }

    /**
     * Validate credentials and log the user in
     */
    public function store(Request $request, Session $session): Response
    {
        /** @var array{email: string, password: string} $validated */
        $validated = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ], [
            'email' => 'These credentials do not match our records.',
            'password' => 'These credentials do not match our records.',
        ]);

        $user = User::findByEmail($validated['email']);

        if (! $user || ! password_verify($validated['password'], $user->password)) {
            throw new ValidationException(
                ['email' => 'These credentials do not match our records.'],
                ['email' => $validated['email']],
            );
        }

        $session->regenerate();
        $session->put('user_id', $user->id);

        return redirect(route('home.index'));
    }

    /**
     * Log the current user out
     */
    public function destroy(Session $session): Response
    {
        $session->regenerate();

        return redirect(route('login.index'));
    }
}
