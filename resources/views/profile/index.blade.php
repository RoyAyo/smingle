@extends('layouts.app')

@section('content')
<div class="card" style="width: 80%;margin: 0 auto;">
    <div class="card-header" style="text-align: center;font-weight: bold;">Your Profile Settings</div>
    <div class="card-body">
    <p style="font-weight: bold;text-align: center;">Note that will people will search for you through these</p>
	<form action="{{ route('profile.update',['id'=> $profile->id]) }}" method="POST">
		@csrf

        <div class="form-group row">
            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age Range') }}</label>

            <div class="col-md-6">
                <select id="age" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}" autofocus>
                	<option value="1" {{ $profile->age==1 ? 'selected':'' }}> 15-18 </option>
                	<option value="2" {{ $profile->age==2 ? 'selected':'' }}> 19-23 </option>
                	<option value="3" {{ $profile->age==3 ? 'selected':'' }}> 24-29 </option>
                	<option value="4" {{ $profile->age==4 ? 'selected':'' }}> 29-32 </option>
                    <option value="5" {{ $profile->age==5? 'selected':'' }}> 32-40 </option>
                	<option value="6" {{ $profile->age==6? 'selected':'' }}> >40 </option>
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
                <input type="text" name="location" id="location" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" value="{{ isset($profile->location) ? $profile->location : '' }}" required >
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
                <select id="religion" class="form-control{{ $errors->has('religion') ? ' is-invalid' : '' }}" name="religion" value="{{ old('religion') }}" >
                	<option value="1" {{ $profile->religion==1? 'selected':'' }}> Christain </option>
                	<option value="2" {{ $profile->religion==2? 'selected':'' }}> Muslim </option>
                	<option value="3" {{ $profile->religion==3? 'selected':'' }}> Traditional </option>
                	<option value="4" {{ $profile->religion==4? 'selected':'' }}> Others </option>
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
                <select id="r_status" class="form-control{{ $errors->has('r_status') ? ' is-invalid' : '' }}" name="r_status" value="{{ old('r_status') }}">
                	<option value="1" {{ $profile->r_status==1? 'selected':'' }}> Single </option>
                	<option value="2" {{ $profile->r_status==2? 'selected':'' }}> Dating </option>
                    <option value="3" {{ $profile->r_status==3? 'selected':'' }}> Complicated </option>
                    <option value="4" {{ $profile->r_status==4? 'selected':'' }}> Married </option>
                    <option value="5" {{ $profile->r_status==5? 'selected':'' }}> Divorced </option>
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
                <select id="m_status" class="form-control{{ $errors->has('m_status') ? ' is-invalid' : '' }}" name="m_status" value="{{ old('m_status') }}" >
                	<option value="1" {{ $profile->m_status==1? 'selected':'' }}> Broke asf </option>
                	<option value="2" {{ $profile->m_status==2? 'selected':'' }}> Broke </option>
                	<option value="3" {{ $profile->m_status==3? 'selected':'' }}> Fair </option>
                	<option value="4" {{ $profile->m_status==4? 'selected':'' }}> Rich </option>
                	<option value="5" {{ $profile->m_status==5? 'selected':'' }}> Rich asf </option>
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
                <select id="height" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{ old('height') }}">
                	<option value="1" {{ $profile->height==1? 'selected':'' }}> 5"0 - 5"5 </option>
                	<option value="2" {{ $profile->height==2? 'selected':'' }}> 5"6 - 5"8 </option>
                	<option value="3" {{ $profile->height==3? 'selected':'' }}> 5"9 - 5"11 </option>
                	<option value="4" {{ $profile->height==4? 'selected':'' }}> 6"0 - 6"3 </option>
                	<option value="5" {{ $profile->height==5? 'selected':'' }}> >6"3 </option>
                </select>

                @if ($errors->has('height'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('height') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="body_shape" class="col-md-4 col-form-label text-md-right">{{ __('Body Shape ') }}</label>

            <div class="col-md-6">
                <select id="body_shape" class="form-control{{ $errors->has('body_shape') ? ' is-invalid' : '' }}" name="body_shape" value="{{ old('body_shape') }}">
                    @if($profile->user()->first()->gender == 1)
                        <option value="1"> Slim </option>
                        <option value="2"> Slim With Packs </option>
                        <option value="3"> Great Build </option>
                        <option value="4"> Muscle Man </option>
                        <option value="5"> Nothing To Show </option>
                        <option value="6"> Thick </option>
                    @else
                        <option value="1"> Slim </option>
                        <option value="2"> Figure 8 </option>
                        <option value="3"> Nothing To Show</option>
                        <option value="4"> Petite </option>
                        <option value="5"> Full Package </option>
                        <option value="6"> Thick </option>
                    @endif
                </select>

                @if ($errors->has('#body_shape'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('#body_shape') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="need" class="col-md-4 col-form-label text-md-right">{{ __('Looking For') }}</label>

            <div class="col-md-6">
                <select id="need" class="form-control{{ $errors->has('need') ? ' is-invalid' : '' }}" name="need" value="{{ old('need') }}">
                    <option value="1" {{ $profile->need==1? 'selected':'' }}> Friends </option>
                    <option value="2" {{ $profile->need==2? 'selected':'' }}> Relationship </option>
                    <option value="3" {{ $profile->need==3? 'selected':'' }}> Fun </option>
                    <option value="4" {{ $profile->need==4? 'selected':'' }}> Something Causual </option>
                    <option value="5" {{ $profile->need==5? 'selected':'' }}> Neutral </option>
                </select>

                @if ($errors->has('need'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('need') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group row">
            <label for="student" class="col-md-4 col-form-label text-md-right">{{ __('Student') }}</label>

            <div class="col-md-6">
                <select id="student" class="form-control{{ $errors->has('student') ? ' is-invalid' : '' }}" name="student" >
                    <option value="0" {{ $profile->student==0? 'selected':'' }}> No </option>
                    <option value="1" {{ $profile->student==1? 'selected':'' }}> Yes </option>
                </select>

                @if ($errors->has('student'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('student') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div id="studentship" style="display: {{ $profile->student==1? 'block':''}}">
            <div class="form-group row">
                <label for="school" class="col-md-4 col-form-label text-md-right">{{ __('School') }}</label>

                <div class="col-md-6">
                    <input type="text" name="school" id="school" class="form-control{{ $errors->has('school') ? ' is-invalid' : '' }}" value="{{ isset($profile->school) ? $profile->school : '' }}" >
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
                    <input type="text" name="course" id="course" class="form-control{{ $errors->has('course') ? ' is-invalid' : '' }}" value="{{ isset($profile) ? $profile->course : '' }}" >
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
                    <select id="level" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{ old('level') }}" >
                        <option value="1" {{ $profile->level==1? 'selected':'' }}> 100 </option>
                        <option value="2" {{ $profile->level==2? 'selected':'' }}> 200 </option>
                        <option value="3" {{ $profile->level==3? 'selected':'' }}> 300 </option>
                        <option value="4" {{ $profile->level==4? 'selected':'' }}> 400 </option>
                        <option value="5" {{ $profile->level==5? 'selected':'' }}> 500 </option>
                        <option value="6" {{ $profile->level==6? 'selected':'' }}> Masters </option>
                        <option value="7" {{ $profile->level==7? 'selected':'' }}> Ph.D </option>
                        <option value="8" {{ $profile->level==8? 'selected':'' }}> Others </option>
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
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>
            </div>
        </div>
	</form>
@endsection