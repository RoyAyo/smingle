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
						<h2 class="event-date"> -) {{ $event->event_name }} <span class="event_going" style="float: right;"> <button class="btn btn-default attend_event" attend="{{ $att == 1 ? 1 : 0 }}" ide='{{$event->id}}'> {{ $att == 1 ? 'Unattend' : 'Attend' }} </button> </span></h2>
						<center>
							<p class="event-avatar"> <img src="{{ asset('images/uploads/1.jpg') }}"> </p>
						</center>
						<h4 class="event-name"> Hosted By: {{$event->host_name}} </h4>
						<h4 class="event-name"> Date: {{$event->event_time}} </h4>
						<h4 class="event-name"> Venue: {{$event->venue}} </h4>
						<h4 class="event-name"> About: {{$event->about}} </h4>
						<h4 class="event-name event_going_{{$event->id}}" attending={{$event->users_going}}> Users Going: {{ $event->users_going }} </h4>
<!-- 						<h4 class="event-name"> Attending: {{ $event->attending }} </h4> -->
						@if($event->users_going > 1)
							<button class="btn btn-default btn-lg match"><a href="#"> Find Match For Event </a></button>
						@endif
					</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection