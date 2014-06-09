@extends('layouts.user_home')

@section('content')
	
	<!-- page contents ------------------------------------------------------------------------------------------------------>	


	 	<div class="toolframe" style="text-align:center; font-family:swiss_light; color:grey; font-size:30px; margin-top:25px;">


	 	<h1>Welcome.  <br />TO THE CARETAKER ZONE WOOOOOOOO</h1>

	 	


	 	@foreach ($caseload as $case)
	 	
	 			 {{ HTML::link('dashboard/' . $case->user_id, User::find($case->user_id)->username, array('class' => 'caseload')) }}
	 			 
		@endforeach




	 	</div>

		



@stop
