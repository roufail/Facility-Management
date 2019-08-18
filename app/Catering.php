<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catering extends Model
{
    public $timestamps = false; 
    protected $fillable = [
        'type','invites','menu','sub_menu','date','time','frequency','comment'
    ];

    public function event(){
        return $this->belongsTo('App\Event');
    }
}
