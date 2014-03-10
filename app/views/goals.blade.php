@extends('layouts.user_home')

@section('content')
<!-- page contents ------------------------------------------------------------------------------------------------------>
	
	<!-- page contents ------------------------------------------------------------------------------------------------------>	


<div id="goals_content">
		<div id="col1">
			<div class="category_name">treatment</div>
			<div class="icon_col" style="margin-left:15px;">
				<div class="medium_icon" id="treatment">
					<p>mood</p>
					<img src="{{asset('assets/images/icon_mood.png')}}">
				</div>
				<div class="medium_icon" id="treatment">
					<p>meds</p>
					<img src="{{asset('assets/images/icon_meds_purple.png')}}">
				</div>
				<div class="medium_icon" id="treatment">
					<p>therapy</p>
					<img src="{{asset('assets/images/icon_therapy.png')}}">
				</div>
			</div>
			<div class="icon_col">
				<div class="medium_icon" id="treatment">
					<p>journal</p>
					<img src="{{asset('assets/images/icon_journal_purple.png')}}">
				</div>
				<div class="medium_icon" id="treatment">
					<p>AA<p>
					<img src="{{asset('assets/images/icon_AA.png')}}" style="margin:-10px 0 0 10px;">
				</div>
			</div>
		</div>
		<div id="col2">
			<div class="category_name">life</div>
			<div class="icon_row">
				<div class="medium_icon" id="life">
					<p>family</p>
					<img src="{{asset('assets/images/icon_family.png')}}">
				</div>
				<div class="medium_icon" id="life">
					<p>art</p>
					<img src="{{asset('assets/images/icon_drawing.png')}}">
				</div>
			</div>
			<div class="icon_row">
				<div class="medium_icon" id="life">
					<p>games</p>
					<img src="{{asset('assets/images/icon_gaming.png')}}">
				</div>
			</div>
			<div class="category_name">work</div>
			<div class="icon_row" style="margin-bottom:5px">
				<div class="medium_icon" id="work" style="opacity:1.0">
					<p>job hunt</p>
					<img src="{{asset('assets/images/icon_work.png')}}">
				</div>
				<div class="medium_icon" id="work">
					<p>certificate</p>
					<img src="{{asset('assets/images/icon_cert.png')}}">
				</div>
			</div>
		</div>
		<div id="col3">
			<div class="goal_row">
				<div class="goal_name">secure a job</div>
				<div class="creation_date">created 8/1/13</div>
				<div class="goal_percent">57<span class="percent_symbol">%</span></div>
				<div class="progress_bar">
					<div class="job_stepbar_complete"></div>
					<div class="job_stepbar_complete"></div>
					<div class="job_stepbar_complete"></div>
					<div class="job_stepbar_inprogress"></div>
					<div class="job_stepbar_notstarted"></div>					
					<div class="job_stepbar_notstarted"></div>
				</div>
				<div class="edit_icon"><img src="{{asset('assets/images/icon_edit.png')}}"></div>
				<div class="edit_button">edit</div>
				<div class="continue_button">continue<img src="{{asset('assets/images/icon_arrow.png')}}"></div>	
			</div>
			<div class="goal_steps_area">
				<div class="step_status_row">
					<div class="step_status_icon"><img src="{{asset('assets/images/completed_step.png')}}"></div>
					<div class="step_name">identify job preferences</div>
				</div>
				<div class="step_status_row">
					<div class="step_status_icon"><img src="{{asset('assets/images/completed_step.png')}}"></div>
					<div class="step_name">evaluate qualifications</div>
				</div>
				<div class="step_status_row">
					<div class="step_status_icon"><img src="{{asset('assets/images/completed_step.png')}}"></div>
					<div class="step_name">determine suitable opportunities</div>
				</div>
				<div class="step_status_row">
					<div class="step_status_icon"><img src="{{asset('assets/images/inprogress_step.png')}}"></div>
					<div class="step_name">conduct practice interviews</div>
				</div>
				<div class="step_status_row">
					<div class="step_status_icon"><img src="{{asset('assets/images/notstarted_step.png')}}"></div>
					<div class="step_name">complete first round of interviews</div>
				</div>
				<div class="step_status_row">
					<div class="step_status_icon"><img src="{{asset('assets/images/notstarted_step.png')}}"></div>
					<div class="step_name">successfully attain employment</div>
				</div>
			</div>
			<div class="complete_date">
				<div id="finish_left"><img src="{{asset('assets/images/icon_flag_left.png')}}"></div>
				<div class="by_date">complete by 9/30/13</div>
				<div id="finish_right"><img src="{{asset('assets/images/icon_flag_right.png')}}"></div>
			</div>
		</div>
	</div>
		
@stop
