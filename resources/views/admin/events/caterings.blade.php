@extends('admin.layouts.master')
@section('page_title',$event->title." Caterings")
@section('page_heading',"Event Caterings")

@section('page_content')
                <div class="card card-wizard">
                  {{ Form::open(['route' => ['events.save_catering', $event->id],'method' => 'POST']) }}
                           @include('admin.components.info_messages')
                           <div class="card-content">
                               @include('admin.components.breadcrumb')

                                <ul class="nav nav-pills">
                                    <li style="width: 100%;" class="active"><a style="cursor: text;" href="javascript:;">Catering Information</a></li>
                                </ul>

                              <div class="tab-content">
                                 <div class="tab-pane active" id="tab1">
                                    <div class="row">
                                    <div class="space-25"></div>
                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Catering Service
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <div class="checkbox">
                                                {{ Form::checkbox('caterina_service', null,null, $errors->has('caterina_service') ?  array("id" => "caterina_service","class"=>"has_error") : array("id" => "caterina_service")) }}
                                                <label for="caterina_service">
                                                Catering Service
                                                </label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="space-25"></div>
                                    <div class="row">
                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Type of Catering
                                             <star>*</star>
                                          </label>
                                       </div>

                                       <div class="col-md-6">
                                          {{ Form::select('type', array(
                                             "Breakfast" => "Breakfast",
                                             "Lunch" => "Lunch",
                                             "Dinner" => "Dinner",
                                             "Snacks" => "Snacks",
                                             "Other" => "Other",
                                          ) , old('type') ,array("class"=>'selectpicker type')) }}
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
                                            Menu Category
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-6">
                                          {{ Form::select('menu', array(
                                             "Select Category" => "Select Category",
                                             "Welcome drinks" => "Welcome drinks",
                                             "Salad" => "Salad",
                                             "Hot pastries" => "Hot Pastries",
                                             "Side dishes" => "Side dishes",
                                             "Main dish" => "Main dish",
                                             "Sweets" => "Sweets",
                                          ) , old('menu') ,array("class"=>'selectpicker cat')) }}
                                       </div>
                                       <div class="col-md-3">
                                          <label class="control-label">

                                          </label>
                                       </div>
                                    </div>


                                            <!-- Drop -->
                                    <div class="space-25"></div>
                                    <div class="row none1 show1">
                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Menu Item
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-6">
                                          {{ Form::select('sub_menu', array(
                                            "Fresh orange juice" => "Fresh orange juice",
                                            "Assorted soft drinks" => "Assorted soft drinks",
                                            "Saudi champagne" => "Saudi champagne",
                                            "Arabic coffee with dates" => "Arabic coffee with dates",
                                          ) , old('sub_menu') ,array("class"=>'selectpicker disableselect1 menu1')) }}
                                       </div>
                                       <div class="col-md-3">
                                          <label class="control-label">

                                          </label>
                                       </div>
                                    </div>
                                            <!-- Drop -->

                                            <!-- Drop -->

                                    <div class="row none2 show2">
                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Menu Item
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-6">
                                          {{ Form::select('sub_menu', array(
                                            "Shrimps cocktail" => "Shrimps cocktail",
                                            "Cold fish salad" => "Cold fish salad",
                                            "Hommous" => "Hommous",
                                            "Muttabal" => "Muttabal",
                                            "Tabboullah" => "Tabboullah",
                                            "Baba ghanoog" => "Baba ghanoog",
                                            "Fattoush" => "Fattoush",
                                            "Grape leaves" => "Grape leaves",
                                            "Colslaw" => "Colslaw",
                                            "Russian salad" => "Russian salad",
                                            "Mogadara" => "Mogadara",
                                            "Sheep salad" => "Sheep salad",
                                            "Nicois" => "Nicois",
                                            "Greek salad" => "Greek salad",
                                            "Tuna salad" => "Tuna salad",
                                            "Fried eggplant" => "Fried eggplant",
                                            "Fried cauliflower" => "Fried cauliflower",
                                            "Wal dorf salad" => "Wal dorf salad",
                                            "Musaggal" => "Musaggal",
                                            "Vegetable cut" => "Vegetable cut",
                                            "Asparagus tartichoke" => "Asparagus tartichoke",
                                            "Corn" => "Corn",
                                            "Cucumber w/youghort" => "Cucumber w/youghort",
                                            "Arabic salad" => "Arabic salad",
                                            "Beet root" => "Beet root",
                                            "Cut green beans & red" => "Cut green beans & red",
                                            "Mohamara" => "Mohamara",
                                            "Kishka (labna)" => "Kishka (labna)",
                                            "Potato salad w/mayonnaise" => "Potato salad w/mayonnaise",
                                            "Okra in oil" => "Okra in oil",
                                            "Grow beans in oil" => "Grow beans in oil",
                                            "Marrow w/eggs" => "Marrow w/eggs",
                                            "Broad bean salad" => "Broad bean salad",
                                          ) , old('sub_menu') ,array("class"=>'selectpicker  disableselect2 food menu2')) }}
                                       </div>
                                       <div class="col-md-3">
                                          <label class="control-label">

                                          </label>
                                       </div>
                                    </div>
                                            <!-- Drop -->

                                            <!-- Drop -->

                                    <div class="row none3 show3">
                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Menu Item
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-6">
                                          {{ Form::select('sub_menu', array(
                                            "Fried kubba" => "Fried kubba",
                                            "Spring roll" => "Spring roll",
                                            "Pizza" => "Pizza",
                                            "Lamb lahim bilageen" => "Lamb lahim bilageen",
                                            "Spinach fatayer" => "Spinach fatayer",
                                            "Cheese fatayer" => "Cheese fatayer",
                                            "Meat fatayer" => "Meat fatayer",
                                            "Meat sambosa" => "Meat sambosa",
                                            "Chicken sambosa" => "Chicken sambosa",
                                            "Cheese sambosa" => "Cheese sambosa",
                                            "Meat lumpia" => "Meat lumpia",
                                            "Chicken w/ puff pastries" => "Chicken w/ puff pastries",
                                          ) , old('sub_menu') ,array("class"=>'selectpicker disableselect3 food menu3')) }}
                                       </div>
                                       <div class="col-md-3">
                                          <label class="control-label">

                                          </label>
                                       </div>
                                    </div>
                                            <!-- Drop -->

                                            <!-- Drop -->

                                    <div class="row none4 show4">
                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Menu Item
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-6">
                                          {{ Form::select('sub_menu', array(
                                            "Rice birayani" => "Rice birayani",
                                            "Rice kabsa" => "Rice kabsa",
                                            "Rice boukhari" => "Rice boukhari",
                                            "Macaroni bichamel" => "Macaroni bichamel",
                                            "Macaroni w/vegetable" => "Macaroni w/vegetable",
                                            "Spaghetti boulonais" => "Spaghetti boulonais",
                                            "Stuff marrow" => "Stuff marrow",
                                            "Stuff eggplant" => "Stuff eggplant",
                                            "Veg. Salojna" => "Veg. Salojna",
                                            "Eggplant  musaga" => "Eggplant  musaga",
                                            "Lasagne" => "Lasagne",
                                          ) , old('sub_menu') ,array("class"=>'selectpicker disableselect4 food menu4')) }}
                                       </div>
                                       <div class="col-md-3">
                                          <label class="control-label">

                                          </label>
                                       </div>
                                    </div>
                                            <!-- Drop -->
                                            <!-- Drop -->

                                    <div class="row none5 show5">
                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Menu Item
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-6">
                                          {{ Form::select('sub_menu', array(
                                            "Hlamb quzi  w/rice" => "Hlamb quzi  w/rice",
                                            "Chicken birayani" => "Chicken birayani",
                                            "Lamb birayani (fresh)" => "Lamb birayani (fresh)",
                                            "Chicken cheese tawook" => "Chicken cheese tawook",
                                            "Chicken curry" => "Chicken curry",
                                            "Chicken cheese" => "Chicken cheese",
                                            "Chicken grill" => "Chicken grill",
                                            "Chicken galantine" => "Chicken galantine",
                                            "Chicken alakiev" => "Chicken alakiev",
                                            "Chicken shawarma" => "Chicken shawarma",
                                            "Meat shawarma" => "Meat shawarma",
                                            "Chicken boukhari" => "Chicken boukhari",
                                            "Chicken kabsa" => "Chicken kabsa",
                                            "Chicken makloba" => "Chicken makloba",
                                            "Chicken escalope" => "Chicken escalope",
                                            "Chicken broasted" => "Chicken broasted",
                                            "Grill quails" => "Grill quails",
                                            "Stuffed quails" => "Stuffed quails",
                                            "Beef escalope" => "Beef escalope",
                                            "Pepper steak" => "Pepper steak",
                                            "Mixed grill" => "Mixed grill",
                                            "Lamb kabsa" => "Lamb kabsa",
                                            "Dawood basha" => "Dawood basha",
                                            "Eggplant shaik" => "Eggplant shaik",
                                            "Almushi" => "Almushi",
                                            "Shrimp kabsa" => "Shrimp kabsa",
                                            "Shrimp birayani" => "Shrimp birayani",
                                            "Shrimp pane" => "Shrimp pane",
                                            "Grill shrimp" => "Grill shrimp",
                                            "Hamour fish w/trabulsia" => "Hamour fish w/trabulsia",
                                            "Sauce" => "Sauce",
                                            "Hamour fish w/harra sauce" => "Hamour fish w/harra sauce",
                                            "Kubba labbania" => "Kubba labbania",
                                            "Roast lamb" => "Roast lamb",
                                            "Roast turkey" => "Roast turkey",
                                            "Roast beef" => "Roast beef",
                                            "Fillet wellington" => "Fillet wellington",
                                            "Picatta w/mushroom" => "Picatta w/mushroom",
                                            "Beef  estraganoof" => "Beef  estraganoof",
                                            "Lamb chops" => "Lamb chops",
                                            "Sayadia fish" => "Sayadia fish",
                                            "Lamb labania" => "Lamb labania",
                                            "Lasagne" => "Lasagne",
                                          ) , old('sub_menu') ,array("class"=>'selectpicker disableselect5 food menu5')) }}
                                       </div>
                                       <div class="col-md-3">
                                          <label class="control-label">

                                          </label>
                                       </div>
                                    </div>
                                            <!-- Drop -->
                                            <!-- Drop -->

                                    <div class="row none6 show6">
                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Menu Item
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-6">
                                          {{ Form::select('sub_menu', array(
                                            "Black forest cake" => "Black forest cake",
                                            "Vanilla cake" => "Vanilla cake",
                                            "Sacher cake" => "Sacher cake",
                                            "Moca cake" => "Moca cake",
                                            "Black diamond cake" => "Black diamond cake",
                                            "Royal strawberry cake" => "Royal strawberry cake",
                                            "French petits fours cake" => "French petits fours cake",
                                            "Pears almond tarts cake" => "Pears almond tarts cake",
                                            "Cheese cake" => "Cheese cake",
                                            "Opera de paris cake" => "Opera de paris cake",
                                            "Mille feville cake" => "Mille feville cake",
                                            "Exotic tart cake" => "Exotic tart cake",
                                            "Aishla sarayah cake" => "Aishla sarayah cake",
                                            "Apple strudel cake" => "Apple strudel cake",
                                            "Triple fruit cake" => "Triple fruit cake",
                                            "Ommali cake" => "Ommali cake",
                                            "Kunafa w/cheese or custard cake" => "Kunafa w/cheese or custard cake",
                                            "Asst. Arabic sweets" => "Asst. Arabic sweets",
                                            "Balashan cake" => "Balashan cake",
                                            "Basbusa cake" => "Basbusa cake",
                                            "Asst. Cake" => "Asst. Cake",
                                            "Cream caramel  jelly" => "Cream caramel  jelly",
                                            "Muhallabia cake" => "Muhallabia cake",
                                            "Carrot cake" => "Carrot cake",
                                            "Fresh fruit salad" => "Fresh fruit salad",
                                          ) , old('sub_menu') ,array("class"=>'selectpicker disableselect6 food menu6')) }}
                                       </div>
                                       <div class="col-md-3">
                                          <label class="control-label">

                                          </label>
                                       </div>
                                    </div>
                                            <!-- Drop -->








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
                                             {{ Form::number('invites', old('invites') , $errors->has('invites') ?  array("class"=>'form-control has_error',"placeholder"=> "ex: 5") : array("class"=>'form-control',"placeholder"=> "ex: 5")) }}
                                          </div>
                                       </div>
                                    </div>
                                    <div class="space-25"></div>
                                    <div class="row">


                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Date of Serve
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             {{ Form::text('date', null , $errors->has('date') ? array("class"=>'form-control datepicker has_error',"placeholder" => "ex: ".date("Y-m-d")) : array("class"=>'form-control datepicker',"placeholder" => "ex: ".date("Y-m-d"))) }}
                                          </div>
                                       </div>


                                       <div class="col-md-3 pt-5">
                                          <label class="control-label">
                                             Time of Serve
                                             <star>*</star>
                                          </label>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             {{ Form::text('time', null ,$errors->has('time') ?  array("class"=>'form-control timepicker has_error',"placeholder"=>"ex: ".date("H:i")) : array("class"=>'form-control timepicker',"placeholder"=>"ex: ".date("H:i"))) }}
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
                                             {{ Form::text('frequency', old('frequency') ,$errors->has('frequency') ? array("class"=>'form-control has_error',"placeholder" => 'Enter your frequency') : array("class"=>'form-control',"placeholder" => 'Enter your frequency')) }}
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
                                          {{ Form::textarea('comment', old('comment') ,array("class"=>'form-control',"placeholder"=>'Enter your comment')) }}
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

                        {{-- @include('admin.components.publish_button') --}}


                        @if($event->caterings()->count() > 0)
                           @foreach ( $event->caterings as $catering)
                             @include('admin.components.catering_widget')
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
    $('.button-disabled').attr("disabled",true);
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

    $('#caterina_service').change(function() {


        var val = $(this).is(":checked");
        if( val ){

            unable();
        } else {

            disable();
        }


        var val = $('#caterina_service').is(":checked");

    });
   $('select.food').attr('disabled',true);

   if($('#caterina_service').is(":checked")){ unable(); }


});


