<?php

namespace App\Http\Controllers;

use App\Models\ApprovalFlow;
use Carbon\Carbon;
use App\Models\CutiRequest;
use App\Models\User;
use Illuminate\Http\Request;

class CutiRequestController extends Controller
{
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

    public function createApprovalFlow($cutiRequestId)
    {
        $cuti = CutiRequest::findOrFail($cutiRequestId);
        $karyawan = User::findOrFail($cuti->user_id);

        // cari kepala ruangan dari divisi karyawan
        $kepalaRuangan = User::where('jabatan', 'kepala_ruangan')
            ->where('nama_ruang', $karyawan->nama_ruang)
            ->first();

        if ($kepalaRuangan) {
            ApprovalFlow::create([
                'cuti_request_id'   => $cutiRequestId,
                'approver_id'       => $kepalaRuangan->id,
                'level_approval'    => $kepalaRuangan->jabatan,
                'status'            => 'waiting',
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }

        // cari kepala unit yang menaungi kepala ruangan ini
        $kepalaUnit = User::where('jabatan', 'kepala_unit')
            ->where('unit', $kepalaRuangan->unit)
            ->first();

        if ($kepalaUnit) {
            ApprovalFlow::create([
                'cuti_request_id'   => $cutiRequestId,
                'approver_id'       => $kepalaUnit->id,
                'level_approval'    => $kepalaUnit->jabatan,
                'status'            => 'waiting',
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }

        // direktur pasti hanya satu
        $direktur = User::where('jabatan', 'direktur')->first();
        if ($direktur) {
            ApprovalFlow::create([
                'cuti_request_id'   => $cutiRequestId,
                'approver_id'       => $direktur->id,
                'level_approval'    => $direktur->jabatan,
                'status'            => 'waiting',
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }

        // kepala sdm pasti hanya satu
        $kepalaSDM = user::where('jabatan', 'kepala_SDM')->first();
        if ($kepalaSDM) {
            ApprovalFlow::create([
                'cuti_request_id'   => $cutiRequestId,
                'approver_id'       => $kepalaSDM->id,
                'level_approval'    => $kepalaSDM->jabatan,
                'status'            => 'waiting',
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }
    }

    // public function approve(Request $request, $approvalId)
    // {
    //     $approval = ApprovalFlow::findOrFail($approvalId);
    //     $approval->status = $request->status;
    //     $approval->save();

    //     if ($request->status == 'approved') {
    //         // lanjut ke approval selanjutnya
    //         $nextApproval = ApprovalFlow::where('cuti_request_id', $approval->cuti_request_id)
    //             ->where('status', 'waiting')
    //             ->orderBy('id')
    //             ->first();

    //         if ($nextApproval) {
    //             return redirect()->back();
    //         } else {
    //             $cuti = CutiRequest::findOrFail($approval->cuti_request_id);
    //             $cuti->status = 'approved';
    //             $cuti->save();
    //         }
    //     } else {
    //         $cuti = CutiRequest::findOrFail($approval->cuti_request_id);
    //         $cuti->status = 'not approved';
    //         $cuti->save();
    //     }

    //     return redirect()->back();
    // }


    public function ajukanCuti(Request $request)
    {
        $request->validate([
            'jenis_cuti'        => 'required|string|max:100',
            'keterangan'        => 'nullable|string',
            'tanggal_awal'     => 'required|date',
            'tanggal_akhir'   => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $durasi = $this->countDaysWithoutSunday($request->tanggal_awal, $request->tanggal_akhir);

        $cuti = CutiRequest::create([
            'user_id'           => auth()->id(),
            'jenis_cuti'        => $request->jenis_cuti,
            'keterangan'        => $request->keterangan,
            'tanggal_mulai'     => $request->tanggal_awal,
            'tanggal_selesai'   => $request->tanggal_akhir,
            'status'            => 'waiting',
            'durasi'            => $durasi,
            'created_at'        => now(),
            'updated_at'        => now(),

        ]);

        // Cari Kepala Ruangan Karyawan
        $kepalaRuangan = User::where('jabatan', 'kepala_ruangan')
            ->where('nama_ruang', auth()->user()->nama_ruang)
            ->first();

        if ($kepalaRuangan) {
            ApprovalFlow::create([
                'cuti_request_id'   => $cuti->id,
                'approver_id'       => $kepalaRuangan->id,
                'level_approval'    => $kepalaRuangan->jabatan,
                'status'            => 'waiting',
            ]);
        }

        return redirect()->route('e-dashboard')->with('success', 'Pengajuan cuti berhasil diajukan.');
    }
}
