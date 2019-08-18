@extends('admin.layouts.master')
@section('page_title',$event->title." Maintenances")
@section('page_heading',"Event Maintenances")

@section('page_content')

<div class="card card-wizard">
      {{ Form::open(['route' => ['events.save_maintenance', $event->id],'method' => 'POST','files'=>true]) }}
      @include('admin.components.info_messages')

      <div class="card-content">
            @include('admin.components.breadcrumb')
            <ul class="nav nav-pills">
                <li style="width: 100%;" class="active"><a style="cursor: text;" href="javascript:;">Maintenance Services Information</a></li>
            </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
            <div class="row">
            <div class="space-25"></div>
                <div class="col-md-3 pt-5">
                    <label class="control-label">
                        Maintenance Service
                        <star>*</star>
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="checkbox">
                        {{ Form::checkbox('maintenances_service', null,null, array("id" => "maintenances_service")) }}
                        <label for="maintenances_service">
                        Maintenance Service
                        </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-25"></div>
            <div class="row">
                <div class="col-md-3 pt-5">
                    <label class="control-label">
                        Type of Service
                        <star>*</star>
                    </label>
                </div>
                <div class="col-md-6">
                     {{ Form::select('type', array(
                        "Maintenance" => "Maintenance",
                        "Janitors" => "Janitors",
                     ) , old('type') ,array("class"=>'selectpicker')) }}
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
                        Date
                        <star>*</star>
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::text('date', null ,$errors->has('date') ? array("class"=>'form-control datepicker has_error',"placeholder" => "ex: ".date("Y-m-d")) : array("class"=>'form-control datepicker',"placeholder" => "ex: ".date("Y-m-d"))) }}
                    </div>
                </div>
            </div>


            <div class="space-25"></div>
            <div class="row">
                <div class="col-md-2 pt-5">
                    <label class="control-label">
                    Time
                    </label>
                </div>
                <div class="col-md-1 pt-5">
                    <label class="control-label">
                        <star>From *</star>
                    </label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::text('time_from', null ,$errors->has('time_from') ? array("class"=>'form-control timepicker has_error',"placeholder"=>"ex: ".date("H:i")) : array("class"=>'form-control timepicker',"placeholder"=>"ex: ".date("H:i"))) }}
                    </div>
                </div>
                <div class="col-md-1 pt-5">
                    <label class="control-label">
                        <star>To *</star>
                    </label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::text('time_to', null ,$errors->has('time_to') ? array("class"=>'has_error form-control timepicker',"placeholder"=>"ex: ".date("H:i")) : array("class"=>'form-control timepicker',"placeholder"=>"ex: ".date("H:i"))) }}
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-3 pt-5">
                    <label class="control-label">
                    Description
                    </label>
                </div>
                <div class="col-sm-9">
                    {{ Form::textarea('description', old('description') ,array("class"=>'form-control',"placeholder"=>'Enter your description',"rows"=>3)) }}
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
                        {{ Form::file('attachment_file', array('multiple' =>'','id'=>'attach_file','class'=>'attach_file')) }}                        <div class="input-group">
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






   @if($event->maintenances()->count() > 0)
    @foreach ( $event->maintenances as $maintenance)
        @include('admin.components.maintenance_widget')
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
    $('.button-disabled').removeAttr("disabled");
    $('.selectpicker').selectpicker('refresh');

}

$( document ).ready(function() {
    disable();
    $('#maintenances_service').change(function() {

        var val = $(this).is(":checked");
        if( val ){

            unable();
        } else {

            disable();
        }

    });
    if($('#maintenances_service').is(":checked")){ unable(); }
});
</script>
@endsection
