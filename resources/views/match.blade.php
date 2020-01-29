@extends('layouts.myapp')

@section('content')
<div class="container-fluid" style="padding-top: 20px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Options</div>

                <div class="card-body">
                    <a data-target="#checkModal" data-toggle="modal" class="btn btn-md btn-outline-info btn-center"> Check Compatibilty </a><hr>
                    <a href="{{ route('filter') }}" class="btn btn-outline-danger btn-md btn-center"> Find Match!! </a>
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
