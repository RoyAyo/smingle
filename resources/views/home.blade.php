@extends('layouts.myapp')

@section('content')
<div class="container-fluid" style="padding-top: 20px;" id="homepage">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body">
                	@foreach($Notifications as $Notification)
                		<div class="card" style="padding: 0.7rem;margin-bottom: 0.3rem;">
                            <p>
                                @if($Notification->notification_type == 1)
                                    You were Matched with <a href="{{route('user',['id' => $Notification->other_name])}}">{{'@'.$Notification->other_name}}</a>
                                @elseif($Notification->notification_type == 2)
                                    <a href="{{route('user',['id' => $Notification->other_name])}}">{{'@'.$Notification->other_name}}</a> was matched with you
                                @elseif($Notification->notification_type == 4)
                                    <a href="{{route('user',['id' => $Notification->other_name])}}">{{'@'.$Notification->other_name}}</a> was matched with you for the event <a href="{{ route('event.id',['id'=>$Notification->event]) }}">{{$Notification->event_name}}</a>
                                @else
                                    You were Matched with <a href="{{route('user',['id' => $Notification->other_name])}}">{{'@'.$Notification->other_name}}</a> for the event <a href="{{ route('event.id',['id'=>$Notification->event]) }}">{{$Notification->event_name}}</a>
                                @endif
                                <span id="not-time">{{ $Notification->created_at->diffForHumans() }}</span>
                            </p>
                        </div>
                	@endforeach
                </div>
                <div style="display: flex;justify-content: center;">
                    {{$Notifications->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection