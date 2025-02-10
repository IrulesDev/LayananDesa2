<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\UserController;

Route::post('login', [AuthController::class, 'login'])->name('api.login');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::resource('user', UserController::class);
    Route::resource('keluarga', KeluargaController::class);
    Route::resource('pengajuan', PengajuanController::class);
    Route::resource('layanan', LayananController::class);
    Route::post('logout', [AuthController::class, 'logout'])->name('api.logout');
});