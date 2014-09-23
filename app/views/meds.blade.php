@extends('layouts.user_home')

@section('content')

<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="{{ asset('assets/js/fancybox/source/jquery.fancybox.js') }}"></script>
<script src="{{ asset('assets/js/delete.js') }}"></script>




	<script src="{{ asset('assets/js/toolbar.js') }}"></script>
<script>
$(function() {
	var regimen = <?php echo $regimen?>;
	var dbyentries = <?php echo $dbyentries?>;
	var yentries = <?php echo $yentries?>;
	var entries = <?php echo $entries?>;

	if(regimen.length >= 6){
		$('#add_button').removeClass('add');
		$('#add_button').addClass('disabled_add');
	};

	//for each daily regimen...
	jQuery.each(regimen, function(i, val)
	{
		//you might need this to handle blank rows
		// if(regimen[i].am_regimen != 'undefined'){}

		$("#pill_area_dbyam").append('<div class="am_row" id="dbyam'+ i + '"></div>');
		$("#pill_area_yam").append('<div class="am_row" id="yam'+ i + '"></div>');
		$("#pill_area_am").append('<div class="am_row" id="am'+ i + '"></div>');
		
		$("#pill_area_dbypm").append('<div class="pm_row" id="dbypm'+ i + '"></div>');
		$("#pill_area_ypm").append('<div class="pm_row" id="ypm'+ i + '"></div>');
		$("#pill_area_pm").append('<div class="pm_row" id="pm'+ i + '"></div>');

		//setup dynamic am checkboxes
		for(j = 0; j < regimen[i].am_regimen; j++)
		{

			$("#dbyam" + i).append('<div class="am"><input type="checkbox" value="'+ regimen[i].id +'" id="dbyam'+ regimen[i].id + j +'" name="dbyam[]" /><label for="dbyam'+ regimen[i].id + j +'"></label>');		

			$("#yam" + i).append('<div class="am"><input type="checkbox" value="'+ regimen[i].id +'" id="yam'+ regimen[i].id + j +'" name="yam[]" /><label for="yam'+ regimen[i].id + j +'"></label>');		

			$("#am"+ i).append('<div class="am"><input type="checkbox" value="'+ regimen[i].id +'" id="am'+ regimen[i].id + j +'" name="am[]" /><label for="am'+ regimen[i].id + j +'"></label>');		
		}

		//setup dynamic pm checkboxes
		for(j = 0; j < regimen[i].pm_regimen; j++)
		{

			$("#dbypm" + i).append('<div class="pm"><input type="checkbox" value="'+ regimen[i].id +'" id="dbypm'+ regimen[i].id + j +'" name="dbypm[]" /><label for="dbypm'+ regimen[i].id + j +'"></label>');		

			$("#ypm" + i).append('<div class="pm"><input type="checkbox" value="'+ regimen[i].id +'" id="ypm'+ regimen[i].id + j +'" name="ypm[]" /><label for="ypm'+ regimen[i].id + j +'"></label>');		

			$("#pm" + i).append('<div class="pm"><input type="checkbox" value="'+ regimen[i].id +'" id="pm'+ regimen[i].id + j +'" name="pm[]" /><label for="pm'+ regimen[i].id + j +'"></label>');			
		}		
	});

	//check for existing db values for dby, yesterday, and today, and check checkboxes accordingly
	jQuery.each(dbyentries, function(i, val)
	{
		for(j = 0; j < dbyentries[i].am_times_taken; j++)
		{
			$('#dbyam'+dbyentries[i].med_id + j).prop('checked', true);
		}

		for(j = 0; j < dbyentries[i].pm_times_taken; j++)
		{
			$('#dbypm'+dbyentries[i].med_id + j).prop('checked', true);
		}

	});

	jQuery.each(yentries, function(i, val)
	{
		for(j = 0; j < yentries[i].am_times_taken; j++)
		{
			$('#yam'+yentries[i].med_id + j).prop('checked', true);
		}

		for(j = 0; j < yentries[i].pm_times_taken; j++)
		{
			$('#ypm'+yentries[i].med_id + j).prop('checked', true);
		}

	});


	jQuery.each(entries, function(i, val)
	{
		for(j = 0; j < entries[i].am_times_taken; j++)
		{
			$('#am'+entries[i].med_id + j).prop('checked', true);
		}

		for(j = 0; j < entries[i].pm_times_taken; j++)
		{
			$('#pm'+entries[i].med_id + j).prop('checked', true);
		}

	});

});
</script>	


