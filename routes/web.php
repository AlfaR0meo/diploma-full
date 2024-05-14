<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ForumController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'show'])->name('index');
Route::redirect('/home', '/');
Route::redirect('/main', '/');

Route::get('/ecomap', [MapController::class, 'show'])->name('ecomap');
Route::get('/forum', [ForumController::class, 'show'])->name('forum');

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
