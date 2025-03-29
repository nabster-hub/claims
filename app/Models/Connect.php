<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connect extends Model
{
    protected $fillable = [
        'claim_id',
        'client'
    ];
}
