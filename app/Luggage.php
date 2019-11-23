<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Luggage extends Model
{
    //
    protected $table='Luggages';
    protected $fillable = [
        'sender',
        's_contact',
        'receiver',
        'r_contact',
        'from',
        'destination',
        'description',
        'weight',
        'bus_id',
        'payment_status'

    ];

    public $timestamps = false;

    public function bus(){
                return $this->belongsTo('App\Bus');
            }
}
