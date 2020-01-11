@extends('layouts.myapp')

@section('content')
<div class="jumbo"></div>
<div class="details">
    <h3>{{ $event->name }}</h3>
</div>
<div class="bio">
    <div>
        <center>
            <h4 class="event-name" style="font-variant: small-caps;"> {{$event->event_name}} </h4>
            <h4 class="event-name"> {{$event->event_date}} </h4>
        </center>
    <div class="content" style="font-size: 14pt;">
        <pre style="font-weight: bold;font-family: serif;font-size: 14pt;">{{ $event->about }}</pre>
    </div>
        <h4 class="event-name"> Hosted By: {{$event->host_name}}</h4>
        <h4 class="event-name"> Venue: {{$event->venue}} </h4>
        <h4 class="event-name"> Users Going: {{ $event->users_going }} </h4>
        <h4 class="event-name"> Attending: {{ $att }} </h4>
         @if($event->users_going > 1 and $event->attending = 1)
            <button class="btn btn-default btn-lg event_match" style="width: 100%;"><a href="#"> Find Match For Event </a></button>
        @endif
        <br><br>
        <button class="btn btn-default btn-lg attend_event" attend="{{ $att == 1 ? 1 : 0 }}" ide='{{$event->id}}' style="width: 100%"> {{ $att == 1 ? 'Unattend Event' : 'Attend Event' }} </button>

    </div>
</div>
@endsection