<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $department = $_POST['department'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $phone = $_POST['phone'];
    
    // File upload handling
    $targetDir = "uploads/";
    $cvName = basename($_FILES["cv"]["name"]);
    $targetFilePath = $targetDir . $cvName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Check if file is a PDF
    if($fileType != "pdf") {
        echo "Sorry, only PDF files are allowed.";
    } else {    
        // Upload file
        if (move_uploaded_file($_FILES["cv"]["tmp_name"], $targetFilePath)) {
            // Connection to database and insert data
            include 'db.php';

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO user_info (email, uid, department, course, semester, phone, cv)
            VALUES ('$email', '$uid', '$department', '$course', '$semester', '$phone', '$cvName')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>