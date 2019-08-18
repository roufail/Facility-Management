<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'user_id','title','city','location','invites','description','date_from','date_to','time_from','time_to',
    ];
    public static $rules = [
        'title' => 'required',
        'city' => 'required',
        'location' => 'required',
        'invites' => 'required|integer',
        'date_from' => 'required|date_format:Y-m-d',
        'date_to' => 'required|date_format:Y-m-d',
        'time_from' => 'required|date_format:H:i',
        'time_to' => 'required|date_format:H:i',
    ];

    public static $caterings_roles = [
        "caterina_service" => "required",
        "type" => "required",
        "menu" => "required",
        "sub_menu" => "required",
        "invites" => "required|integer",
        "date" => "required|date_format:Y-m-d",
        "time" => "required|date_format:H:i",
        "frequency" => "required"
    ];

    public static $transportations_roles = [
        "transportation_service" => "required",
        "type" => "required",
        "location_from" => "required",
        "location_to" => "required",
        "passengers" => "required|int",
        "contact_details" => "required",
        "date" => "required|date_format:Y-m-d",
        "time" => "required|date_format:H:i",
        "frequency" => "required"
    ];


    public static $hotels_roles = [
        "hotel_service" => "required",
        "room_type" => "required",
        "date_from" => "required|date_format:Y-m-d",
        "time_from" => "required|date_format:H:i",
        "date_to" => "required|date_format:Y-m-d",
        "time_to" => "required|date_format:H:i",
        "occupant_details" => "required",
    ];

    public static $maintenances_roles = [
        "maintenances_service" => "required",
        "type" => "required",
        "room_type" => "required",
        "date" => "required|date_format:Y-m-d",
        "time_from" => "required|date_format:H:i",
        "time_to" => "required|date_format:H:i",
        "description" => "required",

    ];

    function user(){
        return $this->belongsTo('App\User');
    }


    function can_approve(){

        if(auth()->user()->role->count() <= 0){
            return;
        }

        if(  auth()->user()->role->permissions->count() <= 0){
            return false;
        }

        $current_permissions_array = auth()->user()->role->permissions->pluck('permission')->toArray();
        $return = true;
        foreach ($current_permissions_array as $key => $value) {
            if($this->$value()->count() > 0){
                $return =  false;
                break;
            }
        }

        if($return)
        {
            return false;
        }



        $higher_roles = Role::where('weight','>', auth()->user()->role->weight)->where('role' ,'!=','requester')->get();

        $higher_roles_permissions = array();
        foreach($higher_roles as $higher_role){
            $role_permissons = $higher_role->permissions->pluck('permission')->toArray();
            if(!empty($role_permissons)){
                foreach ($role_permissons as $key => $value) {
                    array_push($higher_roles_permissions,$value);
                }
            }
        }



        
        foreach ($higher_roles_permissions as $key => $value) {
            if($this->$value()->count() > 0) 
            {
               return false;
            }
        }
        
        return true;
    }
    

    function support_can_approve($type=""){

        if(!in_array(auth()->user()->role->id, [8,9,10,11,12])){
            return false;
        }

        if(auth()->user()->role->id == 12){
            return true;
        }

        $usertype = explode("_",auth()->user()->role->role)[0];
        if($type != $usertype){
            return false;
        }


        if($this->$type->count() > 0){
            return true;
        }
        return false;
    }


    function events(){
        return self::all();
    }


    function caterings(){
        return $this->hasMany('App\Catering');
    }

    function transportations(){
        return $this->hasMany('App\Transportation');
    }

    function hotels(){
        return $this->hasMany('App\Hotel');
    }

    function maintenances(){
        return $this->hasMany('App\Maintenance');
    }
}
