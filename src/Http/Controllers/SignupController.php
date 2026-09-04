<?php

namespace Src\Http\Controllers;

use Src\Core\Http\Request;
use Src\Core\Http\Response;
use Src\Core\Http\Session;
use Src\Core\Validation\ValidationException;
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

        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ]);

        if (User::emailExists($validated['email'])) {
            throw new ValidationException(
                ['email' => 'An account with this email already exists.'],
                ['name' => $validated['name'], 'email' => $validated['email']],
            );
        }

        $userId = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => password_hash($validated['password'], PASSWORD_DEFAULT),
        ]);

        $session->regenerate();
        $session->put('user_id', $userId);

        return redirect(route('home.index'));
    }
}
