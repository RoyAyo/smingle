@extends('layouts.myapp')

@section('content')
	<div class="container-fluid" style="padding-top: 20px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Events DashBoard</div>
                <div class="card-body">
                    <button>
                        <a href="{{ route('event.create') }}" class="btn btn-default btn-center"> Suggest Event To Us </a>
                    </button><br><br>
                    <button>
                        <a href="{{ route('events.show') }}" class="btn btn-default btn-center"> Shows </a>
                    </button><br><br>
                    <button>
                        <a href="#" class="btn btn-default btn-center"> Parties </a>
                    </button><br><br>
                    <button>
                        <a href="#" class="btn btn-default btn-center"> Movies </a>
                    </button><br><br>
                    <button>
                        <a href="#" class="btn btn-default btn-center"> Clubs </a>
                    </button><br><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection