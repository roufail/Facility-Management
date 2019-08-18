<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="table-responsive">
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

                                @if(trim($transportation->type) != "")
                                <strong>Transportation</strong>
                                <p class="color-small">{{ $transportation->type }}</p>
                                @endif

                                @if(trim($transportation->location_from) != "" || trim($transportation->location_to) != "")
                                <div class="row">
                                    @if(trim($transportation->location_from) != "")
                                    <div class="col-md-6">
                                        <strong class="font-small color-small">
                                            <i class="ti-map-alt pr-5 style-t pr-5 color-style "></i>
                                            Location From :</strong > {{ $transportation->location_from }}
                                    </div>
                                    @endif

                                    @if(trim($transportation->location_to) != "")
                                    <div class="col-md-6">
                                        <strong class="font-small color-small">
                                            <i class="ti-location-pin pr-5 style-t pr-5 color-style"></i>
                                            Location To :</strong> {{ $transportation->location_to }}
                                    </div>
                                    @endif
                                </div>
                                @endif


                                <div class="row">
                                    @if(trim($transportation->passengers) != "")
                                    <div class="col-md-6">
                                        <strong class="font-small color-small">
                                            <i class="fa fa-users pr-5 style-t pr-5 color-style"></i>
                                            Number of passengers :</strong>
                                            {{ $transportation->passengers }}
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
                                            {{ $transportation->frequency }}
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

                            <td class="td-number td-quantity">

                                <div class="btn-group">
                                    <a href="{{ route('event.delete_transportations',['id' => $transportation->id]) }}" class="delete-button btn btn-sm">
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
