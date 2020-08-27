<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipientAppointment extends Model
{
    protected $fillable = [
        'id', 
        'user_id_number',
        'blood_bank_id',
        'blood_bank_admin_id',
        'date_of_booking',
        'date_of_appointment',
        'blood_type',
        'conductor',
    ];
}
