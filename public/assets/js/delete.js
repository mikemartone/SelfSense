$(document).ready(function() {
	
		$('.delete').hide().click(function(){alert('delet!');});

		$('.mood_icons').hover(
			function(){
				$(this).next('.delete').show();
			},

			function()
			{
				$(this).next('.delete').hide();
			});          
				


    });