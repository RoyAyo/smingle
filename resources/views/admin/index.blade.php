@extends('layouts.myapp')

@section('content')

	<div class="container">
		<div class="panel bg-white" style="min-height: calc(100vh - 58px);>
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
					<div class="event" style="padding-left: 0.4rem;">
						<h2 class="event-date"> -) {{$event->event_time}} </h2>
						<center>
							<p class="event-avatar"> <img src="{{ asset('images/uploads/1.jpg') }}"> </p>
						</center>
						<h4 class="event-name"> <a href="{{ route('event',['id' => $event->id]) }}"> {{ $event->event_name }} </a></h4>
					</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection