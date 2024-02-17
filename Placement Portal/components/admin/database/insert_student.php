<?php
include_once("db-connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the form data is received
    if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['profile_name'])) {
        // Extract form data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profile_name = $_POST['profile_name'];

        // Validate form data (optional)
        if (empty($username) || empty($email) || empty($password) || empty($profile_name)) {
            http_response_code(400);
            echo "All fields are required!";
            exit;
        }

        // Hash the password (recommended)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL query to insert student data using prepared statements
        $query = "INSERT INTO students (username, email, password, profile_name) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        if (!$stmt) {
            http_response_code(500);
            echo "Failed to prepare statement. Please try again.";
            exit;
        }

        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashed_password, $profile_name);

        if (mysqli_stmt_execute($stmt)) {
            // Successful insertion
            echo "success";
        } else {
            // Failed insertion
            http_response_code(500);
            echo "Failed to insert student data. Please try again.";
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