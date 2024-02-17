<?php
// Connect to your database

include 'db.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $department = $_POST['department'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $phone = $_POST['phone'];
    $cv = $_POST['cv'];
    
    // Update status to "Pending"
    $sql = "INSERT INTO user_info (email, uid, department, course, semester, phone, cv, status)
            VALUES ('$email', '$uid', '$department', '$course', '$semester', '$phone', '$cv', 'Pending')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>