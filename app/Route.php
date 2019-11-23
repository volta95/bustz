<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    //
    //
    protected $fillable=[
        'route_from',
        'route_to',
        'price_min',
        'price_max'
        ];
    
        //relatinship
    
        //project belong to  many buses
         
        public function buses(){
            return $this->belongsToMany('App\Bus');
        }
        
}
