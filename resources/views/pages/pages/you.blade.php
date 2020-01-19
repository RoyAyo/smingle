@extends('layouts.myapp')

@section('content')
	<div style="padding:0.3rem 0.5rem;">
		<p style="font-weight: bolder;font-family: serif;"> Please take your time to answer these,it helps us to get to know who you are.</p>

		<form action="{{ route('general.store',['id' => $id]) }}" method="POST" style="padding-left: 0.4rem">
			@csrf
			<div class="q">
				<p>Describe yourself in one word</p>
				<span>
					<input type="radio" name="gen1" id="opt0" class="btnQ">
					<label for="opt0"><span>Loner/Depressed</span></label>
				</span>
				<span>
					<input type="radio" name="gen1" id="opt1" class="btnQ">
					<label for="opt1"><span>Introvert</span></label>
				</span>
				<span>
					<input type="radio" name="gen1" id="opt2" class="btnQ">
					<label for="opt2"><span>Semi-Introvert</span></label>
				</span>
				<span>
					<input type="radio" name="gen1" id="opt3" class="btnQ">
					<label for="opt3"><span>Extrovert</span></label>
				</span>
			</div>
			<div class="q">
				<p>What do you think of all {{auth()->user()->gender=='1'? 'Women':'Men'}}</p>
				<span>
					<input type="radio" name="gen2" id="opt4" class="btnQ">
					<label for="opt4"><span>All {{auth()->user()->gender=='1'? 'Women':'Men'}} are wicked</span></label>
				</span>
				<span>
					<input type="radio" name="gen2" id="opt5" class="btnQ">
					<label for="opt5"><span>{{auth()->user()->gender=='1'? 'Women':'Men'}} are scams</span></label>
				</span>
				<span>
					<input type="radio" name="gen2" id="opt6" class="btnQ">
					<label for="opt6"><span>I am indifferent</span></label>
				</span>
				<span>
					<input type="radio" name="gen2" id="opt7" class="btnQ">
					<label for="opt7"><span>{{auth()->user()->gender=='1'? 'Women':'Men'}} are the best set of people</span></label>
				</span>
			</div>
			<div class="q">
				<p>Sex before Marriage</p>
				<span>
					<input type="radio" name="gen3" id="opt8" class="btnQ">
					<label for="opt8"><span>Bodies should be vessels till Marriage</span></label>
				</span>
				<span>
					<input type="radio" name="gen3" id="opt9" class="btnQ">
					<label for="opt9"><span>No opinion</span></label>
				</span>
				<span>
					<input type="radio" name="gen3" id="opt10" class="btnQ">
					<label for="opt10"><span>It's not a big deal if you do it with the right one</span></label>
				</span>
				<span>
					<input type="radio" name="gen3" id="opt11" class="btnQ">
					<label for="opt11"><span>They did not give birth to me to eat one fish</span></label>
				</span>
			</div>
			<div class="q">
				<p>Funny Partner?</p>
				<span>
					<input type="radio" name="gen4" id="opt12" class="btnQ">
					<label for="opt12"><span>Carry your jokes to your parents</span></label>
				</span>
				<span>
					<input type="radio" name="gen4" id="opt13" class="btnQ">
					<label for="opt13"><span>They should relax sha</span></label>
				</span>
				<span>
					<input type="radio" name="gen4" id="opt14" class="btnQ">
					<label for="opt14"><span>I love them to an extent</span></label>
				</span>
				<span>
					<input type="radio" name="gen4" id="opt15" class="btnQ">
					<label for="opt15"><span>Best partners</span></label>
				</span>
			</div>
			<div class="q">
				<p>Broke Relationship?</p>
				<span>
					<input type="radio" name="gen5" id="opt16" class="btnQ">
					<label for="opt16"><span>Stay Faraway</span></label>
				</span>
				<span>
					<input type="radio" name="gen5" id="opt17" class="btnQ">
					<label for="opt17"><span>Partner should show potential of money coming soon</span></label>
				</span>
				<span>
					<input type="radio" name="gen5" id="opt18" class="btnQ">
					<label for="opt18"><span>Depends on my own situation</span></label>
				</span>
				<span>
					<input type="radio" name="gen5" id="opt19" class="btnQ">
					<label for="opt19"><span>As long as there is love</span></label>
				</span>
			</div>
			<div class="q">
				<p>Men should be superiors in relationships</p>
				<span>
					<input type="radio" name="gen6" id="opt20" class="btnQ">
					<label for="opt20"><span>This question is stupid</span></label>
				</span>
				<span>
					<input type="radio" name="gen6" id="opt21" class="btnQ">
					<label for="opt21"><span>Definitely Not(shared responsibilities)</span></label>
				</span>
				<span>
					<input type="radio" name="gen6" id="opt22" class="btnQ">
					<label for="opt22"><span>Yes, if it comes down to it</span></label>
				</span>
				<span>
					<input type="radio" name="gen6" id="opt23" class="btnQ">
					<label for="opt23"><span>Definitely,Men should be superiors as more responsibilities fall on them</span></label>
				</span>
			</div>
			<div class="q">
				<p>Music?</p>
				<span>
					<input type="radio" name="gen7" id="opt24" class="btnQ">
					<label for="opt24"><span>Old School</span></label>
				</span>
				<span>
					<input type="radio" name="gen7" id="opt25" class="btnQ">
					<label for="opt25"><span>Love songs</span></label>
				</span>
				<span>
					<input type="radio" name="gen7" id="opt26" class="btnQ">
					<label for="opt26"><span>Rap/Trap</span></label>
				</span>
				<span>
					<input type="radio" name="gen7" id="opt27" class="btnQ">
					<label for="opt27"><span>Fast Paced Jams</span></label>
				</span>
			</div>
			<div class="q">
				<p>Yahoo Boys?</p>
				<span>
					<input type="radio" name="gen8" id="opt28" class="btnQ">
					<label for="opt28"><span>They were pushed to the edge by country</span></label>
				</span>
				<span>
					<input type="radio" name="gen8" id="opt29" class="btnQ">
					<label for="opt29"><span>I could care less</span></label>
				</span>
				<span>
					<input type="radio" name="gen8" id="opt30" class="btnQ">
					<label for="opt30"><span>Stupid people</span></label>
				</span>
				<span>
					<input type="radio" name="gen8" id="opt31" class="btnQ">
					<label for="opt31"><span>Something serious really needs to be done about them.</span></label>
				</span>
			</div>
			<div class="q">
				<p>Travelling the world?</p>
				<span>
					<input type="radio" name="gen9" id="opt32" class="btnQ">
					<label for="opt32"><span>I want to see every corner I possibly can</span></label>
				</span>
				<span>
					<input type="radio" name="gen9" id="opt33" class="btnQ">
					<label for="opt33"><span>I have a few places in mind</span></label>
				</span>
				<span>
					<input type="radio" name="gen9" id="opt34" class="btnQ">
					<label for="opt34"><span>Not thought about it</span></label>
				</span>
				<span>
					<input type="radio" name="gen9" id="opt35" class="btnQ">
					<label for="opt35"><span>I am comfy in my small corner</span></label>
				</span>
			</div>
			<div class="q">
				<p>Friends?</p>
				<span>
					<input type="radio" name="gen10" id="opt36" class="btnQ">
					<label for="opt36"><span>Bitter people that want to see you down</span></label>
				</span>
				<span>
					<input type="radio" name="gen10" id="opt37" class="btnQ">
					<label for="opt37"><span>I don't have them generally</span></label>
				</span>
				<span>
					<input type="radio" name="gen10" id="opt38" class="btnQ">
					<label for="opt38"><span>Very few people I can call friends</span></label>
				</span>
				<span>
					<input type="radio" name="gen10" id="opt39" class="btnQ">
					<label for="opt39"><span>Best thing in my life</span></label>
				</span>
			</div>
			<div class="q">
				<p>Money I want?</p>
				<span>
					<input type="radio" name="gen11" id="opt40" class="btnQ">
					<label for="opt40"><span>The one that fears devil</span></label>
				</span>
				<span>
					<input type="radio" name="gen11" id="opt41" class="btnQ">
					<label for="opt41"><span>Plenty</span></label>
				</span>
				<span>
					<input type="radio" name="gen11" id="opt42" class="btnQ">
					<label for="opt42"><span>Adequate</span></label>
				</span>
				<span>
					<input type="radio" name="gen11" id="opt43" class="btnQ">
					<label for="opt43"><span>Average</span></label>
				</span>
			</div>
			<div class="q">
				<p>School?</p>
				<span>
					<input type="radio" name="gen12" id="opt44" class="btnQ">
					<label for="opt44"><span>Waste of time and money generally</span></label>
				</span>
				<span>
					<input type="radio" name="gen12" id="opt45" class="btnQ">
					<label for="opt45"><span>It works/worked for others, just not me</span></label>
				</span>
				<span>
					<input type="radio" name="gen12" id="opt46" class="btnQ">
					<label for="opt46"><span>It works/worked for me</span></label>
				</span>
				<span>
					<input type="radio" name="gen12" id="opt47" class="btnQ">
					<label for="opt47"><span>Best thing happening/that happened to me</span></label>
				</span>
			</div>
			<div class="q">
				<p>What keeps a relationship happy?</p>
				<span>
					<input type="radio" name="gen13" id="opt48" class="btnQ">
					<label for="opt48"><span>Money</span></label>
				</span>
				<span>
					<input type="radio" name="gen13" id="opt49" class="btnQ">
					<label for="opt49"><span>Calling Everyday</span></label>
				</span>
				<span>
					<input type="radio" name="gen13" id="opt50" class="btnQ">
					<label for="opt50"><span>Tolerance</span></label>
				</span>
				<span>
					<input type="radio" name="gen13" id="opt51" class="btnQ">
					<label for="opt51"><span>Love</span></label>
				</span>
			</div>
			<div class="q">
				<p>Politics</p>
				<span>
					<input type="radio" name="gen14" id="opt52" class="btnQ">
					<label for="opt52"><span>I have strong opinions</span></label>
				</span>
				<span>
					<input type="radio" name="gen14" id="opt53" class="btnQ">
					<label for="opt53"><span>I am quite knowledgeable on it</span></label>
				</span>
				<span>
					<input type="radio" name="gen14" id="opt54" class="btnQ">
					<label for="opt54"><span>I don't know much</span></label>
				</span>
				<span>
					<input type="radio" name="gen14" id="opt55" class="btnQ">
					<label for="opt55"><span>I don't care</span></label>
				</span>
			</div>
			<div class="q">
				<p>What is the surest way to get rich?</p>
				<span>
					<input type="radio" name="gen15" id="opt56" class="btnQ">
					<label for="opt56"><span>Business</span></label>
				</span>
				<span>
					<input type="radio" name="gen15" id="opt57" class="btnQ">
					<label for="opt57"><span>Side hustle</span></label>
				</span>
				<span>
					<input type="radio" name="gen15" id="opt58" class="btnQ">
					<label for="opt58"><span>School</span></label>
				</span>
				<span>
					<input type="radio" name="gen15" id="opt59" class="btnQ">
					<label for="opt59"><span>Gambling</span></label>
				</span>
			</div>
			<div style="text-align: center;">
				<button class="btn btn-primary">Finish!</button>
			</div>
		</form>
	</div>
@endsection