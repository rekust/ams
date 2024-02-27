<?php
include("../php/ini.php");

$servername = 'localhost';
$username = 'aaniketh';
$password = '2004';
$dbname = 'admission';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die('Could not connect to MySQL');
}
?>
