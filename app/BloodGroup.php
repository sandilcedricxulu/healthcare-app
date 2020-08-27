<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    protected $fillable = [
        'blood_group_id', 
        'blood_type',
        'blood_amount',
    ];
}
