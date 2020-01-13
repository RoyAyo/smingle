@extends('layouts.myapp')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-5">
			<div class="card" style="font-family: serif;">
				<h3 style="text-align: center;" class="card-header">Messages </h3>
				<div style="padding: 1rem 1.2rem">
					@foreach($messages as $message)
						<h4 ide="{{$message->other_id}}" class="chatwithme" mess="{{ json_encode($message->all_chats) }}">{{ $message->name }}</h4>
						<p>{{ $message->message }} <span style="font-size: 10pt;float: right;">{{ explode(' ',$message->created_at)[1] }}</span></p>
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="card">
				<div class="message-card">
					<div class="messages">
						<div class="message-header">
							<img src="{{ asset('images/icons/arrow-left-128.png') }}" style="width: 25px;height: 25px;display: none;">
							<span id="chat-name"></span>
						</div>
						<div class="message-body">
							<div id="chats">

							</div>
							<div class="message-input">
								<form action="">
									<input type="hidden" id="otherid" value="">
									<input id="chat-message" type="text" placeholder="Message..." /><button type="submit" id="send-message-btn" style="display: inline-block;" class="btn btn-sm"><img src="{{ asset('images/icons/arrow-right-128.png') }}"></button>
				        		</form>
			        		</div>
			        	</div>
					</div>
					<div id="default-m">
						No Message Has Been Selected
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection