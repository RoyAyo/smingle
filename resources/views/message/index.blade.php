@extends('layouts.myapp')

@section('content')
<div class="card" style="padding: 1rem 1.3rem;font-family: serif;">
	<h1 style="text-align: center;"> Messages </h1>
	@foreach($messages as $message)
		<h4><a href="{{ route('message',['id'=>$message->other_id]) }}">{{ $message->name }}</a></h4>
		<p>{{ $message->message }} <span style="font-size: 10pt;float: right;">{{ explode(' ',$message->created_at)[1] }}</span></p>
	@endforeach
</div>
@endsection