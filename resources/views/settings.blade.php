@extends('layouts.myapp')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header" style="font-weight: bold;color: skyblue;">
						Settings
					</div>
					<div class="card-body">
						<a href="{{ route('profile') }}" class="settings-link">Change Profile Settings</a><hr>
						<a data-target="#dpModal" data-toggle="modal" class="settings-link">Change Display picture</a><hr>
                        <a data-target="#IG" data-toggle="modal" class="settings-link">Change Instagram Handle</a><hr>
                        <a data-target="#Twitter" data-toggle="modal" class="settings-link">Change Twitter Handle</a>
                    </div>
                </div>
            </div>
		</div>
	</div>
<!-- Modals -->
<div class="modal fade" id="dpModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Profile Picture</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form" action="{{route('pp')}}" method="POST">
                    @csrf
                    <input type="file" name="pics" id="dp" required/><br><br>
                    <button type="submit" class="btn btn-outline-success">Change</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="IG" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Your Instagram Handle</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form" class="form-group" action="{{route('cig')}}" method="POST">
                    @csrf
                    <label for="check-user-match"> IG Handle </label>
                    <input type="text" name="instagram" id="id-handle" class="form-control" required value="{{$ig_handle}}"/>
                    <button type="submit" class="btn btn-outline-success">Change</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Twitter" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Your Twitter Handle</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form" class="form-group" action="{{route('ctwit')}}" method="POST">
                    @csrf
                    <label for="check-user-match"> Twitter Handle </label>
                    <input type="text" name="twitter" id="id-handle" class="form-control" required value="{{$twitter_handle}}" />
                    <button type="submit" class="btn btn-outline-success">Change</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection