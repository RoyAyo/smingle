@extends('layouts.myapp')

@section('content')

	<div class="container">
		<div class="">
			<div id="all-events">
				@if($events->count() == 0)
					<div>
						<h3 style="font-weight: bold;">There are currently no events at this time</h3>
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
						<h4 class="event-name"> Users Going: {{ $event->users_going}} </h4>
						<h4 class="event-name"> Verified: {{$event->verified}} </h4>
						<h4 class="event-name"> Attending: No </h4>
						<button class="btn btn-default btn-lg verify" verified='{{ $event->verified == 0 ? 0:1 }}' ide="{{ $event->id }}">{{ $event->verified == 0 ? 'Verify' : 'Unverify' }}  </button>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection