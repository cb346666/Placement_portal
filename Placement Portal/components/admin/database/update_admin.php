<?php
include_once("db-connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the form data is received
    if (isset($_POST['edit_id'])) {
        // Extract form data
        $edit_id = $_POST['edit_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $password = $_POST['password']; // New password
        $profile_name = $_POST['profile_name'];

        // Prepare and execute the SQL query to update admin data using prepared statements
        $query = "UPDATE staff_super_admins 
                  SET username = ?, email = ?, role = ?, profile_name = ?, password = ?
                  WHERE user_id = ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssssi", $username, $email, $role, $profile_name, $password, $edit_id);

        if (mysqli_stmt_execute($stmt)) {
            // Successful update
            echo "success";
        } else {
            // Failed update
            http_response_code(500);
            echo "Failed to update admin data. Please try again.";
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