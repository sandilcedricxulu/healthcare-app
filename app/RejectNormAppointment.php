<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RejectNormAppointment extends Model
{
    protected $fillable = [
        'id', 
        'user_id_number',
        'hospital_admin_id',
        'hospital_id',
        'date_of_reject',
        'reason',
    ];
}
