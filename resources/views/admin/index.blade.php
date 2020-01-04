@extends('layouts.myapp')

@section('content')

	<div class="container">
		<div class="card" style="height: calc(100vh - 58px);">
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
					<div class="events">
						<img src="{{ asset('images/uploads/events/'.$event->avatar) }}" class="event-img img">
						<p class="event-name">{{ $event->name }}</p>
						<p class="event-hostname">Hosted by : {{ $event->host_name }}</p>
						<p class="event-hostname">About : {{ $event->host_about }}</p>
						<input type="checkbox" id="valevent" value="verified">
					</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection