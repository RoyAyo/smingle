@extends('layouts.myapp')

@section('content')

	<div class="container-fluid">
		<div class="card" >
			<div class="card-header" style="font-weight: bold;font-size: 13pt;">Host your own party</div>
			<div class="card-body" style="padding: 0rem 1rem">
				<form role="form" action="{{ route('event.storeparty') }}" method="POST" enctype="multipart/form-data">
					@csrf

					<div class="form-group">
						<label for="event_name" class="col-form-label">Event Name</label>
						<input type="text" name="event_name" id="event_name" class="form-control" value="{{ old('event_name') }}">
					</div>
					<div class="form-group">
						<label for="host_name" class="col-form-label">Host Name</label>
						<input type="text" name="host_name" id="host_name" class="form-control" value="{{old('host_name')}}">
					</div>
					<div class="form-group">
						<label for="event_date" class="col-form-label">Host Contact</label>
						<input type="text" name="host_contact" id="host_contact" class="form-control" value="{{old('host_contact')}}" placeholder="Contact For More Info...">
					</div>
					<div class="form-group">
						<label for="venue" class="col-form-label">Venue</label>
						<input type="text" name="venue" id="venue" class="form-control" value="{{old('venue')}}">
					</div>
					<div class="form-group">
						<label for="event_date" class="col-form-label">Event Date</label>
						<input type="date" name="event_date" id="event_date" class="form-control" value="{{old('event_date')}}" min="{{date('Y-m-d')}}">
					</div>
					<div class="form-group">
						<label for="about" class="col-form-label">Brief Event Description</label>
						<textarea class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }}" rows="5" name="about">{{old('about')}}</textarea>
						@if ($errors->has('about'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('about') }}</strong>
		                    </span>
			            @endif
					</div>
					<div class="form-group">
			            <label for="event_avatar">{{ __('Display Picture') }}</label>
			            <div>
			                <input type="file" name="event_avatar" id="event_avatar" class="form-control{{ $errors->has('event_avatar') ? ' is-invalid' : '' }}" required >
			                @if ($errors->has('event_avatar'))
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $errors->first('event_avatar') }}</strong>
			                    </span>
			                @endif
			            </div>
			        </div>
					<button class="btn btn-info" type="submit">Host Party</button>
				</form>
			</div>
		</div>
	</div>

@endsection