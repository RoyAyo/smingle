@extends('layouts.app')

@section('content')
<form action='{{ route("js.post") }}' method="POST">
    <div class="form-group row">
        <label for="Job" class="col-md-4 col-form-label text-md-right">{{ __('Job Type') }}</label>
        <div class="col-md-6">
            <select id="job" class="form-control{{ $errors->has('job') ? ' is-invalid' : '' }}" name="job" value="{{ old('job') }}" >
            	<option value="1"> Back-End-Developer </option>
            	<option value="2"> Cloths/Perfumes/Hand-Bags Store</option>
            	<option value="3"> Designer(UI/UX) </option>
            	<option value="4"> Front-End-Developer </option>
            	<option value="5"> Help </option>
            	<option value="6"> Influencer/Promoter </option>
            	<option value="7"> Mobile-Developer </option>
            	<option value="8"> Model </option>
            	<option value="9"> Photographer </option>
            	<option value="10"> Phone/Laptop Repairs </option>
            	<option value="11"> Phone/Laptop Sales </option>
            	<option value="12"> Shoe-Store </option>
            	<option value="13"> Shoe-Maker/Palm-Maker </option>
            	<option value="14"> Tailor </option>
            </select>

            @if ($errors->has('job'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('job') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="Job" class="col-md-4 col-form-label text-md-right">{{ __('Price From(N)') }}</label>
        <input type="number" name="price_from" id="price_from" class="form-control{{ $errors->has('price_from') ? ' is-invalid' : '' }}" required >
        <div class="col-md-6">
            @if ($errors->has('job'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('job') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="Job" class="col-md-4 col-form-label text-md-right">{{ __('Price To(N)') }}</label>
        <input type="text" name="price_to" id="price_to" class="form-control{{ $errors->has('price_to') ? ' is-invalid' : '' }}" required >
        <div class="col-md-6">
            @if ($errors->has('job'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('job') }}</strong>
                </span>
            @endif
        </div>
    </div>
</form>
@endsection