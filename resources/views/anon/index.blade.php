@extends('layouts.myapp')

@section('content')
   <div class="row">
        <div class="col-lg-12">
            <div class="card" style="border-top: 0px;">
                <div class="card-header-pg" style="display: flex;width: 100%;background-color:rgba(200,200,200,0.5);border: 1px solid #fff">
                	<div id="anon-r" style="background-color: #fff;width: 50%;height: 100%;padding: 1rem;cursor: pointer;text-align: center;">
                		Received
                	</div>
                	<div id="anon-rp" style="width: 50%;height: 100%;padding: 1rem;cursor: pointer;text-align: center;">
                		Replies
                	</div>
                </div>
                <div class="card-body" style="padding: 1.5rem;">
                	<div id="anon-received">
		                @foreach($anons as $anon)
                			<div class="card" style="margin-bottom:0.2rem;padding: 0.5rem; ">
		                        <span style="font-weight: bold;">Message : {{$anon->message}}</span>
		                        <span>{{ $anon->created_at->diffForHumans() }}</span>
		                        <span><button class="btn btn-outline-primary anon-reply" a_id="{{$anon->id}}" r_id="{{$anon->sender_id}}" data-target="#anonReply" data-toggle="modal">Reply</button></span>
		                	</div>
		                @endforeach
		                <div style="display: flex;justify-content: center;" id="anon-links">
        		            {{$anons->links()}}
		                </div>
                	</div>
                	<div id="anon-replies">
		                @foreach($anonrs as $anonr)
                			<div class="card" style="margin-bottom:0.2rem;">
		                        <div class="card-header"><span style="font-weight: bold;">Your Message : {{$anonr->message}}</span></div>
		                        <div style="padding: 0.5rem;font-weight: bold;">
                                    <div>Reply : {{$anonr->reply}}</div>
			                        <div>{{ $anonr->created_at->diffForHumans() }}</div>	                			
                                    <div> From : <a href="{{ route('user',['username'=>$anonr->from]) }}" style="font-weight: lighter;">{{ '@'.$anonr->from }}</a></div>
		                		</div>
		                	</div>
		                @endforeach
						<div style="display: flex;justify-content: center;" id="anonr-links">
		                    {{$anonrs->links()}}
		                </div>
                	</div>
                </div>

            </div>
        </div>
    </div>
<div class="modal fade" id="anonReply" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-size: 15pt;"> Reply </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form" class="form-group" action="{{ route('anon.reply') }}" method="POST">
                    @csrf
                    <input type="hidden" name="anon_id" id="anon-reply-id">
                    <input type="hidden" name="receiver_id" id="anon-receiver-id">
                    <textarea class="form-control" id="anon-mess" rows="5" name="reply"></textarea>
                    <button id="send-anon" type="submit" class="btn btn-default">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
