@extends('layouts.myapp')

@section('content')
	<div class="container">
		<div class="bg-white">
			<div id="all-events">
				@if($events->count() == 0)
					<div class="panel" style="height: calc(100vh - 58px)">
						
					</div>
				@endif
				@foreach($events as $event)
					<div class="card" style="margin-bottom: 0.3rem;">
						<a href="{{ route('event.id',['id' => $event->id]) }}" style="display: block;"> 
						<div class="card-header">
							<h4 style="font-weight: bold;"> {{ $event->event_name }}</h4>
						</div>
						<div class="card-body">
							<span style="float: right;position: relative;bottom: 13px;font-size: 40px;">&#8250</span>
							<span>
							<h6>Hosted By: {{$event->host_name}}</h6>
							<h6> Date: {{$event->event_date}} </h6>
							</span>
						</div>
						</a>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection