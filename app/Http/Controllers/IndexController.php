<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{
    public function show() {
        //User::truncate();
        $users = User::all();
        // dd($users->toArray());

        return view('index', compact('users'));
    }
}
