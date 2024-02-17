<?php
// Start session to access session variables
session_start();

// Include database connection file
include 'db-connect.php';

// Check if form is submitted and user is logged in
if (isset($_SESSION['user_id']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role']) && isset($_POST['profile_name'])) {
    // Retrieve user ID from session
    $id = $_SESSION['user_id'];

    // Sanitize input data to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $profile_name = mysqli_real_escape_string($conn, $_POST['profile_name']);

    // Update user profile in the database
    $sql = "UPDATE staff_super_admins SET username=?, email=?, password=?, role=?, profile_name=? WHERE user_id=?";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        // Display error message if prepare statement fails
        echo "<script>alert('Error preparing statement: " . $conn->error . "');</script>";
    } else {
        // Bind parameters and execute the statement
        $stmt->bind_param("sssssi", $username, $email, $password, $role, $profile_name, $id);
        if (!$stmt->execute()) {
            // Display error message if execute fails
            echo "<script>alert('Error executing statement: " . $stmt->error . "');</script>";
        } else {
            // Check if the update was successful
            if ($stmt->affected_rows > 0) {
                $_SESSION['update_success'] = true;

                // Delay the redirect to allow the success message to be displayed
                usleep(500000); // 0.5 second delay
                header("Location: ../profile.php");
                exit();
            } else {
                // Display error message if no rows were affected
                echo "<script>alert('No rows affected.');</script>";
            }
        }
        // Close the prepared statement
        $stmt->close();
    }
} else {
    // If form is not submitted or user is not logged in, redirect to manage users page
    header("Location: ../profile.php");
    exit();
}

// Close the database connection
$conn->close();
?>