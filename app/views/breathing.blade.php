@extends('layouts.user_home')

@section('content')
<!-- page contents ------------------------------------------------------------------------------------------------------>
	
	<!-- page contents ------------------------------------------------------------------------------------------------------>	
	 <div class="toolframe">
			<iframe width="640" height="360" src="//www.youtube.com/embed/VfMWPSV_2Ak" frameborder="0" allowfullscreen></iframe>
			<div id="instructions">
			<p>instructions</p>
				<ol>
					<li>Sit quietly in a comfortable position.</li>
					<li>Close your eyes.</li>
					<li>Deeply relax all your muscles, 
						beginning at your feet and progressing up to your face. 
						Keep them relaxed.</li>
					<li>Breathe through your nose. 
						Become aware of your breathing. 
						As you breathe out, say the word, "one" (or any phrase you are comfortable with), 
						silently to yourself. For example, 
						breathe in ... out, "one",- in .. out, "one", etc. 
						Breathe easily and naturally.</li>
					<li>Continue for 10 to 20 minutes. 
						You may open your eyes to check the time, but do not use an alarm. 
						When you finish, sit quietly for several minutes, 
						at first with your eyes closed and later with your eyes opened. 
						Do not stand up for a few minutes.</li>
					<li>Do not worry about whether you are successful 
						in achieving a deep level of relaxation. 
						Maintain a passive attitude and permit relaxation to occur at its own pace. 
						When distracting thoughts occur, 
						try to ignore them by not dwelling upon them 
						and return to repeating "one."<br><br>
						With practice, the response should come with little effort. 
						Practice the technique once or twice daily, 
						but not within two hours after any meal, 
						since the digestive processes seem to interfere with 
						the elicitation of the Relaxation Response.</li>
				</ol> 
			</div>
		</div>
		


	<script src="{{ asset('assets/js/toolbar.js') }}"></script>

	<div id="tool_bar_container">
		<div id="tool_bar">
			<div class="unselected_tool" id="tracker1" style="margin-left:10px;"><a href="journal"><img src="{{ asset('assets/images/icon_journal.png') }}"></a></div>
			<div class="selected_tool" id="tracker2" style="opacity:1.0"><a href="breathing"><img src="{{ asset('assets/images/icon_breathing.png') }}"></a></div>
			<div class="unselected_tool" id="tracker3"><a href="mood"><img src="{{ asset('assets/images/icon_mood.png') }}"></a></div>
			<div class="unselected_tool" id="tracker4"><a href="sleep"><img src="{{ asset('assets/images/icon_sleep.png') }}"></a></div>
			<div class="unselected_tool" id="tracker5"><a href="medication"><img src="{{ asset('assets/images/icon_meds.png') }}"></a></div>
			<div class="unselected_tool" id="tracker6"><a href="treatmentplan"><img src="{{ asset('assets/images/icon_treatments.png') }}"></a></div>
			<div class="unselected_tool" id="tracker7"><a href="relationships"><img src="{{ asset('assets/images/icon_relationships.png') }}"></a></div>
			<div class="unselected_tool" id="tracker8"><a href="diet"><img src="{{ asset('assets/images/icon_diet.png') }}"></a></div>
			<div class="unselected_tool" id="tracker9"><a href="settings"><img src="{{ asset('assets/images/icon_settings.png') }}"></a></div>		
		</div>
	</div>
@stop
