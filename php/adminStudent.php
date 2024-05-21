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

// Query to fetch data from students table and join with user table
$studentQuery = "SELECT students.student_name, students.father_name, students.mother_name, students.phone, students.roll_number, students.rank, students.DOB,
                 students.aadhaar, students.PRTC, students.marksheet, students.admit_card, students.birth_certificate, students.ration_card, students.caste_certificate,
                 students.status_id, YEAR(students.reg_date) AS reg_year, user.email
          FROM students
          INNER JOIN user ON students.user_id = user.user_id";

if (!empty($_POST['sessionYear'])) {
    $selectedYear = $_POST['sessionYear'];
    $studentQuery .= " WHERE YEAR(students.reg_date) = $selectedYear";
}

if (!empty($_POST['status'])) {
    $selectedStatus = $_POST['status'];
    $studentQuery .= (!empty($_POST['sessionYear']) ? " AND" : " WHERE") . " students.status_id = $selectedStatus";
}

// Execute the query
$studentResult = mysqli_query($conn, $studentQuery);

$yearQuery = "SELECT DISTINCT YEAR(reg_date) AS reg_year FROM students ORDER BY reg_year DESC";
$yearResult = mysqli_query($conn, $yearQuery);
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
    <link rel="icon" href="../images/AMS.png" type="image/png">
</head>

<body>
    <?php include("../html/navAdmin.html"); ?>

    <div class="top">
        <p class="chart-header">Students' Details <a class="export" href="../php/export.php"><input type="submit" value="Export"></a></p>

        <div class="filters">
            <div class="options">
                <form action="" method="post">
                    <label for="sessionYear">Session Year:</label>
                    <select name="sessionYear" id="sessionYear">
                        <option value="">All Year</option>
                        <?php
                        while ($yearRow = mysqli_fetch_assoc($yearResult)) {
                            $year = $yearRow['reg_year'];
                            echo "<option value=\"$year\">$year</option>";
                        }
                        ?>
                    </select>

                    <label for="status">Status:</label>
                    <select name="status" id="status">
                        <option value="">All Status</option>
                        <option value="1">Pending</option>
                        <option value="2">Verified</option>
                        <option value="3">Rejected</option>
                    </select>

                    <input class="filter-submit" type="submit" value="Filter">
                </form>
            </div>
        </div>
    </div>

    <div class="table">
        <div class="student-table header">
            <div class="column id">NAME</div>
            <div class="column info">INFORMATION</div>
            <div class="column doc">DOCUMENTS</div>
            <div class="column year">SESSION</div>
            <div class="column status">STATUS</div>
        </div>

        <?php
        while ($row = mysqli_fetch_assoc($studentResult)) {
        ?>
            <div class="student-table data">
                <div class="rows id"><?php echo $row['student_name']; ?></div>
                <div class="rows info">
                    <ul>
                        <li>Father's Name: <?php echo $row['father_name']; ?></li>
                        <li>Mother's Name: <?php echo $row['mother_name']; ?></li>
                        <li>DOB: <?php echo $row['DOB']; ?></li>
                        <li>Roll No.: <?php echo $row['roll_number']; ?></li>
                        <li>Rank: <?php echo $row['rank']; ?></li>
                        <li>Phone: <?php echo $row['phone']; ?></li>
                        <li>Email: <?php echo $row['email']; ?></li>
                    </ul>
                </div>
                <div class="rows docs">
                    <ul>
                        <li>Aadhaar: <a target="_blank" href="<?php echo $row['aadhaar']; ?>">Link</a></li>
                        <li>PRTC: <a target="_blank" href="<?php echo $row['PRTC']; ?>">Link</a></li>
                        <li>Marksheet: <a target="_blank" href="<?php echo $row['marksheet']; ?>">Link</a></li>
                        <li>Admit Card: <a target="_blank" href="<?php echo $row['admit_card']; ?>">Link</a></li>
                        <li>Birth Certificate: <a target="_blank" href="<?php echo $row['birth_certificate']; ?>">Link</a></li>
                        <li>Ration Card: <a target="_blank" href="<?php echo $row['ration_card']; ?>">Link</a></li>
                        <li>Caste Certificate: <a target="_blank" href="<?php echo $row['caste_certificate']; ?>">Link</a></li>
                    </ul>
                </div>
                <div class="rows year">
                    <?php echo $row['reg_year']; ?>
                </div>
                <div class="rows status <?php
                                        if ($row['status_id'] == 1) {
                                            echo "Pending";
                                        } elseif ($row['status_id'] == 2) {
                                            echo "Verified";
                                        } elseif ($row['status_id'] == 3) {
                                            echo "Rejected";
                                        }
                                        ?>">
                    <?php
                    if ($row['status_id'] == 1) {
                        echo "Pending";
                    } elseif ($row['status_id'] == 2) {
                        echo "Verified";
                    } elseif ($row['status_id'] == 3) {
                        echo "Rejected";
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>