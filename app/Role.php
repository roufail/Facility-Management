<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    function permissions(){
        return $this->hasMany('App\Permission');
    }

}
