<?php
include("../php/ini.php");
session_start();

if (count($_POST) > 0) {
    include_once '../php/database.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT u.user_id, ut.user_type, u.email, s.roll_number FROM user u JOIN user_type ut USING(user_type_id) LEFT JOIN students s USING(user_id) WHERE email='{$email}' AND password='{$password}'");
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
        $_SESSION["user_id"] = $row['user_id'];
        $_SESSION["user_type"] = $row['user_type'];
    }

    mysqli_close($conn);
}

if (isset($_SESSION['user_type'])) {
    if ($_SESSION['user_type'] == "student") {
        if (isset($row['roll_number']) && !empty($row['roll_number'])) {
            header("location:../php/profile.php");
            exit;
        } else {
            header("location:../html/completeProfile.html");
            exit;
        }
    } elseif ($_SESSION['user_type'] == "teacher") {
        header("location:../php/panel_uv.php");
        exit;
    }
}
elseif ($email == "admin@admin.com" && $password == "admin@01P@SSW0RD") {
    // Redirect to the admin panel
    header("location:../php/admin.php");
    exit;
}

header("location:../html/login.html");
exit;
?>
