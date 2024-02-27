<?php
include("../php/ini.php");

include_once '../php/database.php';
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$email = $_POST['email'];
$str = "INSERT INTO `user` (`user_name`, `email`, `password`) VALUES ('{$user_name}', '{$email}', '{$password}');";
$result = mysqli_query($conn, $str);
if($result){
    header("location:../html/login.html");
}
else{
    echo "error";
}
?>