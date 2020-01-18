@extends('layouts.myapp')

@section('content')

	<form action="{{ route('match.check') }}" method="POST" style="padding-top: 1rem;">
		@csrf

        <div class="form-group row">
            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

            <div class="col-md-6">
                <select id="filter_gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="1" autofocus>
                    <option value="0"> Indifferent </option>
                    <option value="1"> Male </option>
                    <option value="2"> Female </option>
                </select>
                @if ($errors->has('gender'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('gender') }}</strong>
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
            <label for="filter_body_shape" class="col-md-4 col-form-label text-md-right">{{ __('Body Shape ') }}</label>

            <div class="col-md-6">
                <select id="filter_body_shape" class="form-control{{ $errors->has('filter_body_shape') ? ' is-invalid' : '' }}" name="filter_body_shape" value="{{ old('filter_body_shape') }}">
                    @if($profile->user()->first()->gender == 2)
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

                @if ($errors->has('#filter_body_shape'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('#filter_body_shape') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="filter_skin_colour" class="col-md-4 col-form-label text-md-right">{{ __('Skin Colour') }}</label>

            <div class="col-md-6">
                <select id="filter_skin_colour" class="form-control{{ $errors->has('filter_skin_colour') ? ' is-invalid' : '' }}" name="filter_skin_colour" value="{{ old('filter_skin_colour') }}">
                    <option value="0"> Indifferent </option>
                    <option value="1"> Very Black </option>
                    <option value="2"> Chocolate </option>
                    <option value="3"> Melanin </option>
                    <option value="4"> Fair </option>
                    <option value="5"> Yellow </option>
                    <option value="6"> White </option>
                </select>
                @if ($errors->has('filter_skin_colour'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('filter_skin_colour') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="job" class="col-md-4 col-form-label text-md-right">{{ __('Job') }}</label>

            <div class="col-md-6">
                <select id="job" class="form-control{{ $errors->has('job') ? ' is-invalid' : '' }}" name="job" value="{{ old('job') }}">
                    <option value="0">Indifferent</option>
                    <option value="1"> Back-End-Developer </option>
                    <option value="2"> Cloths/Perfumes/Hand-Bags Store</option>
                    <option value="3"> Designer(UI/UX) </option>
                    <option value="4"> Front-End-Developer </option>
                    <option value="5"> Help </option>
                    <option value="6"> Influencer/Promoter </option>
                    <option value="7"> Interior Decorator </option>
                    <option value="8"> Make Up Artist </option>
                    <option value="9"> Mobile-Developer </option>
                    <option value="10" > Photographer </option>
                    <option value="11" > Phone/Laptop Repairs </option>
                    <option value="12" > Phone/Laptop Sales </option>
                    <option value="13" > Shoe-Store </option>
                    <option value="14" > Shoe-Maker/Palm-Maker </option>
                    <option value="15" > Tailor </option>
                </select>
                @if ($errors->has('need'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('need') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="filter_model" class="col-md-4 col-form-label text-md-right">{{ __('Model') }}</label>

            <div class="col-md-6">
                <select id="filter_model" class="form-control{{ $errors->has('filter_model') ? ' is-invalid' : '' }}" name="filter_model" >
                    <option value="2"> Indifferent </option>
                    <option value="1"> Yes </option>
                    <option value="0"> No </option>
                </select>

                @if ($errors->has('filter_model'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('filter_model') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="filter_student" class="col-md-4 col-form-label text-md-right">{{ __('Student') }}</label>

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
                        <option value="7"> Ph.D </option>
                        <option value="8"> Others </option>
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