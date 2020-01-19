@extends('layouts.myapp')

@section('content')
<div class="container-fluid" style="padding-top: 10px;">
    <div class="row">
        <div class="col-md-7" style="margin-bottom: 0.5rem;">
            <div class="card">
                <div class="card-header">Events Types</div>
                <div class="card-body">
                    <button>
                        <a href="{{ route('event.show') }}" class="btn btn-default btn-center"> Shows </a>
                    </button><br><br>
                    <button>
                        <a href="{{ route('event.party') }}" class="btn btn-default btn-center"> Parties </a>
                    </button><br>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Others</div>
                <div class="card-body">
                    <button>
                        <a href="{{ route('event.notifications') }}" class="btn btn-default btn-center"> Notifications </a>
                    </button><br><br>
                    <button>
                        <a data-target='#addyourevent' data-toggle='modal' class="btn btn-default btn-center"> Add Event </a>
                    </button><br><br>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addyourevent" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <button>
                        <a href="{{ route('event.createparty') }}" class="btn btn-default btn-center"> Host A Party </a>
                </button><br><br>
                <button>
                    <a href="{{ route('event.createshow') }}" class="btn btn-default btn-center"> Host A Show </a>
                </button><br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection