<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect('home');
        }

        return back()->with('login-error', 'Ошибка входа');
    }

    public function destroy() {
        Auth::logout();

        return redirect('home');
    }
}
