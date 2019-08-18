<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="table-responsive">
            <table class="table table-shopping">
               <tbody>
                  <tr>
                     <td>
                        <div class="img-container">
                           <!-- {{$catering->menu}} -->
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
                     </td>
                     <td class="td-product">
                        <strong>{{ $catering->type }}</strong>
                        <p class="color-small">{{ $catering->menu }}, {{ $catering->sub_menu }}</p>
                        <div class="row">
                           @if(trim($catering->invites) != "")
                           <div class="col-md-6">
                              <strong class="font-small color-small">
                              <i class="fa fa-users pr-5 style-t pr-5 color-style "></i>
                              Number of invitees :</strong > {{ $catering->invites }}
                           </div>
                           @endif
                           @if(trim($catering->date) != "")
                           <div class="col-md-6">
                              <strong class="font-small color-small">
                              <i class="fa fa-calendar-check-o pr-5 style-t pr-5 color-style"></i>
                              Date of Serve :</strong>
                              {{ date('d M,Y', strtotime($catering->date)) }}
                           </div>
                        </div>
                        @endif
                        <div class="row">
                           @if(trim($catering->time) != "")
                           <div class="col-md-6">
                              <strong class="font-small color-small"><i class="ti-alarm-clock pr-5 style-t pr-5 color-style"></i>Time of Serve :</strong>
                              {{ date('H:i', strtotime($catering->time)) }}
                           </div>
                           @endif
                           @if(trim($catering->frequency) != "")
                           <div class="col-md-6">
                              <strong class="font-small color-small"><i class="fa fa-bullseye pr-5 style-t pr-5 color-style "></i>Frequency :</strong>
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
                     <td class="td-number td-quantity">
                        <div class="btn-group">
                           <a href="{{ route('event.delete_caterings',['id' => $catering->id]) }}" class="delete-button btn btn-sm">
                           <i class="fa fa-trash"></i>
                           </a>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <!--  end card  -->
   </div>
   <!-- end col-md-12 -->
</div>
