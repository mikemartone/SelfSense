<!DOCTYPE html>
<html lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <title>Selfsense {{isset($pageTitle) ? $pageTitle: ''}}</title>
	{{HTML::style('assets/css/style_master.css')}}
	<link rel="shortcut icon" href="{{asset('assets/images/icon.ico')}}"> 
	<script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
</head>
<body>

<!-- banner ---------------------------------------------------------------------------------------------------------->
	<div class="banner_content">
		<img src="http://www.selfsense.co/site_flat/logo_white04.png" class="banner_leaf">
		<p class="banner_selfsense">SelfSense</p>
		<ul class="nav_menu" style="margin-right:0px;" >
			<li><a href="">home</a></li>
			<li><a href="">profile</a></li>
			<li><a href="">tool-kit</a></li>
			<li><a href="">goals</a></li>
			<li><a href="" style="border-right:none;">dashboard</a></li>
		</ul> 
	</div>
	<div class="banner"></div>
	
<!-- page header ------------------------------------------------------------------------------------------------------>
	<div id="content-header">
		<div class="page-name"> {{isset($pageTitle) ? $pageTitle: ''}} </div>
		<div class="header-profile">
			<div class="profile_pic"><img src="{{ asset('assets/images/profile_pic_smiley.png') }}"></div>
			<div class="profile_info">
				<p>jsmiles123</p>
				<div class="profile_links"><a href="v1_individual_profile_dev.php">my profile</a>  <a href="logout.php">logout</a></div>
			</div>
		</div>
	</div>



	@yield('content')





<!-- footer ------------------------------------------------------------------------------------------------------>
	<div id="footer">	
		<p id="corp-footer" >SelfSense Technology</p>
		<p id="copyright-footer">2013</p>
	</div>
</body>

</html>