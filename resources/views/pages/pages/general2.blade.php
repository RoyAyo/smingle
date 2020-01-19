@extends('layouts.myapp')

@section('content')
	<div style="padding:0.3rem 0.5rem;">
		<p style="font-weight: bolder;font-family: serif;"> Please answer this questions on general random things, it helps us to get to know who you are.</p>

		<form action="{{ route('general.store',['id' => $id]) }}" method="POST" style="padding-left: 0.4rem">
			@csrf
			<div class="q">
				<p>Describe yourself in one word</p>
				<span>
					<input type="radio" name="gen1" id="opt1" class="btnQ">
					<label for="opt1"><span>Loner/Depressed</span></label>
				<span>
					<input type="radio" name="gen1" id="opt2" class="btnQ">
					<label for="opt2"><span>Introvert</span></label>
				</span>
				<span>
					<input type="radio" name="gen1" id="opt3" class="btnQ">
					<label for="opt3"><span>Semi-Introvert</span></label>
				</span>
				<span>
					<input type="radio" name="gen1" id="opt4" class="btnQ">
					<label for="opt4"><span>Extrovert</span></label>
				</span>
			</div>
			<div class="q">
				<p>What do you think of all {{auth()->user()->gender=='1'? 'Women':'Men'}}</p>
				<span>
					<input type="radio" name="gen2" id="opt1" class="btnQ">
					<label for="opt1"><span>All {{auth()->user()->gender=='1'? 'Women':'Men'}} are wicked</span></label>
				<span>
					<input type="radio" name="gen2" id="opt2" class="btnQ">
					<label for="opt2"><span>{{auth()->user()->gender=='1'? 'Women':'Men'}} are scams</span></label>
				</span>
				<span>
					<input type="radio" name="gen2" id="opt3" class="btnQ">
					<label for="opt3"><span>I am indifferent</span></label>
				</span>
				<span>
					<input type="radio" name="gen2" id="opt4" class="btnQ">
					<label for="opt4"><span>{{auth()->user()->gender=='1'? 'Women':'Men'}} are the best set of people</span></label>
				</span>
			</div>
			<div class="q">
				<p>Thought on sex before Marriage</p>
				<span>
					<input type="radio" name="gen3" id="opt1" class="btnQ">
					<label for="opt1"><span>Our bodies are vessels and must be kept so till Marriage</span></label>
				<span>
					<input type="radio" name="gen3" id="opt2" class="btnQ">
					<label for="opt2"><span>Still Waiting...Don't know</span></label>
				</span>
				<span>
					<input type="radio" name="gen3" id="opt3" class="btnQ">
					<label for="opt3"><span>It's not a big deal if you do it with the right one</span></label>
				</span>
				<span>
					<input type="radio" name="gen3" id="opt4" class="btnQ">
					<label for="opt4"><span>They did not give birth to me to eat one fish</span></label>
				</span>
			</div>
			<div class="q">
				<p>Funny Partner?</p>
				<span>
					<input type="radio" name="gen4" id="opt1" class="btnQ">
					<label for="opt1"><span>Carry your jokes to your parents at home,abeg</span></label>
				<span>
					<input type="radio" name="gen4" id="opt2" class="btnQ">
					<label for="opt2"><span>They should relax sha</span></label>
				</span>
				<span>
					<input type="radio" name="gen4" id="opt3" class="btnQ">
					<label for="opt3"><span>I love them to an extent</span></label>
				</span>
				<span>
					<input type="radio" name="gen4" id="opt4" class="btnQ">
					<label for="opt4"><span>Best partners</span></label>
				</span>
			</div>
			<div class="q">
				<p>Broke Relationship?</p>
				<span>
					<input type="radio" name="gen5" id="opt1" class="btnQ">
					<label for="opt1"><span>Stay Faraway</span></label>
				<span>
					<input type="radio" name="gen5" id="opt2" class="btnQ">
					<label for="opt2"><span>Partner should show potential of money coming soon</span></label>
				</span>
				<span>
					<input type="radio" name="gen5" id="opt3" class="btnQ">
					<label for="opt3"><span>Depends on my own situation</span></label>
				</span>
				<span>
					<input type="radio" name="gen5" id="opt4" class="btnQ">
					<label for="opt4"><span>As long as there is love</span></label>
				</span>
			</div>
			<div class="q">
				<p>Men should be superiors in relationships</p>
				<span>
					<input type="radio" name="gen6" id="opt1" class="btnQ">
					<label for="opt1"><span>This question is stupid</span></label>
				<span>
					<input type="radio" name="gen6" id="opt2" class="btnQ">
					<label for="opt2"><span>Definitely Not(shared responsibilities)</span></label>
				</span>
				<span>
					<input type="radio" name="gen6" id="opt3" class="btnQ">
					<label for="opt3"><span>Yes, if it comes down to it</span></label>
				</span>
				<span>
					<input type="radio" name="gen6" id="opt4" class="btnQ">
					<label for="opt4"><span>Men should be superiors as more responsibilities fall on them</span></label>
				</span>
			</div>
			<div class="q">
				<p>Music?</p>
				<span>
					<input type="radio" name="gen7" id="opt1" class="btnQ">
					<label for="opt1"><span>Old School</span></label>
				<span>
					<input type="radio" name="gen7" id="opt2" class="btnQ">
					<label for="opt2"><span>Love songs</span></label>
				</span>
				<span>
					<input type="radio" name="gen7" id="opt3" class="btnQ">
					<label for="opt3"><span>Rap/Trap</span></label>
				</span>
				<span>
					<input type="radio" name="gen7" id="opt4" class="btnQ">
					<label for="opt4"><span>Fast Paced Jams</span></label>
				</span>
			</div>
			<div class="q">
				<p>Yahoo Boys?</p>
				<span>
					<input type="radio" name="gen8" id="opt1" class="btnQ">
					<label for="opt1"><span>They were pushed to the edge by country</span></label>
				<span>
					<input type="radio" name="gen8" id="opt2" class="btnQ">
					<label for="opt2"><span>I could care less</span></label>
				</span>
				<span>
					<input type="radio" name="gen8" id="opt3" class="btnQ">
					<label for="opt3"><span>Stupid people</span></label>
				</span>
				<span>
					<input type="radio" name="gen8" id="opt4" class="btnQ">
					<label for="opt4"><span>Something serious really needs to be done about them.</span></label>
				</span>
			</div>
			<div class="q">
				<p>Travelling the world?</p>
				<span>
					<input type="radio" name="gen9" id="opt1" class="btnQ">
					<label for="opt1"><span>I want to see every corner I possibly can</span></label>
				<span>
					<input type="radio" name="gen9" id="opt2" class="btnQ">
					<label for="opt2"><span>I have a few places in mind</span></label>
				</span>
				<span>
					<input type="radio" name="gen9" id="opt3" class="btnQ">
					<label for="opt3"><span>Not thought about it</span></label>
				</span>
				<span>
					<input type="radio" name="gen9" id="opt4" class="btnQ">
					<label for="opt4"><span>I am comfy in my small corner</span></label>
				</span>
			</div>
			<div class="q">
				<p>Friends?</p>
				<span>
					<input type="radio" name="gen10" id="opt1" class="btnQ">
					<label for="opt1"><span>Bitter people that want to see you down</span></label>
				<span>
					<input type="radio" name="gen10" id="opt2" class="btnQ">
					<label for="opt2"><span>I don't have them generally</span></label>
				</span>
				<span>
					<input type="radio" name="gen10" id="opt3" class="btnQ">
					<label for="opt3"><span>Very few people I can call friends</span></label>
				</span>
				<span>
					<input type="radio" name="gen10" id="opt4" class="btnQ">
					<label for="opt4"><span>Best thing in my life</span></label>
				</span>
			</div>
			<div class="q">
				<p>Money I want?</p>
				<span>
					<input type="radio" name="gen11" id="opt1" class="btnQ">
					<label for="opt1"><span>The one that fears devil</span></label>
				<span>
					<input type="radio" name="gen11" id="opt2" class="btnQ">
					<label for="opt2"><span>Plenty</span></label>
				</span>
				<span>
					<input type="radio" name="gen11" id="opt3" class="btnQ">
					<label for="opt3"><span>Adequate</span></label>
				</span>
				<span>
					<input type="radio" name="gen11" id="opt4" class="btnQ">
					<label for="opt4"><span>Average</span></label>
				</span>
			</div>
			<div class="q">
				<p>School?</p>
				<span>
					<input type="radio" name="gen12" id="opt1" class="btnQ">
					<label for="opt1"><span>Waste of time and money generally</span></label>
				<span>
					<input type="radio" name="gen12" id="opt2" class="btnQ">
					<label for="opt2"><span>It works/worked for others, just not me</span></label>
				</span>
				<span>
					<input type="radio" name="gen12" id="opt3" class="btnQ">
					<label for="opt3"><span>It works/worked for me</span></label>
				</span>
				<span>
					<input type="radio" name="gen12" id="opt4" class="btnQ">
					<label for="opt4"><span>Best thing happening/that happened to me</span></label>
				</span>
			</div>
			<div class="q">
				<p></p>
				<span>
					<input type="radio" name="gen1" id="opt1" class="btnQ">
					<label for="opt1"><span>Hello World</span></label>
				<span>
					<input type="radio" name="gen1" id="opt2" class="btnQ">
					<label for="opt2"><span>Hello World</span></label>
				</span>
				<span>
					<input type="radio" name="gen1" id="opt3" class="btnQ">
					<label for="opt3"><span>Hello World</span></label>
				</span>
				<span>
					<input type="radio" name="gen1" id="opt4" class="btnQ">
					<label for="opt4"><span>Hello World</span></label>
				</span>
			</div>
			<div class="q">
				<p></p>
				<span>
					<input type="radio" name="gen1" id="opt1" class="btnQ">
					<label for="opt1"><span>Hello World</span></label>
				<span>
					<input type="radio" name="gen1" id="opt2" class="btnQ">
					<label for="opt2"><span>Hello World</span></label>
				</span>
				<span>
					<input type="radio" name="gen1" id="opt3" class="btnQ">
					<label for="opt3"><span>Hello World</span></label>
				</span>
				<span>
					<input type="radio" name="gen1" id="opt4" class="btnQ">
					<label for="opt4"><span>Hello World</span></label>
				</span>
			</div>
			<div class="q">
				<p></p>
				<span>
					<input type="radio" name="gen1" id="opt1" class="btnQ">
					<label for="opt1"><span>Hello World</span></label>
				<span>
					<input type="radio" name="gen1" id="opt2" class="btnQ">
					<label for="opt2"><span>Hello World</span></label>
				</span>
				<span>
					<input type="radio" name="gen1" id="opt3" class="btnQ">
					<label for="opt3"><span>Hello World</span></label>
				</span>
				<span>
					<input type="radio" name="gen1" id="opt4" class="btnQ">
					<label for="opt4"><span>Hello World</span></label>
				</span>
			</div>
		</form>
	</div>
@endsection