<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeTracking extends Model
{
    protected $fillable = [
        'user_id', 'time_in'
    ];
}
