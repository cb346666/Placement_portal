<?php
include 'db_connect.php';

// Fetch messages from the database
$query = "SELECT m.message, s.profile_name AS sender_name, r.profile_name AS recipient_name
          FROM messages m
          INNER JOIN students s ON m.sender_id = s.student_id
          INNER JOIN staff_super_admins r ON m.recipient_id = r.user_id
          ORDER BY m.sent_at DESC LIMIT 50";
$result = $conn->query($query);

// Display fetched messages
while ($row = $result->fetch_assoc()) {
    echo '<div class="message">';
    echo '<span class="sender">' . htmlspecialchars($row['sender_name']) . ': </span>'; // Display sender's profile name
    echo htmlspecialchars($row['message']); // Display message content
    echo '</div>';
}

$conn->close();
?>