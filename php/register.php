<?php
include("../php/ini.php");

include_once '../php/database.php';
$password = $_POST['password'];
$email = $_POST['email'];
$str = "INSERT INTO `user` (`email`, `password`) VALUES ('{$email}', '{$password}');";
$result = mysqli_query($conn, $str);
if($result){
    header("location:../html/login.html");
}
else{
    echo "error";
}
?>