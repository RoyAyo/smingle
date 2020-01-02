@extends('layouts.app')

@section('content')
	
	<h3 style="color: skyblue;padding-left: 1rem;"> About </h3>
	<p style="padding-left: 1rem;"> Tell us about you so we can make better judgements</p>
	<ul style="list-style-type: none;">
		<li>
			@if($filled->general == 0)
				<input type="checkbox" name="general" disabled>
			@else
				<input type="checkbox" name="general" checked disabled>
			@endif
			<a href="{{ route('general') }}"> General </a>
		</li>
		<li>
			@if($filled->relationship == 0)
				<input type="checkbox" name="relationship" disabled>
			@else
				<input type="checkbox" name="relationship" checked disabled>
			@endif
			<a href="#"> Relationship </a>
		</li>
		<li>
			@if($filled->situation == 0)
				<input type="checkbox" name="situation" disabled>
			@else
				<input type="checkbox" name="situation" checked disabled>
			@endif
			<a href="#"> Situation </a>
		</li>
		<li>
			@if($filled->movie == 0)
				<input type="checkbox" name="movie" disabled>
			@else
				<input type="checkbox" name="movie" checked disabled>
			@endif
			<a href="#"> Movie </a>
		</li>
		<li>
			@if($filled->music == 0)
				<input type="checkbox" name="music" disabled>
			@else
				<input type="checkbox" name="music" checked disabled>
			@endif
			<a href="#"> Music </a>
		</li>
		<li>
			@if($filled->ranodm == 0)
				<input type="checkbox" name="ranodm" disabled>
			@else
				<input type="checkbox" name="ranodm" checked disabled>
			@endif
			<a href="#"> Random </a>
		</li>
	</ul>

@endsection