<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConnectPoint extends Model
{
    protected $fillable = [
        'pc',
        'vl',
        'tp'
    ];
}
