<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function register() {
        return view('register');
    }

    public function register_post(Request $request) {
        //User::truncate();

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('home');
    }

    public function login() {
        return view('login');
    }

    public function login_post(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect('home');
        }

        return back()->with('login-error', 'Ошибка входа');
    }

    public function logout(Request $request) {
        Auth::logout();

        return redirect('home');
    }
}
