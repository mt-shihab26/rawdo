<?php

namespace Src\Http\Controllers;

use Src\Core\Request;
use Src\Core\Response;
use Src\Core\Session;
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
    public function store(Request $request, Session $session, User $users): Response
    {
        verify_csrf($request);

        $email = trim((string) $request->input('email', ''));
        $password = (string) $request->input('password', '');

        $user = $email !== '' ? $users->findByEmail($email) : null;

        if (! $user || ! password_verify($password, $user['password'])) {
            $session->put('errors', ['email' => 'These credentials do not match our records.']);
            $session->put('old', ['email' => $email]);

            return redirect(route('login.index'));
        }

        $session->regenerate();
        $session->put('user_id', $user['id']);

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
