<?php
include("../php/ini.php");

session_start();
include 'database.php';
$currentYear = date("Y");
$yearlyCounts = array();

for ($year = 2024; $year <= $currentYear; $year++) {
	// SQL query to count total students for each year
	$sqlTotal = "SELECT COUNT(*) AS total FROM students WHERE YEAR(reg_date) = $year";

	// Execute the total students query
	$resultTotal = mysqli_query($conn, $sqlTotal);

	// SQL query to count students with status ID 2 for each year
	$sqlStatus2 = "SELECT COUNT(*) AS status2 FROM students WHERE status_id = 2 AND YEAR(reg_date) = $year";

	// Execute the status ID 2 query
	$resultStatus2 = mysqli_query($conn, $sqlStatus2);

	// SQL query to count students with status ID 3 for each year
	$sqlStatus3 = "SELECT COUNT(*) AS status3 FROM students WHERE status_id = 3 AND YEAR(reg_date) = $year";

	// Execute the status ID 3 query
	$resultStatus3 = mysqli_query($conn, $sqlStatus3);

	// Check if the queries were successful
	if ($resultTotal && $resultStatus2 && $resultStatus3) {
		 // Fetch the results as associative arrays
		 $rowTotal = mysqli_fetch_assoc($resultTotal);
		 $rowStatus2 = mysqli_fetch_assoc($resultStatus2);
		 $rowStatus3 = mysqli_fetch_assoc($resultStatus3);

		 // Store the counts in the array
		 $yearlyCounts[$year] = array(
			  'total' => $rowTotal['total'],
			  'status2' => $rowStatus2['status2'],
			  'status3' => $rowStatus3['status3']
		 );
	} else {
		 // Handle the case where any of the queries failed
		 echo "Error executing queries for year $year: " . mysqli_error($conn);
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Panel</title>

	<link rel="stylesheet" href="../css/admin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
	<?php include("../html/navAdmin.html"); ?>

	<p class="chart-header">Admission Metrics</p>
	<p class="chart-sub-header">Applications Submitted, Rejected and Accepted: Year 2024-<?php echo $currentYear; ?> </p>
	<div class="chart">
		<?php include("../php/adminChart.php") ?>
	</div>

</body>

</html>