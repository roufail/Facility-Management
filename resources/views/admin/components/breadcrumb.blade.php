<ul class="nav nav-pills">
    @if(isset($event->status))

    <li class="{{ Request::routeIs('events.create') || Request::routeIs('event.edit') ? 'active' : '' }}" style="width: 20%;"><a class="responsave-ul" href="{{ route('event.edit', ['id' => $event->id]) }}"><i class="ti-info style-w"></i>  Event Information</a></li>
    <li class="{{ Request::routeIs('event.create_caterings') ? 'active' : '' }}" style="width: 20%;"><a class="responsave-ul" href="{{ route('event.create_caterings', ['id' => $event->id]) }}"><i class="fa fa-cutlery style style-w"></i>  Catering</a></li>
    <li class="{{ Request::routeIs('event.create_transportations') ? 'active' : '' }}" style="width: 20%;"><a class="responsave-ul" href="{{ route('event.create_transportations', ['id' => $event->id]) }}"><i class="ti-car style-w"></i>  Transportation</a></li>
    <li class="{{ Request::routeIs('event.create_hotels') ? 'active' : '' }}" style="width: 20%;"><a class="responsave-ul" href="{{ route('event.create_hotels', ['id' => $event->id]) }}"><i class="fa fa-building-o style-w"></i>  Hotel Services</a></li>
    <li class="{{ Request::routeIs('event.create_maintenances') ? 'active' : '' }}" style="width: 20%;"><a class="responsave-ul" href="{{ route('event.create_maintenances', ['id' => $event->id]) }}"><i class="fa fa-wrench style style-w"></i>  Maintenance Support</a></li>

    @else

    <li class="{{ Request::routeIs('events.create') || Request::routeIs('event.edit') ? 'active' : '' }}" style="width: 20%;"><a class="responsave-ul" href="javascript:;"><i class="ti-info style-w"></i>  Event Information</a></li>
    <li class="disabled" style="width: 20%;"><a class="responsave-ul" href="javascript:;"><i class="fa fa-cutlery style style-w"></i>  Catering</a></li>
    <li class="disabled" style="width: 20%;"><a class="responsave-ul" href="javascript:;"><i class="ti-car style-w" ></i>  Transportation</a></li>
    <li class="disabled" style="width: 20%;"><a class="responsave-ul" href="javascript:;"><i class="fa fa-building-o  style style-w"></i>  Hotel Services</a></li>
    <li class="disabled" style="width: 20%;"><a class="responsave-ul" href="javascript:;"><i class="fa fa-wrench style style-w"></i>  Maintenance Support</a></li>

    @endif
</ul>
