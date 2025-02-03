<?php

namespace App\Http\Controllers;

use App\Models\ApprovalFlow;
use App\Models\CutiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\IndexHint;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        if ($user->jabatan == 'kepala_ruangan') {
            $dataApprovalFlows = $this->_dataApprovalFlows('kepala_ruangan');
            $confirmedData = $this->_confirmedData('kepala_ruangan');
            $jumlahPengajuan = $this->_jumlahPengajuan();
        } else if ($user->jabatan == 'kepala_unit') {
            $dataApprovalFlows = $this->_dataApprovalFlows('kepala_unit');
            $confirmedData = $this->_confirmedData('kepala_unit');
            $jumlahPengajuan = $this->_jumlahPengajuan();
        } else if ($user->jabatan == 'kepala_SDM') {
            $dataApprovalFlows = $this->_dataApprovalFlows('kepala_SDM');
            $confirmedData = $this->_confirmedData('kepala_SDM');
            $jumlahPengajuan = $this->_jumlahPengajuan();
        } else if ($user->jabatan == 'direktur') {
            $dataApprovalFlows = $this->_dataApprovalFlows('direktur');
            $confirmedData = $this->_confirmedData('direktur');
            $jumlahPengajuan = $this->_jumlahPengajuan();
        }

        return view('leader.index', compact('dataApprovalFlows', 'confirmedData', 'jumlahPengajuan'));
    }

    private function _dataApprovalFlows($jabatan)
    {
        return ApprovalFlow::where('level_approval', $jabatan)
            ->where('status', 'waiting')
            ->with(['cutiRequest.user' => function ($query) {
                $query->select('id', 'nama', 'nama_ruang');
            }])
            ->get();
    }

    private function _confirmedData($jabatan)
    {
        return ApprovalFlow::where('level_approval', $jabatan)
            ->where('status', '!=', 'waiting')
            ->with(['cutiRequest.user' => function ($query) {
                $query->select('id', 'nama', 'nama_ruang');
            }])
            ->get();
    }

    public function confirm($id)
    {
        $user = CutiRequest::with(['approvals', 'user'])->findOrFail($id);
        $latestApproval = $user->approvals->last();
        // dd([
        //     'user' => $user,
        //     'latestApproval' => $latestApproval
        // ]);
        return view('leader.confirm', compact('user', 'latestApproval'));
    }
    public function confirmed($id)
    {
        $user = ApprovalFlow::with('cutiRequest.user')->findOrFail($id);
        return view('leader.confirmed', compact('user'));
    }

    private function _jumlahPengajuan()
    {
        $jenisCuti = ['bersalin', 'menunggu persalinan', 'sakit', 'tahunan'];

        $totalCuti = DB::table('cuti_requests')
            ->select('jenis_cuti', DB::raw('COUNT(*) as total'))
            ->groupBy('jenis_cuti')
            ->pluck('total', 'jenis_cuti');

        foreach ($jenisCuti as $cuti) {
            if (!isset($totalCuti[$cuti])) {
                $totalCuti[$cuti] = 0;
            }
        }

        return $totalCuti;
    }
}
