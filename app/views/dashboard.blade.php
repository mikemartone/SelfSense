@extends('layouts.dashboard')

@section('content')
<!-- page contents ------------------------------------------------------------------------------------------------------>
	
	<!-- page contents ------------------------------------------------------------------------------------------------------>	
	
<?php
	for($i = 0; $i < count($mood_array); $i++ )
	{
		//echo $mood_array[$i];
	}

 ?>
	<script src="{{ asset('assets/js/toolbar.js') }}"></script>
	<script src="{{ asset('assets/js/Highcharts-3.0.10/js/highcharts.js') }}"></script>
	<script src="{{ asset('assets/js/Highcharts-3.0.10/js/highcharts-more.src.js') }}"></script>
	<script src="{{ asset('assets/js/jquery-ui-1.10.4/ui/jquery-ui.js')  }}"></script>
	{{  HTML::style('assets/js/jquery-ui-1.10.4/themes/base/jquery-ui.css')  }}



<!-- page contents ---------------------------------------------------------------------------------------------------->	
	
	<div id="dashframe">
	<div id="tools">
		<div class="dash_tool" style="margin-left:7px;"><img src="{{  asset('assets/images/dash_comment.png')  }}"></div>
		<div class="dash_tool"><img src="{{  asset('assets/images/dash_attach.png')  }}"></div>
		<div class="dash_tool"><img src="{{  asset('assets/images/dash_download.png')  }}"></div>
		<div class="dash_tool"><img src="{{  asset('assets/images/dash_undo.png')  }}"></div>
		<div class="dash_tool"><img src="{{  asset('assets/images/dash_settings.png')  }}"></div>
	</div>
		<div id="wheel_col">

			<div id="wheel_area">
				<p>snapshot</p>
				<img src="{{  asset('assets/images/health_wheel2.png')  }}">
			</div>

			<div id="key_scores">
				<p>key scores</p>
				<div class="key_score_box" id="mood_score" style="margin-left:7px;">
					<div class="score">71</div>
					<div class="score_name">mood</div>
				</div>
				<div class="key_score_box" id="sleep_score">
					<div class="score">83</div>
					<div class="score_name">sleep</div>
				</div>
				<div class="key_score_box" id="med_score">
					<div class="score">98</div>
					<div class="score_name">meds</div>
				</div>
			</div>
			
		</div>
		<div id="graph_col">
			<div class="graph_row">
				<div id="mood_graph"></div>

				</div>
			</div>
			<div class="graph_row">
				<div id="meds_graph" style="float:left;"></div>
				<div id="sleep_graph" style="float:left;"></div>
				<div id="social_graph" style="float:left"></div>

			</div>

		</div>
	</div>













	<script type="text/javascript">

$(function () {
    $('#meds_graph').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Medication Compliance'
        },
     
        xAxis: {
        	type: 'datetime'
           
        },
        yAxis: {
            min: 0,
            max: 100,
            title: {
                text: 'percent compliance'
            }
        },

        legend: {
        	borderWidth: 0
        },

        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}%</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'percent',
            data : <?php echo $med_array ?>

        }]
    });
});
	    


$(function () {

	$('#sleep_graph').highcharts({

        chart: {
            type: 'columnrange',
        },
		
            title: {
                text: 'Sleep Chart'
            },
			
        xAxis: {
            type: 'datetime',
        },
        
          yAxis: {
            type: 'datetime',
			title: {
			text: 'Time of Night'
			},
			reversed: true, 
			dateTimeLabelFormats: {
					hour: '%l:%M%p',	
					day: '%l:%M%p'			
            }
			       
        },

		tooltip: {
		formatter: function() {
                var s = '<b>'+ Highcharts.dateFormat('%A, %b %e, %Y', this.x) + '</b> <br />' + 
                		Highcharts.dateFormat('%l:%M%p to ', this.point.high) + Highcharts.dateFormat('%l:%M%p', this.point.low) +'</b>';

                return s;
            }
        },
		
        legend: {
            enabled: false
        },

        series: [
            {
            name: "BP",
            color: "green",
            data: 
                 <?php echo $sleep_array ?>
            }]

    });
});




