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
        /** @var array{name: string, email: string, password: string, terms: string} $validated */
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ]);

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
