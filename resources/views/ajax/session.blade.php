<script>
	@if(Session::has('anon'))
		toastr.success("{{Session::get('anon')}}")
	@endif
	@if(Session::has('eventVerified'))
		toastr.success("{{Session::get('eventVerified')}}")
	@endif
	@if(Session::has('attendVerified'))
		toastr.success("{{Session::get('attendVerified')}}")
	@endif
	@if(Session::has('partyStored'))
		toastr.success("{{Session::get('partyStored')}}")
	@endif
	@if(Session::has('showStored'))
		toastr.success("{{Session::get('showStored')}}")
	@endif
	@if(Session::has('aboutFilled'))
		toastr.success("{{Session::get('aboutFilled')}}")
	@endif
	@if(Session::has('changedig'))
		toastr.info("{{Session::get('changedig')}}")
	@endif
	@if(Session::has('changedtwit'))
		toastr.info("{{Session::get('changedtwit')}}")
	@endif
</script>