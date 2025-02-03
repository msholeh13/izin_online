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
        Route::post('/kr-submit/{cutiRequestId}/{approvalId}', [ApprovalFlowController::class, 'submitPengajuan'])->name('kr-submit');
        Route::get('/kr-confirmed/{id}', [AdminController::class, 'confirmed'])->name('kr-confirmed');
    });

    Route::middleware('CheckJabatan:kepala_unit')->group(function () {
        Route::get('/ku-admin', [AdminController::class, 'index'])->name('ku-dashboard');
        Route::get('/ku-confirm/{id}', [AdminController::class, 'confirm'])->name('ku-confirm');
        Route::post('/ku-submit/{cutiRequestId}/{approvalId}', [ApprovalFlowController::class, 'submitPengajuan'])->name('ku-submit');
        Route::get('/ku-confirmed/{id}', [AdminController::class, 'confirmed'])->name('ku-confirmed');
    });

    Route::middleware('CheckJabatan:kepala_SDM')->group(function () {
        Route::get('/ks-admin', [AdminController::class, 'index'])->name('ks-dashboard');
        Route::get('/ks-confirm/{id}', [AdminController::class, 'confirm'])->name('ks-confirm');
        Route::post('/ks-submit/{cutiRequestId}/{approvalId}', [ApprovalFlowController::class, 'submitPengajuan'])->name('ks-submit');
        Route::get('/ks-confirmed/{id}', [AdminController::class, 'confirmed'])->name('ks-confirmed');
    });

    Route::middleware('CheckJabatan:direktur')->group(function () {
        Route::get('/d-admin', [AdminController::class, 'index'])->name('d-dashboard');
        Route::get('/d-confirm/{id}', [AdminController::class, 'confirm'])->name('d-confirm');
        Route::post('/d-submit/{cutiRequestId}/{approvalId}', [ApprovalFlowController::class, 'submitPengajuan'])->name('d-submit');
        Route::get('/d-confirmed/{id}', [AdminController::class, 'confirmed'])->name('d-confirmed');
    });
});
