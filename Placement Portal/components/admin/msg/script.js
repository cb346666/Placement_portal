$(document).ready(function() {
    // Function to send a message
    function sendMessage() {
        var messageContent = $('#message-input').val().trim();
        if (messageContent !== '') {
            $.ajax({
                url: './msg/send_message.php',
                type: 'POST',
                data: {
                    message: messageContent
                },
                success: function(response) {
                    console.log('Message sent successfully:', response);
                    $('#message-input').val('');
                    alert('Message sent successfully!');
                },
                error: function(xhr, status, error) {
                    console.error('Error sending message:', error);
                    alert('Error sending message. Please try again later.');
                }
            });
        } else {
            alert('Message content cannot be empty.');
        }
    }

    // Function to fetch messages
    function fetchMessages() {
        $.ajax({
            url: './msg/fetch_messages.php',
            type: 'GET',
            success: function(response) {
                console.log('Messages fetched successfully:', response);
                // Append fetched messages to the message box
                $('#chat-messages').html(response);
                // Clear any previous error message
                $('#error-message').hide();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching messages:', error);
                // Display error message
                $('#error-message').show();
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
