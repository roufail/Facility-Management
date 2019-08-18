@extends('admin.layouts.master')
@section('page_title',"Roles")
@section('page_heading',"Roles")
@section('page_content')
{{ Form::open(['route' => ['role.save'],'method' => 'POST']) }}
<div class="col-md-10 col-md-offset-1">
   <div class="card card-user">
      <div class="card-content">
         <div class="row">
            <div class="col-lg-12 col-sm-12">
               <div class="card">
                  <div class="card-content">
                     <div class="card-header">
                        <h4 class="card-title">Approving matrix</h4>
                     </div>
                     <div class="card-content table-responsive table-full-width">
                        <table class="table table-striped">
                           <thead>
                              <th>#</th>
                              @foreach ($roles as $role_key => $role)
                                <th>{{ $role }}</th>
                              @endforeach
                           </thead>
                           <tbody>

                              @php
                              $first = true;
                              @endphp
                              @foreach ($permissions as $permission_key => $permission)
                              <tr>
                              <td>{{  $permission }}</td>
                                 <td style="padding-left: 60px">
                                    <div class="">
                                       <div class="radio">
                                          <input type="radio" name="role[{{$permission_key}}]" @if(isset($default_permissions[$permission_key]) && $default_permissions[$permission_key] == 1) checked @endif class="@if($first)disable0 @endif @if(!$first)senior @endif" value="1">
                                          <label for="events">
                                          </label>
                                       </div>
                                    </div>
                                 </td>
                                 <td style="padding-left: 92px">
                                    <div class="">
                                       <div class="radio">
                                          <input type="radio" name="role[{{$permission_key}}]" @if(isset($default_permissions[$permission_key]) && $default_permissions[$permission_key] == 2) checked @endif class="@if($first)disable @endif @if(!$first)director @endif" value="2">
                                          <label for="events">
                                                               </label>
                                       </div>
                                    </div>
                                 </td>
                                 <td style="padding-left: 60px">
                                    <div class="">
                                       <div class="radio">
                                       <input type="radio" name="role[{{$permission_key}}]" @if(isset($default_permissions[$permission_key]) && $default_permissions[$permission_key] == 3) checked @endif class="@if($first)disable2 @endif @if(!$first) vp @endif" value="3">
                                          <label for="events">
                                                               </label>
                                       </div>
                                    </div>
                                 </td>
                                 <td style="padding-left: 42px">
                                    <div class="">
                                       <div class="radio">
                                       <input type="radio" name="role[{{$permission_key}}]" @if(isset($default_permissions[$permission_key]) && $default_permissions[$permission_key] == 4) checked @endif class="@if($first)disable3 @endif @if(!$first) evp @endif" value="4">
                                          <label for="events">
                                                               </label>
                                       </div>
                                    </div>
                                 </td>
                                 <td style="padding-left: 47px">
                                    <div class="">
                                       <div class="radio">
                                       <input type="radio" name="role[{{$permission_key}}]" @if(isset($default_permissions[$permission_key]) && $default_permissions[$permission_key] == 5) checked @endif class="@if($first)disable4 @endif @if(!$first)President @endif" value="5">
                                          <label for="events">
                                                               </label>
                                       </div>
                                    </div>
                                 </td>
                                 <td style="padding-left: 60px">
                                    <div class="">
                                       <div class="radio">
                                       <input type="radio" name="role[{{$permission_key}}]" @if(isset($default_permissions[$permission_key]) && $default_permissions[$permission_key] == 6) checked @endif class="@if($first)disable5 @endif" value="6">
                                          <label for="events"></label>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                              @php
                                 $first = false;
                              @endphp
                              @endforeach


                           </tbody>
                        </table>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <hr>
      <div class="text-center">
         <div class="row">
            <div class="card-footer text-center">
               {{ Form::submit('Save' ,array("class"=>'btn btn-info btn-fill btn-wd btn-next','value' => 'save','name'=>'action')) }}
            </div>
         </div>
      </div>
   </div>
</div>
{{ Form::close() }}
@endsection

