<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Claim extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'address',
        'phone',
        'power',
        'connect_id',
        'type',
        'user_id',
        'status',
        'reg_num',
        'reg_date',
    ];

    protected $casts = [
        'reg_date' => 'date',
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

        if($this->status < 4)
            $end = Carbon::now();
        elseif($this->status == 4)
            $end = Carbon::parse($this->updated_at)->endOfDay();
        elseif($this->reg_date)
            $end = Carbon::parse($this->reg_date)->endOfDay();
        else
            $end = Carbon::parse($this->updated_at)->endOfDay();

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

    public function connect()
    {
        return $this->hasOne(Connect::class, 'claim_id', 'id');
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
