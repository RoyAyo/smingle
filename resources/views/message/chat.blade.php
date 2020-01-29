@extends('layouts.myapp')

@section('content')
<div class="message-card">
		<div class="messages">
			<div class="message-header">
				<a href="{{route('messages')}}">
					<img src="{{ asset('images/icons/arrow-left-128.png') }}" style="width: 25px;height: 25px;">
				</a>
				<a href="{{ route('user',['username'=>$other_name]) }}" style="color: black;left:0.7rem;;position: relative;">
					{{$other_name}}
				</a>
			</div>
			<div class="message-body">
				<div id="chats">
					@foreach ($messages as $message)
			         	@if (auth()->user()->id == $message->sender_id)
							<p style="color: rgba(0,0,0,1);font-size: 8pt;margin-bottom: 0px;text-align: right;">{{$message->created_at->diffForHumans()}}</p>
			         		<p class="sent"><span class="text">{{$message->message}}</span></p>
			         	@else
							<p style="color: rgba(0,0,0,1);font-size: 8pt;margin-bottom: 0px;padding-left: 0.2rem;">{{$message->created_at->diffForHumans()}}</p>
			         		<p class="replies"><span class="text">{{$message->message}}</span></p>
			        	@endif
		        	@endforeach
				</div>
			</div>
				<div class="message-input">
				<form action="">
					<input type="hidden" id="otherid" value="{{ $other_id }}">
					<input id="chat-message" type="text" placeholder="Message..." /><button type="submit" id="send-message-btn" style="display: inline-block;" class="btn btn-sm"><img src="{{ asset('images/icons/arrow-right-128.png') }}"></button>
        		</form>
        		</div>
		</div>
</div>
@endsection