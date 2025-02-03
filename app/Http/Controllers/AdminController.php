<?php

namespace App\Http\Controllers;

use App\Models\ApprovalFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\IndexHint;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        if ($user->jabatan == 'kepala_ruangan') {
            $dataApprovalFlows = ApprovalFlow::where('level_approval', 'kepala_ruangan')
                ->where('status', 'waiting')
                ->with(['cutiRequest.user' => function ($query) {
                    $query->select('id', 'nama', 'nama_ruang');
                }])
                ->get();

            $confirmedData = ApprovalFlow::where('level_approval', 'kepala_ruangan')
                ->where('status', '!=', 'waiting')
                ->with(['cutiRequest.user' => function ($query) {
                    $query->select('id', 'nama', 'nama_ruang');
                }])
                ->get();
        } else {
            // bagian ini belum selesai

            // $dataApprovalFlows = ApprovalFlow::where('level_approval', 'kepala_ruangan')
            //     ->where('status', 'waiting')
            //     ->with(['cutiRequest.user' => function ($query) {
            //         $query->select('id', 'nama', 'nama_ruang');
            //     }])
            //     ->get();
            $dataApprovalFlows = ApprovalFlow::where('level_approval', 'kepala_unit')
                ->where('status', 'waiting')
                ->with(['cutiRequest.user' => function ($query) {
                    $query->select('id', 'nama', 'nama_ruang');
                }])
                ->get();

            $confirmedData = ApprovalFlow::where('level_approval', 'kepala_ruangan')
                ->where('status', '!=', 'waiting')
                ->with(['cutiRequest.user' => function ($query) {
                    $query->select('id', 'nama', 'nama_ruang');
                }])
                ->get();
        }

        return view('leader.index', compact('dataApprovalFlows', 'confirmedData'));
    }

    public function confirm($id)
    {
        $user = ApprovalFlow::with('cutiRequest.user')->findOrFail($id);
        return view('leader.confirm', compact('user'));
    }
    public function confirmed($id)
    {
        $user = ApprovalFlow::with('cutiRequest.user')->findOrFail($id);
        return view('leader.confirmed', compact('user'));
    }
}
