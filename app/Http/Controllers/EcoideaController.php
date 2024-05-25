<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcoideaController extends Controller
{
    public function index() {
        return view('ecoideas');
    }
}
