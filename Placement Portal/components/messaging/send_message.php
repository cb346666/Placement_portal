<?php
session_start(); // Start session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "db-connect.php";

    // Get the logged-in user's ID
    $userId = $_SESSION['user_id']; // Assuming you have stored user ID in the session

    // Get message content from the form submission
    $messageContent = $_POST['message'];

    // Validate message content
    if (empty($messageContent)) {
        http_response_code(400);
        exit("Message content cannot be empty");
    }

    // Prepare SQL statement to insert message into the database
    $sql = "INSERT INTO messages (sender_id, message_content) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

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

    // Close prepared statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Request method is not POST
    http_response_code(405);
    exit("Method Not Allowed");
}
?>