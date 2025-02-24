<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Model;



class Claim extends Model
{
    protected $fillable = [
        'full_name',
        'address',
        'phone',
        'power',
        'connect_id',
        'type',
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function docs()
    {
        return $this->hasOne(Docs::class, 'claim_id', 'id');
    }

    public function step()
    {
        return $this->hasOne(Step::class, 'id', 'status');
    }

    public function connection()
    {
        return $this->hasOne(ConnectPoint::class, 'id', 'connect_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'claim_id', 'id');
    }

    public function getWorkingDays()
    {
        $start = Carbon::parse($this->created_at);

        if($this->status != 4)
            $end = Carbon::now();
        else
            $end = Carbon::parse($this->updated_at);

        $period = CarbonPeriod::create($start, $end);

        $workingDays = 0;

        foreach ($period as $date) {
            if($date->isWeekday() ){
                $workingDays++;
            }
        }

        return $workingDays;
    }

    public function editedUser()
    {
        return $this->hasOne(User::class, 'last_edit_user');
    }

    public function scopeByRegion($query, $region_id, $user_id)
    {
        if ($region_id !== 12) {
            // Пользователь не из региона 12, выводим только его заявки
            return $query->where('user_id', $user_id);
        }
        return $query;
    }
}
