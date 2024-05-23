<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function show() {
        //User::truncate();
        $users = User::all();
        // dd($users->toArray());

        return view('admin', compact('users'));
    }
}
