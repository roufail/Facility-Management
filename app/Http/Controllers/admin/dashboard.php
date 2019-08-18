<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use DB;
class dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role->id == 7){
            return redirect()->route('events.index');
        }else{
            return redirect()->route('events.approve');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function control(){
        // $permissions = array(
        //     'events' => array('title' => 'Events', 'padding' => '60'),
        //     'catering' => array('title' => 'Catering', 'padding' => '92'),
        //     'transportation' =>  array('title' => 'Transportation', 'padding' => '42'),
        //     'hotel' =>  array('title' => 'Hotel', 'padding' => '47'),
        //     'maintenance' => array('title' => 'Maintenance', 'padding' => '60'),
        // );
            
        $default_permissions = Permission::pluck('role_id','permission');
        

        $permissions = array(
            'events' => 'Events',
            'caterings' => 'Catering',
            'transportations' => 'Transportation',
            'hotels' =>  'Hotel',
            'maintenances' => 'Maintenance',
        );

        $roles = array(
            'manager' => 'L5 manager',
            'senior_manager' => 'L4 Senior manager',
            'director' => 'L3 Director',
            'vpl' => 'L2 VP',
            'evp' => 'L1 EVP',
            'president' => 'President'
        );
        return view("admin.control.role",compact('permissions','roles','default_permissions'));
    }


    public function save_roles(Request $request){

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $permissions = array(); 
        foreach($request->all()['role'] as $key => $value){
            $permissions[] = array('role_id' => $value,'permission' => $key);
        }

        if(Permission::insert($permissions)){
            return back()->with('success', 'Roles updated successfully');
        }
    }

    public function logout () {
        auth()->logout();
        return redirect()->back();
    }

}
