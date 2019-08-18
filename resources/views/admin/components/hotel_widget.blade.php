<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="table-responsive">
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
                                        {{ $hotel->room_type }}
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





                                <div class="row">
                                    @if(trim($hotel->frequency) != "")
                                    <div class="col-md-6">
                                        <strong class="font-small color-small">
                                            <i class="fa fa-bullseye pr-5 style-t pr-5 color-style"></i>Frequency :</strong>
                                            {{ $hotel->frequency }}
                                    </div>
                                    @endif

                                    @if(trim($hotel->attachment) != "")
                                    <div class="col-md-6">
                                        <strong class="font-small color-small">
                                            <i class="fa fa-file pr-5 style-t pr-5 color-style"></i>
                                            Attachment :</strong> <a download href="{{asset('attachments/'.$hotel->attachment) }}" target="blank" style="color:#484541">Download</a>

                                    </div>
                                    @endif
                                </div>

                                @if(trim($hotel->comment) != "")
                                <strong class="font-small color-small">
                                    <i class="fa fa-comment pr-5 style-t pr-5 color-style "></i>Comment :</strong>
                                     {{  $hotel->comment }}
                                @endif
                            </td>

                            <td class="td-number td-quantity">

                                <div class="btn-group">
                                    <a href="{{ route('event.delete_hotels',['id' => $hotel->id]) }}" class="delete-button btn btn-sm">
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
<!-- end row -->
