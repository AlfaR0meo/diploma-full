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
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($credentials)) {
            return back()
                ->withInput()
                ->withErrors([
                    'smth' => 'Неправильный email или пароль'
                ]);    
        }

        return to_route('user.profile');
    }

    public function destroy() {
        Auth::logout();

        return redirect('home');
    }
}
