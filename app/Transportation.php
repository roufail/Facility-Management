<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    public $timestamps = false; 
    protected $fillable = [
        'type','location_from','location_to','passengers','contact_details','date','time','frequency','comment','attachment'
    ];

    public function event(){
        return $this->belongsTo('App\Event');
    }

}
