<?php
include("../php/ini.php");
session_start();
include 'database.php';

// Query to fetch data from students table and join with user table
$studentQuery = "SELECT students.student_name, students.father_name, students.mother_name, students.phone, students.roll_number, students.rank, students.DOB,
                 students.aadhaar, students.PRTC, students.marksheet, students.admit_card, students.birth_certificate, students.ration_card, students.caste_certificate,
                 students.status_id, user.email
          FROM students
          INNER JOIN user ON students.user_id = user.user_id";

$studentResult = mysqli_query($conn, $studentQuery);

// Check if the query executed successfully
if (!$studentResult) {
    die("Query failed: " . mysqli_error($conn));
}

// Create a file pointer for writing
$file = fopen('php://temp', 'w');

// Write CSV headers
$headers = array('Student Name', 'Father\'s Name', 'Mother\'s Name', 'Phone', 'Roll Number', 'Rank', 'DOB', 'Aadhaar', 'PRTC', 'Marksheet', 'Admit Card', 'Birth Certificate', 'Ration Card', 'Caste Certificate', 'Status', 'Email');
fputcsv($file, $headers);

// Write CSV rows
while ($row = mysqli_fetch_assoc($studentResult)) {
    // Format status
    $status = ($row['status_id'] == 1) ? 'Pending' : (($row['status_id'] == 2) ? 'Verified' : 'Rejected');
    
    // Append to CSV
    fputcsv($file, array(
        $row['student_name'],
        $row['father_name'],
        $row['mother_name'],
        $row['phone'],
        $row['roll_number'],
        $row['rank'],
        $row['DOB'],
        $row['aadhaar'],
        $row['PRTC'],
        $row['marksheet'],
        $row['admit_card'],
        $row['birth_certificate'],
        $row['ration_card'],
        $row['caste_certificate'],
        $status,
        $row['email']
    ));
}

// Set CSV filename
$filename = 'students.csv';

// Move pointer to beginning of file
rewind($file);

// Output CSV headers
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Output CSV contents
fpassthru($file);

// Close the file pointer
fclose($file);

exit;
?>
