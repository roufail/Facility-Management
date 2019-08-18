<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'type','room_type','date','time_from','time_to','description','attachment'
    ];

    public function event(){
        return $this->belongsTo('App\Event');
    }

}
