<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);

function customErrorHandler($errNo, $errString, $errFile, $errLine){
    $message = "Error: [$errNo] $errString - $errFile: Line: $errLine";
    file_put_contents("../log/error.txt", $message . PHP_EOL, LOCK_EX);
}

set_error_handler("customErrorHandler");
?>
