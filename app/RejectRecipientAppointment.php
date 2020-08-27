<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RejectRecipientAppointment extends Model
{
    protected $fillable = [
        'id', 
        'user_id_number',
        'blood_bank_admin_id',
        'blood_bank_id',
        'date_of_reject',
        'reason',
    ];
}
