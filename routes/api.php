<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\UserController;

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('user', UserController::class);
    Route::apiResource('keluarga', KeluargaController::class);
    Route::apiResource('pengajuan', PengajuanController::class);
    Route::apiResource('layanan', LayananController::class);
    Route::post('logout', [AuthController::class, 'logout'])->name('api.logout');
});