<!DOCTYPE html>
<html lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <title>Selfsense {{isset($pageTitle) ? $pageTitle: ''}}</title>
	{{HTML::style('assets/css/style_master.css')}}
	{{HTML::style('assets/js/fancybox/source/jquery.fancybox.css')}}
	<link rel="shortcut icon" href="{{asset('assets/images/icon.ico')}}"> 
	{{ HTML::script('assets/js/jquery-1.11.0.min.js') }}
</head>
<body>

<!-- banner ---------------------------------------------------------------------------------------------------------->
	<div class="banner_content">
		<img src="{{asset('assets/images/logo_white04.png')}}" class="banner_leaf">
		<p class="banner_selfsense">SelfSense</p>
		<ul class="nav_menu" style="margin-right:0px;" >
			<li><a href="login">home</a></li>
			<li><a href="profile">profile</a></li>
			<li><a href="mood">tool-kit</a></li>
			<li><a href="goals">goals</a></li>
			<li><a href="dashboard" style="border-right:none;">dashboard</a></li>
		</ul> 
	</div>
	<div class="banner"></div>
	
<!-- page header ------------------------------------------------------------------------------------------------------>
	@if(Session::has('message'))
			<div class="alert_background">
            <p class="alert">{{ Session::get('message') }}</p>
            </div>
    @endif

	<div id="content-header">
		
		<div class="page-name"> {{isset($pageTitle) ? $pageTitle: ''}} </div>
		<div class="header-profile">
			<div class="profile_pic"><img src="{{ asset('assets/images/user_icon.png') }}"></div>
			<div class="profile_info">
				<p>{{{  Auth::user()->username  }}}</p>
				<div class="profile_links"><a href="profile">my profile</a>   <a href= "{{  URL::action('HomeController@getLogout')  }}" > logout  </a></div>
			</div>
		</div>
	</div>



	@yield('content')





<!-- footer ------------------------------------------------------------------------------------------------------>
	<div id="footer">	
		<p id="corp-footer" >SelfSense Technology</p>
		<p id="copyright-footer">2014</p>
	</div>
</body>

</html>