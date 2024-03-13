<?php
// Start session
session_start();
// Include database connection file
include 'db-connect.php';

// Check if recipient ID is not set in session
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page or handle as per your application logic
    header("Location: index.php");
    exit; // Terminate script execution after redirection
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Box</title>
    <link rel="stylesheet" href="./msg/styles.css">
</head>

<body>
    <?php
    // Retrieve user data from the session
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['role']; // Assuming you store the user's role in the session
    
    // Example usage:
    if ($user_role === "super_admin") {
        // Include files specific to super admins
        include('includes/header.php');
        include('includes/navbar.php');
    } elseif ($user_role === "staff") {
        // Include files specific to staff
        include('includes1/header.php');
        include('includes1/navbar.php');
    }
    ?>
    <div class="chat-container">
        <div id="chat-messages" class="chat-messages">
            <!-- Messages will be displayed here -->
        </div>
        <!-- Input field for typing message -->
        <input type="text" id="message-input" class="message-input" placeholder="Type your message...">
        <!-- Button to send message -->
        <button id="send-btn" class="send-btn">Send</button>
    </div>
    <!-- Include jQuery library -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
        // JavaScript code to execute when the document is ready
        $(document).ready(function () {
            // Retrieve user ID from session (assuming it's stored in user_id)
            var userId = <?php echo $_SESSION['user_id']; ?>;
            // Debugging statement to check user ID
            console.log("User ID:", userId);
            // Check if user ID is not set
            if (!userId) {
                // Log an error message to console
                console.error('User ID not set in session.');
                // You may handle this case further, e.g., redirect to a page where user ID is set
            }
        });
    </script>
    <!-- Include script.js file with deferred loading -->
    <script src="./msg/script.js" defer></script>
    <?php
    // Include footer and scripts files
    include 'includes/scripts.php';
    ?>
</body>

</html>