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

    public function upload(Request $request)
    {
        $request->validate([
            'jenis_cuti'    => 'required',
            'tanggal_awal'  => 'required',
            'tanggal_akhir'  => 'required',
        ]);

        $durasi = $this->countDaysWithoutSunday($request->tanggal_awal, $request->tanggal_akhir);

        CutiRequest::create([
            'user_id'           => $request->id,
            'jenis_cuti'        => $request->jenis_cuti,
            'keterangan'        => $request->keterangan,
            'tanggal_mulai'     => $request->tanggal_awal,
            'tanggal_selesai'   => $request->tanggal_akhir,
            'status'            => 'waiting',
            'final_text'        => null,
            'durasi'            => $durasi,
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        return redirect('/employee-dashboard');
    }

    public function countDaysWithoutSunday($tanggal_awal, $tanggal_akhir)
    {
        $start = Carbon::parse($tanggal_awal);
        $end = Carbon::parse($tanggal_akhir);

        $duration = 0;

        while ($start <= $end) {
            if ($start->dayOfWeek !== Carbon::SUNDAY) {
                $duration++;
            }

            $start->addDay();
        }

        return $duration;
    }

    public function cancelCuti($id)
    {
        $data = CutiRequest::findOrFail($id);
        if ($data) {
            $data->delete();
        }
        return redirect('/employee-dashboard');
    }
}
