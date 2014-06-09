@extends('layouts.corp_master')

@section('content')
<!-- page contents ------------------------------------------------------------------------------------------------------>
	
	<!-- page contents ------------------------------------------------------------------------------------------------------>	

			@foreach($errors->all() as $error)
            	<li class="error" style="margin-left:38%; margin-bottom:-15px;"> {{ $error }}</li>
            	<br />
       		@endforeach

	 	<div class="toolframe">
		 		<br /> <br />
			 	<h1 id="registration"> Please fill out the following fields to register for your beta account.<h1>
			 	<div id="reg_box">
			 	<br />
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
