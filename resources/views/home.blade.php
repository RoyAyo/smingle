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
                            $message = $Nots_type[$Notification->notification_type];

                            if($Notification->notification_type == 1){
                                $m = 'You were Matched with @'.$Notification->other_user;
                            }else{   
                                $ m =$Notification->other_user.' was matched with you';
                        @endphp
                        <div class="card" style="padding: 1rem;margin-bottom: 0.3rem;">
                            <p>
                                {{$m}}
                                <button class="btn btn-info btn-sm" style="margin-right: 0.05rem;">Check</button>
                                <span style="float: right;">{{ $Notification->created_at }}</span>
                            </p>
                        </div>
                    }
                	@endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection