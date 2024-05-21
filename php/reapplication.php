<?php
session_start();
include_once '../php/database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve user inputs and sanitize them
    $user_id = $_SESSION['user_id'];
    $student_name = mysqli_real_escape_string($conn, $_POST['student_name']);
    $father_name = mysqli_real_escape_string($conn, $_POST['father_name']);
    $mother_name = mysqli_real_escape_string($conn, $_POST['mother_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $roll_number = mysqli_real_escape_string($conn, $_POST['roll_number']);
    $rank = mysqli_real_escape_string($conn, $_POST['rank']);
    $DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
    $aadhaar = mysqli_real_escape_string($conn, $_POST['aadhaar']);
    $PRTC = mysqli_real_escape_string($conn, $_POST['PRTC']);
    $marksheet = mysqli_real_escape_string($conn, $_POST['marksheet']);
    $admit_card = mysqli_real_escape_string($conn, $_POST['admit_card']);
    $birth_certificate = mysqli_real_escape_string($conn, $_POST['birth_certificate']);
    $ration_card = mysqli_real_escape_string($conn, $_POST['ration_card']);
    $caste_certificate = mysqli_real_escape_string($conn, $_POST['caste_certificate']);

    // SQL query to update student details
    $query = "UPDATE students 
              SET student_name = '$student_name',
                  father_name = '$father_name',
                  mother_name = '$mother_name',
                  phone = '$phone',
                  roll_number = '$roll_number',
                  rank = '$rank',
                  DOB = '$DOB',
                  aadhaar = '$aadhaar',
                  PRTC = '$PRTC',
                  marksheet = '$marksheet',
                  admit_card = '$admit_card',
                  birth_certificate = '$birth_certificate',
                  ration_card = '$ration_card',
                  caste_certificate = '$caste_certificate',
                  status_id = 1
              WHERE user_id = $user_id";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Redirect to profile page
        header("Location: ../php/profile.php");
        exit; // Stop further execution
    } else {
        // Handle query failure
        $error_message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Re-apply Your Details</title>
    <link rel="stylesheet" href="../css/register.css" />
    <link rel="stylesheet" href="../css/completeProfile.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <link rel="icon" href="../images/AMS.png" type="image/png">
  </head>
  <body>
    <div class="container">
      <header>Re-submit Your Details</header>
      <form action="" method="post">
        <div class="all-fields">
          <div class="sub-field-1">
            <p class="sub-header">Contact Information</p>
  
            <div class="field username">
              <div class="input-area">
                <input type="text" name="student_name" id="#" placeholder="Student's Name" />
                <i class="icon fas fa-user"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
              </div>
              <div class="error error-txt">Student Name can't be blank!</div>
            </div>
  
            <div class="field father">
              <div class="input-area">
                <input type="text" name="father_name" id="#" placeholder="Father's Name" />
                <i class="icon fas fa-user"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
              </div>
              <div class="error error-txt">Father's Name can't be blank!</div>
            </div>
  
            <div class="field mother">
              <div class="input-area">
                <input type="text" name="mother_name" id="#" placeholder="Mother's Name" />
                <i class="icon fas fa-user"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
              </div>
              <div class="error error-txt">Mother's Name can't be blank!</div>
            </div>
  
            <div class="field dob">
              <div class="input-area">
                <input type="date" name="DOB" id="#"/>
                <i class="icon fas fa-calendar-days"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
              </div>
              <div class="error error-txt">DOB can't be blank!</div>
            </div>
  
            <div class="field phone">
              <div class="input-area">
                <input type="text" name="phone" id="#" placeholder="Phone Number" />
                <i class="icon fas fa-phone"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
              </div>
              <div class="error error-txt">Phone Number can't be blank!</div>
            </div>
  
            <div class="field roll">
              <div class="input-area">
                <input type="text" name="roll_number" id="#" placeholder="TBJEE Roll Number" />
                <i class="icon fas fa-address-card"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
              </div>
              <div class="error error-txt">TBJEE Roll Number can't be blank!</div>
            </div>
  
            <div class="field rank">
              <div class="input-area">
                <input type="text" name="rank" id="#" placeholder="TBJEE Rank" />
                <i class="icon fas fa-ranking-star"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
              </div>
              <div class="error error-txt">TBJEE Rank can't be blank!</div>
            </div>
  
          </div>
          <div class="sub-field-2">
            <p class="sub-header">Document Links</p>
          
            <div class="field adlink">
              <div class="input-area">
                <input type="text" name="aadhaar" id="#" placeholder="Aadhaar Card Link" />
                <i class="icon fas fa-link"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
              </div>
              <div class="error error-txt">Aadhaar Card Link can't be blank!</div>
            </div>
          
            <div class="field mlink">
              <div class="input-area">
                <input type="text" name="marksheet" id="#" placeholder="12th Marksheet Link" />
                <i class="icon fas fa-link"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
              </div>
              <div class="error error-txt">12th Marksheet Link can't be blank!</div>
            </div>
          
            <div class="field amlink">
              <div class="input-area">
                <input type="text" name="admit_card" id="#" placeholder="TBJEE Admit Card Link" />
                <i class="icon fas fa-link"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
              </div>
              <div class="error error-txt">TBJEE Admit Card Link can't be blank!</div>
            </div>
          
            <div class="field bclink">
              <div class="input-area">
                <input type="text" name="birth_certificate" id="#" placeholder="Birth Certificate Link" />
                <i class="icon fas fa-link"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
              </div>
              <div class="error error-txt">Birth Certificate Link can't be blank!</div>
            </div>
          
            <div class="field plink">
              <div class="input-area">
                <input type="text" name="PRTC" id="#" placeholder="Domicile Certificate Link" />
                <i class="icon fas fa-link"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
              </div>
              <div class="error error-txt">Domicile Certificate Link can't be blank!</div>
            </div>
          
            <div class="field rclink">
              <div class="input-area">
                <input type="text" name="ration_card" id="#" placeholder="Ration Card Link" />
                <i class="icon fas fa-link"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
              </div>
              <div class="error error-txt">Ration Card Link can't be blank!</div>
            </div>
          
            <div class="field clink">
              <div class="input-area">
                <input type="text" name="caste_certificate" id="#" placeholder="Caste Certificate Link [Optional]" />
                <i class="icon fas fa-link"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
              </div>
              <div class="error error-txt">Caste Certificate Link can't be blank!</div>
            </div>
          
          </div>
        </div>
        <input type="submit" value="Submit" />
      </form>
    </div>

    <script src="../js/completeProfile.js"></script>
  </body>
</html>