@section('extra_js')
<!-- Append events js files -->
<script src="{{ asset("admin_assets/js/events.js ") }}"></script>
<script type="text/javascript">

// A $( document ).ready() block.
$( document ).ready(function() {

    if ($('.disable:checked').length > 0) {
        $('.senior').attr("disabled", "disabled");
    } else if ($('.disable2:checked').length > 0){

        $('.senior').attr("disabled", "disabled");
        $('.director').attr("disabled", "disabled");
    } else if ($('.disable3:checked').length > 0){

        $('.senior').attr("disabled", "disabled");
        $('.director').attr("disabled", "disabled");
        $(".vp").attr("disabled", "disabled");
    }  else if ($('.disable4:checked').length > 0){

       $('.senior').attr("disabled", "disabled");
       $('.director').attr("disabled", "disabled");
       $(".vp").attr("disabled", "disabled");
       $(".evp").attr("disabled", "disabled");
   }  else if ($('.disable5:checked').length > 0){

        $('.senior').attr("disabled", "disabled");
        $('.director').attr("disabled", "disabled");
        $(".vp").attr("disabled", "disabled");
        $(".evp").attr("disabled", "disabled");
        $(".President").attr("disabled", "disabled");
        }

});


$(".disable0").change(function(){

if(typeof( $(".senior").attr('disabled')) == 'string')
    {
        $(".senior").removeAttr('disabled');
        $(".director").removeAttr('disabled');
        $(".vp").removeAttr('disabled');
        $(".evp").removeAttr('disabled');
        $(".President").removeAttr('disabled');
    }



});

$(".disable").change(function(){

if(typeof( $(".senior").attr('disabled')) == 'string')
    {


        $(".director").removeAttr('disabled');
        $(".vp").removeAttr('disabled');
        $(".evp").removeAttr('disabled');
        $(".President").removeAttr('disabled');
    } else {
        $('.senior').attr("disabled", "disabled").prop('checked', false);

    }




});




      $(".disable2").change(function(){

        if(typeof( $(".senior").attr('disabled')) == 'string' && typeof( $(".director").attr('disabled')) == 'string')
            {
                $(".vp").removeAttr('disabled');
                $(".evp").removeAttr('disabled');
                $(".President").removeAttr('disabled');

            } else {
                 $('.senior').attr("disabled", "disabled").prop('checked', false);
                 $('.director').attr("disabled", "disabled").prop('checked', false);


            }




      });

      $(".disable3").change(function(){

        if(typeof( $(".senior").attr('disabled')) == 'string' &&
        typeof( $(".director").attr('disabled')) == 'string'  &&
        typeof( $(".vp").attr('disabled')) == 'string')
            {

                $(".evp").removeAttr('disabled');
                $(".President").removeAttr('disabled');

            } else {
                $('.director').attr("disabled", "disabled").prop('checked', false);
                $('.senior').attr("disabled", "disabled").prop('checked', false);
                $('.vp').attr("disabled", "disabled").prop('checked', false);

            }



      });

      $(".disable4").change(function(){


        if(typeof( $(".senior").attr('disabled')) == 'string' &&
        typeof( $(".director").attr('disabled')) == 'string'  &&
        typeof( $(".vp").attr('disabled')) == 'string' &&
        typeof( $(".evp").attr('disabled')) == 'string'

        )
            {


                $(".President").removeAttr('disabled');

            } else {
                $('.director').attr("disabled", "disabled").prop('checked', false);
                $('.senior').attr("disabled", "disabled").prop('checked', false);
                $('.vp').attr("disabled", "disabled").prop('checked', false);
                $('.evp').attr("disabled", "disabled").prop('checked', false);

            }


      });

      $(".disable5").change(function(){
        $('.director').attr("disabled", "disabled").prop('checked', false);
         $('.senior').attr("disabled", "disabled").prop('checked', false);
         $('.vp').attr("disabled", "disabled").prop('checked', false);
         $('.evp').attr("disabled", "disabled").prop('checked', false);
         $('.President').attr("disabled", "disabled").prop('checked', false);
      });

</script>
@endsection
