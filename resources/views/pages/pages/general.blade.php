@extends('layouts.myapp')

@section('content')
	<div style="padding:0.3rem 0.5rem;">
		<p style="font-weight: bolder;font-family: serif;"> Please answer this questions on general random things, it helps us to get to know you to make good matches </p>

		<form action="{{ route('general.store',['id' => $id]) }}" method="POST" style="padding-left: 0.4rem">
			@csrf

			<div style="margin-bottom: 1rem;">
				<h5 style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Choose One </h5>
				<input type="radio" name="gen1" value="1"><span class="label" style="margin-right: 1rem;"> Rihanna </span><br>
				<input type="radio" name="gen1" value="2"><span class="label" style="margin-right: 1rem;"> Beyonce </span><br>
				<input type="radio" name="gen1" value="3"><span class="label" style="margin-right: 1rem;"> Nicki Minaj </span><br>
				<input type="radio" name="gen1" value="4"><span class="label" style="margin-right: 1rem;"> I hate Music </span>
			</div>
			<div style="margin-bottom: 1rem;">
				<h5 style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Choose One </h5>
				<input type="radio" name="gen2" value="1"><span class="label" style="margin-right: 1rem;"> Messi </span><br>
				<input type="radio" name="gen2" value="2"><span class="label" style="margin-right: 1rem;"> Ronaldo </span><br>
				<input type="radio" name="gen2" value="3"><span class="label" style="margin-right: 1rem;"> Anyone </span><br>
				<input type="radio" name="gen2" value="4"><span class="label" style="margin-right: 1rem;"> I hate Football </span>
			</div>
			<div style="margin-bottom: 1rem;">
				<h5 style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Choose One </h5>
				<input type="radio" name="gen3" value="1"><span class="label" style="margin-right: 1rem;"> Pizza </span><br>
				<input type="radio" name="gen3" value="2"><span class="label" style="margin-right: 1rem;"> Ice-cream </span><br>
				<input type="radio" name="gen3" value="3"><span class="label" style="margin-right: 1rem;"> Burger </span><br>
				<input type="radio" name="gen3" value="4"><span class="label" style="margin-right: 1rem;"> None </span>
			</div>
			<div style="margin-bottom: 1rem;">
				<h5 style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Choose One </h5>
				<input type="radio" name="gen4" value="1"><span class="label" style="margin-right: 1rem;"> Alcohol </span><br>
				<input type="radio" name="gen4" value="2"><span class="label" style="margin-right: 1rem;"> Soft-Drink </span><br>
				<input type="radio" name="gen4" value="3"><span class="label" style="margin-right: 1rem;"> Wine </span><br>
				<input type="radio" name="gen4" value="4"><span class="label" style="margin-right: 1rem;"> Water </span>
			</div>
			<div style="margin-bottom: 1rem;">
				<h5 style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Do you believe in the One? </h5>
				<input type="radio" name="gen5" value="1"><span class="label" style="margin-right: 1rem;"> Stupid Question </span><br>
				<input type="radio" name="gen5" value="2"><span class="label" style="margin-right: 1rem;"> Yes </span><br>
				<input type="radio" name="gen5" value="3"><span class="label" style="margin-right: 1rem;"> No </span><br>
				<input type="radio" name="gen5" value="4"><span class="label" style="margin-right: 1rem;"> Yes,but not for me </span>
			</div>
			<div style="margin-bottom: 1rem;">
				<h5 style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Choose One </h5>
				<input type="radio" name="gen6" value="1"><span class="label" style="margin-right: 1rem;"> Wizkid </span><br>
				<input type="radio" name="gen6" value="2"><span class="label" style="margin-right: 1rem;"> Burna Boy </span><br>
				<input type="radio" name="gen6" value="3"><span class="label" style="margin-right: 1rem;"> Davido </span><br>
				<input type="radio" name="gen6" value="4"><span class="label" style="margin-right: 1rem;"> Naira Marley </span>
			</div>
			<div style="margin-bottom: 1rem;">
				<h5 style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> School? </h5>
				<input type="radio" name="gen7" value="1"><span class="label" style="margin-right: 1rem;"> Waste Of Time And Money Generally </span><br>
				<input type="radio" name="gen7" value="2"><span class="label" style="margin-right: 1rem;"> Waste Of Time And Money For Me</span><br>
				<input type="radio" name="gen7" value="3"><span class="label" style="margin-right: 1rem;"> Greatest Achievement </span><br>
				<input type="radio" name="gen7" value="4"><span class="label" style="margin-right: 1rem;"> Neutral </span>
			</div>
			<div style="margin-bottom: 1rem;">
				<h5 style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Choose One </h5>
				<input type="radio" name="gen8" value="1"><span class="label" style="margin-right: 1rem;"> Tea </span><br>
				<input type="radio" name="gen8" value="2"><span class="label" style="margin-right: 1rem;"> Coffee </span><br>
				<input type="radio" name="gen8" value="3"><span class="label" style="margin-right: 1rem;"> Juice </span><br>
				<input type="radio" name="gen8" value="4"><span class="label" style="margin-right: 1rem;"> Water </span>
			</div><div style="margin-bottom: 1rem;">
				<h5 style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Love? </h5>
				<input type="radio" name="gen9" value="1"><span class="label" style="margin-right: 1rem;"> Doesn't Exist </span><br>
				<input type="radio" name="gen9" value="2"><span class="label" style="margin-right: 1rem;"> I Love Love </span><br>
				<input type="radio" name="gen9" value="3"><span class="label" style="margin-right: 1rem;"> I Love Love But.. </span><br>
				<input type="radio" name="gen9" value="4"><span class="label" style="margin-right: 1rem;"> It Is A Give Me,I Give You Thingy </span>
			</div>
			<div style="margin-bottom: 1rem;">
				<h5 style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Money? </h5>
				<input type="radio" name="gen10" value="1"><span class="label" style="margin-right: 1rem;"> Adequate </span><br>
				<input type="radio" name="gen10" value="2"><span class="label" style="margin-right: 1rem;"> Plenty </span><br>
				<input type="radio" name="gen10" value="3"><span class="label" style="margin-right: 1rem;"> Average </span><br>
				<input type="radio" name="gen10" value="4"><span class="label" style="margin-right: 1rem;"> Money that Devil Fears </span>
			</div>
			<div style="margin-bottom: 1rem;">
				<h5 style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Anime? </h5>
				<input type="radio" name="gen11" value="1"><span class="label" style="margin-right: 1rem;"> Yes,Love it! </span><br>
				<input type="radio" name="gen11" value="2"><span class="label" style="margin-right: 1rem;"> Not Really </span><br>
				<input type="radio" name="gen11" value="3"><span class="label" style="margin-right: 1rem;"> For Children </span><br>
				<input type="radio" name="gen11" value="4"><span class="label" style="margin-right: 1rem;"> Whaaaat?? </span>
			</div>
			<div style="margin-bottom: 1rem;">
				<h5 style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Would live in? </h5>
				<input type="radio" name="gen12" value="1"><span class="label" style="margin-right: 1rem;"> U.S.A </span><br>
				<input type="radio" name="gen12" value="2"><span class="label" style="margin-right: 1rem;"> U.K </span><br>
				<input type="radio" name="gen12" value="3"><span class="label" style="margin-right: 1rem;"> Dubai </span><br>
				<input type="radio" name="gen12" value="4"><span class="label" style="margin-right: 1rem;"> Nigeria </span>
			</div>
			<div style="margin-bottom: 1rem;">
				<h5 style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Choose One </h5>
				<input type="radio" name="gen13" value="1"><span class="label" style="margin-right: 1rem;"> Rema </span><br>
				<input type="radio" name="gen13" value="2"><span class="label" style="margin-right: 1rem;"> Fireboy </span><br>
				<input type="radio" name="gen13" value="3"><span class="label" style="margin-right: 1rem;"> Lyta </span><br>
				<input type="radio" name="gen13" value="4"><span class="label" style="margin-right: 1rem;"> None </span>
			</div>
			<div style="margin-bottom: 1rem;">
				<h5 style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Sports? </h5>
				<input type="radio" name="gen14" value="1"><span class="label" style="margin-right: 1rem;"> Yeah,sure </span><br>
				<input type="radio" name="gen14" value="2"><span class="label" style="margin-right: 1rem;"> Yeah,whatever </span><br>
				<input type="radio" name="gen14" value="3"><span class="label" style="margin-right: 1rem;"> Mtchew </span><br>
				<input type="radio" name="gen14" value="4"><span class="label" style="margin-right: 1rem;"> Nah </span>
			</div>
			<div style="margin-bottom: 1rem;">
				<h5 style="font-weight: bold;font-family: sans-serif;font-size: 12pt;"> Imaginary Car? </h5>
				<input type="radio" name="gen15" value="1"><span class="label" style="margin-right: 1rem;"> Tesla/Ferrari </span><br>
				<input type="radio" name="gen15" value="2"><span class="label" style="margin-right: 1rem;"> Benz/Bugatti </span><br>
				<input type="radio" name="gen15" value="3"><span class="label" style="margin-right: 1rem;"> Toyota/Volvo </span><br>
				<input type="radio" name="gen15" value="4"><span class="label" style="margin-right: 1rem;"> None For Now </span>
			</div>
        	<div class="form-group row mb-0">
            	<div class="col-md-6 offset-md-4">
                	<button type="submit" class="btn btn-primary">
                    	Submit
                	</button>
            	</div>
        	</div>
		</form>
	</div>
@endsection