@extends('layouts.myapp')

@section('content')
<div class="container-fluid" style="padding-top: 20px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <button>
                        <a data-target="#checkModal" data-toggle="modal" class="btn btn-default btn-center"> Check Compatibilty </a>
                    </button><br><br>
                    <button>
                        <a data-target='#findModal' data-toggle='modal' class="btn btn-default btn-center" style="color: black;"> Find Match </a>
                    </button><br><br>
                    <button>
                        <a data-target="#checkModal" data-toggle="modal" class="btn btn-default btn-center"> Find Now!!! </a>
                    </button><br><br>
                    <button>
                        <a data-target="#checkModal" data-toggle="modal" class="btn btn-default btn-center"> Crush Checker </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
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
                    <input type="text" name="username" id="check-user-match" class="form-control" required/>
                    <!-- <input type="submit" value="check" id="user-sub" class="btn btn-info"> -->
                    <button id="user-sub" type="submit" class="btn btn-default"><img src="{{ asset('images/icons/') }}"></button>
                </form>
                <div>
                    <p class="text-primary text-center" style="font-size: 30pt;" id="match-perc"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="findModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="form-group" action="{{ route('comp.check') }}" method="POST">
                    <button id="find-sub" type="submit" class="btn btn-default"><img src="{{ asset('images/icons/') }}"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
