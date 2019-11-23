<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
      protected $fillable=[
        'fname',
        'lname',
        'email',
        'phone',
        'seatno',
        'status',
        'broading_point',
        'schedule_id',
        'customer_id',
        'price',
        'token',


        ];

        public function schedule(){
            return $this->belongsTo('App\Schedule');
        }

        public function customer(){
            return $this->belongsTo('App\Customer');
        }
}


