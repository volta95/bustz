<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable=[
        'name',
        'address',
        'email',
        'phone',
        'tin',
       
        ];


        public function buses(){
            return $this->hasMany('App\Bus');
        }

        public function staffs(){
            return $this->hasMany('App\Staff');
        }
}

