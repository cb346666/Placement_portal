<?php
// Include your database connection file
include 'db_connect.php';

// Fetch messages from the database
$query = "SELECT sender_id, sender_role, message_content FROM messages ORDER BY timestamp DESC LIMIT 50";
$result = $conn->query($query);

// Display fetched messages
while ($row = $result->fetch_assoc()) {
    $senderProfile = getUserProfileName($row['sender_id'], $row['sender_role']); // Fetch sender's profile name based on role
    
    echo '<div class="message">';
    echo '<span class="sender">' . $senderProfile . ': </span>'; // Display sender's profile name
    echo htmlspecialchars($row['message_content']); // Display message content
    echo '</div>';
}

// Function to get user profile name based on user ID and role
function getUserProfileName($userId, $userRole) {
    // Include your database connection file
    include 'db_connect.php';
    
    // Initialize variables to hold table name and profile name column
    $tableName = '';
    $profileColumnName = 'profile_name';
    
    // Determine the table name based on the user role
    switch ($userRole) {
        case 'student':
            $tableName = 'students';
            break;
        case 'staff':
        case 'super_admin':
            $tableName = 'staff_super_admins';
            break;
        default:
            return "Unknown User";
    }
    
    // Query to fetch user profile name based on user ID
    $query = "SELECT $profileColumnName FROM $tableName WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($profileName);
    
    if ($stmt->fetch()) {
        // Return user profile name if found
        return $profileName;
    } else {
        // Return a default value or handle the case when user profile name is not found
        return "Unknown User";
    }
    
    $stmt->close();
    $conn->close();
}
?>