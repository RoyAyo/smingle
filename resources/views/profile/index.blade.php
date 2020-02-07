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
                	<option value="3" {{ $profile->age==3 ? 'selected':'' }}> 24-28 </option>
                	<option value="4" {{ $profile->age==4 ? 'selected':'' }}> 29-32 </option>
                    <option value="5" {{ $profile->age==5? 'selected':'' }}> 33-40 </option>
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
            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

            <div class="col-md-6">
                <input type="country" name="country" id="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" value="{{ isset($profile->country) ? $profile->country : '' }}" required >
                @if ($errors->has('country'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('country') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

            <div class="col-md-6">
                <input type="text" name="state" id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" value="{{ isset($profile->state) ? $profile->state : '' }}" required >
                @if ($errors->has('state'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('state') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="Religion" class="col-md-4 col-form-label text-md-right">{{ __('Religion') }}</label>

            <div class="col-md-6">
                <select id="religion" class="form-control{{ $errors->has('religion') ? ' is-invalid' : '' }}" name="religion" value="{{ old('religion') }}" >
                	<option value="1" {{ $profile->religion==1? 'selected':'' }}> Christian </option>
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
                        <option value="1" {{ $profile->body_shape=='1' ? 'selected':'' }}> Slim </option>
                        <option value="2" {{ $profile->body_shape=='2' ? 'selected':'' }}> Slim With Packs </option>
                        <option value="3" {{ $profile->body_shape=='3' ? 'selected':'' }}> Great Build </option>
                        <option value="4" {{ $profile->body_shape=='4' ? 'selected':'' }}> Muscle Man </option>
                        <option value="5" {{ $profile->body_shape=='5' ? 'selected':'' }}> Nothing To Show </option>
                        <option value="6" {{ $profile->body_shape=='6' ? 'selected':'' }}> Thick </option>
                    @else
                        <option value="1" {{ $profile->body_shape=='1' ? 'selected':'' }}> Slim </option>
                        <option value="2" {{ $profile->body_shape=='2' ? 'selected':'' }}> Figure 8 </option>
                        <option value="3" {{ $profile->body_shape=='3' ? 'selected':'' }}> Nothing To Show</option>
                        <option value="4" {{ $profile->body_shape=='4' ? 'selected':'' }}> Petite </option>
                        <option value="5" {{ $profile->body_shape=='5' ? 'selected':'' }}> Full Package </option>
                        <option value="6" {{ $profile->body_shape=='6' ? 'selected':'' }}> Thick </option>
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
            <label for="skin_colour" class="col-md-4 col-form-label text-md-right">{{ __('Skin Colour') }}</label>

            <div class="col-md-6">
                <select id="skin_colour" class="form-control{{ $errors->has('skin_colour') ? ' is-invalid' : '' }}" name="skin_colour" value="{{ old('skin_colour') }}">
                    <option value="1" {{ $profile->skin_colour==1? 'selected':'' }}> Very Black </option>
                    <option value="2" {{ $profile->skin_colour==2? 'selected':'' }}> Chocolate </option>
                    <option value="3" {{ $profile->skin_colour==3? 'selected':'' }}> Melanin </option>
                    <option value="4" {{ $profile->skin_colour==4? 'selected':'' }}> Fair </option>
                    <option value="5" {{ $profile->skin_colour==5? 'selected':'' }}> Yellow </option>
                    <option value="6" {{ $profile->skin_colour==6? 'selected':'' }}> White </option>
                </select>

                @if ($errors->has('skin_colour'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('skin_colour') }}</strong>
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
            <label for="jobs" class="col-md-4 col-form-label text-md-right">{{ __('Job') }}</label>

            <div class="col-md-6">
                <select id="jobs" class="form-control{{ $errors->has('jobs') ? ' is-invalid' : '' }}" name="jobs" value="{{ old('jobs') }}">
                    <option value="0" {{ $profile->jobs=='0' ? 'selected' : ''}} >None</option>
                    <option value="1" {{ $profile->jobs=='1' ? 'selected' : ''}} > Back-End-Developer </option>
                    <option value="2" {{ $profile->jobs=='2' ? 'selected' : ''}} > Cloths/Perfumes/Hand-Bags Store</option>
                    <option value="3" {{ $profile->jobs=='3' ? 'selected' : ''}} > Designer(UI/UX) </option>
                    <option value="4" {{ $profile->jobs=='4' ? 'selected' : ''}} > Front-End-Developer </option>
                    <option value="5" {{ $profile->jobs=='5' ? 'selected' : ''}} > Help </option>
                    <option value="6" {{ $profile->jobs=='6' ? 'selected' : ''}} > Influencer/Promoter </option>
                    <option value="7" {{ $profile->jobs=='7' ? 'selected' : ''}} > Interior Decorator </option>
                    <option value="8" {{ $profile->jobs=='8' ? 'selected' : ''}} > Make Up Artist </option>
                    <option value="9" {{ $profile->jobs=='9' ? 'selected' : ''}} > Mobile-Developer </option>
                    <option value="10" {{ $profile->jobs=='10' ? 'selected' : ''}} > Photographer </option>
                    <option value="11" {{ $profile->jobs=='11' ? 'selected' : ''}} > Phone/Laptop Repairs </option>
                    <option value="12" {{ $profile->jobs=='12' ? 'selected' : ''}} > Phone/Laptop Sales </option>
                    <option value="13" {{ $profile->jobs=='13' ? 'selected' : ''}} > Shoe-Store </option>
                    <option value="14" {{ $profile->jobs=='14' ? 'selected' : ''}} > Shoe-Maker/Palm-Maker </option>
                    <option value="15" {{ $profile->jobs=='15' ? 'selected' : ''}} > Tailor </option>
                </select>
                @if ($errors->has('jobs'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('jobs') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('Model?') }}</label>

            <div class="col-md-6">
                <select id="model" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" name="model" >
                    <option value="0" {{ $profile->model==0? 'selected':'' }}> No </option>
                    <option value="1" {{ $profile->model==1? 'selected':'' }}> Yes </option>
                </select>

                @if ($errors->has('model'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('model') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="student" class="col-md-4 col-form-label text-md-right">{{ __('Student?') }}</label>

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
                        <option value="9" {{ $profile->level==1? 'selected':'' }}> Secondary School </option>
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
                    {{ __('Next') }}
                </button>
            </div>
        </div>
	</form>
@endsection
