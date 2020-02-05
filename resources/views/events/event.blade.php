@extends('layouts.myapp')

@section('content')
<div class="error">
    @if($errors->has('avatar'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('avatar') }}</strong>
        </span>
    @endif
</div>
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
        <h5> Attending: <span style="font-weight: bold;">{{ $att == '0' ? 'No' : 'Yes' }}</span> </h5>
        <hr>
         @if($event->users_going > 1 and $att == 1)
            <span class="btn btn-outline-success btn-block btn-lg" style="width: 100%;"><a href="{{ route('event.filter',['id'=>$event->id]) }}" > Find Match For Event </a></span>
            <hr>
        @endif
        <form action="{{route('event.attend',['id'=>$event->id])}}" method="POST">
            @csrf
            <button class="btn btn-outline-primary btn-block btn-lg" style="width: 100%" type="submit"> {{ $att == 1 ? 'Unattend Event' :'Attend Event' }}</button>
        </form>
        @if($hosted)
            <hr>
            <a class="btn btn-outline-danger btn-block btn-lg" style="width: 100%" type="submit" href="{{ route('event.edit',['id'=>$event->id]) }}"> Edit Event</a>
            <hr>
            <a data-target="#eventdp" data-toggle='modal' class="btn btn-outline-info btn-block btn-lg" style="width: 100%" type="submit"> Change Dp</a>
            <hr>
        @endif
    </div>
</div>
<div class="modal fade" id="eventdp" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Event Display</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form" action="{{route('eventdp',['id'=>$event->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="avatar" id="avatar" required/><br><br>
                    <button type="submit" class="btn btn-outline-success">Change</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection