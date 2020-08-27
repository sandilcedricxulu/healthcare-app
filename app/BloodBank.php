<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    protected $fillable = [ 
        'name',
        'phone',
        'address',
        'blood_group_id',
    ];
}
