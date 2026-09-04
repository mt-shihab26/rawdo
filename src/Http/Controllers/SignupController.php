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
        $passwordConfirmation = (string) $request->input('password_confirmation', '');
        $termsAccepted = $request->input('terms') !== null;

        $errors = [];

        if ($name === '') {
            $errors['name'] = 'Please enter your full name.';
        }

        if ($email === '') {
            $errors['email'] = 'Please enter your email address.';
        } elseif (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address.';
        } elseif (User::emailExists($email)) {
            $errors['email'] = 'An account with this email already exists.';
        }

        if ($password === '') {
            $errors['password'] = 'Please enter a password.';
        } elseif (strlen($password) < 8) {
            $errors['password'] = 'Password must be at least 8 characters.';
        } elseif ($password !== $passwordConfirmation) {
            $errors['password'] = 'Passwords do not match.';
        }

        if (! $termsAccepted) {
            $errors['terms'] = 'You must agree to the Terms of Service and Privacy Policy.';
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
