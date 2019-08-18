@extends('admin.layouts.master')
@section('page_title',$event->title." Transportations")
@section('page_heading',"Event Transportations")

@section('page_content')

<div class="card card-wizard">
   {{ Form::open(['route' => ['events.save_transportation', $event->id],'method' => 'POST','files'=>true]) }}
   @include('admin.components.info_messages')

   <div class="card-content">
   @include('admin.components.breadcrumb')
      <ul class="nav nav-pills">
         <li style="width: 100%;" class="active"><a style="cursor: text;" href="javascript:;">Transportation Information</a></li>
      </ul>

      <div class="tab-content">
         <div class="tab-pane active" id="tab1">
            <div class="row">
               <div class="space-25"></div>
               <div class="col-md-3 pt-5">
                  <label class="control-label">
                        Transportation Service
                        <star>*</star>
                     </label>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <div class="checkbox">
                        {{ Form::checkbox('transportation_service', null,null, $errors->has("transportation_service")  ? array("id" => "transportation_service","class" => "has_error") : array("id" => "transportation_service")) }}
                        <label for="transportation_service">
                           Transportation Service
                           </label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="space-25"></div>
            <div class="row">
               <div class="col-md-3 pt-5">
                  <label class="control-label">
                        Type of Transportation
                        <star>*</star>
                     </label>
               </div>
               <div class="col-md-6">

                  {{ Form::select('type', array("Car with driver" => "Car with driver", "Car without driver" => "Car without driver", "Bus services"
                  => "Bus Services" ) , old('type') ,$errors->has("type") ? array("class"=>'selectpicker has_error') : array("class"=>'selectpicker')) }}

               </div>
               <div class="col-md-3">
                  <label class="control-label">

                     </label>
               </div>
            </div>
            <div class="space-25"></div>
            <div class="row">
               <div class="col-md-2 pt-5">
                  <label class="control-label">
                     Location
                     </label>
               </div>
               <div class="col-md-1 pt-5">
                  <label class="control-label">
                        <star>From *</star>
                     </label>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     {{ Form::text('location_from', null ,$errors->has("location_from") ? array("class"=>'form-control has_error') : array("class"=>'form-control')) }}
                  </div>
               </div>
               <div class="col-md-1 pt-5">
                  <label class="control-label">
                        <star>To *</star>
                     </label>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     {{ Form::text('location_to', null ,$errors->has("location_to") ? array("class"=>'form-control has_error') : array("class"=>'form-control')) }}
                  </div>
               </div>
            </div>
            <div class="space-25"></div>
            <div class="row">
               <div class="col-md-3 pt-5">
                  <label class="control-label">
                        Number of passengers
                        <star>*</star>
                     </label>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     {{ Form::number('passengers', null ,$errors->has("passengers") ? array("class"=>'form-control has_error',""=>"ex: 5") : array("class"=>'form-control',""=>"ex: 5")) }}
                  </div>
               </div>
            </div>
            <div class="space-25"></div>
            <div class="row">
               <div class="col-md-3 pt-5">
                  <label class="control-label">
                        Contact details
                        <star>*</star>
                     </label>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     {{ Form::text('contact_details', null ,$errors->has("contact_details") ? array("class"=>'form-control has_error',""=>"ex: details") : array("class"=>'form-control',""=>"ex: details")) }}
                  </div>
               </div>
            </div>
            <div class="space-25"></div>
            <div class="row">
               <div class="col-md-3 pt-5">
                  <label class="control-label">
                        Date
                        <star>*</star>
                     </label>
               </div>
               <div class="col-md-3">
                  <div class="form-group">
                     {{ Form::text('date', null ,$errors->has("date") ? array("class"=>'form-control datepicker has_error',"placeholder" => "ex: ".date("Y-m-d")) : array("class"=>'form-control datepicker',"placeholder" => "ex: ".date("Y-m-d"))) }}
                  </div>
               </div>

               <div class="col-md-3 pt-5">
                  <label class="control-label">
                        Time
                        <star>*</star>
                     </label>
               </div>
               <div class="col-md-3">
                  <div class="form-group">
                     {{ Form::text('time', null ,$errors->has("time") ? array("class"=>'has_error form-control timepicker',"placeholder"=>"ex: ".date("H:i")) : array("class"=>'form-control timepicker',"placeholder"=>"ex: ".date("H:i"))) }}
                  </div>
               </div>
            </div>

            <div class="space-25"></div>
            <div class="row">
               <div class="col-md-3 pt-5">
                  <label class="control-label">
                        Frequency
                        <star>*</star>
                     </label>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     {{ Form::text('frequency', old('frequency') ,$errors->has("time") ? array("class"=>'form-control has_error',"placeholder" => 'Enter your Frequency') : array("class"=>'form-control',"placeholder" => 'Enter your Frequency')) }}
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
                  {{ Form::textarea('comment', old('comment') ,array("class"=>'form-control',"placeholder"=>'Enter your comment',"rows"=>"3"))
                  }}
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
                     {{-- <input type="file"  id="inputFile4" multiple=""> --}} {{ Form::file('attachment_file', array('multiple'
                     =>'','id'=>'attach_file','class'=>'attach_file','accept'=>'.doc,.docx,.pdf,.png,.jpg,.jpeg,.gif,.xls,.xlsx')) }}

                     <div class="input-group">
                        <input type="text" readonly=""  class="form-control attach_file" placeholder="Placeholder w/file chooser...">
                        <span class="input-group-btn input-group-sm">
                           <button type="button" class="btn btn-info btn-fill btn-fab btn-fab-mini attach_file_handler button-disabled">
                           <i class="material-icons">Attach file</i>
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




@if($event->transportations()->count() > 0)
@foreach ( $event->transportations as $transportation)
   @include('admin.components.transportation_widget')
@endforeach @endif
@endsection

@section('extra_js')
<!-- Append events js files -->
<script src="{{ asset("admin_assets/js/events.js ") }}"></script>
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
    $('.button-disabled').removeAttr("disabled");
    $('.selectpicker').selectpicker('refresh');

}

$( document ).ready(function() {
    disable();
    $('#transportation_service').change(function() {

        var val = $(this).is(":checked");
        if( val ){

            unable();
        } else {

            disable();
        }

    });
   if($('#transportation_service').is(":checked")){ unable(); }
});
</script>


@endsection
