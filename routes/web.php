<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprovalFlowController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CutiRequestController;
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
        Route::get('/form/{user}', [Employee::class, 'form_page'])->name('form');
        Route::post('/form', [CutiRequestController::class, 'ajukanCuti'])->name('uploadForm');
        Route::get('/cancel/{id}', [CutiRequestController::class, 'cancelCuti'])->name('cancel.cuti');
    });

    Route::middleware('CheckJabatan:kepala_ruangan')->group(function () {
        Route::get('/kr-admin', [AdminController::class, 'index'])->name('kr-dashboard');
        Route::get('/kr-confirm/{id}', [AdminController::class, 'confirm'])->name('kr-confirm');
        Route::post('/kr-submit/{id}', [ApprovalFlowController::class, 'submitPengajuan'])->name('kr-submit');
        Route::get('/kr-confirmed/{id}', [AdminController::class, 'confirmed'])->name('kr-confirmed');
    });

    Route::middleware('CheckJabatan:kepala_unit,kepala_SDM,direktur')->group(function () {
        // 
        Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/confirm/{id}', [AdminController::class, 'confirm'])->name('confirm');
        Route::get('/confirmed/{id}', [AdminController::class, 'confirmed'])->name('confirmed');
    });
});
