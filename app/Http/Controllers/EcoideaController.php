<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcoideaController extends Controller
{
    public function index() {
        $ecoIdeas = [
            'Экоидея 1',
            'Экоидея 2',
            'Экоидея 3',
            'Экоидея 4',
            'Экоидея 5',
            'Экоидея 6',
            'Экоидея 7',
        ];

        return view('ecoideas', compact('ecoIdeas'));
    }

    public function store(Request $request) {
        return back()->with('smth', $request->test);
    }
}
