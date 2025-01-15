<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Employee extends Controller
{
    public function index()
    {
        return view('employee.index');
    }

    public function form_page()
    {
        return view('employee.form_page');
    }
}
