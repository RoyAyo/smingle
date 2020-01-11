@extends('layouts.myapp')

@section('content')
<div class="jumbo"></div>
<div class="details">
    <h3>{{ $event->name }}</h3>
</div>
<div class="bio">
    <div class="content" style="font-size: 14pt;">
        <p>{{ event->about }}</p>
        <p>{{ event->category == 1 ? 'SHOW':'PARTY' }}</p>
    </div>
    <div>
        <h4 class="event-name"><a href="{{ route('event.id',['id' => $event->id]) }}"> Hosted By: {{$event->host_name}} </a></h4>
        <h4 class="event-name"> Date: {{$event->event_time}} </h4>
        <h4 class="event-name"> Venue: {{$event->venue}} </h4>
        <h4 class="event-name"> Users Going: {{ $event->users_going }} </h4>
        <h4 class="event-name"> Attending: {{ $event->attending }} </h4>
        <button class="btn btn-default btn-large attend_event" attend="{{ $att == 1 ? 1 : 0 }}" ide='{{$event->id}}'> {{ $att == 1 ? 'Unattend Event' : 'Attend Event' }} </button>
        @if($event->users_going > 1 and $event->attending = 1)
            <button class="btn btn-default btn-lg match"><a href="#"> Find Match For Event </a></button>
        @endif
    </div>
    <div class="event_attenders">
        <p><a href="#">John Doe</a></p>
        <p><a href="#">John Doe</a></p>
        <p><a href="#">John Doe</a></p>
        <p><a href="#">John Doe</a></p>
        <p><a href="#">John Doe</a></p>
        <p><a href="#">John Doe</a></p>
        <p><a href="#">John Doe</a></p>
        <p><a href="#">John Doe</a></p>
    </div>
</div>
@endsection