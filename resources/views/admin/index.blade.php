@extends('layouts.myapp')

@section('content')

	<div class="container">
		<div class="">
			<div id="all-events">
				Total unverified = <span style="font-weight: bold;color: red">{{ $unverified }}</span> out of <span style="font-weight: bold;color: red;">{{$total}}</span> events
				<button> 
					<a class="btn btn-lg btn-danger" href="">Delete Outdated Events</a>
				</button>
				@if($events->count() == 0)
					<div>
						<h3 style="font-weight: bold;">.....</h3>
					</div>
				@endif
				@foreach($events as $event)
					<div class="event card" style="padding-left: 0.4rem;margin-bottom: 0.5rem;">
						<h2 class="event-date"> -){{ $event->event_name }}</h2>
						<center>
							<p class="event-avatar"> <img src="{{ asset('images/uploads/1.jpg') }}"> </p>
						</center>
						<h4 class="event-name"> Hosted By: {{$event->host_name}} </h4>
						<h4 class="event-name"> Date: {{$event->event_time}} </h4>
						<h4 class="event-name"> Venue: {{$event->venue}} </h4>
						<h4 class="event-name"> About: {{$event->about}} </h4>
						<h4 class="event-name"> Contact: {{$event->host_contact}} </h4>
						<h4 class="event-name"> Users Going: {{ $event->users_going}} </h4>
						<h4 class="event-name"> Verified: {{$event->verified}} </h4>
						<h4 class="event-name"> Attending: No </h4>
						<form method="POST" action="{{ route('event.verify',['id'=>$event->id]) }}">
							@csrf
							<input type="hidden" name="verified" value="{{ $event->verified == 0 ? '1' : '0' }}">
							<button class="btn btn-block btn-outline-danger btn-lg verify" type="submit">{{ $event->verified == 0 ? 'Verify' : 'Unverify' }} </button>
						</form>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection