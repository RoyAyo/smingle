@extends('layouts.new2')

@section('content')
	<div class="jumbo"></div>
	<div class="icons">
		<div class="big-icon"></div>
	</div>
	<div class="details">
		<h3>{{ auth()->user()->name }}</h3>
		@if(auth()->user()->profile->student == 1)
			<p>Student</p>
		@endif
	</div>
	<div class="bio">
			<div class="content">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro officiis fugit hic vel voluptates perferendis aut quibusdam sit omnis unde aspernatur quae repellat blanditiis autem, a libero asperiores neque illum aliquid est tempore. Eveniet velit voluptate amet facere, repellendus aperiam, cumque est ipsam. Asperiores expedita iusto, inventore sit suscipit nihil repudiandae? Laboriosam cum maxime dolorem neque, in veniam expedita ad. Hic fugit necessitatibus blanditiis, optio dignissimos molestiae nam, numquam odio.</p>
			</div>
@endsection