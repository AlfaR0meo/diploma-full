<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcomapController extends Controller
{
    public function show() {
        return view('ecomap');
    }
}
