@extends('layouts.myapp')

@section('content')
<div class="container-fluid" style="padding-top: 20px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body">
                	@foreach($Notifications as $Notification)
                        <div class="card" style="padding: 1rem;margin-bottom: 0.3rem;">
                		  {{$Notification->notification_type}};
                        </div>
                	@endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection