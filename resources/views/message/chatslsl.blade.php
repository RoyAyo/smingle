@extends('layouts.app')

@section('content')

<div style="width: 30%;height: 85vh;border: 1.5px solid grey;margin: 0 auto;border-radius: 5px;position: relative;">
	<div id="chat-inner-box" style="position: absolute;bottom: 0;width:100% ">
        <div id="chats">
    	@foreach ($messages as $message)
         	@if (auth()->user()->id == $message->sender_id)
         		<p style='text-align:right;color:green'>{{$message->message}}</p>
         	@else
         		<p>{{$message->message}}</p>
        	@endif
        @endforeach
        </div>
        <form action="">
            <input type="hidden" id="otherid" value="{{ $other_id }}">
        	<input type="text" name="message" style="width: 80%;" id="chat-message">
        	<input type="submit" value="send" style="width: 18%;" id="send-message">
        </form>
	</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chats</div>

                <div class="panel-body">
                    <chat-messages :messages="messages"></chat-messages>
                </div>
                <div class="panel-footer">
                    <chat-form
                        v-on:messagesent="addMessage"
                        :user="{{ Auth::user() }}"
                    ></chat-form>
                </div>
            </div>
        </div>
    </div>
</div>
  .chat {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .chat li {
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
  }

  .chat li .chat-body p {
    margin: 0;
    color: #777777;
  }

  .panel-body {
    overflow-y: scroll;
    height: 350px;
  }

  ::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
  }

@endsection