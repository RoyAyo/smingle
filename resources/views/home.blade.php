@extends('layouts.myapp')

@section('content')
<div class="container-fluid" style="padding-top: 20px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body">
                	@foreach($Notifications as $Notification)
                		@php 
                            
                        @endphp
                        <div class="card" style="padding: 0.7rem;margin-bottom: 0.3rem;">
                            <p>
                                @if($Notification->notification_type == 1)
                                    You were Matched with <a href="{{route('user',['id' => $Notification->other_name])}}">{{'@'.$Notification->other_name}}</a>
                                @else   
                                    <a href="{{route('user',['id' => $Notification->other_name])}}">{{'@'.$Notification->other_name}}</a> was matched with you
                                @endif
                                <button class="btn btn-info" style="margin-left: 1rem;">View</button>
                                <span id="not-time">{{ $Notification->created_at->diffForHumans() }}</span>
                            </p>
                        </div>
                	@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection