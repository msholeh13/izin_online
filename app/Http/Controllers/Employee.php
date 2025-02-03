<?php

namespace App\Http\Controllers;

use App\Models\CutiRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Employee extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $history = CutiRequest::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        return view('employee.index', compact('user', 'history'));
    }

    public function form_page(User $user)
    {
        return view('employee.form_page', compact('user'));
    }
}
