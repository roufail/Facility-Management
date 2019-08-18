@extends('admin.layouts.master')
@section('page_title',"Event Details")
@section('page_heading',"Event Details")
@section('page_content')
<div class="col-md-10 col-md-offset-1">
   <div class="card card-user" id="details">
      @include('admin.components.info_messages')
      <!-- dard -->
      <div class="card-content card-h" style="min-height: 35px !important;">
         <ul class="nav nav-pills">
            <li style="width: 100%;" class="active"><a style="cursor: text;     text-align: center;" href="javascript:;">{{ $event->title }}</a></li>
         </ul>
         <ul class="nav">
            @if($event->status == "draft" && auth()->user()->role->role == "requester")
            <li style="width: 100%;" class="active"><a style="cursor: text;     text-align: right;"  href="javascript:;"><span class="badge badge-pill badge badge-warning">{{ ucwords($event->status) }}</span></a></li>
            @else
            <li style="width: 100%;" class="active"><a style="cursor: text;    text-align: right;"  href="javascript:;"><span class="badge badge-pill badge badge-warning">{{ ucwords($event->status) }}</span></a></li>
            @endif
         </ul>
         <div class="row" style="padding-bottom: 15px;">
            <div class="col-lg-6 col-sm-6">
               <div class="">
                  <div class="card-content card-h" style="min-height: 35px !important; padding-bottom:0px">
                     <div class="row">
                        <div class="col-xs-12">
                           @if(trim($event->user->name) != "")
                           <div class="row">
                              <div class="col-md-12">
                                 <label class="control-label col-md-6 font-l" style="font-size: 13px;"><i class="ti-user pr-5 "></i> Requester Name: </label>
                                 <star class="col-md-6">{{$event->user->name}}</star>
                              </div>
                           </div>
                           @endif
                           @if(trim($event->created_at) != "")
                           <div class="row">
                              <div class="col-md-12">
                                 <label class="control-label col-md-6 font-l"><i class="ti-calendar pr-5 "></i> Request date: </label>
                                 <star class="col-md-6">{{ date('d M,Y', strtotime($event->created_at)) }}</star>
                              </div>
                           </div>
                           @endif
                           @if(trim($event->city) != "")
                           <div class="row">
                              <div class="col-md-12">
                                 <label class="control-label col-md-6 font-l"><i class="ti-map-alt pr-5 "></i> City: </label>
                                 <star class="col-md-6">{{ ucwords($event->city) }}</star>
                              </div>
                           </div>
                           @endif
                           @if(trim($event->location) != "")
                           <div class="row">
                              <div class="col-md-12">
                                 <label class="control-label col-md-6 font-l"><i class="ti-location-pin pr-5 "></i> Location: </label>
                                 <star class="col-md-6">{{ ucwords($event->location) }}</star>
                              </div>
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-sm-6">
               <div class="">
                  <div class="card-content card-h" style="min-height: 35px !important; padding-bottom:0px">
                     <div class="row">
                        <div class="col-xs-12">
                           @if(trim( $event->invites) != "")
                           <div class="row">
                              <div class="col-md-12">
                                 <label class="control-label col-md-6 font-l"><i class="ti-infinite pr-5 "></i> Number of invitees: </label>
                                 <star class="col-md-6">{{ $event->invites }}</star>
                              </div>
                           </div>
                           @endif
                           @if(trim( $event->date_from) != "")
                           <div class="row">
                              <div class="col-md-12">
                                 <label class="control-label col-md-6 font-l"><i class="fa fa-calendar-check-o style pr-5 "></i> Date from: </label>
                                 <star class="col-md-6">{{ date('d M,Y', strtotime($event->date_from)) }}</star>
                              </div>
                           </div>
                           @endif
                           @if(trim( $event->date_to) != "")
                           <div class="row">
                              <div class="col-md-12">
                                 <label class="control-label col-md-6 font-l"><i class="fa fa-calendar-plus-o style pr-5 "></i> Date to: </label>
                                 <star class="col-md-6">{{ date('d M,Y', strtotime($event->date_to)) }}</star>
                              </div>
                           </div>
                           @endif
                           @if(trim( $event->date_to) != "")
                           <div class="row">
                              <div class="col-md-12">
                                 <label class="control-label col-md-6 font-l"><i class="ti-alarm-clock pr-5 "></i> Event Time: </label>
                                 <star class="col-md-6">{{ date('H:i', strtotime($event->time_from)) }}</star>
                              </div>
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @if(trim($event->description) != "")
            <div class="col-lg-12 col-sm-6">
               <div class="card-content card-h" style="min-height: 35px; padding-top: 0px;">
                  <div class="row">
                     <div class="col-xs-12">
                        <div class="row">
                           <div class="col-md-12">
                              <label class="control-label col-md-2 font-l" style="width: 24.2%;"><i class="ti-book pr-5 "></i> Description: </label>
                              <star class="col-md-6">{{ $event->description }}</star>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endif
         </div>
      </div>
   </div>


   @if($event->caterings()->count() > 0)
   <!-- cat -->
   <div class="row">
      <div class="col-md-12">
         <div class="card" id="details">
            <ul class="nav nav-pills">
               <li style="width: 100%;" class="active"><a style="cursor: text;     text-align: center;" href="javascript:;">Catering Information</a></li>
            </ul>
            @foreach($event->caterings as $catering)
            <div class="table-responsive">
               <table class="table table-shopping">
                  <tbody>
                     <tr>
                        <td>
                           @if(trim($catering->menu) != "")
                           <div class="img-container">
                              @if($catering->menu == "Welcome drinks")
                              <img src="{{ asset('admin_assets/img/request/catering/WELCOME_DRINKS.jpg') }}" alt="Agenda"> 
                              @elseif($catering->menu == "Salad")
                              <img src="{{ asset('admin_assets/img/request/catering/Salad.jpg') }}" alt="Agenda"> 
                              @elseif($catering->menu == "Hot pastries")
                              <img src="{{ asset('admin_assets/img/request/catering/HOT_PASTRIES.jpg') }}" alt="Agenda"> 
                              @elseif($catering->menu == "Side dishes")
                              <img src="{{ asset('admin_assets/img/request/catering/Side_dishes.jpg') }}" alt="Agenda">
                              @elseif($catering->menu == "Main dish")
                              <img src="{{ asset('admin_assets/img/request/catering/Main_dish.jpg') }}" alt="Agenda">
                              @elseif($catering->menu == "Sweets")
                              <img src="{{ asset('admin_assets/img/request/catering/Sweets.png') }}" alt="Agenda">
                              @endif                          
                           </div>
                           @endif

                        </td>
                        <td class="td-product">
                           @if(trim($catering->type) != "")
                              <strong>{{ $catering->type }}</strong>
                           @endif

                           @if(trim($catering->menu) != "" || trim($catering->sub_menu) != "")
                              <p class="color-small">{{ $catering->menu }}, {{ $catering->sub_menu }} </p>
                           @endif
                           
                           <div class="row">
                              
                              @if(trim($catering->invites) != "" || trim($catering->invites) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="fa fa-users pr-5 style-t pr-5 color-style "></i>
                                 Number of invitees :</strong > {{ $catering->invites }}
                              </div>
                              @endif
                              

                              @if(trim($catering->invites) != "" || trim($catering->invites) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="fa fa-calendar-check-o pr-5 style-t pr-5 color-style"></i>
                                 Date of Serve :</strong>
                                 {{ date('d M,Y', strtotime($catering->date)) }}
                              </div>
                              @endif

                           </div>
                           <div class="row">
                              @if(trim($catering->time) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small"><i class="ti-alarm-clock pr-5 style-t pr-5 color-style"></i>Time of Serve :</strong>
                                 {{ date('H:i', strtotime($catering->time)) }}
                              </div>
                              @endif

                              @if(trim($catering->frequency) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="fa fa-bullseye pr-5 style-t pr-5 color-style "></i>
                                 Frequency :</strong>
                                 {{ $catering->frequency }}
                              </div>
                              @endif
                           </div>
                           @if(trim($catering->comment) != "")
                           <strong class="font-small color-small">
                           <i class="fa fa-comment pr-5 style-t pr-5 color-style "></i>
                           Comment :</strong>
                           {{ $catering->comment }}
                           @endif
                        </td>
                     </tr>
                  </tbody>
               </table>
               @endforeach
            </div>
         </div>
         <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
   </div>
   <!-- cat -->
    
   @endif

   @if($event->transportations()->count() > 0) 
   <!-- trans -->
   <div class="row">
      <div class="col-md-12">
         <div class="card" id="details">
            <ul class="nav nav-pills">
               <li style="width: 100%;" class="active"><a style="cursor: text;     text-align: center;" href="javascript:;">Transportation Information</a></li>
            </ul>
            <div class="table-responsive">
               @foreach($event->transportations as $transportation)
               <table class="table table-shopping">
                  <tbody>
                     <tr>
                        <td>
                           <div class="img-container">
                           @if($transportation->type == "Bus services")
                              <img src="{{ asset('admin_assets/img/request/trans/buses.jpg') }}" alt="Agenda"> 
                              @elseif($transportation->type == "Car with driver")
                              <img src="{{ asset('admin_assets/img/request/trans/car_with_driver.jpg') }}" alt="Agenda"> 
                              @elseif($transportation->type == "Car without driver")
                              <img src="{{ asset('admin_assets/img/request/trans/car_without_driver.jpg') }}" alt="Agenda"> 
                              @endif                          
                        </div>
                        </td>
                        <td class="td-product">
                           <strong>Transportation</strong>

                           @if(trim($transportation->type) != "")
                              <p class="color-small">{{ $transportation->type }}</p>
                           @endif

                           <div class="row">
                              @if(trim($transportation->location_from) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="ti-map-alt pr-5 style-t pr-5 color-style "></i>
                                 Location From :</strong > {{ ucwords($transportation->location_from) }}
                              </div>
                              @endif
                              @if(trim($transportation->location_to) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="ti-location-pin pr-5 style-t pr-5 color-style"></i>
                                 Location To :</strong> {{ ucwords($transportation->location_to) }}
                              </div>
                              @endif
                           </div>
                           <div class="row">
                              @if(trim($transportation->location_to) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="fa fa-users pr-5 style-t pr-5 color-style"></i>
                                 Number of passengers :</strong>
                                 {{  $transportation->passengers }}
                              </div>
                              @endif
                              @if(trim($transportation->contact_details) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="ti-book pr-5 style-t pr-5 color-style "></i>Contact details :</strong>
                                 {{ $transportation->contact_details }}
                              </div>
                              @endif
                           </div>

                           <div class="row">
                              @if(trim($transportation->date) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="fa fa-calendar-check-o pr-5 style-t pr-5 color-style"></i>
                                 Date :</strong>
                                 {{ date('d M,Y', strtotime($transportation->date)) }}
                              </div>
                              @endif
                              @if(trim($transportation->time) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="ti-alarm-clock pr-5 style-t pr-5 color-style "></i>
                                 Time :</strong>
                                 {{ date('H:i', strtotime($transportation->time)) }}                              
                              </div>
                              @endif
                           </div>

                           <div class="row">
                              @if(trim($transportation->frequency) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="fa fa-bullseye pr-5 style-t pr-5 color-style"></i>
                                 Frequency :</strong>
                                 {{  $transportation->frequency }}
                              </div>
                              @endif
                              
                              @if(trim($transportation->attachment) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="fa fa-file pr-5 style-t pr-5 color-style"></i>
                                 Attachment :</strong> <a download href="{{asset('attachments/'.$transportation->attachment) }}" target="blank" style="color:#484541">Download</a>
                              </div>
                              @endif
                           </div>

                           @if(trim($transportation->comment) != "")
                              <strong class="font-small color-small">
                              <i class="fa fa-comment pr-5 style-t pr-5 color-style "></i>
                              Comment :</strong>
                              {{ $transportation->comment }}
                           @endif   
                        </td>
                     </tr>
                  </tbody>
               </table>
               @endforeach
            </div>
         </div>
         <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
   </div>
   <!-- trans -->
      
   @endif


   @if($event->hotels()->count() > 0) 
   <!-- hotal -->
   <div class="row">
      <div class="col-md-12">
         <div class="card" id="details">
            <ul class="nav nav-pills">
               <li style="width: 100%;" class="active"><a style="cursor: text;text-align: center;" href="javascript:;">Hotel Services Information</a></li>
            </ul>
            <div class="table-responsive">
               @foreach($event->hotels as $hotel)
               <table class="table table-shopping">
                  <tbody>
                     <tr>
                        <td>
                           <div class="img-container">
                                 @if($hotel->type == "Room booking")
                                   <img src="{{ asset('admin_assets/img/request/hotel/room.jpg') }}" alt="Agenda"> 
                                   @elseif($hotel->type == "Conference meeting")
                                    <img src="{{ asset('admin_assets/img/request/hotel/meeting_room.jpg') }}" alt="Agenda"> 
                                    @endif                           
                           </div>
                        </td>
                        <td class="td-product">
                        @if(trim($hotel->type) != "")
                           <strong>Type</strong>
                           <p class="color-small">{{ $hotel->type }}</p>
                        @endif
                        
                        <div class="row">
                              @if(trim($hotel->room_type) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small"><i class="fa fa-bed pr-5 style-t pr-5 color-style"></i>
                                 Type of Room :</strong>
                                 {{  $hotel->room_type }}
                              </div>
                              @endif
                              
                              @if(trim($hotel->occupant_details) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="fa fa-info-circle pr-5 style-t pr-5 color-style "></i>
                                 Occupant Details :</strong>
                                 {{ $hotel->occupant_details }}
                              </div>
                              @endif

                           </div>
                           <div class="row">
                             @if(trim($hotel->date_from) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="fa fa-calendar pr-5 style-t pr-5 color-style "></i>
                                 Check in Date :</strong >
                                 {{ date('d M,Y', strtotime($hotel->date_from)) }}                              
                              </div>
                              @endif

                              @if(trim($hotel->time_from) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="ti-alarm-clock pr-5 style-t pr-5 color-style"></i>
                                 Check in Time :</strong>
                                 {{ date('H:i', strtotime($hotel->time_from)) }}
                              </div>
                              @endif

                           </div>
                           <div class="row">

                              @if(trim($hotel->date_to) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="fa fa-calendar-plus-o pr-5 style-t pr-5 color-style "></i>
                                 Check out Date :</strong >
                                 {{ date('d M,Y', strtotime($hotel->date_to)) }}                              
                              </div>
                              @endif
                              
                              @if(trim($hotel->time_to) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="fa fa-clock-o pr-5 style-t pr-5 color-style"></i>
                                 Check out Time :</strong>
                                 {{ date('H:i', strtotime($hotel->time_to)) }}
                              </div>
                              @endif
                           </div>
                           @if(trim($hotel->comment) != "")
                              <strong class="font-small color-small">
                              <i class="fa fa-comment pr-5 style-t pr-5 color-style "></i>Comment :</strong>
                              {{ $hotel->comment }}
                           @endif
                        </td>
                     </tr>
                  </tbody>
               </table>
               @endforeach
            </div>
         </div>
         <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
   </div>
   <!-- hotal -->
  
@endif

   @if($event->maintenances()->count() > 0) 
   <!-- main -->
   <div class="row">
      <div class="col-md-12">
         <div class="card" id="details">
            <ul class="nav nav-pills">
               <li style="width: 100%;" class="active"><a style="cursor: text;     text-align: center;" href="javascript:;">Maintenance Services Information</a></li>
            </ul>
            @foreach($event->maintenances as $maintenance)
            <div class="table-responsive">
               <table class="table table-shopping">
                  <tbody>
                     <tr>
                        <td>
                           <div class="img-container">
                              @if($maintenance->type == "Janitors")
                                 <img src="{{ asset('admin_assets/img/request/services/Janitors.jpg') }}" alt="Agenda"> 
                              @elseif($maintenance->type == "Maintenance")
                                 <img src="{{ asset('admin_assets/img/request/services/maintenance.jpg') }}" alt="Agenda"> 
                              @endif                           
                           </div>
                        </td>
                        <td class="td-product">

                           @if(trim($maintenance->type) != "")
                              <strong>Type of Service</strong>
                              <p class="color-small">{{ $maintenance->type }}</p>
                           @endif

                           <div class="row">

                              @if(trim($maintenance->room_type) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="fa fa-bed pr-5 style-t pr-5 color-style"></i>Type of Room :</strong>
                                 {{ $maintenance->room_type }}
                              </div>
                              @endif

                              @if(trim($maintenance->date) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="fa fa-calendar pr-5 style-t pr-5 color-style "></i>Date :</strong>
                                 {{ date('d M,Y', strtotime($maintenance->date)) }}
                              </div>
                              @endif
                           </div>
                           <div class="row">
                              @if(trim($maintenance->time_from) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="fa fa-clock-o pr-5 style-t pr-5 color-style "></i>
                                 Time From :</strong >
                                 {{ date('H:i', strtotime($maintenance->time_from)) }}
                              </div>
                              @endif

                              @if(trim($maintenance->time_to) != "")
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="ti-alarm-clock pr-5 style-t pr-5 color-style"></i>
                                 Time To :</strong>
                                 {{ date('H:i', strtotime($maintenance->time_to)) }}
                              </div>
                              @endif
                           </div>

                           @if(trim($maintenance->attachment) != "")
                           <div class="row">
                              <div class="col-md-6">
                                 <strong class="font-small color-small">
                                 <i class="fa fa-file pr-5 style-t pr-5 color-style"></i>
                                 Attachment :</strong> <a download href="{{asset('attachments/'.$maintenance->attachment) }}" target="blank" style="color:#484541">Download</a>
                              </div>
                           </div>
                           @endif
                           
                           @if(trim($maintenance->description) != "")
                              <strong class="font-small color-small">
                              <i class="fa fa-bullseye pr-5 style-t pr-5 color-style "></i>
                              Description :</strong>
                              {{ $maintenance->description }} 
                           @endif                        
                        </td>
                     </tr>
                  </tbody>
               </table>
               @endforeach
            </div>
         </div>
         <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
   </div>
   <!-- main -->
 @endif  
</div>



                        @if($event->can_approve() && $event->status == "pending")
                           <hr>
                           <div class="text-center">
                              <div class="row">
                                 <div class="card-footer text-center">
                                    <a  href="{{ route('event.approve',['id' => $event->id ]) }}" class="btn btn-info btn-fill btn-wd btn-next">Approve</a>
                                    <a  href="{{ route('event.reject',['id' => $event->id ]) }}" class="btn btn-info btn-fill btn-wd btn-next">Reject</a>
                                 </div>
                              </div>
                           </div>
                           @endif
                        @if(auth()->user()->role->id != 12)
                           @if($event->support_can_approve('caterings') && $event->caterings_status == null)
                             <hr>
                              <div class="text-center">
                                 <div class="row">
                                    <div class="card-footer text-center">
                                       <a href="{{ route('event.approve.support',['id' => $event->id ,'type' => 'caterings']) }}" class="btn btn-info btn-fill btn-wd btn-next">Verify Caterings</a>
                                       <a href="{{ route('event.reject.support',['id' => $event->id ,'type' => 'caterings']) }}" class="btn btn-info btn-fill btn-wd btn-next">Reject Caterings</a>
                                    </div>
                                 </div>
                              </div>
                           @endif

                           @if($event->support_can_approve('transportations') && $event->transportations_status == null)
                           <hr>
                           <div class="text-center">
                              <div class="row">
                                 <div class="card-footer text-center">
                                    <a href="{{ route('event.approve.support',['id' => $event->id,'type' => 'transportations' ]) }}" class="btn btn-info btn-fill btn-wd btn-next">Verify Transportations</a>
                                    <a href="{{ route('event.reject.support',['id' => $event->id,'type' => 'transportations' ]) }}" class="btn btn-info btn-fill btn-wd btn-next">Reject Transportations</a>
                                 </div>
                              </div>
                           </div>
                           @endif

                           @if($event->support_can_approve('hotels') && $event->hotels_status == null)
                           <hr>
                           <div class="text-center">
                              <div class="row">
                                 <div class="card-footer text-center">
                                    <a href="{{ route('event.approve.support',['id' => $event->id,'type' => 'hotels' ]) }}" class="btn btn-info btn-fill btn-wd btn-next">Verify Hotels</a>
                                    <a href="{{ route('event.reject.support',['id' => $event->id,'type' => 'hotels' ]) }}" class="btn btn-info btn-fill btn-wd btn-next">Reject Hotels</a>
                                 </div>
                              </div>
                           </div>
                           @endif

                           @if($event->support_can_approve('maintenances') && $event->maintenances_status == null)
                           <hr>
                           <div class="text-center">
                              <div class="row">
                                 <div class="card-footer text-center">
                                    <a href="{{ route('event.approve.support',['id' => $event->id ,'type' => 'maintenances']) }}" class="btn btn-info btn-fill btn-wd btn-next">Verify Maintenances</a>
                                    <a href="{{ route('event.reject.support',['id' => $event->id ,'type' => 'maintenances']) }}" class="btn btn-info btn-fill btn-wd btn-next">Reject Maintenances</a>
                                 </div>
                              </div>
                           </div>
                           @endif
                        @elseif($event->caterings_status == null || $event->transportations_status == null || $event->hotels_status == null || $event->maintenances_status == null)
                           <hr>
                           <div class="text-center">
                              <div class="row">
                                 <div class="card-footer text-center">
                                    <a href="{{ route('event.approve.general.support',['id' => $event->id ]) }}" class="btn btn-info btn-fill btn-wd btn-next">Verify Services</a>
                                    <a href="{{ route('event.reject.general.support',['id' => $event->id ]) }}" class="btn btn-info btn-fill btn-wd btn-next">Reject Services</a>
                                 </div>
                              </div>
                           </div>
                        @endif



</div>
</div>
@endsection
