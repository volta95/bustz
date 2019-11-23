<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
   protected $fillable=[
        'fname',
        'lname',
        'email',
        'phone',

        ];
        public function books(){
            return $this->belongsToMany('App\Book');
        }
}
