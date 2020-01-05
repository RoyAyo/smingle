@extends('layouts.myapp')

@section('content')
<div class="message-card">
		<div class="messages">
			<div class="message-header">
				<img src="{{ asset('images/icons/arrow-left-128.png') }}" style="width: 25px;height: 25px;">
				<span>{{$other_name}}</span>
			</div>
			<div class="message-body">
				<div id="chats">
					@foreach ($messages as $message)
			         	@if (auth()->user()->id == $message->sender_id)
			         		<p class="sent"><span class="text">{{$message->message}}</span></p>
			         	@else
			         		<p class="replies"><span class="text">{{$message->message}}</span></p>
			        	@endif
		        @endforeach
				</div>
				<div class="message-input">
				<form action="">
					<input type="hidden" id="otherid" value="{{ $other_id }}">
					<input id="chat-message" type="text" placeholder="Message..." /><button type="submit" id="send-message-btn" style="display: inline-block;" class="btn btn-sm"><img src="{{ asset('images/icons/arrow-right-128.png') }}"></button>
        		</form>
        		</div>
			</div>
		</div>
</div>
@endsection