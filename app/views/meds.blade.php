@extends('layouts.user_home')

@section('content')

<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>





	<script src="{{ asset('assets/js/toolbar.js') }}"></script>


<script>
	   
$(function() {
	var regimen = <?php echo $regimen?>;
	var dbyentries = <?php echo $dbyentries?>;
	var yentries = <?php echo $yentries?>;
	var entries = <?php echo $entries?>;

	//for each daily regimen...
	jQuery.each(regimen, function(i, val)
	{

		//setup dynamic am checkboxes
		for(j = 0; j < regimen[i].am_regimen; j++)
		{

			$(".dbyam_row" + i).append('<div class="am"><input type="checkbox" value="'+ regimen[i].id +'" id="dbyam'+ regimen[i].id + j +'" name="dbyam[]" /><label for="dbyam'+ regimen[i].id + j +'"></label>');		

			$(".yam_row" + i).append('<div class="am"><input type="checkbox" value="'+ regimen[i].id +'" id="yam'+ regimen[i].id + j +'" name="yam[]" /><label for="yam'+ regimen[i].id + j +'"></label>');		

			$(".am_row" + i).append('<div class="am"><input type="checkbox" value="'+ regimen[i].id +'" id="am'+ regimen[i].id + j +'" name="am[]" /><label for="am'+ regimen[i].id + j +'"></label>');		
		}

		//setup dynamic pm checkboxes
		for(j = 0; j < regimen[i].pm_regimen; j++)
		{

			$(".dbypm_row" + i).append('<div class="pm"><input type="checkbox" value="'+ regimen[i].id +'" id="dbypm'+ regimen[i].id + j +'" name="dbypm[]" /><label for="dbypm'+ regimen[i].id + j +'"></label>');		

			$(".ypm_row" + i).append('<div class="pm"><input type="checkbox" value="'+ regimen[i].id +'" id="ypm'+ regimen[i].id + j +'" name="ypm[]" /><label for="ypm'+ regimen[i].id + j +'"></label>');		

			$(".pm_row" + i).append('<div class="pm"><input type="checkbox" value="'+ regimen[i].id +'" id="pm'+ regimen[i].id + j +'" name="pm[]" /><label for="pm'+ regimen[i].id + j +'"></label>');			
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
		{{ Form::open(array('url' => 'medication', 'name' => 'inputs')) }}
		<form name="inputs" action="query/exe_check.php" method="post">
		<div id="pillbox">
			<div class="day_col">
				<div class="day_of_week">tue</div>
				<div class="pill_area_am">
					<div class="dbyam_row0">
						<!--<div class="dose" id="med1_taken"></div>-->
					</div>
					<div class="dbyam_row1"></div>
					<div class="dbyam_row2">
						<!--<div class="dose" id="med2_taken"></div>-->
					</div>
					<div class="dbyam_row3"></div>
					
				</div>
				<div class="pill_area_pm">
					<div class="dbypm_row0"></div>
					<div class="dbypm_row1"></div>
					<div class="dbypm_row2">
						<!--<div class="dose" id="med2_taken"></div>-->
					</div>
					<div class="dbypm_row3">
						<!--<div class="dose" id="med3_taken"></div>
						<div class="dose" id="med3_taken"></div>
						<div class="dose" id="med3_taken"></div>-->
					</div>
				</div>
			</div>
			<div class="day_col">
				<div class="day_of_week">wed</div>
				<div class="pill_area_am">
					<div class="yam_row0">
						<!--<div class="dose" id="med1_taken"></div>-->
					</div>
					<div class="yam_row1"></div>
					<div class="yam_row2">
						<!--<div class="dose" id="med2_taken"></div>-->
					</div>
					<div class="yam_row3"></div>
					
				</div>
				<div class="pill_area_pm">
					<div class="ypm_row0"></div>
					<div class="ypm_row1"></div>
					<div class="ypm_row2">
						<!--<div class="dose" id="med2_taken"></div>-->
					</div>
					<div class="ypm_row3"><!--
						<div class="dose" id="med3_taken"></div>
						<div class="dose" id="med3_taken"></div>
						<div class="dose" id="med3_taken"></div>-->
					</div>
				</div>
			</div>

			<div class="day_col">
				<div class="day_of_week" style="background:#2e75b6; color:#ffffff;">thu</div>
				<div class="pill_area_am">
					<div class="am_row0">
						<!--<div class="dose" id="med1_taken"></div>-->
					</div>
					<div class="am_row1"></div>
					<div class="am_row2">
						<!--<div class="dose" id="med2_taken"></div>-->
					</div>
					<div class="am_row3"></div>
					
				</div>
				<div class="pill_area_pm" style="border-bottom:5px solid #2e75b6;">
					<div class="pm_row0"></div>
					<div class="pm_row1"></div>
					<div class="pm_row2">
						<!--<div class="dose" id="med2_not"></div>-->
					</div>
					<div class="pm_row3">
						<!--<div class="dose" id="med3_not"></div>
						<div class="dose" id="med3_not"></div>
						<div class="dose" id="med3_not"></div>-->
					</div>
				</div>
			</div>
		{{ Form::button('save', array('type' => 'submit')); }}
		{{ Form::close() }}
		</div>
		<div id="key_divider"></div>
		<div id="med_key">
			<h1>medication detail</h1>
			<div class="med_detail_row">
				<div class="med_icon" id="med1"></div>
				<h2>Celexa</h2>
				<h3>5mg</h3>
				<p><span>dosage:</span> two in the morning and three at night</p>
				<p><span>prescriber:</span> Tobias Fink M.D.</p>
			</div>
			<div class="med_detail_row">
				<div class="med_icon" id="med2"></div>
				<h2>Seroquil</h2>
				<h3>10mg</h3>
				<p><span>dosage:</span>4 pills twice daily</p>
				<p><span>prescriber:</span> Tobias Fink M.D.</p>
			</div>
			<div class="med_detail_row">
				<div class="med_icon" id="med3"></div>
				<h2>Lithium</h2>
				<h3>10mg</h3>
				<p><span>dosage:</span> 1 capsule twice daily</p>
				<p><span>prescriber:</span> Tobias Fink M.D.</p>
			</div>
		</div>
	</div> 


	<div id="tool_bar_container">
	<div id="tool_bar">
		<div class="unselected_tool" id="tracker1" style="margin-left:10px;"><a href="v1_individual_journal_dev.php"><img src="{{ asset('assets/images/icon_journal.png') }}"></a></div>
		<div class="unselected_tool" id="tracker2"><a href="v1_individual_breathing_dev.php"><img src="{{ asset('assets/images/icon_breathing.png') }}"></a></div>
		<div class="unselected_tool" id="tracker3"><a href="mood"><img src="{{ asset('assets/images/icon_mood.png') }}"></a></div>
		<div class="unselected_tool" id="tracker4"><a href="sleep"><img src="{{ asset('assets/images/icon_sleep.png') }}"></a></div>
		<div class="selected_tool" id="tracker5" style="opacity:1.0"><a href="medication"><img src="{{ asset('assets/images/icon_meds.png') }}"></a></div>
		<div class="unselected_tool" id="tracker6"><a href="v1_individual_treatments_dev.php"><img src="{{ asset('assets/images/icon_treatments.png') }}"></a></div>
		<div class="unselected_tool" id="tracker7"><a href="v1_individual_relationships_dev.php"><img src="{{ asset('assets/images/icon_relationships.png') }}"></a></div>
		<div class="unselected_tool" id="tracker8"><a href="v1_individual_diet_dev.php"><img src="{{ asset('assets/images/icon_diet.png') }}"></a></div>
		<div class="unselected_tool" id="tracker9"><a href="v1_individual_settings_dev.php"><img src="{{ asset('assets/images/icon_settings.png') }}"></a></div>		
	</div>
	</div>





@stop
