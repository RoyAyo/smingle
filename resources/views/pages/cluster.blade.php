@extends('layouts.app')

@section('content')
	
	<div style="padding-left:0.5rem; ">
		<form action="{{ route('cluster.store') }}" method="POST">
			@csrf
			 <h3>Tell us about you</h3>
			<div>
				<p style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Which Word Best Describes you?</p>
					<input type="radio" name="clus1" value="1"><span>Introvert</span> <br>
					<input type="radio" name="clus1" value="2"><span>Extrovert</span> <br>
					<input type="radio" name="clus1" value="3"><span>Semi-Introvert</span> <br>
					<input type="radio" name="clus1" value="4"><span>Parte After Parte</span>
			</div>
			<div>
				<p style="font-weight: bold;font-family: sans-serif;font-size: 12pt;">I Would Rather</p>
				<input type="radio" name="clus2" value="1"><span>Be Alone</span> <br>
				<input type="radio" name="clus2" value="2"><span>Go To A Nice Decent Party</span> <br>
				<input type="radio" name="clus2" value="3"><span>Anywhere But Inside</span> <br>
				<input type="radio" name="clus2" value="4"><span>Anywhere But Outside My Comfort Zone</span>
			</div>
			<div>
				<p style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Money? </p>
				<input type="radio" name="clus3" value="1"><span>Best Thing That Could Happen To Anyone</span><br>
				<input type="radio" name="clus3" value="2"><span>Root Of All Evil</span><br>
				<input type="radio" name="clus3" value="3"><span>Indifferent</span><br>
				<input type="radio" name="clus3" value="4"><span>I See it,I like it,I want it,I got it</span>
			</div>
			<div>
				<p style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Love? </p>
				<input type="radio" name="clus4" value="1"><span>Best Thing That Happened To Me</span><br>
				<input type="radio" name="clus4" value="2"><span>Big Scam</span><br>
				<input type="radio" name="clus4" value="3"><span>Still Waiting On The One o</span><br>
				<input type="radio" name="clus4" value="4"><span>Indifferent</span>
			</div>
			<div>
				<p style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Risks </p>
				<input type="radio" name="clus5" value="1"><span>Definitely,Life Itself Is a Risk</span><br>
				<input type="radio" name="clus5" value="2"><span>Only To An Extent</span><br>
				<input type="radio" name="clus5" value="3"><span>It's A Good Thing But Not For Me</span><br>
				<input type="radio" name="clus5" value="4"><span>I prefer the safer side</span>
			</div>
			<input type="submit" value="Submit!" id="cluster-submit" class="btn btn-info">
		</form>
	</div>

@endsection