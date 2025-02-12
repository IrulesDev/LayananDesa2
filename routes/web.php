<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserWebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    // CASE 1

    // Route::get('/home', function () {
    //     $data = DB::table('users')->where('name', Auth::user()->name)->first();
    //     return view('pages.dashboard',['email'=> $data->name]);
    // });

    // CASE 2

    Route::get('/home', [homeController::class, 'username']);

    // Route::get('/', function () {
    //     return view('pages.dashboard');
    // });

    Route::get('/', [homeController::class, 'username'])->name('home');

    Route::resource('UserWeb', UserWebController::class);

    // Route::put('/users/{id}', [UserController::class, 'update']);
    
    // Route::get('/userWeb/{id}/edit', [UserWebController::class, 'edit'])->name('UserWeb.edit');

    // Route::put('/user/{id}', [UserWebController::class, 'update'])->name('UserWeb.update');

});