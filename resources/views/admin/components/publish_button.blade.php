@if(isset($event))
    @if($event->status == "draft")
        {{ Form::submit('Publish Event' ,array("class"=>'btn btn-info btn-fill btn-wd btn-next','value' => 'publish','name'=>'action')) }}
    @endif
@endif
