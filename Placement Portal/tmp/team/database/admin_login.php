<?php
session_start(); // Start session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "db-connect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement using a prepared statement to prevent SQL injection
    $sql = "SELECT user_id FROM staff_super_admins WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);

    // Check if the prepared statement was successfully created
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    // Check if the statement execution was successful
    if (!$stmt) {
        die("Execute failed: " . $stmt->error);
    }

    // Bind result variables
    $stmt->bind_result($user_id);

    // Fetch user ID
    $stmt->fetch();

    // Check if user ID is fetched
    if ($user_id) {
        // Login successful, store user ID in session
        $_SESSION['user_id'] = $user_id;
        echo "success";
        exit(); // Exit to prevent further execution of the script
    } else {
        // Login failed, send error response
        http_response_code(401);
        exit("Invalid username or password");
    }

    // Close prepared statement and connection
    $stmt->close();
    $conn->close();
}
?>