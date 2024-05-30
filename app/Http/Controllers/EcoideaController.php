<?php

namespace App\Http\Controllers;
 
use App\Models\Ecoidea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EcoideaController extends Controller
{
    public function index() {
        $ecoIdeas = Ecoidea::all();

        return view('ecoideas', compact('ecoIdeas'));
    }

    public function store(Request $request) {
        Ecoidea::create([
            'published_at' => now(),
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::user()->id,
        ]);

        return back()->with('ecoidea_success', 'Экоидея успешно создана!');
    }
}
