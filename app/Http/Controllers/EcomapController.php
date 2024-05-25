<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcomapController extends Controller
{
    public function index() {
        return view('ecomap');
    }
}