<!-- page contents ---------------------------------------------------------------------------------------------------->		
	<div class="toolframe">	
		<div id="am_pm">
			<div id="am"><p>am</p></div>
			<div id="pm"><p>pm</p></div>
		</div>

		{{ Form::open(array('url' => 'medication/entries', 'name' => 'inputs')) }}		
		<div id="pillbox">
			<div class="day_col">
				<div class="day_of_week">{{  date('D', time() - 60 * 60 * 48)  }}</div>
				<div class="pill_area_am" id="pill_area_dbyam"></div>
				<div class="pill_area_pm" id="pill_area_dbypm"></div>
			</div>
			<div class="day_col">
				<div class="day_of_week">{{  date('D', time() - 60 * 60 * 24)  }}</div>
				<div class="pill_area_am" id="pill_area_yam"></div>
				<div class="pill_area_pm" id="pill_area_ypm"></div>
			</div>

			<div class="day_col">
				<div class="day_of_week" style="background:#2e75b6; color:#ffffff;">{{  date('D')  }}</div>
				<div class="pill_area_am" id="pill_area_am">
										
				</div>
				<div class="pill_area_pm" id="pill_area_pm" style="border-bottom:5px solid #2e75b6;"></div>
			</div>
		{{ Form::button('save', array('type' => 'submit')); }}
		{{ Form::close() }}
		</div>
