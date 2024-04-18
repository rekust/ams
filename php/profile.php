<?php
include("../php/ini.php");

session_start();
include_once 'database.php';
$str = "select s.student_name, s.phone, u.email, s.father_name, s.mother_name, TIMESTAMPDIFF(YEAR, s.DOB, CURDATE()) AS age, s.DOB, s.roll_number, s.rank, s.aadhaar, s.PRTC, s.marksheet, s.admit_card, s.birth_certificate, s.ration_card, s.caste_certificate from user u join students s using (user_id) where user_id = {$_SESSION['user_id']};";
$result = mysqli_query($conn, $str);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Profile</title>

	<link rel="stylesheet" href="../css/profile.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
	<?php include("../html/nav.html"); ?>
	<p class="header"><?php echo $row['student_name'] ?>'s Dashboard</p>

	<div class="student-card">
		<!-- Contact Info -->
		<div class="contact">
			<p class="sub-header">Contact Info</p>
			<div class="info">
				<div class="info-header">
					<p class="phone">Phone</p>
					<p class="email">Email</p>
					<p class="father">Father</p>
					<p class="mother">Mother</p>
					<p class="age">Age</p>
					<p class="roll">TBJEE Roll No.</p>
					<p class="rank">TBJEE Rank</p>
				</div>
				<div class="info-colon">
					<p class="phone">:</p>
					<p class="email">:</p>
					<p class="father">:</p>
					<p class="mother">:</p>
					<p class="age">:</p>
					<p class="roll">:</p>
					<p class="rank">:</p>
				</div>
				<div class="info-data">
					<p class="phone"><?php echo $row['phone'] ?></p>
					<p class="email"><?php echo $row['email'] ?></p>
					<p class="father"><?php echo $row['father_name'] ?></p>
					<p class="mother"><?php echo $row['mother_name'] ?></p>
					<p class="age"><?php echo $row['age'] ?></p>
					<p class="roll"><?php echo $row['roll_number'] ?></p>
					<p class="rank"><?php echo $row['rank'] ?></p>
				</div>
			</div>
		</div>

		<!-- Documents -->
		<div class="docs">
			<p class="sub-header">Documents</p>
			<div class="info">
				<div class="info-header">
					<p class="aadhaar">Aadhaar</p>
					<p class="prtc">PRTC</p>
					<p class="marksheet">Marksheet</p>
					<p class="marksheet">Admit Card</p>
					<p class="birth-certificate">Birth Certificate</p>
					<p class="caste-certificate">Caste Certificate</p>
					<p class="ration-card">Ration Card</p>
				</div>
				<div class="info-colon">
					<p class="aadhaar">:</p>
					<p class="prtc">:</p>
					<p class="marksheet">:</p>
					<p class="admit">:</p>
					<p class="birth-certificate">:</p>
					<p class="caste-certificate">:</p>
					<p class="ration-card">:</p>
				</div>
				<div class="info-data">
					<p class="aadhaar"><a href="<?php echo $row['aadhaar'] ?>" target="_blank" rel='noopener noreferrer'>Aadhaar</a></p>
					<p class="prtc"><a href="<?php echo $row['PRTC'] ?>" target="_blank" rel='noopener noreferrer'>PRTC</a></p>
					<p class="marksheet"><a href="<?php echo $row['marksheet'] ?>" target="_blank" rel='noopener noreferrer'>12th Marksheet</a></p>
					<p class="admit"><a href="<?php echo $row['admit_card'] ?>" target="_blank" rel='noopener noreferrer'>TBJEE Admit Card</a></p>
					<p class="birth-certificate"><a href="<?php echo $row['birth_certificate'] ?>" target="_blank" rel='noopener noreferrer'>Birth Certificate</a></p>
					<p class="caste-certificate"><a href="<?php echo $row['caste_certificate'] ?>" target="_blank" rel='noopener noreferrer'>Caste Certificate</a></p>
					<p class="ration-card"><a href="<?php echo $row['ration_card'] ?>" target="_blank" rel='noopener noreferrer'>Ration Card</a></p>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>

</html>