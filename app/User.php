<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function events(){
        return $this->hasMany('App\Event')->orderby('id','desc');
        return $this->hasMany('App\Event')->where('status','draft');
    }


    function approve_events(){

        if($this->role()->count() <= 0){
            return;
        }
        
        if($this->role->role == "requester"){
            return;
        }

        $current_permissions_array = $this->role->permissions->pluck('permission')->toArray();
        
        if(empty($current_permissions_array)){
            return;
        }


        $higher_roles = Role::where('weight','>', $this->role->weight)->where('role' ,'!=','requester')->get();

        $higher_roles_permissions = array();
        foreach($higher_roles as $higher_role){
            $role_permissons = $higher_role->permissions->pluck('permission')->toArray();
            if(!empty($role_permissons)){
                foreach ($role_permissons as $key => $value) {
                    array_push($higher_roles_permissions,$value);
                }
            }
        }

        $all_roles = array("caterings","transportations","hotels","maintenances");
        $array_diff = array_diff($all_roles,$current_permissions_array);

        //$current_permissions_array = array_merge($array_diff,$current_permissions_array);


        if(empty($higher_roles_permissions) && empty($current_permissions_array) ){
            return Event::doesntHave('transportations')->doesntHave('caterings')->
            doesntHave('hotels')->doesntHave('maintenances')->where('status','pending')->orderby('id','desc')->get();
        }


        if(isset($current_permissions_array[0]) && $current_permissions_array[0] == "events"){
            $events = Event::where(function($query) use ($higher_roles_permissions){
                foreach($higher_roles_permissions as $role){
                    $query->doesntHave($role);
                }
            })->where("status","pending")->orderby('id','desc')->get();
            return $events;
        }






        // > greater than
        // < less than

          //dd($current_permissions_array);
          //dd($higher_roles_permissions);

        $events = Event::where(function($query) use ($current_permissions_array) {
            foreach ($current_permissions_array as $role) {
                $query->orhas($role);
            }
        })->where(function($query) use ($higher_roles_permissions){
            foreach($higher_roles_permissions as $role){
                $query->doesntHave($role);
            }
        })->where("status","pending")->orderby('id','desc')->paginate(5, ['*'], 'tack-action-events');
        return $events;
    }


    function support_approve(){

        if(auth()->user()->role->id == 12){

                // array(
                //     'caterings' => function($query){
                //                 $query->where('caterings_status',NULL);
                //     },
                //     'transportations' => function($query){
                //                 $query->where('transportations_status',NULL);
                //     },
                //     'hotels' => function($query){
                //                 $query->where('hotels_status',NULL);
                //     },
                //     'maintenances' => function($query){
                //             $query->where('maintenances_status',NULL);
                //     }
                // )


            return Event::where("city",auth()->user()->city)->where(function($query){
                $query->orhas('caterings')->where('caterings_status',NULL);
                $query->orhas('transportations')->where('transportations_status',NULL);
                $query->orhas('hotels')->where('hotels_status',NULL);
                $query->orhas('maintenances')->where('maintenances_status',NULL);
                // $query->orwhere('transportations_status',NULL);
                // $query->orwhere('hotels_status',NULL);
                // $query->orwhere('maintenances_status',NULL);
            })->where('status','approved')->orderby('id','desc')->paginate(5, ['*'], 'tack-action-events');


        }

        $type = explode("_",auth()->user()->role->role)[0];
        $field = $type."_status";
        return Event::has($type)->where("city",auth()->user()->city)->where( $field,NULL)->where('status','approved')->orderby('id','desc')->paginate(5, ['*'], 'tack-action-events');
    }



    function role(){
        return $this->belongsTo('App\Role');
    }


}
