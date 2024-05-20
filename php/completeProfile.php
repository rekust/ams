<?php
include("../php/ini.php");
session_start();
include_once '../php/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/login.html");
    exit;
}

$user_id = $_SESSION['user_id'];
$student_name = $_POST['student_name'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$phone = $_POST['phone'];
$roll_number = $_POST['roll_number'];
$rank = $_POST['rank'];
$DOB = $_POST['DOB'];
$aadhaar = $_POST['aadhaar'];
$PRTC = $_POST['PRTC'];
$marksheet = $_POST['marksheet'];
$admit_card = $_POST['admit_card'];
$birth_certificate = $_POST['birth_certificate'];
$ration_card = $_POST['ration_card'];
$caste_certificate = $_POST['caste_certificate'];

// Handle image upload
$photo_data = null;
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $photo = $_FILES['photo'];
    $photo_tmp_name = $photo['tmp_name'];
    $photo_type = mime_content_type($photo_tmp_name);

    if (in_array($photo_type, $allowed_types)) {
        if (is_uploaded_file($photo_tmp_name)) {
            $photo_data = addslashes(file_get_contents($photo_tmp_name));
        }
    } else {
        // Handle invalid file type
        header("Location: ../html/completeProfile.html?error=invalid_file");
        exit;
    }
} else {
    // Handle file upload error
    header("Location: ../html/completeProfile.html?error=upload_error");
    exit;
}

$query = "INSERT INTO students (user_id, student_name, father_name, mother_name, phone, roll_number, rank, DOB, aadhaar, PRTC, marksheet, admit_card, birth_certificate, ration_card, caste_certificate, photo, status_id) VALUES ('$user_id', '$student_name', '$father_name', '$mother_name', '$phone', '$roll_number', '$rank', '$DOB', '$aadhaar', '$PRTC', '$marksheet', '$admit_card', '$birth_certificate', '$ration_card', '$caste_certificate', '$photo_data', 1)";

$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: ../php/profile.php");
    exit;
} else {
    header("Location: ../html/completeProfile.html?error=db_error");
    exit;
}
?>
