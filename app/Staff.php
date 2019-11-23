<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    public $table = 'staffs';
    protected $fillable=[

        'user_id',
        'company_id',
        ];


        public function company(){
            return $this->hasOne('App\Company');
        }
        public function user(){
            return $this->belongsTo('App\User');
        }

        public function schedules(){
            return $this->belongsToMany('App\Schedule');
        }
}
