<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'applicant_type',
        'status',
        'approved_by',
        'cnic_num',
        'cnic_pic_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
