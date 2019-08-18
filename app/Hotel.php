<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'type','room_type','date_from','date_to','time_from','time_to','occupant_details','comment','attachment'
    ];

    public function event(){
        return $this->belongsTo('App\Event');
    }

}
