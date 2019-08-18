@extends('admin.layouts.master')
@section('page_title',"Events list")
@section('page_heading',"Events List")

@section('page_content')
   @include('admin.components.info_messages')
   @if($events->count() > 0)
      @foreach ($events as $event)
         @include('admin.components.event_widget')
      @endforeach

      {{  $events->render() }}
   @else 
      No events found
   @endif
@endsection

@section('extra_js')
<!-- Append events js files -->
   <script src="{{ asset("admin_assets/js/events.js") }}"></script>
@endsection
