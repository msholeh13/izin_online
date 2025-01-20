<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/employee-dashboard', [Employee::class, 'index'])->name('e-dashboard');
Route::get('/form', [Employee::class, 'form_page'])->name('form');
Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
Route::get('/confirm', [AdminController::class, 'confirm'])->name('confirm');
