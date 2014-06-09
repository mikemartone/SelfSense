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
		<img src="http://www.selfsense.co/site_flat/logo_white04.png" class="banner_leaf">
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
	<div id="content-header">
		<div class="page-name"> {{isset($pageTitle) ? $pageTitle: ''}} </div>
		<div id="control">
			{{ Form::open(array('url' => 'dashboard/' .$id)) }}
				{{  Form::label('from', 'from', array('class' => 'date_label'))  }}
				{{  Form::text('from', $from, array('id' => 'from', 'class' => 'date_input'))  }}
				{{  Form::label('to', 'to', array('class' => 'date_label'))  }}
				{{  Form::text('to', $to, array('id' => 'to', 'class' => 'date_input'))  }}
				{{  Form::button('go', array('type' => 'submit', 'id' => 'date_submit'))  }}
			{{  Form::close()  }}
		</div>
		Viewing:{{{  User::find($id)->username  }}}
		<div class="header-profile">
			<div class="profile_pic"><img src="{{ asset('assets/images/profile_pic_smiley.png') }}"></div>
			<div class="profile_info">
				<p>{{{  Auth::user()->username  }}}</p>

				<div class="profile_links">
					<a href="profile">my profile</a>  
					
					<a href="logout">logout</a>
				</div>
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