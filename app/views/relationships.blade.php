@extends('layouts.user_home')

@section('content')

{{ HTML::script('assets/js/jquery-ui-1.10.4/ui/jquery-ui.js') }}

<script>
	$(function() {
		var default_values=[['coworkers',10],['friends',190],['family',70],['extended_family',130],['providers',250]];
	  	var entries = <?php echo $relationships?>;
	  	var draggables = {};



		for (var i=0;i<5;i++){
			$('#' + entries[i].name).draggable(

			{

				containment: $('container'),
				drag: function(){
					var offset = $(this).offset();
					var xPos = offset.left;
					//fill in hidden input with change in x position
					$('input[name=' +this.id+']').val('x: ' + xPos);
				},

				create: function(event, ui){
					if(typeof entries[i].relationships_entries[0] === 'undefined')
					{
						$(this).css("top", default_values[i][1] +"px");			
					}

					else
					{
						//if entry is set, make it 75px by 75px
						if(entries[i].relationships_entries[0].closeness != null)
						{

							$(this).css("left",entries[i].relationships_entries[0].closeness+"px"); 
							$(this).css("top",entries[i].relationships_entries[0].frequency+"px"); 
							$(this).css("height","75px");
							$(this).css("width","75px");
						}

						else
						{
							$(this).css("top", default_values[i][1] +"px");
						}

					}
					
					

					var finalOffset = $(this).position();
					var finalxPos = finalOffset.left;
					var finalyPos = finalOffset.top;

					if(finalxPos == 25)
					{
						$('input[name=' +this.id+']').val(0);
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

					//if finalxPos is 25, it isn't on the chart, set val to 0
					if(finalxPos == 25)
					{
						$('input[name=' +this.id+']').val(0);
					}
					else
					{
						$('input[name=' +this.id+']').val(finalxPos);
					}
					$('input[name=' +this.id+'y]').val(finalyPos);

				},

				revert: function (event, ui) {
	            //search by id to find default x value 
		            for(var count=0; count < default_values.length; count++){
		            	if(default_values[count][0] == $(this).attr("id")){
		            		var default_y = default_values[count][1];
		            	}
		            }

		            $(this).data("uiDraggable").originalPosition = {
		            	top: default_y,
		            	left: 25				
		            };

		            //return boolean
		            return !event;	
	        }


	    });
	};


$('#dropHere').droppable(
{
	accept: '#coworkers, #family, #extended_family, #friends, #providers',
	tolerance: "fit",
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


<div class="toolframe">

	<div id="relationships_toolbar">
		
		{{  Form::open(array('url' => 'relationships'))  }}

			<div id="coworkers">
				{{ Form::hidden('coworkers'); }}
				{{ Form::hidden('coworkersy'); }}
			</div>

			<div id="family">
		        {{ Form::hidden('family'); }}
				{{ Form::hidden('familyy'); }}
			</div>

			<div id="extended_family">
		        {{ Form::hidden('extended_family'); }}
				{{ Form::hidden('extended_familyy'); }}
			</div>

			<div id="friends">
		        {{ Form::hidden('friends'); }}
				{{ Form::hidden('friendsy'); }}
			</div>

			<div id="providers">
		        {{ Form::hidden('providers'); }}
				{{ Form::hidden('providersy'); }}
			</div>
				
		</div>
		<div id='relationship_wrapper'>
			<div id="dropHere"></div>
			{{ Form::submit('save', array('id' => 'button')); }}

		{{  Form::close()  }}
		</div>


	</div>
</div>

	<!-- page contents ------------------------------------------------------------------------------------------------------>	


<!-- 	 	<div class="toolframe" style="text-align:center; font-family:swiss_light; color:grey; font-size:30px; margin-top:25px;">page currently unavailable</div>
 -->

	<script src="{{ asset('assets/js/toolbar.js') }}"></script>

	<div id="tool_bar_container">
		<div id="tool_bar">
			<div class="unselected_tool" id="tracker1" style="margin-left:10px;"><a href="journal"><img src="{{ asset('assets/images/icon_journal.png') }}"></a></div>
			<div class="unselected_tool" id="tracker2"><a href="breathing"><img src="{{ asset('assets/images/icon_breathing.png') }}"></a></div>
			<div class="unselected_tool" id="tracker3"><a href="mood"><img src="{{ asset('assets/images/icon_mood.png') }}"></a></div>
			<div class="unselected_tool" id="tracker4"><a href="sleep"><img src="{{ asset('assets/images/icon_sleep.png') }}"></a></div>
			<div class="unselected_tool" id="tracker5"><a href="medication"><img src="{{ asset('assets/images/icon_meds.png') }}"></a></div>
			<div class="unselected_tool" id="tracker6"><a href="treatmentplan"><img src="{{ asset('assets/images/icon_treatments.png') }}"></a></div>
			<div class="selected_tool" id="tracker7" style="opacity:1.0"><a href="relationships"><img src="{{ asset('assets/images/icon_relationships.png') }}"></a></div>
			<div class="unselected_tool" id="tracker8"><a href="diet"><img src="{{ asset('assets/images/icon_diet.png') }}"></a></div>
			<div class="unselected_tool" id="tracker9" ><a href="settings"><img src="{{ asset('assets/images/icon_settings.png') }}"></a></div>		
		</div>
	</div>
@stop
