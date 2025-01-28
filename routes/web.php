<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Employee;
use App\Http\Middleware\CheckJabatan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('actionLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // route karyawan
    Route::middleware('CheckJabatan:karyawan')->group(function () {
        Route::get('/employee-dashboard', [Employee::class, 'index'])->name('e-dashboard');
        Route::get('/form', [Employee::class, 'form_page'])->name('form');
    });

    Route::middleware('CheckJabatan:kepala_ruangan')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/confirm', [AdminController::class, 'confirm'])->name('confirm');
    });

    Route::middleware('CheckJabatan:kepala_unit,kepala_SDM,direktur')->group(function () {
        // 
        Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/confirm', [AdminController::class, 'confirm'])->name('confirm');
    });
});
