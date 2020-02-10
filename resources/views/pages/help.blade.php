@extends('layouts.myapp')

@section('content')
<div class="container">
	<div class="card">
		<div class="card" style="margin-bottom: 0.8rem;">
			<div class="card-header" style="font-weight: bold;">Compatibility Match</div>
			<div class="card-body">
				<span style="font-size: 12pt;color: grey;">
					This tells you how much you match with anybody else registered on the website.
					Click on the match button on the left sidebar, then click on the compatibility match button, a popup to find a user shows up.
					You can search for the person using his/her smingle username.
					You don't know that, check his/her twitter or instagram handle.
					Once the username is provided , we search for the user and tell you how compatible you are with the person.
				</span>
			</div>
			<div class="card-footer" style="font-weight: bold;">P.S : You are expected to have filled the questionnaire on the about you link on the left sidebar, this match is also more analysed than the <a href="#fmatch">Find Match</a></div> 
		</div>
		<div class="card" id="fmatch" style="margin-bottom: 0.8rem;">
			<div class="card-header" style="font-weight: bold;">Find Match</div>
			<div class="card-body">
				<span style="font-size: 12pt;color: grey">
					This matches you up with a random compatible person and tells you your compatibility with theirs, you can filter who should be matched with you.
					The matched users are notified they are being matched with you.
					The matches smingle, twitter and instagram profile will be provided to you if available.
					Then you can go ahead to text them on smingle to introduce yourself, it is recommended to move your chats to a different platform for better user chat experience.
				</span>
			</div>
			<div class="card-footer" style="font-weight: bold;"> P.S : You are expected to have filled the questionnaire on the about you link on the left sidebar </div> 
		</div>
		<div class="card" style="margin-bottom: 0.8rem;">
			<div class="card-header" style="font-weight: bold;">Events</div>
			<div class="card-body">
				<span style="font-size: 12pt;color: grey">
					Click on the Events link on the sidebar to your left, then click Shows or Parties. Our Customer Care finds you top events you might want to attend. Please suggest events to us with the above <strong><a href="#mymail">mail</a></strong>  and we would add them.
					Attend the event, if there are other users attending, you can find yourself a good match for the event.
					You can also host your events or shows, but this will be verified by our Team in less than 48hours tops.
				</span>
			</div>
			<div class="card-footer" style="font-weight: bold;"> P.S : You are expected to have filled the questionnaire on the about you link on the left sidebar to find matches for events </div> 
		</div>
		<div class="card" style="margin-bottom: 0.8rem;">
			<div class="card-header" style="font-weight: bold;">Anonymous Messages</div>
			<div class="card-body">
				<span style="font-size: 12pt;color: grey">
					Click on the Anonymous Messages link on the sidebar to your left.
					You can click on the Received to check anonymous messages sent to you, there is a reply button underneath all anonymous messages.
					Click on the Replies to see replies to the anonymous messages you have sent.
				</span>
			</div>
			<div class="card-footer" style="font-weight: bold;"> P.S : Do not threaten anybody. </div>
		</div>
		<div class="card" style="margin-bottom: 0.8rem;">
			<div class="card-header" style="font-weight: bold;">Note</div>
			<p>
				<ul style="list-style-type:circle;color: grey">
					<li>We believe we are about 75% accurate with our match prediction.</li>
					<li>We are not responsible for people that lie on their profile.</li> 
					<li>We make predictions based on your profile and answers.</li>
					<li>We want you to stay safe, if you are matched up with someone for an event, meet up with them at the venue.</li>
					<li>Please note any threats sent anonymously can be traced back to you by our team, let's be civilized.</li>
					<li>All hosted events take a max of 2days before they are finalized.</li>
					<li>If you have any issues, please contact us at <strong id="mymail"><a href="mailto:smingle2019@gmail.com" target="_top">smingle2019@gmail.com</a></strong>, we will respond in due time.</li>
				</ul>
			</p>
		</div>
	</div>
</div>
@endsection
