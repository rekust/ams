<?php
include("../php/ini.php");
include_once '../php/database.php';

if(isset($_POST['remove_teacher'])) {
    $remove_teacher_id = $_POST['remove_id'];
    
    // Query to delete teacher record
    $deleteTeacherQuery = "DELETE FROM teachers WHERE teacher_id = {$remove_teacher_id}";
    
    // Execute the delete teacher query
    $deleteTeacherResult = mysqli_query($conn, $deleteTeacherQuery);
    
    if($deleteTeacherResult) {
        // Query to delete user record associated with the teacher
        $deleteUserQuery = "DELETE FROM user WHERE user_id = (SELECT user_id FROM teachers WHERE teacher_id = {$remove_teacher_id})";
        
        // Execute the delete user query
        $deleteUserResult = mysqli_query($conn, $deleteUserQuery);
        
        if($deleteUserResult) {
            // Redirect back to the same page after successful deletion
            header("Location: adminTeacher.php");
            exit();
        } else {
            echo "Error deleting user: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting teacher: " . mysqli_error($conn);
    }
}
?>
