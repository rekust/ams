<?php
include("../php/ini.php");

include_once '../php/database.php';

$teacher_name = $_POST['teacher_name'];
$teacher_phone = $_POST['teacher_phone'];
$password = $_POST['password'];
$email = $_POST['email'];
$user_type_id = 2;

$userValues = "INSERT INTO `user` (`user_id`, `user_type_id`, `email`, `password`) VALUES (NULL, '{$user_type_id}', '{$email}', '{$password}')";

$resultOfUser = mysqli_query($conn, $userValues);
if ($resultOfUser) {
    $userIdQuery = "SELECT user_id FROM user WHERE email = '{$email}' AND user_type_id = {$user_type_id}";

    $user_id = mysqli_query($conn, $userIdQuery);
    if ($user_id) {
        $userRow = mysqli_fetch_assoc($user_id);
        $user_id_value = $userRow['user_id'];
        echo $user_id_value;

        $teacherValues = "INSERT INTO `teachers` (`teacher_id`, `user_id`, `teacher_name`, `teacher_phone`) VALUES (NULL, {$user_id_value}, '{$teacher_name}', '{$teacher_phone}')";

        $resultOfTeacher = mysqli_query($conn, $teacherValues);
        if ($resultOfTeacher) {
            header("location:../php/adminTeacher.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
