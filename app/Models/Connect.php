<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connect extends Model
{
    protected $fillable = [
        'claim_id',
        'client',
        'date_act',
        'act_number',
        'receipt_number',
        'receipt_sum',
        'distance_solder',
        'SMR'
    ];
}
