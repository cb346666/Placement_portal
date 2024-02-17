<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.3.2/socket.io.js"></script>
    <script>
    const socket = io('ws://localhost:9000');

    function sendMessage() {
        const message = document.getElementById('messageInput').value;
        socket.emit('adminMessage', message);
    }

    socket.on('userMessage', (message) => {
        console.log('User message:', message);
        // Handle incoming user messages
    });
    </script>
</head>

<body>
    <h1>Welcome Admin</h1>
    <input type="text" id="messageInput">
    <button onclick="sendMessage()">Send Message</button>
</body>

</html>