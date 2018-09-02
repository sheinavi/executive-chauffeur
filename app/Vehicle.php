<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function booking()
    {
        return $this->belongsTo('App\Booking');
    }

    public function getFullNameAttribute()
    {
        return $this->name. ' - ' . $this->type;
    }
}
