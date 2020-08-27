<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodBankAdmin extends Model
{
    protected $fillable = [
        'id_number', 
        'name',
        'surname',
        'phone',
        'email',
        'username',
        'password',
        'blood_bank_id',
    ]; 
}
