<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\UserWebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('login');
});


Route::middleware(['auth'])->group(function () {
    //view 1
    // Route::get('/home', function () {
    //     return view('dashboard');
    // })->name('home');

    //view 2
    Route::get('/home',[homeController::class, 'username']);
    Route::get('/',[homeController::class, 'username'])->name('home');

    Route::resource('UserWeb', UserWebController::class);
});
