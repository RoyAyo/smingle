@extends('layouts.myapp')

@section('content')

	<form action="{{ route('match.check') }}" method="POST" style="padding-top: 1rem;">
		@csrf

        <div class="form-group row">
            <label for="based_on" class="col-md-4 col-form-label text-md-right">{{ __('Based On') }}</label>

            <div class="col-md-6">
                <select id="filter_based_on" class="form-control{{ $errors->has('based_on') ? ' is-invalid' : '' }}" name="based_on" value="1" autofocus>
                    <option value="relationships"> Default </option>
                    <option value="generals"> General </option>
                    <option value="movies"> Movies </option>
                    <option value="musics"> Music </option>
                    <option value="relationships"> Relationship </option>
                    <option value="careers"> Career </option>
                </select>

                @if ($errors->has('based_on'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('based_on') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age Range') }}</label>

            <div class="col-md-6">
                <select id="filter_age" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="1" autofocus>
                	<option value="0"> Indifferent </option>
                	<option value="1"> 15-18 </option>
                	<option value="2"> 19-23 </option>
                	<option value="3"> 24-29 </option>
                	<option value="4"> 29-32 </option>
                	<option value="5"> >32 </option>
                </select>

                @if ($errors->has('age'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('age') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

            <div class="col-md-6">
                <input type="text" name="location" id="filter_location" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" value="{{ isset($filter) ? $filter->location : '' }}" >
                @if ($errors->has('location'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('location') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="Religion" class="col-md-4 col-form-label text-md-right">{{ __('Religion') }}</label>

            <div class="col-md-6">
                <select id="filter_religion" class="form-control{{ $errors->has('religion') ? ' is-invalid' : '' }}" name="religion" value="{{ old('religion') }}" >
                	<option value="0"> Indifferent </option>
                	<option value="1"> Christain </option>
                	<option value="2"> Muslim </option>
                	<option value="3"> Traditional </option>
                	<option value="4"> Others </option>
                </select>

                @if ($errors->has('religion'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('religion') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="r_status" class="col-md-4 col-form-label text-md-right">{{ __('Relationship Status') }}</label>

            <div class="col-md-6">
                <select id="filter_r_status" class="form-control{{ $errors->has('r_status') ? ' is-invalid' : '' }}" name="r_status" value="{{ old('r_status') }}">
                	<option value="0"> Indifferent </option>
                	<option value="1"> Single </option>
                	<option value="2"> Married </option>
                	<option value="3"> Complicated </option>
                	<option value="4"> Divorced </option>
                </select>

                @if ($errors->has('r_status'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('r_status') }}</strong>
                    </span>
                @endif
            </div>
        </div>
		<div class="form-group row">
            <label for="m_status" class="col-md-4 col-form-label text-md-right">{{ __('Money Status') }}</label>

            <div class="col-md-6">
                <select id="filter_m_status" class="form-control{{ $errors->has('m_status') ? ' is-invalid' : '' }}" name="m_status" value="{{ old('m_status') }}" >
                	<option value="0"> Indifferent </option>
                	<option value="1"> Broke asf </option>
                	<option value="2"> Broke </option>
                	<option value="3"> Fair </option>
                	<option value="4"> Rich </option>
                	<option value="5"> Rich asf </option>
                </select>

                @if ($errors->has('m_status'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('m_status') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('Height Range') }}</label>

            <div class="col-md-6">
                <select id="filter_height" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{ old('height') }}">
                	<option value="0"> Indifferent </option>
                	<option value="1"> 5"0 - 5"5 </option>
                	<option value="2"> 5"6 - 5"8 </option>
                	<option value="3"> 5"9 - 5"11 </option>
                	<option value="4"> 6"0 - 6"3 </option>
                	<option value="5"> >6"3 </option>
                </select>

                @if ($errors->has('height'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('height') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="need" class="col-md-4 col-form-label text-md-right">{{ __('Looking For') }}</label>

            <div class="col-md-6">
                <select id="filter_need" class="form-control{{ $errors->has('need') ? ' is-invalid' : '' }}" name="need" value="{{ old('need') }}">
                	<option value="0"> Indifferent </option>
                    <option value="1"> Friends </option>
                    <option value="2"> Relationship </option>
                    <option value="3"> Fun </option>
                    <option value="4"> Something Causual </option>
                    <option value="5"> Neutral </option>
                </select>

                @if ($errors->has('need'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('need') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group row">
            <label for="need" class="col-md-4 col-form-label text-md-right">{{ __('Student') }}</label>

            <div class="col-md-6">
                <select id="filter_student" class="form-control{{ $errors->has('student') ? ' is-invalid' : '' }}" name="student" >
                	<option value="2"> Indifferent </option>
                    <option value="1"> Yes </option>
                    <option value="0"> No </option>
                </select>

                @if ($errors->has('student'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('student') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div id="studentship">
            <div class="form-group row">
                <label for="school" class="col-md-4 col-form-label text-md-right">{{ __('School') }}</label>

                <div class="col-md-6">
                    <input type="text" name="school" id="filter_school" class="form-control{{ $errors->has('school') ? ' is-invalid' : '' }}" value="{{ isset($filter) ? $filter->school : '' }}" >
                    @if ($errors->has('school'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('school') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="course" class="col-md-4 col-form-label text-md-right">{{ __('Course') }}</label>

                <div class="col-md-6">
                    <input type="text" name="course" id="filter_course" class="form-control{{ $errors->has('course') ? ' is-invalid' : '' }}" value="{{ isset($filter) ? $filter->course : '' }}" >
                    @if ($errors->has('course'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('course') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('level') }}</label>

                <div class="col-md-6">
                    <select id="filter_level" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{ old('level') }}" >
                        <option value="0"> Indifferent </option>
                        <option value="1"> 100 </option>
                        <option value="2"> 200 </option>
                        <option value="3"> 300 </option>
                        <option value="4"> 400 </option>
                        <option value="5"> 500 </option>
                        <option value="6"> Masters </option>
                        <option value="6"> Ph.D </option>
                    </select>

                    @if ($errors->has('level'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('level') }}</strong>
                        </span>
                    @endif
                </div>
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
@endsection