@extends('layouts.myapp')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card" style="font-family: serif;">
				<h3 style="text-align: center;" class="card-header">Messages </h3>
				<div id="mess-index">
					@foreach($messages as $message)
						<a href="{{route('message.id',['username'=>$message->username])}}">
							<div class="mess-i">
								<div class="pics">
									<img src="{{asset($message->avatar)}}">
								</div>
								<div class="mess-j">
									<h4> {{ $message->name }}</h4>
									<div class="texts">
										<div style="max-width: 60%;overflow:hidden;height: 28px;">
											<span style="text-overflow: ellipsis ellipsis;">{{ $message->message }}</span>
									</div> 
									<div style="font-size: 10pt;width: 40%;text-align: right; ">
											{{ $message->created_at->diffForHumans() }}
										</div>
									</div>
								</div>
							</div>
						</a><hr>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
