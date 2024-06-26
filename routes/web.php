<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EcomapController;
use App\Http\Controllers\EcoideaController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::redirect('/home', '/');

Route::get('/ecomap', [EcomapController::class, 'index'])->name('ecomap');

Route::get('/ecoideas', [EcoideaController::class, 'index'])->name('ecoideas');
Route::post('/ecoideas', [EcoideaController::class, 'store'])->name('ecoideas');
Route::get('/ecoideas/{ecoidea_id}', [EcoideaController::class, 'ecoideaShow'])->name('ecoideas.ecoidea-show');

Route::name('user.')->group(function () {

    Route::get('/profile/{user_id}', [UserProfileController::class, 'publicShow'])->name('profile-public.show');

    Route::middleware('guest')->group(function () {
        Route::get('/register', [RegisterController::class, 'index'])->name('register');
        Route::post('/register', [RegisterController::class, 'store'])->name('register');
        
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/login', [LoginController::class, 'store'])->name('login');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
        Route::delete('/profile/delete', [UserProfileController::class, 'delete'])->name('profile.delete');

        Route::post('/profile/avatar/add', [UserProfileController::class, 'addAvatar'])->name('profile.avatar.add');
        Route::post('/profile/avatar/delete', [UserProfileController::class, 'deleteAvatar'])->name('profile.avatar.delete');
        
        Route::post('/profile/bio/add', [UserProfileController::class, 'addBio'])->name('profile.bio.add');
        Route::post('/profile/bio/delete', [UserProfileController::class, 'deleteBio'])->name('profile.bio.delete');

        Route::post('/logout', [LoginController::class, 'delete'])->name('logout');
    });

});
