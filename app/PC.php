<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PC extends Model
{
    public $table = "airport_pc";

    public function booking(){
        return $this->belongsTo('App\Booking');
    }
}
