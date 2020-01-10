@extends('layouts.myapp')

@section('content')
    <div class="jumbo"></div>
    <div class="details">
        <h3>{{ $user->name }}</h3>
        @if($user->profile->student == 1)
            <p>Student</p>
        @endif
    </div>
    <div id="message-user">
        @if($owner == 0 )
            <a href="#"><img src="{{ asset('images/icons/icons8-new-message-16.png') }}" class="message-icon"></img> Send Message</a>
            <a href="#" data-target="#anonModal" data-toggle="modal"><img src="{{ asset('images/icons/icons8-theatre-mask-64.png') }}" class="message-icon"></img> Send Anonymous Message</a>
        @endif
    </div>
    <div class="bio">
        <div class="content" style="font-size: 12pt;">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro officiis fugit hic vel voluptates perferendis aut quibusdam sit omnis unde aspernatur quae repellat blanditiis autem, a libero asperiores neque illum aliquid est tempore. Eveniet velit voluptate amet facere, repellendus aperiam, cumque est ipsam. Asperiores expedita iusto, inventore sit suscipit nihil repudiandae? Laboriosam cum maxime dolorem neque, in veniam expedita ad. Hic fugit necessitatibus blanditiis, optio dignissimos molestiae nam, numquam odio.</p>
        </div>
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