<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    protected $fillable = [
        'user_id',
        'bloodgroup_id',
        'proof_pic_path',
        'case_details',
        'isVerifiedByAdmin',
        'verified_by',
        'donor_id',
        'status'
    ];


    public function bloodgroup()
    {
        return $this->belongsTo(BloodGroup::class, 'bloodgroup_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function donor()
    {
        return $this->belongsTo(User::class, 'donor_id');
    }
    
}
