$(document).ready(function() {
    // Function to send a message
    function sendMessage() {
        var messageContent = $('#message-input').val().trim();
        if (messageContent !== '') {
            $.ajax({
                url: 'send_message.php',
                type: 'POST',
                data: { message: messageContent }, // Send message content
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
                // Append fetched messages to the message box
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

    // Fetch messages when the page loads
    fetchMessages();

    // Periodically fetch messages to keep the chat updated
    setInterval(fetchMessages, 3000);
});
