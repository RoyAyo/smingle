@extends('layouts.myapp')

@section('content')
	<div class="container">
		<div class="bg-white">
			<div id="all-events">
				@if($events->count() == 0)
					<div class="panel" style="height: calc(100vh - 58px)">
						<p style="margin: auto auto;color: violet">There are currently No hosted events</p>	
					</div>
				@endif
				@foreach($events as $event)
					<div class="card" style="margin-bottom: 0.3rem;">
						<a href="{{ route('event.id',['id' => $event->id]) }}" style="display: block;"> 
						<div class="card-header" style="padding: 0.5rem;">
							<h4 style="font-weight: bold;margin-bottom: 0px;"> {{ $event->event_name }}</h4>
						</div>
						<div class="card-body">
							<span style="float: right;position: relative;bottom: 13px;font-size: 40px;">&#8250</span>
							<span>
							<h6>Hosted By: {{$event->host_name}}</h6>
							<h6> Date: {{$event->event_date}} </h6>
							</span>
						</div>
						</a>
					</div>
				@endforeach
				<div style="display: flex;justify-content: center;">
					{{$events->links()}}
				</div>
			</div>
		</div>
	</div>
<div class="modal fade" id="checkModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="form-group" action="{{ route('comp.check') }}" method="POST">
                    <label for="check-user-match"> Username </label>
                    <input type="text" name="username" id="check-user-match" class="form-control" required style="margin-bottom: 0.2rem;" />
                    <label for="comp-with">Username on:</label>
                    <select id="comp-with" name="comp-with" class="form-control">
                        <option value="1">Smingle</option>
                        <option value="2">Twitter</option>
                        <option value="3">Instagram</option>
                    </select>
                    <button id="user-sub" type="submit" class="btn btn-default">Check</button>
                </form>
                <div>
                    <p class="text-danger text-center" style="font-size: 15pt;" id="match-perc"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection