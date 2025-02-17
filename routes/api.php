<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PrayerTimeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Log;

// Route::get('player-times/{location}/{date}', [PrayerTimeController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Log::info("sudah terbaca loginnya");

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('user', UserController::class);

    // Route::get('/keluarga', function (Request $request) {
    //     return $request->user()->keluarga;
    // });
    Route::apiResource('keluarga', KeluargaController::class);

    // Route::get('/pengajuan', function (Request $request) {
    //     return $request->user()->pengajuan;
    // });
    Route::apiResource('pengajuan', PengajuanController::class);

    // Route::get('/layanan', function (Request $request) {
    //     return $request->user()->layanan;
    // });
    Route::apiResource('layanan', LayananController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
});