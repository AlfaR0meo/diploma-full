<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\EcomapController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\UserProfileController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/ecomap', [EcomapController::class, 'show'])->name('ecomap');
Route::get('/forum', [ForumController::class, 'show'])->name('forum');

Route::name('user.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/register', [RegisterController::class, 'show'])->name('register');
        Route::post('/register', [RegisterController::class, 'store'])->name('register');
        
        Route::get('/login', [LoginController::class, 'show'])->name('login');
        Route::post('/login', [LoginController::class, 'store'])->name('login');
    });

    Route::middleware('auth')->group(function () {
        Route::delete('/logout', [LoginController::class, 'destroy'])->name('logout');
        Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    });

});

