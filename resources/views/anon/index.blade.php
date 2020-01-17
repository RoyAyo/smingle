@extends('layouts.myapp')

@section('content')
	<table class="table table-hover">
		<tr>
			<th class="col-xs-9">Message</th>
			<th style="text-align: right;" class="col-xs-3">Time sent</th>
		</tr>
		@foreach ($anons as $anon)
			<tr>
				<td>{{$anon->message}}</td>
				<td style="text-align: right;">{{$anon->created_at}}</td>
			</tr>
		@endforeach
	</table>
@endsection()