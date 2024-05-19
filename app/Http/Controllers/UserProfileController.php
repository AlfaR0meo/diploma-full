<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserProfileController extends Controller
{
    public function show() {
        return view('user-profile');
    }

    public function delete(Request $request) {
        $user = User::find(Auth::user()->id);
        $user->delete();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('index');
    }
}
