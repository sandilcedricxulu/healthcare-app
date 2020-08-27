<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalAdmin extends Model
{
    protected $fillable = [
        'id_number', 
        'name',
        'surname',
        'phone',
        'email',
        'username',
        'password',
        'hospital_id'
    ];
}
