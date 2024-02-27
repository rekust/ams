<?php
include("../php/ini.php");
session_start();

include_once '../php/database.php';

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

$query = "INSERT INTO `students` (`user_id`, `student_name`, `father_name`, `mother_name`, `phone`, `roll_number`, `rank`, `DOB`, `aadhaar`, `PRTC`, `marksheet`, `admit_card`, `birth_certificate`, `ration_card`, `caste_certificate`, `status_id`) VALUES (
    {$user_id},
    '{$student_name}',
    '{$father_name}',
    '{$mother_name}',
    '{$phone}',
    '{$roll_number}',
    '{$rank}',
    '{$DOB}',
    '{$aadhaar}',
    '{$PRTC}',
    '{$marksheet}',
    '{$admit_card}',
    '{$birth_certificate}',
    '{$ration_card}',
    '{$caste_certificate}',
    1
)";

$result = mysqli_query($conn, $query);

if ($result) {
    header("location:../php/profile.php");
} else {
    header("location:../html/completeProfile.html");
}
?>
