@extends('layouts.myapp')

@section('content')
<div class="jumbo" style="background-image: url( {{ asset($event->event_avatar) }} );"></div>
<div class="bio">
    <div>
        <center>
            <h3 class="event-name" style="font-variant: small-caps;font-weight: bolder;"> {{$event->event_name}} </h3>
            <h6 style="font-weight: bolder;"> Party </h6>
        </center>
    <div class="content" style="font-size: 14pt;">
        <pre style="font-weight: bold;font-family: serif;font-size: 14pt;">{{ $event->about }}</pre>
        <hr>
    </div>
        <h5 class="event-name">Date:<span style="font-weight: bold;"> {{$event->event_date}} ({{Carbon\Carbon::parse($event->event_date)->diffForHumans()}}) </span></h5>
        <hr>
        <h5> Hosted By: <span style="font-weight: bold;">{{$event->host_name}}</span></h5>
        <hr>
        <h5> Venue: <span style="font-weight: bold;">{{$event->venue}}</span> </h5>
        <hr>
        <h5> Users Going: <span style="font-weight: bold;">{{ $event->users_going }}</span> </h5>
        <hr>
        <h5> Attending: <span style="font-weight: bold;">{{ $att }}</span> </h5>
        <hr>
         @if($event->users_going > 1 and $att == 1)
            <span class="btn btn-outline-success btn-block btn-lg" style="width: 100%;"><a href="{{ route('event.filter',['id'=>$event->id]) }}" > Find Match For Event </a></span>
            <hr>
        @endif
        <form action="{{route('event.attend',['id'=>$event->id])}}" method="POST">
            @csrf
            <button class="btn btn-outline-primary btn-block btn-lg" style="width: 100%" type="submit"> {{ $att == 1 ? 'Unattend Event' :'Attend Event' }}</button>
        </form>
    </div>
</div>
@endsection