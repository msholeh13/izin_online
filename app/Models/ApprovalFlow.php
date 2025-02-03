<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovalFlow extends Model
{
    protected $guarded = [];

    public function cutiRequest()
    {
        return $this->belongsTo(CutiRequest::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }
}
