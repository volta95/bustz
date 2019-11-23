<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //fillable
    protected $fillable = [
        'bus_route_id',
        'dep_date',
        'dep_time',
        'price',
        'arrive_time',
        'rep_time'
    ];

    public function staffs(){
        return $this->belongsToMany('App\Staff');
    }
    public function bus_route(){
        return $this->belongsTo('App\Bus_Route');
    }

    public function books(){
        return $this->hasMany('App\Book');
    }
}
