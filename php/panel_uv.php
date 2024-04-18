<?php
include("../php/ini.php");

session_start();
include 'database.php';

$teacherQuery = "SELECT teacher_name FROM teachers WHERE user_id = '{$_SESSION['user_id']}'";
$teacherResult = mysqli_query($conn, $teacherQuery);
$teacherRow = mysqli_fetch_assoc($teacherResult);
$teacherName = $teacherRow['teacher_name'];

$str = "select u.user_id, u.email, s.student_name, s.father_name, s.mother_name, s.phone, s.roll_number, s.rank, TIMESTAMPDIFF(YEAR, s.DOB, CURDATE()) AS age, s.DOB, s.aadhaar, s.PRTC, s.marksheet, s.admit_card, s.birth_certificate, s.caste_certificate from students s join user u using(user_id) where s.status_id=1;";
$result = mysqli_query($conn, $str);
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

  <p class="header"><?php echo $teacherName ?>'s Dashboard</p>
  <p class="list-header">Unverified Student List</p>
  <div class="container">
    <?php while ($row = mysqli_fetch_array($result)) { ?>
      <div class="student">
        <div class="student-card">
          <div class="sub-card">
            <!-- Contact Info Section -->
            <div class="contact">
              <p class="sub-header">Contact Info</p>
              <div class="info">
                <div class="info-header">
                  <p class="phone">Phone</p>
                  <p class="email">Email</p>
                  <p class="father">Father's Name</p>
                  <p class="mother">Mother's Name</p>
                  <p class="age">Age</p>
                  <p class="roll">Roll Number</p>
                  <p class="rank">Rank</p>
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

            <!-- Documents Section -->
            <div class="docs">
              <p class="sub-header">Documents</p>
              <div class="info">
                <div class="info-header">
                  <p class="aadhaar">Aadhaar</p>
                  <p class="prtc">PRTC</p>
                  <p class="marksheet">Marksheet</p>
                  <p class="admit">Admit Card</p>
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

          <div class="btn-wrapper">
            <p class="student-name"><?php echo $row['student_name'] ?></p>
            <div class="btn">
              <form action="../php/status_uv.php" method="post" id="my-form-<?php echo $row['user_id'] ?>">
                <input type="hidden" name="user_id" value=<?php echo $row['user_id'] ?>>
                <input type="hidden" name="status_id" id=<?php echo $row['user_id'] ?>>
              </form>
              <button class="verify" onclick="verify(<?php echo $row['user_id'] ?>)">Verify</button>
              <button class="reject" onclick="reject(<?php echo $row['user_id'] ?>)">Reject</button>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  <script src="../js/panel.js"></script>
</body>

</html>
