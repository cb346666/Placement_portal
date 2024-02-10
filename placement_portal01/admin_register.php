<?php
$servername = "localhost"; 
$username = "if0_35759338"; 
$password = "PN3BkmKJ5IO"; 
$dbname = "if0_35759338_user_authentication";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO admin (adminname, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "admin registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
