@extends('layouts.myapp')

@section('content')

	<div class="container">
		<div class="">
			<div id="all-events">
				Total unverified = <span style="font-weight: bold;color: red">{{ $unverified }}</span> out of <span style="font-weight: bold;color: red;">{{$total}}</span> events
				@if($events->count() == 0)
					<div>
						<h3 style="font-weight: bold;">.....</h3>
					</div>
				@endif
				@foreach($events as $event)
					<div class="event card" style="padding-left: 0.4rem;margin-bottom: 0.5rem;">
						<h5 class="event-name"> -){{ $event->event_name }}</h5>
						<center>
							<p class="event-avatar"> <img src="{{ asset($event->event_avatar) }}"> </p>
						</center>
						<h6> Hosted By: {{$event->host_name}} </h6>
						<h6> Date: {{$event->event_date}} </h6>
						<h6> Venue: {{$event->venue}} </h6>
						<h6> About: {{$event->about}} </h6>
						<h6> Contact: {{$event->host_contact}} </h6>
						<h6> Users Going: {{ $event->users_going}} </h6>
						<h6> Verified: {{$event->verified}} </h6>
						<h6> Attending: No </h6>
						<form method="POST" action="{{ route('event.verify',['id'=>$event->id]) }}">
							@csrf
							<input type="hidden" name="verified" value="{{ $event->verified == 0 ? '1' : '0' }}">
							<button class="btn btn-block btn-outline-danger btn-sm verify" type="submit">{{ $event->verified == 0 ? 'Verify' : 'Unverify' }} </button>
							<hr>
						</form>
						<button class="btn btn-outline-danger btn-sm btn-block" id="delevent">Delete Event</button>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection