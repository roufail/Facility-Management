@extends('admin.layouts.master')
@section('page_title',"Approve Events list")
@section('page_heading',"Approve Events List")
@section('page_content')
    @include('admin.components.info_messages')

    @if(($approve_events && $approve_events->count() > 0) || ($all_events && $all_events->count() > 0))

        @if($approve_events && $approve_events->count() > 0)
            <div>
                <h3>Take action</h3>
                @foreach ($approve_events as $event)
                    @include('admin.components.event_widget')
                @endforeach
            </div>
        @endif

        @if($all_events && $all_events->count() > 0)
            <div>
                <h3>All events</h3>
                @foreach ($all_events as $event)
                    @include('admin.components.event_widget')
                @endforeach
                {{ $all_events->render() }}
            </div>
        @endif

    @else

        No events found for approve

    @endif
@endsection

@section('extra_js')
<!-- Append events js files -->
<script src="{{ asset("admin_assets/js/events.js") }}"></script>
@endsection
