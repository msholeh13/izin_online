<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CutiRequest;
use App\Models\ApprovalFlow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApprovalFlowController extends Controller
{
    public function approve(Request $request, $approvalId)
    {
        $approval = ApprovalFlow::findOrFail($approvalId);
        $approval->status = $request->status;
        $approval->catatan = $request->catatan;
        $approval->save();

        if ($request->status == 'approved') {
            // Tentukan siapa level selanjutnya
            $nextLevel = $this->getNextLevel($approval->level_approval);

            if ($nextLevel) {
                $nextApprover = $this->findNextApprover($approval->cutiRequest, $nextLevel);

                if ($nextApprover) {
                    ApprovalFlow::create([
                        'cuti_request_id' => $approval->cuti_request_id,
                        'approver_id' => $nextApprover->id,
                        'level_approval' => $nextLevel,
                        'status' => 'waiting',
                    ]);
                }
            } else {
                // Jika tidak ada level selanjutnya, set cuti menjadi approved
                $approval->cutiRequest->update(['status' => 'approved']);
            }
        } else {
            // Jika ditolak, set cuti menjadi not approved
            $approval->cutiRequest->update(['status' => 'not_approved']);
        }

        return redirect()->back()->with('success', 'Persetujuan berhasil diproses.');
    }

    private function getNextLevel($currentLevel)
    {
        $levels = ['kepala_ruangan', 'kepala_unit', 'direktur', 'kepala_sdm'];
        $index = array_search($currentLevel, $levels);

        return $index !== false && isset($levels[$index + 1]) ? $levels[$index + 1] : null;
    }

    private function findNextApprover($cutiRequest, $nextLevel)
    {
        switch ($nextLevel) {
            case 'kepala_unit':
                return User::where('jabatan', 'kepala_unit')
                    ->where('unit', $cutiRequest->user->unit)
                    ->first();
            case 'direktur':
                return User::where('jabatan', 'direktur')->first();
            case 'kepala_sdm':
                return User::where('jabatan', 'kepala_SDM')->first();
            default:
                return null;
        }
    }

    public function submitPengajuan(Request $request, $approvalId)
    {
        $approval = ApprovalFlow::findOrFail($approvalId);

        $approval->status = $request->status == 'approved' ? 'approved' : 'not_approved';
        $approval->catatan = $request->catatan;
        $approval->updated_at = now();
        $approval->save();

        if ($request->status == 'approved') {
            $nextLevel = $this->getNextLevel($approval->level_approval);

            if ($nextLevel) {
                $nextApprover = $this->findNextApprover($approval->cutiRequest, $nextLevel);

                if ($nextApprover) {
                    ApprovalFlow::create([
                        'cuti_request_id'   => $approval->cuti_request_id,
                        'approver_id'       => $nextApprover->id,
                        'level_approval'    => $nextLevel,
                        'status'            => 'waiting',
                        'created_at'        => now(),
                        'updated_at'        => now(),
                    ]);
                }
            } else {
                $approval->cutiRequest->update([
                    'status'     => 'approved',
                    'updated_at' => now(),
                ]);
            }
        } else {
            $request->validate([
                'catatan' => 'required'
            ]);

            $approval->cutiRequest->update([
                'status'        => 'not_approved',
                'final_text'    => $request->catatan,
            ]);
            return back()->withInput();
        }
        return auth()->user()->jabatan == 'kepala_ruangan' ? redirect('kr-admin') : redirect('admin');
    }
}
