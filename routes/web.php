<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AuthController;

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

Route::get('/ecomap', [MapController::class, 'show'])->name('ecomap');
Route::get('/forum', [ForumController::class, 'show'])->name('forum');


Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register_post'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_post'])->name('login');

Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

