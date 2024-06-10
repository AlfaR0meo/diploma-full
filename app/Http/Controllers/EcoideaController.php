<?php

namespace App\Http\Controllers;
 
use App\Models\Ecoidea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EcoideaController extends Controller
{
    public function index() {
        //Ecoidea::truncate();
        $ecoideas = Ecoidea::all()->sortByDesc('published_at');

        return view('ecoideas', compact('ecoideas'));
    }

    public function ecoideaShow($id) {
        $ecoidea = Ecoidea::findOrFail($id);

        return view('ecoidea-public', compact('ecoidea'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:1200'],
        ]);

        Ecoidea::create([
            'published_at' => now(),
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::user()->id,
        ]);

        return back()->with('ecoidea_success', 'Экоидея успешно создана!');
    }
}
