$(document).ready(function() {
		var data={_method: 'delete' };

	
		$('.delete').hide().click(
			function()
			{
				var answer = confirm('Are you sure you want to delete this?');

				if (answer === true)
				{
					alert('hi');
					$.ajax({
						url: 'delete/'+id,
						type: 'post',
						success: function(result){
							alert(result);
						}
					});

				}

			});

		$('.mood_icons').hover(
			function()
			{
				$(this).next('.delete').show();
			},

			function()
			{
				$(this).next('.delete').hide();
			});          
				


    });