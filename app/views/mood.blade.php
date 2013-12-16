@extends('layouts.user_home')

@section('content')


<script src="{{ asset('assets/js/delete.js') }}"></script>

<!-- page contents ----------------------------------------------------------------------------------------------------->	
	
<!-- tool area -------------------------------------------------------------------------------------------------------->	
	<div class="toolframe">
		
		<!-- Form validation errors -->
		@if(Session::has('errors'))
		<? $errors = Session::get('errors'); ?>

            	<h3 class="error" style="margin-left:38%; margin-bottom:-15px;"> {{ $errors->first() }}</h3>
		@endif

		<div id="mood_menu">
			<h1>how are you feeling?</h1>
			<h2>choose your mood:</h2>
			<div id="form">
					  {{ Form::open(array('url' => 'mood', 'id' => 'mood_list')) }}
					  {{ Form::select('mood', array(
					  				'' => 'choose your mood',
					  				'happy' => 'happy',
					  				'sad' => 'sad',
					  				'angry' => 'angry',
					  				//'sick' => 'choose',
					  				'disappointed' => 'disappointed',
					  				'frustrated' => 'frustrated',
					  				'pride' => 'full of pride',
					  				'excited' => 'excited',
					  				'scared' => 'scared',
					  				'surprised' => 'surprised',
					  				'nervous' => 'nervous',

					  			)); }}
					  
				<h2>select a time</h2>
						
					  	
					  	{{ Form::select('time', array(
					  			$roundedNow  => $roundedNow,
					  			'1:00' => '1:00',
					  			'1:30' => '1:30',
					  			'2:00' => '2:00',
					  			'2:30' => '2:30',
					  			'3:00' => '3:00',
					  			'3:30' => '3:30',
					  			'4:00' => '4:00',
					  			'4:30' => '4:30',
					  			'5:00' => '5:00',
					  			'5:30' => '5:30',
					  			'6:00' => '6:00',
					  			'6:30' => '6:30',
					  			'7:00' => '7:00',
					  			'7:30' => '7:30',
					  			'8:00' => '8:00',
					  			'8:30' => '8:30',
					  			'9:00' => '9:00',
					  			'9:30' => '9:30',
					  			'10:00' => '10:00',
					  			'10:30' => '10:30',
					  			'11:00' => '11:00',
					  			'11:30' => '11:30',
					  			'12:00' => '12:00',
					  			'12:30' => '12:30',

					  			), $roundedNow); }}

						{{ Form::select('dn', array('am' => 'AM', 'pm' => 'PM'), date('a')) }}
						{{ Form::button('save', array('type' => 'submit')); }}
						{{ Form::close() }}

			</div>

		</div>
		<div id="divider"></div>


		<div id="chart" style="margin-left:50px; width:1000px; position:absolute;">
		@foreach ($entries as $row)
 			<img src = "{{ asset('assets/images/mood_icons/') }}/{{ $row->mood_type }}.png"
			style = "width:50px; position:absolute; top:130px; left:{{ $row->x_position }}px;"
			id="{{ $row->id }}" class = "mood_icons"
 			 /> 
 			 <img class="delete" style="position:absolute; top:130px; left:{{ $row->x_position+35 }}px;" id="{{ $row->id }}" src="{{ asset('assets/images/delete.png') }}" />
		@endforeach
		<br />
		<img style="margin-top:150px" src="{{ asset('assets/images/mood_chart.png') }}" width="1000"  />
		</div>
	</div>



	<script src="{{ asset('assets/js/toolbar.js') }}"></script>

	<div id="tool_bar_container">
	<div id="tool_bar">
		<div class="unselected_tool" id="tracker1" style="margin-left:10px;"><a href="v1_individual_journal_dev.php"><img src="{{ asset('assets/images/icon_journal.png') }}"></a></div>
		<div class="unselected_tool" id="tracker2"><a href="v1_individual_breathing_dev.php"><img src="{{ asset('assets/images/icon_breathing.png') }}"></a></div>
		<div class="selected_tool" id="tracker3" style="opacity:1.0"><a href="mood"><img src="{{ asset('assets/images/icon_mood.png') }}"></a></div>
		<div class="unselected_tool" id="tracker4"><a href="v1_individual_sleep_dev.php"><img src="{{ asset('assets/images/icon_sleep.png') }}"></a></div>
		<div class="unselected_tool" id="tracker5"><a href="v1_individual_meds_dev.php"><img src="{{ asset('assets/images/icon_meds.png') }}"></a></div>
		<div class="unselected_tool" id="tracker6"><a href="v1_individual_treatments_dev.php"><img src="{{ asset('assets/images/icon_treatments.png') }}"></a></div>
		<div class="unselected_tool" id="tracker7"><a href="v1_individual_relationships_dev.php"><img src="{{ asset('assets/images/icon_relationships.png') }}"></a></div>
		<div class="unselected_tool" id="tracker8"><a href="v1_individual_diet_dev.php"><img src="{{ asset('assets/images/icon_diet.png') }}"></a></div>
		<div class="unselected_tool" id="tracker9"><a href="v1_individual_settings_dev.php"><img src="{{ asset('assets/images/icon_settings.png') }}"></a></div>		
	</div>
	</div>





@stop
