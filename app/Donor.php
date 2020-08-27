<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $fillable = [
        'user_id_number', 
        'blood_type',
        'amount_payed',
    ];

    //overidding the default values of the model
    protected $primaryKey = 'user_id_number';
    public $incrementing = false;
    protected $keyType = 'string';
}
