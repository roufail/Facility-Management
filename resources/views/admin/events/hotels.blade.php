@extends('admin.layouts.master')
@section('page_title',$event->title." Hotels")
@section('page_heading',"Event Hotels")

@section('page_content')

<div class="card card-wizard">
      {{ Form::open(['route' => ['events.save_hotel', $event->id],'method' => 'POST','files'=>true]) }}
      @include('admin.components.info_messages')
                           <div class="card-content">
                                @include('admin.components.breadcrumb')
                                <ul class="nav nav-pills">
                                    <li style="width: 100%;" class="active"><a style="cursor: text;" href="javascript:;">Hotel Services Information</a></li>
                                </ul>
                              <div class="tab-content">
                                 <div class="tab-pane active" id="tab1">
                                    <div class="row">
                                    <div class="space-25"></div>
                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Hotel Service
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <div class="checkbox">
                                                {{ Form::checkbox('hotel_service', null,null, array("id" => "hotel_service")) }}
                                                <label for="hotel_service">
                                                Hotel Service
                                                </label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="space-25"></div>
                                    <div class="row">
                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Type
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-6">
                                        {{ Form::select('type', array(
                                                "Room booking" => "Room Booking",
                                                "Conference meeting" => "Conference meeting",
                                            ) , old('type') ,array("class"=>'selectpicker'))
                                        }}
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
                                             Type of Room
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-6">
                                        {{ Form::select('room_type', array(
                                                "Single" => "Single",
                                                "Double" => "Double",
                                            ) , old('room_type') ,array("class"=>'selectpicker'))
                                        }}
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
                                             Check in Date
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                            {{ Form::text('date_from', null ,$errors->has('date_from') ? array("class"=>'form-control datepicker has_error',"placeholder" => "ex: ".date("Y-m-d")) : array("class"=>'form-control datepicker',"placeholder" => "ex: ".date("Y-m-d"))) }}
                                          </div>
                                       </div>


                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Check in Time
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                            {{ Form::text('time_from', null ,$errors->has('time_from') ? array("class"=>'form-control timepicker has_error',"placeholder"=>"ex: ".date("H:i")) : array("class"=>'form-control timepicker',"placeholder"=>"ex: ".date("H:i"))) }}
                                          </div>
                                       </div>
                                    </div>





                                    <div class="space-25"></div>
                                    <div class="row">
                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Check out Date
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                            {{ Form::text('date_to', null ,$errors->has('date_to') ? array("class"=>'has_error form-control datepicker',"placeholder" => "ex: ".date("Y-m-d")) : array("class"=>'form-control datepicker',"placeholder" => "ex: ".date("Y-m-d"))) }}
                                          </div>
                                       </div>


                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Check out Time
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                            {{ Form::text('time_to', null ,$errors->has('time_to') ? array("class"=>'form-control timepicker has_error',"placeholder"=>"ex: ".date("H:i")) : array("class"=>'form-control timepicker',"placeholder"=>"ex: ".date("H:i"))) }}
                                          </div>
                                       </div>

                                    </div>




                                    <div class="space-25"></div>
                                    <div class="row">
                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Occupant Details
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                            {{ Form::text('occupant_details', old('occupant_details') ,$errors->has('time_to') ? array("class"=>'form-control has_error',"placeholder" => 'Enter your occupant details') : array("class"=>'form-control',"placeholder" => 'Enter your occupant details')) }}
                                          </div>
                                       </div>
                                    </div>




                                    <div class="row">
                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                          Comment
                                          </label>
                                       </div>
                                       <div class="col-sm-9">
                                            {{ Form::textarea('comment', old('comment') ,array("class"=>'form-control',"placeholder"=>'Enter your comment',"rows"=>"3")) }}
                                       </div>
                                    </div>
                                    <div class="space-25"></div>
                                    <div class="row">
                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                          Attachment
                                          </label>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group is-empty is-fileinput">
                                             {{ Form::file('attachment_file', array('multiple' =>'','id'=>'attach_file','class'=>'attach_file')) }}
                                             <div class="input-group">
                                                <input type="text" readonly="" class="form-control" placeholder="Placeholder w/file chooser...">
                                                <span class="input-group-btn input-group-sm">
                                                <button type="button" class="btn btn-info btn-fill btn-fab btn-fab-mini attach_file_handler button-disabled">
                                                <i class="material-icons">Attach File</i>
                                                </button>
                                                </span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-footer text-center">
                              {{ Form::submit('Add',array("class"=>'btn btn-info btn-fill btn-wd btn-next button-disabled')) }}
                              @include('admin.components.publish_button')
                           </div>
                           <div class="clearfix"></div>
                           {{ Form::close() }}
                     </div>



   @if($event->hotels()->count() > 0)

      @foreach ( $event->hotels as $hotel)
            @include('admin.components.hotel_widget')
      @endforeach

   @endif


@endsection

@section('extra_js')
<!-- Append events js files -->
   <script src="{{ asset("admin_assets/js/events.js") }}"></script>
   <script type="text/javascript">


function disable(){

    $('.selectpicker').attr("disabled", "disabled");
    $('.form-control').attr("disabled", "disabled");
    $('.button-disabled').attr("disabled", "disabled");
    $('.selectpicker').selectpicker('refresh');
}

function unable(){
    // $('.cat').removeAttr('disabled',true);
    $('.selectpicker').removeAttr('disabled',true);
    $('.form-control').removeAttr("disabled", "disabled");
    $('.button-disabled').removeAttr("disabled", "disabled");
    $('.selectpicker').selectpicker('refresh');

}

$( document ).ready(function() {
    disable();
    $('#hotel_service').change(function() {

        var val = $(this).is(":checked");
        if( val ){

            unable();
        } else {

            disable();
        }

    });
   if($('#hotel_service').is(":checked")){ unable(); }
});
</script>
@endsection
