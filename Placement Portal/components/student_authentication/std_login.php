<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
include "db.php";
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// Login successful, redirect to dashboard or another page
echo "Login successfull!";
$_SESSION['username'] = $username;
header("location: index.php");
} else {
echo "<center>
    <h1>Invalid username or password</h1>
</center>";
}
// Close connection
$conn->close();
}
?>