<?php
include("../php/ini.php");

    include_once '../php/database.php';
    $status_id=$_POST['status_id'];
    $user_id=$_POST['user_id'];
    $str="update students set status_id={$status_id} where user_id={$user_id}";
    mysqli_query($conn,$str);
    header("location:../php/panel_uv.php");
?>