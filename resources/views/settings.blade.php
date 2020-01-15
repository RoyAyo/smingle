@extends('layouts.myapp')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header" style="background-color: orange">
						Change Your Settings
					</div>
					<div class="card-body">
						<a href="{{ route('profile') }}" class="btn btn-md" style="background-color:yellow">Change Profile Settings</a><br><br>
						<a href="#" class="btn btn-md" style="background-color:yellow">Change Matched Settings</a><br><br>
                    </div>
                </div>
            </div><br>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background-color: orange;">
                        Quick Settings
                    </div>
                    <div class="card-body">
						<a data-target="#dpModal" data-toggle="modal" class="btn btn-md" style="background-color: yellow"> Change Cover Picture</a><br><br>
						<a data-target="#IG" data-toggle="modal" class="btn" style="background-color: yellow">Change Instagram Handle</a><br><br>
						<a data-target="#Twitter" data-toggle="modal" class="btn" style="background-color: yellow">Change Twitter Handle</a>
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
                <form role="form" action="#" method="POST">
                    <input type="file" name="dp" id="dp" required/>
                    <button id="user-sub" type="submit" class="btn btn-default">Change</button>
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
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="form-group" action="#" method="POST">
                    <label for="check-user-match"> IG Handle </label>
                    <input type="text" name="ig-handle" id="id-handle" class="form-control" required/>
                    <button id="user-sub" type="submit" class="btn btn-default">Change</button>
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
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="form-group" action="#" method="POST">
                    <label for="check-user-match"> Twitter Handle </label>
                    <input type="text" name="ig-handle" id="id-handle" class="form-control" required/>
                    <button id="user-sub" type="submit" class="btn btn-default">Change</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection