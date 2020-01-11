@extends('layouts.myapp')

@section('content')

	<div class="container">
		<div class="bg-white">
			<div id="all-events">
				@if($events->count() == 0)
					<div>
						<h3 style="font-weight: bold;">There are currently no events at this time</h3>
					</div>
				@endif
				@foreach($events as $event)
					<?php 
						$at = $attend->where('event_id',$event->id);
						if ($at->count() > 0) {
							$att = $at->first()->attending == '1' ? 1 : 0;
						}else{
							$att = 0;
						}
					 ?>
					<div class="event card" style="padding-left: 0.4rem;margin-bottom: 0.5rem;">
						<h2 class="event-date"> -) {{ $event->event_name }}</h2>
						<center>
							<p class="event-avatar"> <img src="{{ asset('images/uploads/3.jpg') }}"> </p>
						</center>
						<h4 class="event-name"><a href="{{ route('event.id',['id' => $event->id]) }}"> Hosted By: {{$event->host_name}} </a></h4>
						<h4 class="event-name"> Date: {{$event->event_time}} </h4>
					</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection