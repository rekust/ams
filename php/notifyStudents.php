<?php
include("../php/ini.php");
session_start();
include 'database.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get selected status and notify message from form
	$status = $_POST["status"];
	$message = $_POST["notify-message"];

	// Fetch email addresses based on selected status and current year
	$year = date("Y");
	$emailQuery = "SELECT user.email FROM students
                   INNER JOIN user ON students.user_id = user.user_id";
	if (!empty($status)) {
		$emailQuery .= " WHERE students.status_id = '$status'";
	}
	$emailQuery .= " AND YEAR(students.reg_date) = '$year'";
	$emailResult = mysqli_query($conn, $emailQuery);

	// Create array to store email addresses
	$bccRecipients = array();

	// Fetch email addresses from result and add to bcc recipients array
	while ($row = mysqli_fetch_assoc($emailResult)) {
		$bccRecipients[] = $row["email"];
	}

	// Comma-separated list of email addresses for BCC field
	$bccString = implode(",", $bccRecipients);

	// Email subject
	$subject = "Notification from AMS";

	// Redirect URL for Gmail with pre-filled email details
	$redirectUrl = "https://mail.google.com/mail/?view=cm&fs=1&to=&bcc=$bccString&su=$subject&body=$message";

	// Redirect to Gmail with pre-filled email details
	header("Location: $redirectUrl");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Teacher Panel</title>

	<link rel="stylesheet" href="../css/panel.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
	<?php include("../html/navTeacher.html"); ?>

	<div class="notify-container">
		<div class="form-left">
			<form action="" method="post">

				<div class="notify-options">
					<label for="status">Status of Student:</label>
					<select name="status" id="status">
						<option value="">All Status</option>
						<option value="1">Pending</option>
						<option value="2">Verified</option>
						<option value="3">Rejected</option>
					</select>
				</div>

				<p>Enter Message:</p>
				<textarea name="notify-message" class="notify-textarea" placeholder="Please add a message..."></textarea>

				<input type="submit" value="Send Mail">
				<div class="note">
					<p>Note:</p>
					<p>Please ensure you're logged into your Gmail account. Clicking this button will open your default email application or redirect you to the Gmail web app, where all the necessary details will be pre-filled for sending the email.</p>
				</div>
			</form>
		</div>
	</div>

</body>

</html>