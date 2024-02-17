<?php
session_start(); // Start session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "db-connect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement using a prepared statement to prevent SQL injection
    $sql = "SELECT user_id, role FROM staff_super_admins WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);

    // Check if the prepared statement was successfully created
    if (!$stmt) {
        http_response_code(500);
        exit(json_encode(array("status" => "error", "message" => "Database error")));
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($user_id, $role);

    // Fetch user ID and role
    $stmt->fetch();

    // Check if user ID is fetched
    if ($user_id) {
        // Store user ID and role in session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['role'] = $role;

        // Return user role as part of the response
        exit(json_encode(array("status" => "success", "role" => $role)));
    } else {
        // Login failed, send error response
        http_response_code(401);
        exit(json_encode(array("status" => "error", "message" => "Invalid username or password")));
    }

    // Close prepared statement and connection
    $stmt->close();
    $conn->close();
}
?>