<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat System</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="chat-container">
        <div id="chat-messages" class="chat-messages">
            <!-- Messages will be displayed here -->
        </div>
        <input type="text" id="message-input" class="message-input" placeholder="Type your message...">
        <button id="send-btn" class="send-btn">Send</button>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Fetch messages when the page loads
        fetchMessages();

        // Function to send a message
        function sendMessage() {
            var messageContent = $('#message-input').val().trim();
            var recipientId =
            <?php echo $_SESSION['recipient_id']; ?>; // Assuming recipient ID is stored in session
            if (messageContent !== '') {
                $.ajax({
                    url: 'send_message.php',
                    type: 'POST',
                    data: {
                        message: messageContent,
                        recipient_id: recipientId
                    }, // Send message content and recipient ID
                    success: function(response) {
                        // Clear input field after successful message send
                        $('#message-input').val('');
                        // Fetch and display messages to update the chat
                        fetchMessages();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error sending message:', error);
                    }
                });
            }
        }

        // Function to fetch messages
        function fetchMessages() {
            $.ajax({
                url: 'fetch_messages.php',
                type: 'GET',
                success: function(response) {
                    // Display fetched messages in the message box
                    $('#chat-messages').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching messages:', error);
                }
            });
        }

        // Send message when the send button is clicked
        $('#send-btn').click(function() {
            sendMessage();
        });

        // Send message when Enter key is pressed in the input field
        $('#message-input').keypress(function(e) {
            if (e.which === 13) {
                sendMessage();
            }
        });

        // Periodically fetch messages to keep the chat updated
        setInterval(fetchMessages, 3000);
    });
    </script>
</body>

</html>