<?php

namespace Src\Http\Controllers;

use Src\Core\Http\Auth;
use Src\Core\Http\Request;
use Src\Core\Http\Response;
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
    public function store(Request $request): Response
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ], [
            'email' => 'These credentials do not match our records.',
            'password' => 'These credentials do not match our records.',
        ]);

        $user = User::where('email', $validated['email'])->first();

        Auth::attempt($user, $validated);
        Auth::login($user);

        return redirect(route('home.index'));
    }

    /**
     * Log the current user out
     */
    public function destroy(): Response
    {
        Auth::logout();

        return redirect(route('login.index'));
    }
}
