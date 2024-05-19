<?php
include("../php/ini.php");
include_once '../php/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $security_question = isset($_POST['security_question']) ? $_POST['security_question'] : '';
    $security_answer = isset($_POST['security_answer']) ? $_POST['security_answer'] : '';

    if (!empty($email) && !empty($password) && !empty($security_question) && !empty($security_answer)) {
        $str = "INSERT INTO `user` (`email`, `password`, `security_question`, `security_answer`) VALUES ('{$email}', '{$password}', '{$security_question}', '{$security_answer}');";
        $result = mysqli_query($conn, $str);

        if ($result) {
            header("Location: ../html/login.html");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "All fields are required.";
    }
}
?>
