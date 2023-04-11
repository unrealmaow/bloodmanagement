<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    
    protected $table = "bloodgroups";
    protected $fillable = [
        'name'
    ];
}
