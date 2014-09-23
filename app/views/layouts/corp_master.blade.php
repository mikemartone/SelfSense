<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>SelfSense</title>
	<link href="" rel="stylesheet" type="text/css" />
	<link href="" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="assets/images/icon.ico"> 
	{{  HTML::style('assets/css/style_master.css')  }}
	{{ HTML::script('assets/js/jquery-1.11.0.min.js') }}
</head>

<body>
<!-- banner ---------------------------------------------------------------------------------------------------------->
	<div class="banner_content">
		<img src="{{asset('assets/images/logo_white04.png')}}" class="banner_leaf" />
		<p class="banner_selfsense">SelfSense</p>
		<ul class="nav_menu">
			<li><a href="{{  URL::to('/')  }}">home</a></li>
			<li><a href="news.asp">technology</a></li>
			<li><a href="contact.asp">about us</a></li>
			<li><a href="about.asp">news</a></li>
			<li><a href="about.asp" style="border-right:none;">contact us</a></li>
		</ul> 
	</div>
	<div class="banner"></div>



@yield('content')


<!-- footer ------------------------------------------------------------------------------------------------------>
	<div id="footer">	
		<p id="corp-footer" >SelfSense Technology</p>
		<p id="copyright-footer">2014</p>
	</div>
</body>

</html>