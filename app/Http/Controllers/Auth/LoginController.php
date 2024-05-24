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
            'email' => ['required', 'string', 'email', 'max:50'],
            'password' => ['required', 'string', 'max:20'],
        ]);

        if (!Auth::attempt($credentials)) {
            return back()
                ->withInput()
                ->withErrors([
                    'login-error' => 'Неправильный email или пароль'
                ]);    
        }

        return to_route('user.profile');
    }

    public function delete(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect()->intended('profile');
    }
}
