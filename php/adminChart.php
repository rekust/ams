<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Year');
            data.addColumn('number', 'Applications');
            data.addColumn('number', 'Accepted');
            data.addColumn('number', 'Rejected');

            <?php foreach ($yearlyCounts as $year => $counts): ?>
                data.addRow(['<?php echo $year; ?>', <?php echo $counts['total']; ?>, <?php echo $counts['status2']; ?>, <?php echo $counts['status3']; ?>]);
            <?php endforeach; ?>

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
                },
					 colors: ['#3a86ff', '#ffbd00', '#ef233c']
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
</head>

<body>
    <div id="columnchart_material"></div>
</body>
