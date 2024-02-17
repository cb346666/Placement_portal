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
        <div id="chat-messages" class="chat-messages"></div>
        <input type="text" id="message-input" class="message-input" placeholder="Type your message...">
        <button id="send-btn" class="send-btn">Send</button>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Assume you have a function to get the user's name
        var userName = "Your Name";

        // Function to send a message
        function sendMessage() {
            var message = $('#message-input').val().trim();
            if (message !== '') {
                // Append sender's name to the message
                var messageWithSender = userName + ': ' + message;
                $('#chat-messages').append('<div class="message">' + messageWithSender + '</div>');
                $('#message-input').val('');
            }
        }

        // Event listener for send button click
        $('#send-btn').click(function() {
            sendMessage();
        });

        // Event listener for pressing Enter key
        $('#message-input').keypress(function(e) {
            if (e.which == 13) { // Enter key
                sendMessage();
            }
        });
    });
    </script>
</body>

</html>