@extends('layouts.myapp')

@section('content')

	<div class="container">
		<div class="card" style="height: calc(100vh - 58px);">
			<form role="form" action="{{ route('event.store') }}" method="POST">
				@csrf

				<div class="form-group">
					<label for="event_name" class="col-form-label">Event Name</label>
					<input type="text" name="event_name" id="event_name" class="form-control">
				</div>
				<div class="form-group">
					<label for="host_name" class="col-form-label">Host Name</label>
					<input type="text" name="host_name" id="host_name" class="form-control">
				</div>
				<div class="form-group">
					<label for="venue" class="col-form-label">Venue</label>
					<input type="text" name="venue" id="venue" class="form-control">
				</div>
				<div class="form-group">
					<label for="event_time" class="col-form-label">Event Date</label>
					<input type="date" name="event_time" id="event_time" class="form-control">
				</div>
				<div class="form-group">
					<label for="about" class="col-form-label">Brief Event Description</label>
					<textarea class="form-control" rows="5" name="about"></textarea>
				</div>
				<button class="btn btn-info" type="submit">Submit</button>
			</form>
		</div>
	</div>

@endsection