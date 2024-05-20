<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{
    public function show() {
        $users = User::all();

        return view('index', compact('users'));
    }
}
