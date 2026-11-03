<?php

use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

// Route::get('/info-sistema', function () {
//     return view('info-sistema');
// })->middleware(['auth', 'verified']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');


    Route::get('/info-sistema', function () {
        return view('info-sistema');
    });

    Route::resource('reporte', ReporteController::class);

});

require __DIR__.'/settings.php';