$('.cat').change(function() {
  var val = $(this).val();
    $('select.food').attr('disabled',true);
    if( val == 'Welcome drinks' ){
        $(".show1").removeClass( "none1" );
        $("select.food.menu1").removeAttr( "disabled");
    } else {
        $(".show1").addClass( "none1" );
    }

     if (val == 'Salad') {
        $(".show2").removeClass( "none2" );
       $("select.food.menu2").removeAttr( "disabled");
    } else {
        $(".show2").addClass( "none2" );
   }

     if (val == 'Hot pastries') {
        $(".show3").removeClass( "none3" );
        $("select.food.menu3").removeAttr( "disabled");
    } else {
        $(".show3").addClass( "none3" );
    }

     if (val == 'Side dishes') {
        $(".show4").removeClass( "none4" );
        $("select.food.menu4").removeAttr( "disabled");
    } else {
        $(".show4").addClass( "none4" );
      }

     if (val == 'Main dish') {
        $(".show5").removeClass( "none5" );
        $("select.food.menu5").removeAttr( "disabled");

    }  else {
        $(".show5").addClass( "none5" );
   }
     if (val == 'Sweets') {
        $(".show6").removeClass( "none6" );
        $("select.food.menu6").removeAttr( "disabled");

    } else {
        $(".show6").addClass( "none6" );
   }

   $('select.food').selectpicker('refresh');


})
$("select.cat").change();



</script>
@endsection
















