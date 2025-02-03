<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CutiRequest extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approvals()
    {
        return $this->hasMany(ApprovalFlow::class, 'cuti_request_id');
    }
}
