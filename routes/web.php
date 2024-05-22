<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\EcomapController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MaterialController;
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
Route::get('/events', [EventController::class, 'show'])->name('events');
Route::get('/materials', [MaterialController::class, 'show'])->name('materials');

Route::name('user.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', [RegisterController::class, 'show'])->name('register');
        Route::post('/register', [RegisterController::class, 'store'])->name('register');
        
        Route::get('/login', [LoginController::class, 'show'])->name('login');
        Route::post('/login', [LoginController::class, 'store'])->name('login');
    });
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
        Route::delete('/profile/delete', [UserProfileController::class, 'delete'])->name('profile.delete');

        Route::post('/profile/avatar/create', [UserProfileController::class, 'createAvatar'])->name('profile.avatar.create');
        Route::post('/profile/avatar/delete', [UserProfileController::class, 'deleteAvatar'])->name('profile.avatar.delete');
        
        Route::post('/profile/bio/add', [UserProfileController::class, 'addBio'])->name('profile.bio.add');
        Route::post('/profile/bio/delete', [UserProfileController::class, 'deleteBio'])->name('profile.bio.delete');

        Route::post('/logout', [LoginController::class, 'delete'])->name('logout');
    });
});
