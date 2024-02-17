<?php
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

require __DIR__ . '/vendor/autoload.php';

class Chat implements MessageComponentInterface {
    public function onOpen(ConnectionInterface $conn) {
        // Handle new connections
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // Broadcast message to all connected clients
        foreach ($this->clients as $client) {
            if ($client !== $from) {
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // Handle connection close
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        // Handle errors
    }
}

// Run the server
$server = new \Ratchet\WebSocket\WsServer(new Chat());
$loop = \React\EventLoop\Factory::create();
$socket = new \React\Socket\Server('0.0.0.0:9000', $loop);
$server = new \Ratchet\Server\IoServer($server, $socket, $loop);
$loop->run();