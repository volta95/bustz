<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{

        //
        //
        protected $fillable=[
            'status',
            'plate_no',
            'model',
            'bustype',
            'seat',
            'company_id',
            ];

            //relatinship



            //Bus belong to company

            public function company(){
                return $this->belongsTo('App\Company');
            }
            public function bus_route(){
                return $this->belongsTo('App\Bus_Route');
            }
            public function routes(){
                return $this->belongsToMany('App\Route');
            }
        }
