@extends('layouts.404')

@section('content')
	
	<!-- page contents ------------------------------------------------------------------------------------------------------>	


	 	<div class="toolframe" style="text-align:center; font-family:swiss_light; color:grey; font-size:30px; margin-top:25px;">
	 	<br />
	 		You aren't supposed to be here!
	 		<br />
	 		{{  HTML::link(URL::previous(), 'Go Back', array('id' => 'goback'))  }}


	 	</div>


		



@stop
