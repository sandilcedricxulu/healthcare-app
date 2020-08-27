<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NormAppointment extends Model
{
    protected $fillable = [
        'id', 
        'user_id_number',
        'hospital_id',
        'hospital_admin_id',
        'date_of_booking',
        'date_of_appointment',
        'reason',
        'conductor',
    ]; 
}
