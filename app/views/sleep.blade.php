@extends('layouts.user_home')

@section('content')




<script type="text/javascript">  
$(document).ready(function() {
	
		$(".unselected_tool").mouseenter(
            function() {
				
                $(this).stop(true,true).animate({ 'margin-top': '10px' }, 'fast');
	            $(this).animate({ 'margin-top': '20px' }, 300);
				

            });
		$(".unselected_tool").mouseleave(
            function() {
                $(this).stop(true,true).animate({ 'margin-top': '35px' }, 300);
	            //$(this).animate({ 'margin-top': '10px' }, '1000');
				

            });

    });


</script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
	   
$(function() {
	var input_value =[];

	//default starting y position for icons
	//var draggables=[['start',25],['interruption0',70],['interruption1',70],['interruption2',70],['note0',130],['note1',130],['note2',130],['stop',210]];
	
	var default_values = [['start',25],['interruption0',70],['interruption1',70],['interruption2',70],['note0',130],['note1',130],['note2',130],['stop',210]];
	//default starting y position for icons if entry exists
	var entries = <?php echo $entries?>;



	//entries put into a loopable array
	 if(typeof entries[0] != 'undefined'){
	var draggables = [
							['start', entries[0].start],
						  	['interruption0', entries[0].interruption0],
						  	['interruption1', entries[0].interruption1],
						  	['interruption2', entries[0].interruption2],
						  	['note0', entries[0].note0],
						  	['note1', entries[0].note1],
						  	['note2', entries[0].note2],
						  	['stop', entries[0].stop]
					 ];
	}
	else
	{
		var draggables = [['start',25],['interruption0',70],['interruption1',70],['interruption2',70],['note0',130],['note1',130],['note2',130],['stop',210]]
	}




	for (var i=0;i<8;i++){

		$('#'+draggables[i][0]).draggable(

		{

			containment: $('container'),
			snap:true,
			drag: function(){
				var offset = $(this).offset();
				var xPos = offset.left;

				//fill in hidden input with change in x position
				$('input[name=' +this.id+']').val('x: ' + xPos);
			},



			create: function(event, ui){

				//if no database entry exists, place icons in default position, otherwise, put in previously set position

				 if(entries[0][this.id] != 0)
			 {
				 $(this).css("left",draggables[i][1]+"px"); 
				 $(this).css("top","123px"); 
				 $(this).css("height","75px");
				 $(this).css("width","75px");
			}
			else
			{
				$(this).css("top", default_values[i][1]+"px");

			}


				var finalOffset = $(this).position();
				var finalxPos = finalOffset.left;
				var finalyPos = finalOffset.top;
				if(finalxPos == 25)
				{
					$('input[name=' +this.id+']').val(null);
				}
				else
				{
					$('input[name=' +this.id+']').val(finalxPos);
				}
				$('input[name=' +this.id+'y]').val(finalyPos);






			},

			stop: function(event,ui){
				var finalOffset = $(this).position();
				var finalxPos = finalOffset.left;
				var finalyPos = finalOffset.top;	
				$('input[name=' +this.id+']').val(finalxPos);
				$('input[name=' +this.id+'y]').val(finalyPos);
			},
			revert: function (event, ui) {
            //overwrite original position
            for(var count=0; count < draggables.length; count++){
            	if(draggables[count][0] == $(this).attr("id")){
            		var default_left = draggables[count][1];	
            	}
            }
            $(this).data("uiDraggable").originalPosition = {
                top: default_left,
                left: 25				
            };
            //return boolean
            return !event;	
        }


    });
};


$('#dropHere').droppable(
{
	accept: '#start, #stop, #interruption0, #interruption1, #interruption2, #note0, #note1, #note2',
	tolerance:"touch",
	over:  function(event, ui){

		var id = ui.draggable.attr('id');
		$('#'+id).animate({
			'height' : '75px',
			'width' : '75px',
			'border-color' : '#0f0'
		}, 500);

	},

	drop: function(event, ui) {
		var id = ui.draggable.attr('id');
		var drop_p = $(this).offset();
		var drag_p = ui.draggable.offset();
		var top_end = drop_p.top - drag_p.top + 1;
		ui.draggable.animate({
			top: '+=' + top_end
		});
	
	},



	out: function(event, ui){

		var id = ui.draggable.attr('id');
		$('#'+id).animate({
			'height' : '50px',
			'width' : '50px',
			'border-color' : '#0f0'
		}, 500);
	}
	
});
});
</script>
	


<!-- page contents ----------------------------------------------------------------------------------------------------->	

<!-- tool area -------------------------------------------------------------------------------------------------------->	
		<div style="margin-left:225px;" id="clouds">
			<img src="{{asset('assets/images/sleep_cloud1.png')}}">
			<img src="{{asset('assets/images/sleep_cloud2.png')}}">
			<img src="{{asset('assets/images/sleep_cloud3.png')}}">
		</div>

	<div class="toolframe" id="sleep_frame">
		<!--<div id="icon_tray"><img src="sleep_icon_tray.png"></div>
		<div id="divider"></div>
		<div id="icon_drop"></div>
		<div id="date_range"><img src="sleep_date.png"></div>
		-->		


		<div id="container" style="position:relative; margin-right:auto; margin-left:auto;">
			<div id="toolbar">

				{{ Form::open(array('url' => 'sleep', 'id' => 'sleep_list')) }}

					<div id="start">
						{{ Form::hidden('start'); }}
						{{ Form::hidden('starty'); }}
					</div>

					<div id="stop">
						{{ Form::hidden('stop'); }}
						{{ Form::hidden('stopy'); }}						
					</div>

					<div id="interruption0">
						{{ Form::hidden('interruption0'); }}
						{{ Form::hidden('interruption0y'); }}	
					</div>

					<div id="interruption1">
						{{ Form::hidden('interruption1'); }}
						{{ Form::hidden('interruption1y'); }}	
					</div>

					<div id="interruption2">
						{{ Form::hidden('interruption2'); }}
						{{ Form::hidden('interruption2y'); }}	
					</div>

					<div id="note0">
						{{ Form::hidden('note0'); }}
						{{ Form::hidden('note0y'); }}	
					</div>

					<div id="note1">
						{{ Form::hidden('note1'); }}
						{{ Form::hidden('note1y'); }}	
					</div>

					<div id="note2">
						{{ Form::hidden('note2'); }}
						{{ Form::hidden('note2y'); }}	
					</div>

			</div>
					<div id='wrapper'>
						<div id="dropHere"></div>
						{{ Form::submit('save', array('id' => 'button')); }}
					</div>
				{{ Form::close() }}

		</div>



	<script src="{{ asset('assets/js/toolbar.js') }}"></script>

	<div id="tool_bar_container">
	<div id="tool_bar">
		<div class="unselected_tool" id="tracker1" style="margin-left:10px;"><a href="v1_individual_journal_dev.php"><img src="{{ asset('assets/images/icon_journal.png') }}"></a></div>
		<div class="unselected_tool" id="tracker2"><a href="v1_individual_breathing_dev.php"><img src="{{ asset('assets/images/icon_breathing.png') }}"></a></div>
		<div class="unselected_tool" id="tracker3"><a href="mood"><img src="{{ asset('assets/images/icon_mood.png') }}"></a></div>
		<div class="selected_tool" id="tracker4" style="opacity:1.0"><a href="v1_individual_sleep_dev.php"><img src="{{ asset('assets/images/icon_sleep.png') }}"></a></div>
		<div class="unselected_tool" id="tracker5"><a href="v1_individual_meds_dev.php"><img src="{{ asset('assets/images/icon_meds.png') }}"></a></div>
		<div class="unselected_tool" id="tracker6"><a href="v1_individual_treatments_dev.php"><img src="{{ asset('assets/images/icon_treatments.png') }}"></a></div>
		<div class="unselected_tool" id="tracker7"><a href="v1_individual_relationships_dev.php"><img src="{{ asset('assets/images/icon_relationships.png') }}"></a></div>
		<div class="unselected_tool" id="tracker8"><a href="v1_individual_diet_dev.php"><img src="{{ asset('assets/images/icon_diet.png') }}"></a></div>
		<div class="unselected_tool" id="tracker9"><a href="v1_individual_settings_dev.php"><img src="{{ asset('assets/images/icon_settings.png') }}"></a></div>		
	</div>
	</div>





@stop