$(function () {

	$('#social_graph').highcharts({
	            
	    chart: {
	        polar: true,
	    },
	    
	    title: {
	        text: 'Relationships Chart',
	        x: -80
	    },
	    
	    pane: {
	    	size: '100%'
	    },
	    
	    xAxis: {
	        categories: ['Coworkers', 'Family', 'Extended Family', 'Friends', 
	                'Care Providers'], 
	        tickmarkPlacement: 'on',
	        lineWidth: 0,
            gridLineWidth:0.5
            
	    },
	        
	    yAxis: {
	        gridLineInterpolation: 'polygon',
            gridLineWidth: 0.5,
	        lineWidth: 0,
	        labels: {
	        	enabled:false,
	        	formatter: function() {
	        		if(this.value >= 75)
	        		{
	        			var value = 'Very Close';
	        		}
	        		else if(this.value >= 50 && this.value < 75)
	        		{
	        			var value = 'Close';
	        		}
	        		else if(this.value >= 25 && this.value < 50)
	        		{
	        			var value = 'Distant';
	        		}
	        		else
	        		{
	        			var value = 'Very Distant';
	        		}
	        		return value !== 'undefined' ? value : this.value;
	        	}
	        }
            
            
	    },
	    tooltip: {

	    	formatter: function() {

	    		var tooltip = [];
	    		//iterate over both closeness and frequency, categorize closeness and frequency numbers into quartiles
	    		//and format tooltip to desired specifications

	    		$.each(this.points, function(i, point)
	    		{
	    			if(this.y >= 75)
	    			{
	    				var closeness = 'Very Close';
	    				var frequency = 'Daily';
	    			}
	    			else if(this.y >= 50 && this.y < 75)
	    			{
	    				var closeness = 'Close';
	    				var frequency = 'Weekly';
	    			}
	    			else if(this.y >= 25 && this.y < 50)
	    			{
	    				var closeness = 'Distant';
	    				var frequency = 'Monthly';
	    			}
	    			else
	    			{
	    				var closeness = 'Very Distant';
	    				var frequency = 'Rarely';
	    			}

	    			tooltip.push('<span style="color:' + point.series.color + '">'+ point.series.name +' : <b>'+
                    ((i == 0) ? frequency : closeness) +'</b><span>') // make the first value, 0 = frequency, and 1 = closeness
	    		});

	    		return tooltip.join('<br />');

	    	},
	    	shared: true
	    },
	    
	    legend: {
	    	borderWidth: 0,
	        align: 'center',
	        verticalAlign: 'bottom',
	        layout: 'horizontal'
	    },
	    
	    series: [{
	        name: 'Relationship Frequency',
	        data: <?php echo $relationships_frequency_array ?>,
	        pointPlacement: 'on'
	    }, {
	        name: 'Relationship Closeness',
	        data: <?php echo $relationships_closeness_array ?>,
	        pointPlacement: 'on'
	    }]
	
	});
});




$(function () {

		//series data formatting (datetime)
		var series = [];
		var test = <?php echo $mood_array ?>;
		for(key in test)
		{
			var mood_data = test[key];
			series.push({
				name: key,
				data: mood_data
			});
		}



        $('#mood_graph').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Mood Chart'
            },
            xAxis: {
                type: 'datetime',
                 minPadding: 0.10,
       			 maxPadding: 0.10,
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Daily Moods Logged'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {
                align: 'right',
                y: 20,
                x: -40,
                verticalAlign: 'top',
                floating: true,
                borderWidth: 0,
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ Highcharts.dateFormat('%A, %b %e, %Y', this.x) + '</b> <br />' + 
                		'</b>'+ this.series.name.charAt(0).toUpperCase() + this.series.name.slice(1)
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black, 0 0 3px black'
                        }
                    }
                }
            },
            series: series
        });
    });
    





$(function() {
    $( "#from, #to" ).datepicker({
	    dateFormat: 'yy-mm-dd',
        defaultDate: "",
        changeMonth: false,
        numberOfMonths: 1,
		onSelect: function( selectedDate ) {
            if(this.id == 'from'){
                var dateMin = $('#from').datepicker("getDate");
                var rMin = new Date(dateMin.getFullYear(), dateMin.getMonth(),dateMin.getDate() + 1); // Min Date = Selected + 1d
                var rMax = new Date(dateMin.getFullYear(), dateMin.getMonth(),dateMin.getDate()); // Max Date = Selected + 1d
                $('#to').datepicker("option","minDate",rMin);
            }
            else{
            	var dateMin = $('#to').datepicker("getDate");
            	var rMax = new Date(dateMin.getFullYear(), dateMin.getMonth(),dateMin.getDate() - 1);
            	$('#from').datepicker("option","maxDate",rMax);
            }
		}
    });
});



	</script>








@stop
