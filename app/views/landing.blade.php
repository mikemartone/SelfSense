@extends('layouts.corp_master')

@section('content')
<!-- page contents ------------------------------------------------------------------------------------------------------>
	<div id="login_content">
		
		<!-- box 1 -->
		<div id="login-box1">
			<img src="assets/images/logo_white04.png" id="login-box1-icon" />
			<p id="company_name" >SelfSense Technology</p>
			<div id="corporate_link" ><a href="http://www.selfsense.co" id="corp-link-text" target="_blank">learn more</a></div>
		</div>
		
		<!-- spacer -->
		<div id="center-line"></div>
		
		<!-- box 2 -->
		<div id="login-box2">
			<div id="login-form">
				<p id="sign-in-text" >sign into your account:</p>
				{{ Form::open(array('url' => 'login')) }}

					<table width="300" border="0" align="center" cellpadding="2" cellspacing="10">
						<tr><td width="188">
							{{ Form::text('login', '', array('placeholder' => 'username', 'class' => 'textfield')) }}
						</td></tr>
						<tr><td></td></tr>
						<tr><td>
							{{ Form::password('password', array('placeholder' => 'password', 'class' => 'textfield')) }}
						</td></tr>
						<tr><td></td></tr>
						<tr><td>&nbsp;</td><td>
							{{ Form::submit('enter', array('id' => 'submit-button'))}}
						</td></tr>
					</table>
					{{ Form::close() }}
			</div>
			<p id="register">not a SelfSense user? register here</p>
		</div>
	</div>
@stop
