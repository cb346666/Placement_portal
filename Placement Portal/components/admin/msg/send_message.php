<?php
session_start(); // Start session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "db_connect.php";

    // Get the logged-in user's ID
    $userId = $_SESSION['user_id'] ?? null; // Assuming you have stored user ID in the session

    // Get message content from the form submission
    $messageContent = trim($_POST['message']); // Trim to remove leading/trailing whitespace

    // Validate user ID and message content
    if (!$userId || empty($messageContent)) {
        http_response_code(400);
        exit("Invalid request parameters");
    }

    // Prepare SQL statement to insert message into the database
    $sql = "INSERT INTO messages (sender_id, message) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("is", $userId, $messageContent);
        if ($stmt->execute()) {
            // Message inserted successfully
            echo "Message sent successfully";
        } else {
            // Error inserting message
            http_response_code(500);
            exit("Error sending message");
        }

        // Close prepared statement
        $stmt->close();
    } else {
        // Error preparing SQL statement
        http_response_code(500);
        exit("Internal Server Error: Unable to prepare SQL statement");
    }

    // Close connection
    $conn->close();
} else {
    // Request method is not POST
    http_response_code(405);
    exit("Method Not Allowed");
}
?>
