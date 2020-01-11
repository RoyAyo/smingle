@extends('layouts.myapp')

@section('content')

	<div class="container-fluid">
		<div class="card" >
			<div class="card-header" style="font-weight: bold;font-size: 13pt;">Host your own party</div>
			<div class="card-body" style="padding: 0rem 1rem">
				<form role="form" action="{{ route('event.storeparty') }}" method="POST" enctype="">
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
						<label for="event_date" class="col-form-label">Host Contact</label>
						<input type="text" name="contact" id="host_contact" class="form-control" placeholder="Contact For More Info...">
					</div>
					<div class="form-group">
						<label for="host_name" class="col-form-label">Private Party</label>
						<select class="form-control" name="private">
							<option value="1">No</option>
							<option value="0">Yes</option>
						</select>
					</div>
					<div class="form-group">
						<label for="venue" class="col-form-label">Venue</label>
						<input type="text" name="venue" id="venue" class="form-control">
					</div>
					<div class="form-group">
						<label for="event_date" class="col-form-label">Event Date</label>
						<input type="date" name="event_date" id="event_date" class="form-control">
					</div>
					<div class="form-group">
						<label for="about" class="col-form-label">Brief Event Description</label>
						<textarea class="form-control" rows="5" name="about"></textarea>
					</div>
					<!-- <div class="form-group">
						<label for="image">  </label>
					</div> -->
					<button class="btn btn-info" type="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>

@endsection