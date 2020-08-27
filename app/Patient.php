<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id_number', 
    ];

    protected $primaryKey = 'user_id_number';
    public $incrementing = false;
    protected $keyType = 'string';
}
