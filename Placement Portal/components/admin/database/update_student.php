<?php
include_once("db-connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the form data is received
    if (isset($_POST['edit_id'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['profile_name'])) {
        // Extract form data
        $edit_id = $_POST['edit_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password']; // New password
        $profile_name = $_POST['profile_name'];

        // Validate form data (optional)
        if (empty($username) || empty($email) || empty($password) || empty($profile_name)) {
            http_response_code(400);
            echo "All fields are required!";
            exit;
        }

        // Hash the password (optional but recommended)
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL query to update student data using prepared statements
        $query = "UPDATE students
                  SET username = ?, email = ?, password = ?, profile_name = ?
                  WHERE student_id = ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssi", $username, $email, $password, $profile_name, $edit_id);

        if (mysqli_stmt_execute($stmt)) {
            // Successful update
            echo "success";
        } else {
            // Failed update
            http_response_code(500);
            echo "Failed to update student data. Please try again.";
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        // Invalid request
        http_response_code(400);
        echo "Invalid request!";
    }
} else {
    // Invalid request method
    http_response_code(405);
    echo "Method Not Allowed!";
}
?>