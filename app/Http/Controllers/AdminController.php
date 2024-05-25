<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index() {
        $users = User::all();

        return view('admin', compact('users'));
    }

    public function show($id) {
        $user = User::findOrFail($id);

        return view('admin', compact('user'));
    }
}
