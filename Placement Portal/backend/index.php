<?php
// index.php

// Function to get connection to the database
function getConnection() {
$servername = "localhost"; 
$username = "if0_35759338"; 
$password = "PN3BkmKJ5IO"; 
$dbname = "if0_35759338_user_authentication"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    return $connection;
}

// Route to handle GET request to fetch all posts
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $connection = getConnection();

    $sql = "SELECT * FROM posts";
    $result = $connection->query($sql);

    $posts = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    }

    $connection->close();

    header('Content-Type: application/json');
    echo json_encode($posts);
}

// Route to handle POST request to create a new post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection = getConnection();

    $data = json_decode(file_get_contents('php://input'), true);
    $title = $data['title'];
    $content = $data['content'];

    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    if ($connection->query($sql) === TRUE) {
        $postId = $connection->insert_id;
        $newPost = ['id' => $postId, 'title' => $title, 'content' => $content];
        header('Content-Type: application/json');
        echo json_encode($newPost);
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}
?>