<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Check if customErrorHandler function exists before declaring it
if (!function_exists('customErrorHandler')) {
    function customErrorHandler($errNo, $errString, $errFile, $errLine){
        $message = "Error: [$errNo] $errString - $errFile: Line: $errLine";
        $logFilePath = "../log/error.txt"; // Construct absolute path using __DIR__

        // Clear the error log file before writing new error message
        file_put_contents($logFilePath, '');

        // Write the error message to the log file
        file_put_contents($logFilePath, $message . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}

set_error_handler("customErrorHandler");
?>
