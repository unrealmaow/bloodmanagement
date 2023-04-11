<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\BloodGroup;

class VerificationApplication extends Model
{
    

    protected $fillable = [
        'user_id',
        'applicant_type',
        'status',
        'approved_by',
        'cnic_num',
        'cnic_pic_path',
        'bloodgroup_id',
        'bloodgroup_pic_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bloodgroup()
    {
        return $this->belongsTo(BloodGroup::class);
    }
}
