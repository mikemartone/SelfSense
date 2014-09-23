@extends('layouts.corp_master')

@section('content')
<!-- page contents ------------------------------------------------------------------------------------------------------>
	
	<!-- page contents ------------------------------------------------------------------------------------------------------>	

			

	 	<div class="toolframe">
		 		<br /> <br />
			 	<h1 id="registration"> Please fill out the following fields to register for your beta account.</h1>
			 	<div id="reg_box">
			 	<br />

			 	<div class="errors_container">
 				@foreach($errors->all() as $error)
 					<div class="error_background">
 						<img class="validation_error" src="{{  asset('assets/images/error.png')  }}">
 	            		<li class="error"> {{ $error }}</li>
 						
 	            	</div>
 	       		@endforeach
 	       		</div>

			 	{{  Form::open(array('url' => 'registration'))  }}
				 	<br />
				 	{{  Form::label('username', 'Username')  }}
				 	{{  Form::text('username', Input::old('username'), array('placeholder' => 'Username', 'class' => 'registration_fields'))  }}
				
				 	<br />
				 	{{  Form::label('email', 'E-Mail Address')  }}
				 	{{  Form::email('email', Input::old('email'), array('placeholder' => 'E-Mail', 'class' => 'registration_fields'))  }}
				 	<br />
				 	{{  Form::label('password', 'Password')  }}
				 	{{  Form::password('password', array('placeholder' => 'Password', 'class' => 'registration_fields'))  }}
				 	<br />
				 	{{  Form::label('password_confirmation', 'Confirm Password')  }}
				 	{{  Form::password('password_confirmation', array('placeholder' => 'Confirm Password', 'class' => 'registration_fields'))  }}
				 	<br />
				 	{{  Form::submit('Register', array('style' => 'margin-left:400px', 'class' => 'registration_fields'))  }}
				 	{{  Form::close()  }}
			 	</div>
		</div>


@stop
