$(document).ready(function() {
		var data={_method: 'delete' };

	
		$('.delete').click(
			function()
			{
				var answer = confirm('Are you sure you want to delete this?');

				if (answer === true)
				{

				}

				else
				{
					return false;
				}

			});

		// $('.mood_icons,').hover(
		// 	function()
		// 	{
		// 		$(this).next('form').children().show();
		// 		//alert($(this).next('form input[type="submit"]'));
		// 		// .css( "display", "none" );
		// 	},

		// 	function()
		// 	{
		// 		$(this).next('form').children().hide();
		// 	});          
				


    });