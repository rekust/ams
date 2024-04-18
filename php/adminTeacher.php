<?php
include("../php/ini.php");

session_start();
include 'database.php';

//TODO: uncomment it after done developing
// $isAdmin = false;
// if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') {
//     if (isset($_SESSION['email']) && $_SESSION['email'] === 'admin@admin.com' && isset($_SESSION['password']) && $_SESSION['password'] === 'admin@01P@$$W0RD') {
//         $isAdmin = true;
//     } else {
//         // Redirect to the login page or show an error message
//         header("Location: ../html/login.html");
//         exit;
//     }
// } else {
//     // Redirect to the login page or show an error message
//     header("Location: ../html/login.html");
//     exit;
// }

$teacherDetailFetchQuery = "SELECT teachers.teacher_id, teachers.teacher_name, teachers.teacher_phone, user.email, user.password
        FROM teachers
        INNER JOIN user ON teachers.user_id = user.user_id";
$teacherDetailResult = mysqli_query($conn, $teacherDetailFetchQuery);

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

	<p class="chart-header">Assign Teacher</p>

	<div class="container">
		<div class="form-left">
			<form action="../php/assignTeacher.php" method="post">

				<div class="left">
					<div class="field name">
						<div class="input-area">
							<input type="text" name="teacher_name" id="#" placeholder="Teacher's Full Name" required>
							<i class="icon fas fa-user"></i>
						</div>
					</div>

					<div class="field phone">
						<div class="input-area">
							<input type="text" name="teacher_phone" id="#" placeholder="Teacher's Contact Number" required>
							<i class="icon fas fa-phone"></i>
						</div>
					</div>
				</div>

				<div class="right">
					<div class="field email">
						<div class="input-area">
							<input type="email" name="email" id="#" placeholder="Teacher's Email Address" required>
							<i class="icon fas fa-envelope"></i>
						</div>
					</div>

					<div class="field password">
						<div class="input-area">
							<input type="password" name="password" id="#" placeholder="Create Password" required>
							<i class="icon fas fa-lock"></i>
						</div>
					</div>
				</div>

				<input type="submit" value="Assign">

			</form>
		</div>

	</div>

	<p class="chart-header">Remove Teacher</p>

	<div class="container">
		<div class="form-right">
			<form action="../php/removeTeacher.php" method="post">
				<div class="field id">
					<div class="input-area">
						<input type="text" name="remove_id" id="#" placeholder="Teacher's ID" required>
						<i class="icon fas fa-id-card-clip"></i>
					</div>
				</div>
				<input type="submit" name="remove_teacher" value="Remove">
			</form>
		</div>
	</div>

	<p class="chart-header">Teachers' Details</p>

	<div class="teacher-table">
		<div class="column id">ID</div>
		<div class="column name">NAME</div>
		<div class="column email">EMAIL</div>
		<div class="column phone">CONTACT NUMBER</div>
		<div class="column password">PASSWORD</div>

		<?php
		$i = 0;
		$num_rows = mysqli_num_rows($teacherDetailResult);
		while ($row = mysqli_fetch_assoc($teacherDetailResult)) {
			$i++;
			echo '<div class="data id' . ($i === $num_rows ? ' last-row' : '') . '"><p>' . $row['teacher_id'] . '</p></div>';
			echo '<div class="data name' . ($i === $num_rows ? ' last-row' : '') . '"><p>' . $row['teacher_name'] . '</p></div>';
			echo '<div class="data email' . ($i === $num_rows ? ' last-row' : '') . '"><p>' . $row['email'] . '</p></div>';
			echo '<div class="data phone' . ($i === $num_rows ? ' last-row' : '') . '"><p>' . $row['teacher_phone'] . '</p></div>';
			echo '<div class="data password' . ($i === $num_rows ? ' last-row' : '') . '"><p>' . $row['password'] . '</p></div>';
		}
		?>

	</div>

</body>

</html>