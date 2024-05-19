<?php
include("../php/ini.php");
include_once '../php/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $security_question = isset($_POST['security_question']) ? $_POST['security_question'] : '';
    $security_answer = isset($_POST['security_answer']) ? $_POST['security_answer'] : '';
    $new_password = isset($_POST['new_password']) ? $_POST['new_password'] : '';

    if (!empty($email) && !empty($security_question) && !empty($security_answer) && !empty($new_password)) {
        $str = "SELECT * FROM `user` WHERE `email` = '{$email}' AND `security_question` = '{$security_question}'";
        $result = mysqli_query($conn, $str);
        $user = mysqli_fetch_assoc($result);

        if ($user && $user['security_answer'] == $security_answer) {
            $update_str = "UPDATE `user` SET `password` = '{$new_password}' WHERE `email` = '{$email}'";
            $update_result = mysqli_query($conn, $update_str);

            if ($update_result) {
                header("Location: ../html/login.html");
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Incorrect security answer or question.";
        }
    } else {
        echo "All fields are required.";
    }
}
?>
