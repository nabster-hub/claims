<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connect extends Model
{
    protected $fillable = [
        'claim_id',
        'client',
        'act_date',
        'act_number',
        'receipt_number',
        'receipt_sum',
        'distance_solder',
        'SMR'
    ];
}
