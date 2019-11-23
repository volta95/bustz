<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus_Route extends Model
{
    //
    public $table = 'bus_route';

    public function schedules(){
        return $this->hasMany('App\Schedule');
    }
    public function bus(){
        return $this->belongsTo('App\Bus');
    }
    public function route(){
        return $this->belongsTo('App\Route');
    }
}
