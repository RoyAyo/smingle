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
        <h5 style="color: grey;margin-bottom: 0px;">24</h5>
        @if($user->profile()->first()->model == 1)
            <h5 style="color: orange;font-weight: bold;">Model</h5>
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
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro officiis fugit hic vel voluptates perferendis aut quibusdam sit omnis unde aspernatur</p>
        </div>
        <div>
            <hr>
            {{$user->profile()->first()->state}}
        </div>
        <hr>
        <div>
            Height Range : {{ $h[$user->profile()->first()->height] }}
        </div><hr>
        <div>
            Religion : {{ $r[$user->profile()->first()->religion] }}
        </div><hr>
        @if($user->gender == '1')
            <div>
                Body_Shape : {{ $b_s1[$user->profile()->first()->body_shape]}}
            </div><hr>
        @else
            <div>
                Body_Shape : {{ $b_s2[$user->profile()->first()->body_shape]}}
            </div><hr>
        @endif
        <div>
            Skin_Colour : {{ $s_c[$user->profile()->first()->skin_colour]}}
        </div><hr>
        <div>
            Money_Status : {{ $m_s[$user->profile()->first()->m_status]}}
        </div><hr>
        <div>
             Zodiac_Sign : {{$user->zodiac}}
        </div>
        @if($user->profile()->first()->student==1)
            <hr>
            <div>
                School : {{$user->profile()->first()->school}}
            </div>
            <hr>
            <div>
                Course : {{$user->profile()->first()->course}}
            </div>
        @endif
        @if($user->profile()->first()->job!=0)
            <hr>
            <div>
                Job:{{$user->profile()->first()->job}}
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