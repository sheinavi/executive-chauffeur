<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class POI extends Model
{
    public $table = "airport_poi";

    public function booking(){
        return $this->belongsTo('App\Booking');
    }
}
