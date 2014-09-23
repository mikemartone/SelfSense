@extends('layouts.user_home')

@section('content')
<!-- page contents --------------------------------------------------------------------------------------------------- -->	
	<div id="ind-home-content">
		
		
<!-- ---column 1 -->
	<div id="ind-home-col1">
	
	<!-- upcomming events -->
		<div id="upcoming">
			<div id="upcoming_title">upcoming</div>
		</div>
	
	<!-- achievements -->
		<div id="achievements_area">
			<div id="achievements_title">achievements</div>
			<div class="achievement_icon_row">
				<div class="achievement_icon">
					<img src="{{asset('assets/images/icon_badge3.png')}}">
				</div>
				<div class="achievement_icon">
					<img src="{{asset('assets/images/icon_badge2.png')}}">
				</div>
				<div class="achievement_icon">
					<img src="{{asset('assets/images/icon_badge1.png')}}">
				</div>
			</div>
			<div class="achievement_icon_row">
				<div class="achievement_icon">
					<img src="{{asset('assets/images/icon_badge4.png')}}">
				</div>
				<div class="achievement_icon">
					<img src="{{asset('assets/images/icon_badge5.png')}}">
				</div>
				<div class="achievement_icon">
					<img src="{{asset('assets/images/icon_badge6.png')}}">
				</div>
			</div>
			<div class="achievement_icon_row">
				<div class="achievement_icon">
					<img src="{{asset('assets/images/icon_badge7.png')}}">
				</div>
				<div class="achievement_icon">
					<img src="{{asset('assets/images/icon_badge8.png')}}">
				</div>
				<div class="achievement_icon">
					<img src="{{asset('assets/images/icon_badge9.png')}}">
				</div>
			</div>
		</div>
	</div>
		
<!----- column 2 -->
	<div id="ind-home-col2">
	
	<!-- health wheel -->
		<img id="wheel-pic" src="{{asset('assets/images/health_wheel.png')}}">
		
	<!-- goals -->
		<div id="goals_area">
			<div id="goals_title">goals</div>
			<div class="goal_row">
				<div class="goal_percent">63<span class="percent_symbol">%</span></div>
				<div class="progress_bar">
					<div class="breathing_stepbar_complete"></div>
					<div class="breathing_stepbar_complete"></div>
					<div class="breathing_stepbar_complete"></div>
					<div class="breathing_stepbar_inprogress"></div>
					<div class="breathing_stepbar_notstarted"></div>
					<div class="breathing_stepbar_notstarted"></div>
				</div>
				<div class="goal_name">relaxation exercises</div>
				<div class="continue_button">continue
					<img src="{{asset('assets/images/icon_arrow.png')}}">
				</div>
			</div>
			<div class="goal_row">
				<div class="goal_percent">55<span class="percent_symbol">%</span></div>
				<div class="progress_bar">
					<div class="goal_stepbar_complete"></div>
					<div class="goal_stepbar_complete"></div>
					<div class="goal_stepbar_complete"></div>
					<div class="goal_stepbar_complete"></div>
					<div class="goal_stepbar_complete"></div>
					<div class="goal_stepbar_inprogress"></div>
					<div class="goal_stepbar_notstarted"></div>
					<div class="goal_stepbar_notstarted"></div>
					<div class="goal_stepbar_notstarted"></div>
					<div class="goal_stepbar_notstarted"></div>
				</div>
				<div class="goal_name">sleep regulation</div>
				<div class="continue_button">continue
					<img src="{{asset('assets/images/icon_arrow.png')}}">
				</div>
			</div>
		</div>
	</div>


<!----- column 3 -->
	<div id="ind-home-col3">
		
	<!-- tool-kit -->
		<div id="tools_area">
			<div id="tools_title">tool-kit</div>
			<div class="toolkit_icon_row">
				<div class="home_tool_icon" id="mood">
					<a href="mood">
					<img src="{{asset('assets/images/icon_mood.png')}}">
				</div>
				<div class="home_tool_icon" id="journal">
					<a href="journal">
					<img src="{{asset('assets/images/icon_journal.png')}}">
				</div>
				<div class="home_tool_icon" id="breathing">
					<a href="breathing">
					<img src="{{asset('assets/images/icon_breathing.png')}}">
				</div>
				<div class="home_tool_icon" id="sleep" style="margin-right:0px;">
					<a href="sleep">
					<img src="{{asset('assets/images/icon_sleep.png')}}">
				</div>
			</div>
			<div class="toolkit_icon_row">
				<div class="home_tool_icon" id="meds">
					<a href="medication">
					<img src="{{asset('assets/images/icon_meds.png')}}"></div>
				<div class="home_tool_icon" id="treatments">
					<a href="treatmentplan">
					<img src="{{asset('assets/images/icon_treatments.png')}}"></div>
				<div class="home_tool_icon" id="relationships">
					<a href="relationships">
					<img src="{{asset('assets/images/icon_relationships.png')}}">
				</div>
				<div class="home_tool_icon" id="diet" style="margin-right:0px;">
					<a href="diet">
					<img src="{{asset('assets/images/icon_diet.png')}}">
				</div>
			</div>
		</div>
	<!-- recent activity -->
		<div id="recent_activity">
			<div id="activity_title">recent activity</div>
			<div class="activity_content">
				<div class="activity_icon">
					<img src="{{asset('assets/images/icon_bluestar.png')}}">
				</div>
				<div class="activity_line1">100% med compliance</div>
				<div class="activity_line2">1 day ago</div>
			</div>
			<div class="activity_content">
				<div class="activity_icon">
					<img src="{{asset('assets/images/icon_yellowlink.png')}}">
				</div>
				<div class="activity_line1">connected with group</div>
				<div class="activity_line2">5 days ago</div>
			</div>
			<div class="activity_content">
				<div class="activity_icon">
					<img src="{{asset('assets/images/icon_purplepaper.png')}}">
				</div>
				<div class="activity_line1">created a resume</div>
				<div class="activity_line2">1 week ago</div>
			</div>
		</div>
	</div>

	</div>
@stop
