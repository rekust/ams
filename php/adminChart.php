<html>

<head>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {
			'packages': ['bar']
		});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Year', 'Applications', 'Rejected', 'Accepted'],
				<?php 
				foreach ($yearlyCounts as $year => $counts){
				?>
				['<?php echo $year; ?>', <?php echo $counts['total']; ?>, <?php echo $counts['status3']; ?>, <?php echo $counts['status2']; ?>],
				<?php } ?>
			]);

			var options = {
				hAxis: {
					textStyle: {
						fontSize: 22,
						color: '#333'
					}
				},
				vAxis: {
					textStyle: {
						fontSize: 16,
						color: '#333',
						padding: 200
					}
				},
				legend: {
					textStyle: {
						fontSize: 18,
						color: '#333',
					}
				}
			};

			var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

			chart.draw(data, google.charts.Bar.convertOptions(options));
		}
	</script>
</head>

<body>
	<div id="columnchart_material"></div>
</body>

</html>
