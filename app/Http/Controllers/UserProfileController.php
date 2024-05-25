<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index() {
        return view('user-profile');
    }

    public function createAvatar(Request $request) {
        $request->validate([
            'avatar' => ['required', 'image', 'max:2048']
        ]);

        $user = Auth::user();

        $avatar = $request->file('avatar');
        $avatarName = 'user_'.$user->id.'_avatar_'.time().'.'.$avatar->getClientOriginalExtension();
        $avatarPath = $avatar->storeAs('avatars', $avatarName, 'public');

        $user->avatar = $avatarPath;
        $user->save();
        
        return back()->with('success', 'Аватар успешно загружен');
    }

    public function deleteAvatar() {
        $user = Auth::user();

        $user->avatar = null;
        $user->save();
        
        return back()->with('success', 'Аватар успешно удален');
    }

    public function addBio(Request $request) {
        $request->validate([
            'bio' => ['required', 'string', 'max:200']
        ]);

        $user = Auth::user();

        $user->bio = $request->bio;
        $user->save();

        return back()->with('success', 'Текст о себе успешно добавлен');
    }

    public function deleteBio() {
        $user = Auth::user();

        $user->bio = null;
        $user->save();
        
        return back()->with('success', 'Текст о себе успешно удален');
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
