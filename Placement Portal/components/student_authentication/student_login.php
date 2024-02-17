<?php
session_start(); // Start session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "db.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement using a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM students WHERE username = ? AND password = ?";
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

    // Get result set
    $result = $stmt->get_result();

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Login successful, send success response
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