@extends('layouts.app')

@section('content')
	
	<div style="padding-left:0.5rem; ">
		<form action="{{ route('cluster.cluster') }}" method="POST">
			@csrf
			    <div class="form-group row">
		            <label for="cluster" class="col-md-4 col-form-label text-md-right">{{ __('Which best describes you?') }}</label>

		            <div class="col-md-6">
		                <select id="cluster" class="form-control{{ $errors->has('cluster') ? ' is-invalid' : '' }}" name="cluster" value="{{ old('cluster') }}" >
		                	<option value="1" {{ $user->cluster==1? 'selected':'' }}> Parte after parte </option>
		                	<option value="2" {{ $user->cluster==2? 'selected':'' }}> Extrovert </option>
		                	<option value="3" {{ $user->cluster==3? 'selected':'' }}> Introvert </option>
		                	<option value="4" {{ $user->cluster==4? 'selected':'' }}> Lonely/Depressed </option>
		                </select>

		                @if ($errors->has('cluster'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('cluster') }}</strong>
		                    </span>
		                @endif
            		</div>
        		</div>
        		<div class="form-group row">
		            <label for="about" class="col-md-4 col-form-label text-md-right">{{ __('About You?') }}</label>

		            <div class="col-md-6">
		            	<textarea name="about" class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }}" rows="5" required>{{is_null($user->about)? '':$user->about}}</textarea>
		                @if ($errors->has('about'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('about') }}</strong>
		                    </span>
		                @endif
            		</div>
        		</div>
	       	<div class="form-group row mb-0">
	            <div class="col-md-6 offset-md-4">
	                <button type="submit" class="btn btn-primary" id="find-match-btn">
	                    {{ __('Submit') }}
	                </button>
	            </div>
	        </div>
		</form>
	</div>

@endsection