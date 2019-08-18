@php
$class = "4";
if(trim($event->description) == "") $class = "6";
@endphp

<div class="col-md-12">
   <div class="card card-user" id="event">
      <div class="card-content card-h" style="min-height: 35px !important;">



        <ul class="nav nav-pills">
            @if($event->status == "draft" && auth()->user()->role->role == "requester")
               <li style="width: 100%;" class="active"><a style="text-align: center;" href="{{ route('event.edit',['id' => $event->id]) }}">{{ $event->title }}</a></li>
            @else
               <li style="width: 100%;" class="active"><a style="text-align: center;" href="{{ route('events.show',['id' => $event->id]) }}">{{ $event->title }}</a></li>
            @endif
        </ul>


        <ul class="nav">
        @if($event->status == "draft" && auth()->user()->role->role == "requester")
        <li style="width: 100%;" class="active"><a style="cursor: text;     text-align: right;"  href="javascript:;"><span class="badge badge-pill badge badge-warning">{{ ucwords($event->status) }}</span></a></li>
        @else
        <li style="width: 100%;" class="active"><a style="cursor: text;    text-align: right;"  href="javascript:;"><span class="badge badge-pill badge badge-warning">{{ ucwords($event->status) }}</span></a></li>
        @endif
        </ul>







         <div class="row">
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
            <div class="col-md-12 col-sm-6">

                  <div class="card-content card-h" style="min-height: 35px; padding-top: 0px;">


                     <div class="row">
                        <div class="col-md-12">


                                 <label class="control-label col-md-3 font-l"><i class="ti-book pr-5 "></i> Description: </label>
                                 <star class="col-md-6">{{ $event->description }}</star>

                        </div>
                     </div>
                  </div>



            </div>
            @endif


         </div>

      </div>
      <hr>

         <div class="row">

            @if($event->caterings->count() > 0)
            <div class="col-md-2 pull-right">
               <h5 class="font-small smallresponsive" ><i class="fa fa-cutlery hideicon style pr-5 "></i> Catering Service <i class="fa {{ $event->caterings_status == 'rejected' ? 'fa-times' : 'fa-check-circle-o' }} pr-15 {{ $event->caterings_status == 'approved' ?  'e-style' : '' }} {{ $event->caterings_status == 'rejected' ? 'r-style' : '' }} {{ $event->caterings_status == NULL ? 'g-style' : '' }}"></i></h5>
            </div>
            @endif

            @if($event->transportations->count() > 0)
            <div class="col-md-2 pull-right">
               <h5 class="font-small text-center smallresponsive" ><i class="ti-car hideicon pr-5 "></i> Transportation <i class="fa {{ $event->transportations_status == 'rejected' ? 'fa-times' : 'fa-check-circle-o' }} pr-15 {{ $event->transportations_status == 'approved' ?  'e-style' : '' }} {{ $event->transportations_status == 'rejected' ? 'r-style' : '' }} {{ $event->transportations_status == NULL ? 'g-style' : '' }}"></i></h5>
            </div>
            @endif

            @if($event->hotels->count() > 0)
            <div class="col-md-1 pull-right">
               <h5 class="font-small smallresponsive"  class="color-events"><i class="fa fa-building-o hideicon style pr-5 "></i> Hotel <i class="fa {{ $event->hotels_status == 'rejected' ? 'fa-times' : 'fa-check-circle-o' }} pr-15 {{ $event->hotels_status == 'approved' ?  'e-style' : '' }} {{ $event->hotels_status == 'rejected' ? 'r-style' : '' }} {{ $event->hotels_status == NULL ? 'g-style' : '' }}"></i></h5>
            </div>
            @endif

            @if($event->maintenances->count() > 0)
            <div class="col-md-2 pull-right">
               <h5 class="font-small smallresponsive" ><i class="fa fa-wrench hideicon style pr-5 "></i> Maintenance Services <i class="fa {{ $event->maintenances_status == 'rejected' ? 'fa-times' : 'fa-check-circle-o' }} pr-15 {{ $event->maintenances_status == 'approved' ?  'e-style' : '' }} {{ $event->maintenances_status == 'rejected' ? 'r-style' : '' }} {{ $event->maintenances_status == NULL ? 'g-style' : '' }}"></i></h5>
            </div>
            @endif

            <div class="col-md-5 col-xs-12">
            @if($event->status == "draft" && auth()->user()->role->role == "requester")
               <h5 class="font-small pr-4" > <a href="{{ route('event.edit',['id' => $event->id]) }}"> <i class="ti-calendar hideicon style pr-5 cal"></i> Show Details </a></h5>
            @else
               <h5 class="font-small pr-4"> <a href="{{ route('events.show',['id' => $event->id]) }}"> <i class="ti-calendar hideicon style pr-5 cal"></i> Show Details </a></h5>
            @endif

            </div>




         </div>
      </div>

</div>
