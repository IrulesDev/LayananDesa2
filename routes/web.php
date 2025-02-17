<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\KeluargaWebController;
use App\Http\Controllers\nikController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\usernameController;
use App\Http\Controllers\UserWebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Log::info('file ini bekerja');

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth'])->group(function () {

    Log::info("file sudah melewati sanctum");
    // CASE 1

    // Route::get('/home', function () {
    //     $data = DB::table('users')->where('name', Auth::user()->name)->first();
    //     return view('pages.dashboard',['email'=> $data->name]);
    // });

    // Route::get('/', function () {
    //     return view('dashboard');
    // });
    // CASE 2 username', [usernameController::class, 'username']);
    
    // Route::get('/keluargas', [homeController::class, 'nik'])->name('nik');
    
    Route::get('/', [homeController::class, 'nik'])->name('nik');
    
    Log::info('sudah clear url /');

    Route::get('nik', [homeController::class, 'nik']);
    // Route::get('/nik', [homeController::class, 'nik']);

    Log::info('sudah melewati url biasa');

    Route::resource('keluargaWeb', KeluargaController::class);

    Log::info('sudah melewati url keluargaweb');


    // Route::put('/users/{id}', [UserController::class, 'update']);
    
    // Route::get('/userWeb/{id}/edit', [UserWebController::class, 'edit'])->name('UserWeb.edit');

    // Route::put('/user/{id}', [UserWebController::class, 'update'])->name('UserWeb.update');

});