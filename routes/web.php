<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\EcomapController;
use App\Http\Controllers\EcoideaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\AdminController;




Route::get('/', [IndexController::class, 'index'])->name('index');
Route::redirect('/home', '/');

Route::get('/ecomap', [EcomapController::class, 'index'])->name('ecomap');
Route::get('/ecoideas', [EcoideaController::class, 'index'])->name('ecoideas');
Route::get('/events', [EventController::class, 'index'])->name('events');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.user');

Route::name('user.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/register', [RegisterController::class, 'index'])->name('register');
        Route::post('/register', [RegisterController::class, 'store'])->name('register');
        
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/login', [LoginController::class, 'store'])->name('login');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
        Route::delete('/profile/delete', [UserProfileController::class, 'delete'])->name('profile.delete');

        Route::post('/profile/avatar/create', [UserProfileController::class, 'createAvatar'])->name('profile.avatar.create');
        Route::post('/profile/avatar/delete', [UserProfileController::class, 'deleteAvatar'])->name('profile.avatar.delete');
        
        Route::post('/profile/bio/add', [UserProfileController::class, 'addBio'])->name('profile.bio.add');
        Route::post('/profile/bio/delete', [UserProfileController::class, 'deleteBio'])->name('profile.bio.delete');

        Route::post('/logout', [LoginController::class, 'delete'])->name('logout');
    });

    Route::get('/profile/{id}', [UserProfileController::class, 'publicShow'])->name('profile.public.show');

});
