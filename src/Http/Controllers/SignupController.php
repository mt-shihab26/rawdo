<?php

namespace Src\Http\Controllers;

use Src\Core\Http\Request;
use Src\Core\Http\Response;
use Src\Core\Http\Session;
use Src\Models\User;

class SignupController
{
    /**
     * Show the signup page
     */
    public function index(): Response
    {
        return view('signup');
    }

    /**
     * Validate and create a new account, then log the user in
     */
    public function store(Request $request, Session $session): Response
    {
        verify_csrf();

        $name = trim((string) $request->input('name', ''));
        $email = trim((string) $request->input('email', ''));
        $password = (string) $request->input('password', '');

        $errors = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ]);

        if (! isset($errors['email']) && User::emailExists($email)) {
            $errors['email'] = 'An account with this email already exists.';
        }

        if ($errors) {
            $session->put('errors', $errors);
            $session->put('old', ['name' => $name, 'email' => $email]);

            return redirect(route('signup.index'));
        }

        $userId = User::create([
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        $session->regenerate();
        $session->put('user_id', $userId);

        return redirect(route('home.index'));
    }
}