<script>
</script>


		<div id="key_divider"></div>
		<div id="med_key_header"><h1>medication details</h1></div>
		<div id="med_key">
			@foreach ($regimen as $row)
			<div class="med_detail_row" id="medidrow{{$row->id}}">
				<div class="med_icon" id="med{{$row->id}}"></div>
					
				<h2 id="medication">{{$row->medication}}</h2><h3 id="dosage">{{$row->dosage}}</h3>
					<div class="edit" id={{$row->id}}></div>

					{{ Form::open(array('url' => "medication/delete/$row->id")) }}
		            {{ Form::submit('', array('class' => 'delete')) }}
		            {{ Form::close() }}
				<br />
				<p><span>dosage: </span> <span id="am_regimen">{{$row->am_regimen}}</span> times in the morning and <span id="pm_regimen"> {{$row->pm_regimen}}</span> times at night </p>
				<br />
				<p><span>prescriber: </span> <span id="prescribedby">{{$row->prescribedby}} </span></p> 
				<br />
				<br />

			</div>
			@endforeach

			<!-- Hidden Modal Forms- for edit form, default values are overwritten with jquery -->
			<div class="edit_form">
				<div id="edit_modal">
					{{ Form::open(array('url' => 'medication', 'method' => 'put', 'name' => 'inputs')) }}

					{{ Form::hidden('edit_medication', 'medication', array('id' => 'modal_medication')) }}
					{{ Form::hidden('edit_id', 0, array('id' => 'modal_id')) }}
					{{ Form::hidden('edit_prescribedby', 'dr', array('id' => 'modal_rxby')) }}


					<h2 id="modal_med_title"></h2>
					<label>Dosage: </label>{{  Form::text('edit_dosage', 'dosage', array('id' => 'modal_dosage'))  }}
					<br />
					<label>Am Regimen: </label>{{  Form::selectRange('edit_am_regimen', 0, 4, 0, array('id' => 'modal_am'))  }}
					<br />
					<label>Pm Regimen: </label>{{  Form::selectRange('edit_pm_regimen', 0, 4, 0, array('id' => 'modal_pm'))  }}
					<br />
					<label>Prescribed by  </label><span id="modal_rxby_title"></span>
	 				<br />
					{{ Form::button('save', array('type' => 'submit')); }}
					{{  Form::close()  }}
				</div>
			</div>

			<div class="add_form">
				<div id="add_modal">
					{{ Form::open(array('url' => 'medication/edit', 'name' => 'add_med')) }}
					<label>Medication:  </label>{{  Form::text('new_medication', '')  }}
					<br />
					<label>Dosage: </label>{{  Form::text('new_dosage', '')  }}
					<br />
					<label>Am Regimen: </label>{{  Form::selectRange('new_am_regimen', 0, 4, 0)  }}
					<br />
					<label>Pm Regimen: </label>{{  Form::selectRange('new_pm_regimen', 0, 4, 0)  }}
					<br />
					<label>Prescribed by: </label> {{  Form::text('new_prescribedby', '')  }}
					{{ Form::button('save', array('type' => 'submit')); }}
					{{  Form::close()  }}
				</div>
			</div>

			<script>
					$(document).on("click", ".edit", function(){

						// onclick, set editable values of row to variables
						var id = $(this).attr('id');
						var medication = $('#medidrow'+id+' #medication').html();
						var dosage = $('#medidrow'+id+' #dosage').html();
						var am_regimen = $('#medidrow'+id+' #am_regimen').html();
						var pm_regimen = $('#medidrow'+id+' #pm_regimen').html();
						var prescribedby = $('#medidrow'+id+' #prescribedby').html();

						// set values in modal to attributes of selected row
						$('.edit_form #modal_id').attr('value', id);
						$('.edit_form #modal_medication').attr('value', medication);
						$('.edit_form #modal_med_title').html(medication);
						$('.edit_form #modal_dosage').attr('value', dosage);
						$('.edit_form #modal_am option[value='+am_regimen+']').attr('selected','true');
						$('.edit_form #modal_pm option[value='+pm_regimen+']').attr('selected','true');
						$('.edit_form #modal_rxby').attr('value',prescribedby);
						$('.edit_form #modal_rxby_title').html(prescribedby);



						$.fancybox(

							$('.edit_form').html(),
							{
								'autoScale'         : false,
								'transitionIn'      : 'none',
								'transitionOut'     : 'none',
								'hideOnContentClick': false,
								afterShow: function() {
								}
	                    	});

					});

					$(document).on("click", ".add", function(){

						$.fancybox(

							$('.add_form').html(),
							{
								'autoScale'         : false,
								'transitionIn'      : 'none',
								'transitionOut'     : 'none',
								'hideOnContentClick': false,
								afterShow: function() {
								}
	                    	});

					});

				
			</script>


		</div>		
		<div id="add_button" style="width:200px">
			<div class="add"></div>
			<span style="margin-left:20px">Add Medication</span>


<!--  		<span style="margin-left:20px">Add Medication<span>
 -->		
 </div>

	</div> 


	<div id="tool_bar_container">
	<div id="tool_bar">
		<div class="unselected_tool" id="tracker1" style="margin-left:10px;"><a href="journal"><img src="{{ asset('assets/images/icon_journal.png') }}"></a></div>
		<div class="unselected_tool" id="tracker2"><a href="breathing"><img src="{{ asset('assets/images/icon_breathing.png') }}"></a></div>
		<div class="unselected_tool" id="tracker3"><a href="mood"><img src="{{ asset('assets/images/icon_mood.png') }}"></a></div>
		<div class="unselected_tool" id="tracker4"><a href="sleep"><img src="{{ asset('assets/images/icon_sleep.png') }}"></a></div>
		<div class="selected_tool" id="tracker5" style="opacity:1.0"><a href="medication"><img src="{{ asset('assets/images/icon_meds.png') }}"></a></div>
		<div class="unselected_tool" id="tracker6"><a href="treatmentplan"><img src="{{ asset('assets/images/icon_treatments.png') }}"></a></div>
		<div class="unselected_tool" id="tracker7"><a href="relationships"><img src="{{ asset('assets/images/icon_relationships.png') }}"></a></div>
		<div class="unselected_tool" id="tracker8"><a href="diet"><img src="{{ asset('assets/images/icon_diet.png') }}"></a></div>
		<div class="unselected_tool" id="tracker9"><a href="settings"><img src="{{ asset('assets/images/icon_settings.png') }}"></a></div>		
	</div>
	</div>





@stop
