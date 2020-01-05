@extends('layouts.myapp')

@section('content')

	<div class="container">
		<div class="bg-white">
			<div class="small-btn" style="text-align: right;">
				<a href="{{ route('event.create') }}" id="create-event" class="btn btn-default btn-lg">Add new event</a>
			</div>
			<div id="all-events">
				@if($events->count() == 0)
					<div>
						<h3 style="font-weight: bold;">There are currently no events at this time</h3>
					</div>
				@endif
				@foreach($events as $event)
					<div class="event card" style="padding-left: 0.4rem;margin-bottom: 0.5rem;">
						<h2 class="event-date"> -)<a href="{{ route('event',['id' => $event->id]) }}"> {{ $event->event_name }} </a> <span class="event_going" style="float: right;"> <button class="btn btn-info btn-sm"> Going </button> </span></h2>
						<center>
							<p class="event-avatar"> <img src="{{ asset('images/uploads/1.jpg') }}"> </p>
						</center>
						<h4 class="event-name"> Hosted By: {{$event->host_name}} </h4>
						<h4 class="event-name"> Date: {{$event->event_time}} </h4>
						<h4 class="event-name"> Venue: {{$event->venue}} </h4>
						<h4 class="event-name"> About: {{$event->about}} </h4>
						<h4 class="event-name"> Users Going: 4 </h4>
						<h4 class="event-name"> Attending: No </h4>
						<button class="btn btn-default btn-lg match"> Find Match For Event </button>
					</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection