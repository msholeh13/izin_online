<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('leader.index');
    }

    public function confirm()
    {
        return view('leader.confirm');
    }
}
