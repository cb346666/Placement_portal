<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.3.2/socket.io.js"></script>
    <script>
    const socket = io('ws://localhost:9000');

    function sendMessage() {
        const message = document.getElementById('messageInput').value;
        socket.emit('userMessage', message);
    }

    socket.on('adminMessage', (message) => {
        console.log('Admin message:', message);
        // Handle incoming admin messages
    });
    </script>
    <link rel="stylesheet" href="main.css" />
</head>

<body>
    <!-- <h1>Welcome User</h1>
    <input type="text" id="messageInput">
    <button onclick="sendMessage()">Send Message</button> -->


    <div class="flex flex-col w-full h-screen min-h-screen">
        <div class="flex h-14 items-center px-4 border-b dark:border-gray-700 md:px-6"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="h-6 w-6 text-blue-500">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            </svg>
            <h1 class="ml-3 text-lg font-semibold">Messaging System</h1>
        </div>
        <div class="flex-1 flex flex-col md:flex-row">
            <div class="hidden w-60 border-r md:block">
                <div class="grid gap-px"><button
                        class="inline-flex items-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full justify-start text-left">
                        <div class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 rounded-full bg-gray-300">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg><span class="font-medium">User</span></div>
                    </button><button
                        class="inline-flex items-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full justify-start text-left">
                        <div class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 rounded-full bg-gray-300">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg><span class="font-medium">Admin</span></div>
                    </button></div>
            </div>
            <div class="flex-1 flex flex-col">
                <div class="flex-1 p-4 overflow-auto md:p-6">
                    <div class="space-y-4">
                        <div class="flex flex-col items-end space-y-1">
                            <div class="flex items-center space-x-2">
                                <div class="text-sm font-medium leading-none text-right">
                                    You
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    2 minutes ago
                                </div>
                            </div>
                            <div class="rounded-lg bg-blue-100 p-4 dark:bg-blue-900">
                                Hi, I have a question about my recent order.
                            </div>
                        </div>
                        <div class="flex flex-col items-start space-y-1">
                            <div class="flex items-center space-x-2">
                                <div class="text-sm font-medium leading-none">
                                    Admin
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    1 minute ago
                                </div>
                            </div>
                            <div class="rounded-lg bg-green-100 p-4 dark:bg-green-900">
                                Sure, how can I help you today?
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-t-2">
                    <div class="flex items-center h-14 px-4 md:px-6"><input
                            class="flex h-10 w-full rounded-md border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 flex-1 min-w-0 mr-2 border-0"
                            placeholder="Type a message"><button
                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 px-4 py-2 h-10">
                            Send
                        </button></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>