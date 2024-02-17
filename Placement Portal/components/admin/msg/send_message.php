<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senderId = $_SESSION['user_id'];
    $recipientId = $_POST['recipient_id']; // Assuming recipient ID is sent along with the message
    $messageContent = $_POST['message'];

    if (empty($messageContent)) {
        http_response_code(400);
        exit("Message content cannot be empty");
    }

    $sql = "INSERT INTO messages (sender_id, recipient_id, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("iis", $senderId, $recipientId, $messageContent);
    if ($stmt->execute()) {
        echo "Message sent successfully";
    } else {
        http_response_code(500);
        exit("Error sending message");
    }

    $stmt->close();
    $conn->close();
} else {
    http_response_code(405);
    exit("Method Not Allowed");
}
?>