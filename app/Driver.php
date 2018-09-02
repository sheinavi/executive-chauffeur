<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function booking()
    {
        return $this->belongsToMany('App\Booking');
    }

    public function getFullNameAttribute()
    {
        return $this->lastname. ', ' . $this->firstname;
    }
}
