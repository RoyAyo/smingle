<!DOCTYPE html>
<html>
<head>
	<title>Events</title>
	<style type="text/css">

		.event h4{
			font-weight: bolder;
			font-size: 14pt;
		}

		.event-avatar{

		}
		.event-avatar img{
			width: 300px;
			height: 300px;
			border-radius: 3px;

		}
		.event-name a{
			text-decoration: none;
			color: grey;
			transition: color .2s ease-in; 
		}
		.event-name a:hover{
			color: red;
		}
		@media(max-width: 700px){
			.event-avatar img{
				width: 250px;
				height: 250px;
			}
		}
	</style>
</head>
<body>
	
	<div class="event">
		<h2 class="event-date"> 26th December 2019 </h2>
		<center>
			<p class="event-avatar"> <img src="{{ asset('images/uploads/1.jpg') }}"> </p>
		</center>
		<h4 class="event-name"> <a href="#"> Marlian Fest </a></h4>
	</div>
	<div class="event">
		<h2 class="event-date"> 15th January 2020 </h2>
		<center>
			<p class="event-avatar"> <img src="{{ asset('images/uploads/3.jpg') }}"> </p>
		</center>
		<h4 class="event-name"> <a href="#"> Trade Fair </a> </h4>
	</div>
</body>
</html>
