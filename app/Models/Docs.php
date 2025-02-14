<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docs extends Model
{
    protected $fillable = [
        'claim_id',
        'claim',
        'questionnaire',
        'cal_power',
        'CTD',
        'tech_offer',
        'OCD',
        'tech_condition',
    ];
}
