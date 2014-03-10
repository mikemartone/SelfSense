@extends('layouts.user_home')

@section('content')
	
	<!-- page contents ------------------------------------------------------------------------------------------------------>	


	<div class="toolframe">
	    <div class="subject"><p>subject:</p>
			{{  Form::open(array('url' => 'journal', 'name' => 'journal_entry'))  }}	
            {{  Form::text('subject',  'Journal Entry ' . date('F jS Y') )  }}
		</div>
   	    <div class="body">
    		{{ Form::textarea('body', '', array('placeholder' => 'Click here to start typing')) }}
		</div>
		{{ Form::button('save', array('type' => 'submit', 'id' => 'save_journal')); }}
		{{ Form::close() }}	
	</div>


	<script src="{{ asset('assets/js/toolbar.js') }}"></script>

	<div id="tool_bar_container">
		<div id="tool_bar">
			<div class="selected_tool" id="tracker1" style="margin-left:10px; opacity:1.0;"><a href="journal"><img src="{{ asset('assets/images/icon_journal.png') }}"></a></div>
			<div class="unselected_tool" id="tracker2"><a href="breathing"><img src="{{ asset('assets/images/icon_breathing.png') }}"></a></div>
			<div class="unselected_tool" id="tracker3"><a href="mood"><img src="{{ asset('assets/images/icon_mood.png') }}"></a></div>
			<div class="unselected_tool" id="tracker4"><a href="sleep"><img src="{{ asset('assets/images/icon_sleep.png') }}"></a></div>
			<div class="unselected_tool" id="tracker5"><a href="medication"><img src="{{ asset('assets/images/icon_meds.png') }}"></a></div>
			<div class="unselected_tool" id="tracker6"><a href="treatmentplan"><img src="{{ asset('assets/images/icon_treatments.png') }}"></a></div>
			<div class="unselected_tool" id="tracker7"><a href="relationships"><img src="{{ asset('assets/images/icon_relationships.png') }}"></a></div>
			<div class="unselected_tool" id="tracker8"><a href="diet"><img src="{{ asset('assets/images/icon_diet.png') }}"></a></div>
			<div class="unselected_tool" id="tracker9" ><a href="settings"><img src="{{ asset('assets/images/icon_settings.png') }}"></a></div>		
		</div>
	</div>
@stop
