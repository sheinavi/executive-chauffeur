<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function booking()
    {
        return $this->belongsTo('App\Booking');
    }

    public function getFullNameAttribute()
    {
        return $this->firstname. ' - ' . $this->lastname;
    }
}
