@extends('layouts.myapp')

@section('content')
	<div class="container-fluid">
		<div class="row">
<<<<<<< HEAD
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
=======
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						Change Your Settings
					</div>
					<div class="card-body">
						<a href="{{ route('profile') }}" class="btn btn-md">Change Profile Settings</a><br><br>
						<a href="#" class="btn btn-md">Change Matched Settings</a><br><br>
                    </div>
                </div>
            </div><br>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" >
                        Quick Settings
                    </div>
                    <div class="card-body">
						<a data-target="#IG" data-toggle="modal" class="btn">Change Instagram Handle</a><br><br>
						<a data-target="#Twitter" data-toggle="modal" class="btn">Change Twitter Handle</a>
					</div>
				</div>
			</div>
>>>>>>> 235932240f7b4fae238d3e1b55fc34a7b78bdf73
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
<<<<<<< HEAD
                <form role="form" action="{{route('pp')}}" method="POST">
                    @csrf
                    <input type="file" name="pics" id="dp" required/><br><br>
                    <button type="submit" class="btn btn-outline-success">Change</button>
=======
                <form role="form" action="#" method="POST">
                    <input type="file" name="dp" id="dp" required/>
                    <button id="user-sub" type="submit" class="btn btn-default">Change</button>
>>>>>>> 235932240f7b4fae238d3e1b55fc34a7b78bdf73
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
<<<<<<< HEAD
                    <button type="submit" class="btn btn-outline-success">Change</button>
=======
                    <button id="user-sub" type="submit" class="btn btn-default">Change</button>
>>>>>>> 235932240f7b4fae238d3e1b55fc34a7b78bdf73
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
<<<<<<< HEAD
                    <button type="submit" class="btn btn-outline-success">Change</button>
=======
                    <button id="user-sub" type="submit" class="btn btn-default">Change</button>
>>>>>>> 235932240f7b4fae238d3e1b55fc34a7b78bdf73
                </form>
            </div>
        </div>
    </div>
</div>
@endsection