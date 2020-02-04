@extends('layouts.myapp')

@section('content')
<div class="container-fluid" style="padding-top: 10px;">
    <div class="row">
        <div class="col-md-7" style="margin-bottom: 0.5rem;">
            <div class="card">
                <div class="card-header">Events Types</div>
                <div class="card-body">
                        <a href="{{ route('event.show') }}" class="btn btn-outline-success btn-center"> Shows </a>
                        <hr>
                        <a href="{{ route('event.party') }}" class="btn btn-outline-primary btn-center"> Parties </a>
                        <hr>
                    @if(auth()->user()->id == 1)
                            <a href="{{route('adminevent')}}"  class="btn btn-outline-danger">Administrator</a>
                            <hr>
                    @endif
                    <button class="btn btn-outline-info btn-center">
                        <a data-target='#addyourevent' data-toggle='modal' > Add Event </a>
                    </button>
                </div>
            </div>
        </div>
        @if($hosted->count() > 0)
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Hosted</div>
                    <div class="card-body">
                        @foreach($hosted->get() as $host)
                            <div class="card" style="margin-bottom: 0.3rem;">
                                <a href="{{ route('event.edit',['id' => $host->id]) }}" style="display: block;"> 
                                    <div>
                                        <h4 style="font-weight: bold;margin-bottom: 0px;"> {{ $host->event_name }}</h4>
                                        <span style="float: right;position: relative;bottom: 13px;font-size: 40px;">&#8250</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
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
                <a href="{{ route('event.createparty') }}" class="btn btn-outline-success btn-center"> Host A Party </a><hr>
                <a href="{{ route('event.createshow') }}" class="btn btn-outline-primary btn-center"> Host A Show </a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection