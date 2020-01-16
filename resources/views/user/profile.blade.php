@extends('layouts.myapp')

@section('content')
    <div class="jumbo" style="background-image: url( {{ asset('images/uploads/4.jpg') }} );"></div>
    <div class="details">
        <h3 style="font-weight: bold;">{{ $user->name }}</h3>
        <h5 style="color: grey;">24</h5>
    </div>
    <div id="message-user">
        @if($owner == 0 )
            <a href="#"><img src="{{ asset('images/icons/icons8-new-message-16.png') }}" class="message-icon"></img> Send Message</a>
            <a href="#" data-target="#anonModal" data-toggle="modal"><img src="{{ asset('images/icons/icons8-theatre-mask-64.png') }}" class="message-icon"></img> Send Anonymous Message</a>
        @endif
    </div>
    <div class="bio">
        <div>
            {{$user->profile()->first()->Location}}
            <hr>
        </div>
        <div class="content" style="font-size: 12pt;">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro officiis fugit hic vel voluptates perferendis aut quibusdam sit omnis unde aspernatur</p>
        </div>
        <hr>
        <div>
            Height Range : {{$user->profile()->first()->height}}
        </div><hr>
        <div>
            Religion : {{$user->profile()->first()->religion}}
        </div><hr>
        <div>
             Range : {{$user->profile()->first()->height}}
        </div>
        @if($user->profile()->first()->student==1)
            <hr>
            <div>
                School : {{$user->profile()->first()->school}}
            </div>
            <div>
                Course : {{$user->profile()->first()->course}}
            </div>
        @endif
    </div>
    <div class="modal fade" id="anonModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-size: 15pt;"> Send Anonymous message to {{$user->name}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form" class="form-group" action="{{ route('anon.create') }}" method="POST">
                    @csrf
                    <input type="hidden" name="anonreceiver" value="{{ $user->id }}">
                    <textarea class="form-control" id="anon-mess" rows="5" name="message"></textarea>
                    <button id="send-anon" type="submit" class="btn btn-default">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection