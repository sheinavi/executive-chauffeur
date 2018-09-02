<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function airports()
    {
        return $this->hasMany('App\Booking');
    }

    public function vehicle()
    {
        return $this->hasMany('App\Booking');
    }

    public function payments()
    {
        return $this->hasMany('App\Booking');
    }

    public function client()
    {
        return $this->hasMany('App\Booking');
    }

    public function paymentMethod()
    {
        return $this->hasMany('App\Booking');
    }

    public function poi()
    {
        return $this->hasMany('App\Booking');
    }

    public function pc()
    {
        return $this->hasMany('App\Booking');
    }

    public function driver()
    {
        return $this->belongsToMany('App\Driver');
    }
}
