<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    protected $fillable = [
        'user_id_number', 
        'blood_type',
        'amount_payed',
    ];
}
