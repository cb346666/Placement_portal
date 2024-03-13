<?php
include 'db_connect.php';

$query = "SELECT m.message, s.profile_name AS sender_name
          FROM messages m
          INNER JOIN staff_super_admins s ON m.sender_id = s.user_id
          ORDER BY m.sent_at ASC LIMIT 50";
$result = $conn->query($query);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="message">';
            echo '<span class="sender">' . htmlspecialchars($row['sender_name']) . ': </span>';
            echo htmlspecialchars($row['message']);
            echo '</div>';
        }
    } else {
        // If no messages found, send a message indicating it
        echo '<div class="message">No messages found.</div>';
    }
    $result->free(); // Free the result set
} else {
    // If there's an error in the query, send a message with the error
    echo '<div class="message">Error fetching messages: ' . $conn->error . '</div>';
}

$conn->close();
?>
