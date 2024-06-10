<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index() {
        return view('auth.profile');
    }

    public function publicShow($id) {
        $publicUser = User::findOrFail($id);

        return view('profile-public', compact('publicUser'));
    }

    public function addAvatar(Request $request) {
        $request->validate([
            'avatar' => ['required', 'image', 'max:2048']
        ]);

        /** @var \App\Models\User $user **/
        $user = Auth::user();

        $avatar = $request->file('avatar');
        $avatarName = 'user_'.$user->id.'_avatar_'.time().'.'.$avatar->getClientOriginalExtension();
        $avatarPath = $avatar->storeAs('avatars', $avatarName, 'public');

        $user->avatar = $avatarPath;
        $user->save();
        
        return back()->with('success', 'Аватар успешно загружен');
    }

    public function deleteAvatar() {
        /** @var \App\Models\User $user **/
        $user = Auth::user();

        $user->avatar = null;
        $user->save();
        
        return back()->with('success', 'Аватар успешно удален');
    }

    public function addBio(Request $request) {
        $request->validate([
            'bio' => ['required', 'string', 'max:200']
        ]);

        /** @var \App\Models\User $user **/
        $user = Auth::user();

        $user->bio = $request->bio;
        $user->save();

        return back()->with('success', 'Текст о себе успешно добавлен');
    }

    public function deleteBio() {
        /** @var \App\Models\User $user **/
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

        return to_route('home');
    }
}
