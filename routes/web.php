<?php

use Illuminate\Support\Facades\Route;

// Route::get('/',function(){
//     return view('auth.login');
// });


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard');
    });
});
