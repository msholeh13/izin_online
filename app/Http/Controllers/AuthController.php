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
                    return redirect('/employee-dashboard')->with('message', 'suskes masuk');
                case 'kepala_ruangan':
                    return redirect('/kr-admin')->with('message', 'sukses masuk');
                case 'kepala_unit':
                    return redirect('/ku-admin')->with('message', 'sukses masuk');
                case 'kepala_SDM':
                    return redirect('/ks-admin')->with('message', 'sukses masuk');
                case 'direktur':
                    return redirect('/d-admin')->with('message', 'sukses masuk');
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
