<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Burndown Chart</title>
    
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript">
      		google.load("visualization", "1", {packages:["corechart"]});
      		google.setOnLoadCallback(drawChart);
      		function drawChart() 
			{
	
        		var data = google.visualization.arrayToDataTable([
				  	['Day', 'Estimated Time', 'Actual Time'],
				  	['Day 0',  	5,      5],
        		]);
	
				//data.addRows([ ['Day6', 0, 1]]);
				
				
	
				
				<?php
					$con = mysql_connect( 'localhost', 'jess', 'password' );
					
					
					if (!$con) 
					{
						die( 'Could not connect: ' . mysql.error() );
					}
					mysql_select_db( "Scrum", $con );
					$result = mysql_query( "SELECT * FROM burndownChart WHERE sprintID = 1" );
								
					while( $row = mysql_fetch_array( $result ) )
					{	
						echo "data.addRows([ [" ;
						echo "'Day " . $row[ 'dayNumber' ] . "',";
						echo $row[ 'timePlanned' ] . ",";
						echo $row[ 'timeActual' ] . "] ] );";
					}
					
					mysql_close( $con );	
				?>

        		var options = {
          			title: 'Burndown Chart',
          			hAxis: {title: 'Days',  titleTextStyle: {color: 'red'}},
					vAxis: {title: 'Work Left (Days)',  titleTextStyle: {color: 'red'}}
        		};

        	var chart = new google.visualization.AreaChart(
					document.getElementById('chart_div'));
        			chart.draw(data, options);
      		}
    	</script>
</head>

<body>

	<?php
        $con = mysql_connect( 'localhost', 'jess', 'password' );
		
		
		if (!$con) 
		{
			die( 'Could not connect: ' . mysql.error() );
		}
		mysql_select_db( "Scrum", $con );
		$result = mysql_query( "SELECT * FROM burndownChart" );
		
		echo "Burndown Chart <br/><hr/>";
		echo 
			"<table border = '1'>
				<tr>
					<th>Day	</th>
					<th>Planned Time 	</th>
					<th>Actual Time 	</th>
				</tr>";
				
		while( $row = mysql_fetch_array( $result ) )
		{	
			echo "<tr>";
			echo 	"<td>" . $row[ 'dayNumber' ];
			echo 	"<td>" . $row[ 'timePlanned' ];
			echo 	"<td>" . $row[ 'timeActual' ];
			echo "</tr>";
		}
		
		echo "</table>";
		
		mysql_close( $con );
		
	?>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>

</html>


</body>
</html>