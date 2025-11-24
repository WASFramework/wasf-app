<?php

namespace Modules\Auth\Controllers;

use Wasf\Http\Request;
use Modules\Auth\Models\User;
use Wasf\View\Blade;

class AuthController
{
    public function showLogin()
    {
        return Blade::render('Auth/login');
    }

    public function showRegister()
    {
        return Blade::render('Auth/register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|min:3|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        // Extract username dari email
        $username = strtolower(strtok($data['email'], '@'));

        // Pastikan unique
        $original = $username;
        $i = 1;

        while (User::where('username', $username)->exists()) {
            $username = $original . $i;
            $i++;
        }

        $data['username'] = $username;

        // Hash password
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        User::create($data);

        return redirect('/login')->with('success', 'Register berhasil, silahkan login!')->send();
    }

    public function login(Request $request)
    {
        // VALIDATE INPUT
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // LOGIN VIA GUARD ( Laravel: auth()->attempt($credentials) )
        $user = auth()->attempt($credentials);

        if (!$user) {
            return redirect('/login')->with('error', 'Email atau password salah')->send();
        }

        return redirect('/profile')->with('success', 'Login berhasil!')->send();
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login')->with('success', 'Logout berhasil!')->send();
    }
}
