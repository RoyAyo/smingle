@extends('layouts.myapp')

@section('content')
    @php
        $h = ['','5"0 - 5"5','5"6 - 5"8','5"9 - 5"11','6"0 - 6"3','>6"3'];
        $b_s1 =['','Slim','Slim With Packs','Great Build','Muscle Man','Nothing To Show','Thick'];
        $b_s2 =['','Slim','Figure8','Nothing To Show','Petite','Full Package','Thick'];
        $s_c = ['','Very Black','Chocolate','Melanin','Fair','Yellow','White'];
        $r = ['','Christain','Muslim','Traditional','Others'];
        $j = ['','Back-End-Developer','Cloths/Perfumes/Hand-Bags Store','Designer(UI/UX)','Front-End-Developer','Help','Influencer/Promoter','Interior Decorator','Make Up Artist','Mobile-Developer','Photographer','Phone/Laptop Repairs','Phone/Laptop Sales','Shoe-Store','Shoe-Maker/Palm-Maker','Tailor'];
        $lv = ['','100','200','300','400','500','Masters','Ph.D','Others','Secondary School'];
        $m_s = ['','Broke asf','Broke','Fair','Rich','Rich asf'];
    @endphp
    <div class="jumbo" style="background-image: url( {{ asset('images/uploads/4.jpg') }} );"></div>
    <div class="details">
        <h3 style="font-weight: bold;margin-bottom: 0.05rem;">{{ $user->name }}</h3>
        <h4 style="margin-bottom: 0.05rem;color: skyblue">{{'@'.$user->username }}</h4>
        <h5 style="color: grey;margin-bottom: 0px;">{{Carbon\Carbon::parse($user->DOB)->age}}</h5>
    </div>
    <div class="user-pages">
        @if($owner == 0 )
            <a href="{{route('message.id',['username'=>$user->username])}}"><img src="{{ asset('images/icons/icons8-new-message-16.png') }}" class="message-icon"></img></a>
            <a href="#" data-target="#anonModal" data-toggle="modal"><img src="{{ asset('images/icons/icons8-theatre-mask-64.png') }}" class="message-icon"></img></a>
        @endif
        <a href="{{ is_null($user->twitter) ? '#' : 'https://twitter.com/'.$user->twitter }}"><img src="{{ asset('images/icons/twitter.svg') }}"></a>
        <a href="{{ is_null($user->instagram) ? '#' : 'https://instagram.com/'.$user->instagram }}"><img src="{{ asset('images/icons/instagram.svg') }}"></a>
    </div>
    <div class="bio">
        <div class="content" style="font-size: 12pt;">
            <center>
                <p style="font-size: 13pt;font-weight: bold;font-family: sans-serif;width: 55%;word-spacing: 0.3rem;word-break: keep-all;word-wrap: break-word;">{{ $user->about }}</p>
            </center>
        </div>
        <div>
            <hr>
            {{$user->profile()->first()->state}}
        </div>
        @if($user->profile()->first()->model == 1)
            <hr>
            <div style="font-weight: bold;">
                Model
            </div>
        @endif
        <hr>
        <div>
            Height Range : <span class="prof-filters">{{ $h[$user->profile()->first()->height] }}</span>
        </div><hr>
        <div>
            Religion : <span class='prof-filters'>{{ $r[$user->profile()->first()->religion] }}</span>
        </div><hr>
        @if($user->gender == '1')
            <div>
                Body_Shape : <span class='prof-filters'>{{ $b_s1[$user->profile()->first()->body_shape]}}</span>
            </div><hr>
        @else
            <div>
                Body_Shape : <span class='prof-filters'>{{ $b_s2[$user->profile()->first()->body_shape]}}</span>
            </div><hr>
        @endif
        <div>
            Skin_Colour : <span class='prof-filters'>{{ $s_c[$user->profile()->first()->skin_colour]}}</span>
        </div><hr>
        <div>
            Money_Status : <span class='prof-filters'>{{ $m_s[$user->profile()->first()->m_status]}}</span>
        </div><hr>
        <div>
             Zodiac_Sign : <span class='prof-filters'>{{$user->zodiac}}</span>
        </div>
        @if($user->profile()->first()->student==1)
            <hr>
            <div>
                School : <span class='prof-filters'>{{$user->profile()->first()->school}}</span>
            </div>
            <hr>
            <div>
                Course : <span class='prof-filters'>{{$user->profile()->first()->course}}</span>
            </div>
        @endif
        @if($user->profile()->first()->job!=0)
            <hr>
            <div>
                Job:<span class='prof-filters'>{{$user->profile()->first()->job}}</span>
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