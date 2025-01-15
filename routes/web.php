<?php

use App\Http\Controllers\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employee-dashboard', [Employee::class, 'index'])->name('e-dashboard');
Route::get('/form', [Employee::class, 'form_page'])->name('form');
