<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
class events extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = auth()->user()->events()->paginate(5);
        return view("admin.events.list",compact('events'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $event = new Event();
        return view("admin.events.create",compact("event"));
    }


    public function approve_events(){
        if(in_array(auth()->user()->role->id, [8,9,10,11,12])){
            $approve_events = auth()->user()->support_approve();
            $type = explode("_",auth()->user()->role->role)[0];
            $all_events     = Event::where('status','approved')->where("city",auth()->user()->city)->orderby('id','desc')->paginate(5, ['*'], 'all-events');
        }else{
            $approve_events = auth()->user()->approve_events();
            $all_events     = Event::where('status', '!=','draft')->orderby('id','desc')->paginate(5, ['*'], 'all-events');
        }


        return view("admin.events.approve_events",compact('approve_events','all_events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,Event::$rules);
        $request->merge(['user_id' => auth()->user()->id]);
        $event = Event::create($request->all());
        return redirect()->route('event.edit',['id' => $event->id])->with('success', 'Your event information is saved successfully. You can add other event\'s services or publish your event.');
    }


    public function edit_event(Request $request,$id){

        $event = Event::findOrfail($id);

        if($event->status == "pending"){
            return redirect()->route('events.index');
        }


        $this->permission_check($event);
        return view("admin.events.create",compact("event"));
    }



    public function save_event(Request $request,$id){
        $event = Event::findOrfail($id);
        $this->permission_check($event);

        $this->validate($request,Event::$rules);

        switch($request->input('action')):
            case 'Publish Event':
             $event->status = "pending";
             $event->save();
            break;
            default:
            $event->update($request->all());
        endswitch;
        return redirect()->route('event.edit',['id' => $event->id])->with('success', 'Event updated successfully');
    }


     public function publish_event(Request $request,$id){
        $event = Event::findOrfail($id);
        $this->permission_check($event);
        $event->status = "pending";
        $event->save();
        return redirect()->back()->with('success', 'Event Published successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $event = Event::findOrfail($id);
       return view("admin.events.details",compact('event'));
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


    /** forms **/
    /** create **/
    public function create_caterings($event_id){
        $event = Event::findOrfail($event_id);
        return view("admin.events.caterings",compact('event'));
    }

    public function create_hotels($event_id){
        $event = Event::findOrfail($event_id);
        return view("admin.events.hotels",compact('event'));
    }

    public function create_transportations($event_id){
        $event = Event::findOrfail($event_id);
        return view("admin.events.transportations",compact('event'));
    }

    public function create_maintenances($event_id){
        $event = Event::findOrfail($event_id);
        return view("admin.events.maintenances",compact('event'));
    }

    public function permission_check($event){
        if(!$event->user_id == auth()->user()->id){
            abort(403, 'Permission denied.');
        }
    }
    /**  saving **/
    public function handle_publish(Request $request){

    }

    public function save_catering(Request $request ,$event_id){
        $event = Event::findOrfail($event_id);
        $this->permission_check($event);

        if($request->input('action') == "Publish Event" && null == $request->input('caterina_service')):
             $event->status = "pending";
             $event->save();
             return redirect()->route('events.index')->with('success', 'Event Published successfully');;
        elseif($request->input('action') == "Publish Event" && $request->input('caterina_service') != null):
            $request->merge(['status' => "pending"]);
        endif;


        $this->validate($request,Event::$caterings_roles);

        if($request->hasFile('attachment_file')){
            $file = $request->file('attachment_file');
            $file_name = $event_id."_".rand(0,1000000)."_catering.". $file->getClientOriginalExtension();
            $file_data = $file->move(public_path('attachments'), $file_name);
            $request->merge(['attachment' =>  $file_name]);
        }

        if($event->caterings()->create($request->all())){
          return redirect()->back()->with('success', 'Catering created successfully');
        }
    }



    public function save_hotels(Request $request ,$event_id){
        $event = Event::findOrfail($event_id);
        $this->permission_check($event);

        if($request->input('action') == "Publish Event" && null == $request->input('hotel_service')):
             $event->status = "pending";
             $event->save();
             return redirect()->back()->with('success', 'Event Published successfully');
        elseif($request->input('action') == "Publish Event" && $request->input('hotel_service') != null):
            $request->merge(['status' => "pending"]);
        endif;

        $this->validate($request,Event::$hotels_roles);


        if($request->hasFile('attachment_file')){
            $file = $request->file('attachment_file');
            $file_name = $event_id."_".rand(0,1000000)."_hotel.". $file->getClientOriginalExtension();
            $file_data = $file->move(public_path('attachments'), $file_name);
            $request->merge(['attachment' =>  $file_name]);
        }


        if($event->hotels()->create($request->all())){
          return redirect()->back()->with('success', 'Catering created successfully');
        }
    }

    public function save_transportations(Request $request ,$event_id){
        $event = Event::findOrfail($event_id);
        $this->permission_check($event);

        if($request->input('action') == "Publish Event" && null == $request->input('transportation_service')):
             $event->status = "pending";
             $event->save();
             return redirect()->back()->with('success', 'Event Published successfully');
        elseif($request->input('action') == "Publish Event" && $request->input('transportation_service') != null):
            $request->merge(['status' => "pending"]);
        endif;


        $this->validate($request,Event::$transportations_roles);

        if($request->hasFile('attachment_file')){
            $file = $request->file('attachment_file');
            $file_name = $event_id."_".rand(0,1000000)."_transportation.". $file->getClientOriginalExtension();
            $file_data = $file->move(public_path('attachments'), $file_name);
            $request->merge(['attachment' =>  $file_name]);
        }


        if($event->transportations()->create($request->all())){
          return redirect()->back()->with('success', 'Transportation created successfully');
        }
    }

    public function save_maintenances(Request $request ,$event_id){
        $event = Event::findOrfail($event_id);
        $this->permission_check($event);

        if($request->input('action') == "Publish Event" && null == $request->input('maintenances_service')):
             $event->status = "pending";
             $event->save();
             return redirect()->back()->with('success', 'Event Published successfully');
        elseif($request->input('action') == "Publish Event" && $request->input('maintenances_service') != null):
            $request->merge(['status' => "pending"]);
        endif;



        $this->validate($request,Event::$maintenances_roles);

        if($request->hasFile('attachment_file')){
            $file = $request->file('attachment_file');
            $file_name = $event_id."_".rand(0,1000000)."maintenance.". $file->getClientOriginalExtension();
            $file_data = $file->move(public_path('attachments'), $file_name);
            $request->merge(['attachment' =>  $file_name]);
        }


        if($event->maintenances()->create($request->all())){
          return redirect()->back()->with('success', 'Maintenances created successfully');
        }
    }


    
    /** delete **/
    public function delete_caterings($catering_id){
          $catering = \App\Catering::findOrfail($catering_id);
          if($catering->event->user_id != auth()->user()->id){
            abort(403, 'Permission denied.');
          }
          if($catering->delete()){
            return redirect()->back()->with('success', 'Catering deleted successfully');
          }else{
            return redirect()->back()->withErrors('Something went wrong');
          }
    }

    public function delete_hotels($hotel_id){
          $hotel = \App\Hotel::findOrfail($hotel_id);
          if($hotel->event->user_id != auth()->user()->id){
            abort(403, 'Permission denied.');
          }
          if($hotel->delete()){
            return redirect()->back()->with('success', 'Hotel deleted successfully');
          }else{
            return redirect()->back()->withErrors('Something went wrong');
          }
    }

    public function delete_transportations($transportation_id){
          $transportation = \App\Transportation::findOrfail($transportation_id);
          if($transportation->event->user_id != auth()->user()->id){
            abort(403, 'Permission denied.');
          }
          if($transportation->delete()){
            return redirect()->back()->with('success', 'Transportation deleted successfully');
          }else{
            return redirect()->back()->withErrors('Something went wrong');
          }
    }

    public function delete_maintenances($maintenance_id){
          $maintenance = \App\Maintenance::findOrfail($maintenance_id);
          if($maintenance->event->user_id != auth()->user()->id){
            abort(403, 'Permission denied.');
          }
          if($maintenance->delete()){
            return redirect()->back()->with('success', 'Maintenance deleted successfully');
          }else{
            return redirect()->back()->withErrors('Something went wrong');
          }
    }

    public function approve_event($event_id){
        $event = Event::findOrfail($event_id);
        if(!$event->can_approve()){
            abort(403, 'Permission denied.');
        }

        $event->status = "approved";

        if($event->save()){
            return redirect()->back()->with('success', 'Event Approved successfully');
          }else{
            return redirect()->back()->withErrors('Something went wrong');
          }
    }

    public function reject_event($event_id){
        $event = Event::findOrfail($event_id);
        if(!$event->can_approve()){
            abort(403, 'Permission denied.');
        }

        $event->status = "rejected";

        if($event->save()){
            return redirect()->back()->with('success', 'Event Rejected successfully');
          }else{
            return redirect()->back()->withErrors('Something went wrong');
          }
    }


    public function approve_support_event($event_id,$type){
        $event = Event::findOrfail($event_id);
        if(!$event->support_can_approve($type)){
            abort(403, 'Permission denied.');
        }
        $field = $type."_status";
        $event->$field = "approved";

        if($event->save()){
            return redirect()->route('events.approve')->with('success', ucwords($type).' Approved successfully');
          }else{
            return redirect()->back()->withErrors('Something went wrong');
          }

    }


    public function reject_support_event($event_id,$type){
        $event = Event::findOrfail($event_id);
        if(!$event->support_can_approve($type)){
            abort(403, 'Permission denied.');
        }
        $field = $type."_status";
        $event->$field = "rejected";

        if($event->save()){
            return redirect()->route('events.approve')->with('success', ucwords($type).' Rejected successfully');

          }else{
            return redirect()->back()->withErrors('Something went wrong');
          }

    }


    public function approve_general_support($event_id){
        $event = Event::findOrfail($event_id);

        if(!$event->support_can_approve()){
            abort(403, 'Permission denied.');
        }

        $event->caterings_status = "approved";
        $event->transportations_status = "approved";
        $event->hotels_status = "approved";
        $event->maintenances_status	 = "approved";

        if($event->save()){
            return redirect()->route('events.approve')->with('success', 'Event Approved successfully');

          }else{
            return redirect()->back()->withErrors('Something went wrong');
          }

    }

    public function reject_general_support($event_id){
        $event = Event::findOrfail($event_id);

        if(!$event->support_can_approve()){
            abort(403, 'Permission denied.');
        }

        $event->caterings_status = "rejected";
        $event->transportations_status = "rejected";
        $event->hotels_status = "rejected";
        $event->maintenances_status	 = "rejected";

        if($event->save()){
            return redirect()->route('events.approve')->with('success', 'Event Rejected successfully');

          }else{
            return redirect()->back()->withErrors('Something went wrong');
          }

    }
}
