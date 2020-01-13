<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @auth
        <meta name="userID" content="{{ auth()->user()->id }}">
    @endauth

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

<!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @extends('style.app')
	@extends('style.loader')
</head>
<body>
	<div id="app">
		<nav class="navbar-light navbar-laravel">
			<header id="nav">
				<div id="nav-left">
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="navbar-toggler-icon"></span></a>	
	                <a class="navbar-brand" href="{{ route('home') }}" id="logo">
                    {{ config('app.name', 'Laravel') }}
                	</a>
            	</div>
            	<div id="nav-right">
            		@guest
                        <a class="nav-auth" href="{{ route('login') }}" >{{ __('Login') }}</a>
                        @if (Route::has('register'))
                        	<a class="nav-auth" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                            <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre class="nav-name">
                                {{auth()->user()->name}} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" class="nav-logout">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                    @endguest
            	</div>
			</header>
		</nav>
		<article>
		<div id="wrapper">
			<div id="sidebar-wrapper">
	            <ul class="sidebar-nav">
	                <li class="sidebar-brand">
	                    <span style="color: grey;">
	                    	@auth
	                    		{{auth()->user()->name}}
	                    	@endauth
	                    </span>
	                </li>
	                <li>
	                    <a href="{{route('user',['id'=> auth()->user()->id])}}"><img class="sidebar-icon" src="{{ asset('images/icons/icons8-user-male-80.png') }}">Profile</a>
	                </li>
	                <li>
	                    <a href="{{ route('about') }}"><img class="sidebar-icon" src="{{ asset('images/icons/icons8-user-male-80.png') }}">About You</a>
	                </li>
	                <li>
	                    <a href="{{ route('anon') }}"><img class="sidebar-icon" src="{{ asset('images/icons/icons8-theatre-mask-64.png') }}">Anonymous Messages</a>
	                </li>
	                <li>
	                    <a href="{{ route('messages') }}"><img class="sidebar-icon" src="{{ asset('images/icons/icons8-new-message-16.png') }}">Messages</a>
	                </li>
	                <li>
	                    <a href="{{ route('events') }}"><img class="sidebar-icon" src="{{ asset('images/icons/icons8-schedule-64.png') }}">Events</a>
	                </li>
	                <li>
	                    <a href="#"><img class="sidebar-icon" src="{{ asset('images/icons/icons8-user-female-skin-type-3-16.png') }}">My Type Of {{ auth()->user()->gender== 1 ? "Woman" : "Man" }}</a>
	                </li>
	                <li>
	                    <a href="#"><img class="sidebar-icon" src="{{ asset('images/icons/icons8-help-100.png') }}">How To Use</a>
	                </li>
	                <li>
	                    <a href="#"><img class="sidebar-icon" src="{{ asset('images/icons/icons8-settings-100.png') }}">Settings</a>
	                </li>
	            </ul>
		    </div>
			<div id="page-content-wrapper">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-lg-10">
	                    	@yield('content')
	                    </div>
	                    <div class="col-lg-2">
	                    	
	                    </div>
	                </div>
	            </div>
	        </div>
        </div>
        </article>
	</div>
	<div id="loader-div">
		<div id="loader"></div>
	</div>
	<div id="matched-div">
		<div class="card" style="width: 100vw;height: 100vh;background-color: rgba(180,180,180,0.8);">
			<div class="card-header" style="background-color: #fff">
				<button type="button" class="close">&times;</button>
			</div>
			<div class="card-body">
				<div class="match-imgs">
					<div class="imdiv">
						<div>
							<img src="{{ asset('images/uploads/4.jpg') }}">
						</div>
						<div class="name">
							{{auth()->user()->name}}
						</div>
					</div>
					<div class="arrow"><--></div>
					<div class="imdiv">
							Kate Kendall
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	 <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
	@extends('ajax.js')
	<script>
		@if(Session::has('anon'))
			toastr.success("{{Session::get('anon')}}")
		@endif
		@if(Session::has('eventVerified'))
			toastr.success("{{Session::get('eventVerified')}}")
		@endif
	</script>
</body>
</html>