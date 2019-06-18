<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlternativeId extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unique_id', 'user_id'
    ];
}
