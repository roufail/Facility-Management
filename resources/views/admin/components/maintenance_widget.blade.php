<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-shopping">
                    <tbody>
                        <tr>
                            <td>
                                <div class="img-container">
                                    @if($maintenance->type == "Janitors")
                                        <img src="{{ asset('admin_assets/img/request/services/Janitors.jpg') }}" alt="Agenda">
                                    @elseif($maintenance->type == "Maintenance")
                                        <img src="{{ asset('admin_assets/img/request/services/maintenance.jpg') }}" alt="Agenda">
                                    @endif
                                </div>
                            </td>
                            <td class="td-product">

                                @if(trim($maintenance->type) != "")
                                    <strong>Type of Service</strong>
                                    <p class="color-small">{{ $maintenance->type }}</p>
                                @endif


                                <div class="row">

                                    @if(trim($maintenance->room_type) != "")
                                    <div class="col-md-6">
                                        <strong class="font-small color-small">
                                            <i class="fa fa-bed pr-5 style-t pr-5 color-style"></i>Type of Room :</strong>
                                            {{ $maintenance->room_type }}
                                    </div>
                                    @endif

                                    @if(trim($maintenance->date) != "")
                                    <div class="col-md-6">
                                        <strong class="font-small color-small">
                                            <i class="fa fa-calendar pr-5 style-t pr-5 color-style "></i>Date :</strong>
                                            {{ date('d M,Y', strtotime($maintenance->date)) }}
                                    </div>
                                    @endif
                                </div>

                                <div class="row">
                                    @if(trim($maintenance->time_from) != "")
                                    <div class="col-md-6">
                                        <strong class="font-small color-small">
                                            <i class="fa fa-clock-o pr-5 style-t pr-5 color-style "></i>
                                            Time From :</strong >
                                            {{ date('H:i', strtotime($maintenance->time_from)) }}
                                    </div>
                                    @endif

                                    @if(trim($maintenance->time_to) != "")
                                    <div class="col-md-6">
                                        <strong class="font-small color-small">
                                            <i class="ti-alarm-clock pr-5 style-t pr-5 color-style"></i>
                                            Time To :</strong>
                                            {{ date('H:i', strtotime($maintenance->time_to)) }}
                                    </div>
                                    @endif

                                </div>





                                @if(trim($maintenance->frequency) != "")
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong class="font-small color-small">
                                        <i class="fa fa-bullseye pr-5 style-t pr-5 color-style"></i>
                                        Frequency :</strong>
                                        {{ $maintenance->frequency }}
                                    </div>
                                </div>
                                @endif

                                @if(trim($maintenance->attachment) != "")
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong class="font-small color-small">
                                            <i class="fa fa-file pr-5 style-t pr-5 color-style"></i>
                                            Attachment :</strong> <a download href="{{asset('attachments/'.$maintenance->attachment) }}" target="blank" style="color:#484541">Download</a>

                                    </div>
                                    </div>
                                    @endif

                                @if(trim($maintenance->description) != "")
                                <strong class="font-small color-small">
                                    <i class="fa fa-bullseye pr-5 style-t pr-5 color-style "></i>
                                    Description :</strong>
                                    {{ $maintenance->description }}
                                @endif
                            </td>

                            <td class="td-number td-quantity">

                                <div class="btn-group">
                                    <a href="{{ route('event.delete_maintenances',['id' => $maintenance->id]) }}" class="delete-button btn btn-sm">
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
