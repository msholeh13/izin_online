<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {


        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        if (Auth::attempt($request->only('username', 'password'))) {
            $user = Auth::user();

            switch ($user->jabatan) {
                case 'karyawan':
                    // return view('employee.index', compact('user'));
                    return redirect('/employee-dashboard')->with('message', 'suskes masuk');
                case 'kepala_ruangan':
                case 'kepala_unit':
                case 'kepala_SDM':
                case 'direktur':
                    return redirect('/admin')->with('message', 'sukses masuk');
                default:
                    Auth::logout();
                    return redirect('/login')->with('error', 'gagal, ada yang salah')->withInput();
            }
        }

        return back()->with('error', 'gagal, ada yang salah')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
