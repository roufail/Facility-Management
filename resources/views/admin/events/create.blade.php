@extends('admin.layouts.master')
@section('page_title',"Edit ".$event->title)
@section('page_heading',"Create Event")
   @section('page_content')
   <div class="card card-wizard">

            @if($event->status)
            {{ Form::open(['route' => ['events.save','id'=>$event->id],'method' => 'POST']) }}
            @else
            {{ Form::open(['route' => 'events.store','method' => 'POST']) }}
            @endif

         @include('admin.components.info_messages')

         <div class="card-content">

               @include('admin.components.breadcrumb')
               <ul class="nav nav-pills">
                <li style="width: 100%;" class="active"><a style="cursor: text;" href="javascript:;">Requester Information</a></li>
               </ul>

            <div class="tab-content">
               <div class="tab-pane active">
                  <div class="row" style="background-color: #F3F2EE;">
                     <div class="col-lg-3 col-sm-6 pt-20">
                        <div class="card">
                           <div class="card-content">
                              <div class="row">
                                 <div class="col-xs-2">
                                    <div class="icon-big icon-warning text-center">
                                       <i class="fa fa-id-badge style"></i>
                                    </div>
                                 </div>
                                 <div class="col-xs-10">
                                    <div class="numbers font-s">
                                       <p>Requester ID</p>
                                    @if($event->status)
                                       {{ $event->user->id}}
                                    @else
                                       {{  auth()->user()->id }}
                                    @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-sm-6 pt-20">
                        <div class="card">
                           <div class="card-content">
                              <div class="row">
                                 <div class="col-xs-2">
                                    <div class="icon-big icon-success text-center">
                                       <i class="fa fa-id-card style"></i>
                                    </div>
                                 </div>
                                 <div class="col-xs-10">
                                    <div class="numbers font-s">
                                       <p>Requester Name </p>
                                          @if($event->status)
                                             {{ $event->user->name}}
                                          @else
                                             {{  auth()->user()->name }}
                                          @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-sm-6 pt-20">
                        <div class="card">
                           <div class="card-content">
                              <div class="row">
                                 <div class="col-xs-2">
                                    <div class="icon-big icon-danger text-center">
                                       <i class="ti-calendar"></i>
                                    </div>
                                 </div>
                                 <div class="col-xs-10">
                                    <div class="numbers font-s">
                                       <p>Request date</p>
                                          {{ date("d-M-Y") }}
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-sm-6 pt-20">
                        <div class="card">
                           <div class="card-content">
                              <div class="row">
                                 <div class="col-xs-2">
                                    <div class="icon-big icon-info text-center">
                                       <i class="fa fa-map-marker style"></i>
                                    </div>
                                 </div>
                                 <div class="col-xs-10">
                                    <div class="numbers" style="    font-size: 1.2em;">
                                       <p>Location</p>
                                       {{ ucwords(auth()->user()->city) }}
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>


                    <ul class="nav nav-pills">
                        <li style="width: 100%;" class="active"><a style="cursor: text;" href="javascript:;">Incident Information</a></li>
                    </ul>

                  <div class="row">
                     <div class="space-25"></div>
                     <div class="col-md-3 pt-5">
                        <label class="control-label">
                           Title
                           <star>*</star>
                        </label>
                     </div>
                     <div class="col-md-6">
                           {{ Form::text('title', old('title') ? old('title') : $event->title  , $errors->has('title') ? array('class' => 'form-control has_error') : array('class' => 'form-control')) }}
                     </div>
                  </div>

                  <div class="space-25"></div>


                  <div class="row">
                     <div class="col-md-3 pt-5">
                        <label class="control-label">
                           City
                           <star>*</star>
                        </label>
                     </div>
                     <div class="col-md-6">
                        {{ Form::select('city', array('riyadh' => 'Riyadh', 'jubail' => 'Jubail','yanbu' => 'Yanbu'), old('city') ? old('city') : $event->city ,array("class"=>'selectpicker','data-style'=>"btn btn-danger btn-block")) }}
                     </div>
                     <div class="col-md-3 pt-5">
                        <label class="control-label">

                        </label>
                     </div>
                  </div>
                  <div class="space-25"></div>
                  <div class="row">
                     <div class="col-md-3 pt-5">
                        <label class="control-label">
                           Location
                           <star>*</star>
                        </label>
                     </div>
                     <div class="col-md-6">
                        {{ Form::select('location', array(
                            'SADAF Admin Building' => 'SADAF Admin Building',
                            'Building 2' => 'Building 2',
                            'Building 3' => 'Building 3',
                            'Building 4'=>'Building 4',

                            ),old('location') ? old('location') : $event->location ,array("class"=>'selectpicker','data-style'=>"btn btn-danger btn-block")) }}
                     </div>
                     <div class="col-md-3">
                        <label class="control-label">

                        </label>
                     </div>
                  </div>
                  <div class="space-25"></div>
                  <div class="row">
                     <div class="col-md-3 pt-5">
                        <label class="control-label">
                           Number of Invitees
                           <star>*</star>
                        </label>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                              {{ Form::number('invites', old('invites') ? old('invites') : $event->invites , $errors->has('invites') ? array('class' => 'form-control has_error','placeholder'=>'ex: 5') : array('class' => 'form-control','placeholder'=>'ex: 5'))  }}
                        </div>
                     </div>
                  </div>
                  <div class="space-25"></div>
                  <div class="row">
                     <div class="col-md-3 pt-5">
                        <label class="control-label">
                        Description
                        </label>
                     </div>
                     <div class="col-sm-9">
                        {{ Form::textarea('description', old('description') ? old('description') : $event->description  , array('class' => 'form-control','rows'=> 3,'placeholder'=>'Enter your description')) }}
                     </div>
                  </div>
                  <div class="space-25"></div>
                  <div class="row">
                     <div class="col-md-2 pt-5">
                        <label class="control-label">
                        Event Date

                        </label>
                     </div>
                     <div class="col-md-1 pt-5">
                        <label class="control-label">
                           <star>From *</star>
                        </label>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           {{ Form::text('date_from',  old('date_from') ? old('date_from') : $event->date_from, $errors->has('date_from') ? array("class"=>'form-control datepicker has_error','placeholder'=>'ex: 02/05/2019') : array("class"=>'form-control datepicker','placeholder'=>'ex: 02/05/2019')) }}
                        </div>
                     </div>
                     <div class="col-md-1 pt-5">
                        <label class="control-label">
                           <star>To *</star>
                        </label>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           {{ Form::text('date_to', old('date_to') ? old('date_to') : $event->date_to , $errors->has('date_to') ? array("class"=>'form-control datepicker has_error','placeholder'=>'ex: 02/05/2019') : array("class"=>'form-control datepicker','placeholder'=>'ex: 02/05/2019')) }}
                        </div>
                     </div>
                  </div>
                  <div class="space-25"></div>
                  <div class="row">
                     <div class="col-md-2 pt-5">
                        <label class="control-label">
                        Event Time
                        </label>
                     </div>
                     <div class="col-md-1 pt-5">
                        <label class="control-label">
                           <star>From *</star>
                        </label>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           {{ Form::text('time_from', old('time_from') ? old('time_from') : $event->time_from , $errors->has('time_from') ? array("class"=>'form-control timepicker has_error','placeholder'=>'ex: 24 Hour mode') : array("class"=>'form-control timepicker','placeholder'=>'ex: 24 Hour mode')) }}
                        </div>
                     </div>
                     <div class="col-md-1 pt-5">
                        <label class="control-label">
                           <star>To *</star>
                        </label>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           {{ Form::text('time_to', old('time_to') ? old('time_to') : $event->time_to ,$errors->has('time_to') ? array("class"=>'form-control timepicker has_error','placeholder'=>'ex: 24 Hour mode') : array("class"=>'form-control timepicker','placeholder'=>'ex: 24 Hour mode')) }}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-footer text-center">
            {{ Form::submit('Save' ,array("class"=>'btn btn-info btn-fill btn-wd btn-next','value' => 'update','name'=>'action')) }}
            @include('admin.components.publish_button')
         </div>
         <div class="clearfix"></div>
      {{ Form::close() }}
   </div>

@endsection

@section('extra_js')
<!-- Append events js files -->
   <script src="{{ asset("admin_assets/js/events.js") }}"></script>
@endsection

