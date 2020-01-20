@extends('layouts.myapp')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 useless-message">
			<div class="card" style="font-family: serif;">
				<h3 style="text-align: center;" class="card-header">Messages </h3>
				<div style="padding: 1rem 1.2rem">
					@foreach($messages as $message)
						<div class="card" style="padding: 0.5rem;">
							<h4><a href="{{route('message.id',['username'=>$message->username])}}">{{ $message->name }}</a></h4>
							<p>{{ $message->message }} <span style="font-size: 10pt;float: right;">{{ $message->when }}</span></p>
						</div>
						<hr>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection