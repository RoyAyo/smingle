@extends('layouts.myapp')

@section('content')
<div class="container">
	<div class="panel">
		<div class="card">
			<p>
				<ul style="list-style-type: cambodian;">
					<li>Please note that we use machine learning models to analyse your profile and the answers to your question on various life topics to make our predictions.</li> 
					<li>We believe we are about 80% accurate with our answers.</li>
					<li>We are not responsible for people that lie on their profile.</li> 
					<li>We make predictions based on your profile and answers</li>
					<li>If you have any issues, please contact us at <strong>smingle2019@gmail.com</strong></li>
					<li>We want you to stay safe, if you are matched up with someone for an event, meet up with them at the venue</li>
				</ul>
			</p>
		</div>
		<div class="card">
			<div class="card-header">Compatibility Match</div>
			<div class="card-body">
				<p>
					This tells you how much you match with anybody else registered on the website.
					Click on the match button on the left sidebar, then click on the compatibility match button, a popup to find a user shows up.
					You can search for the person using his/her smingle username, twitter or instagram handle.
					Once the username is provided , we search for the user and tell you how compatible you are with the person.
					<p>P.S:You are expected to have filled the questionnaire on the about you link on the left sidebar, this match is also more analysed than the <a href="#fmatch">Find Match</a></p> 
				</p>
			</div>
		</div>
		<div class="card" id="fmatch">
			<div class="card-header">Find Match</div>
			<div class="card-body">
				<p>
					This matches you up with a random compatible person and tells you your compatibility, you can filter who should be matched with you.
					The matches smingle, twitter and instagram profile will be provided to you if available.
					Then you can go ahead to text them on smingle to introduce yourself, it is recommended to move your chats to a different platform for better user chat experience.
					<p>P.S:You are expected to have filled the questionnaire on the about you link on the left sidebar</p> 
				</p>
			</div>
		</div>
	</div>
</div>
@endsection