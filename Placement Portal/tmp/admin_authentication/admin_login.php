<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "db.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE adminname = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful, redirect to dashboard or another page
        echo "Login successfull!";
        $_SESSION['adminname'] = $username;
        header("location: index.php");
    } else {
        echo "Invalid username or password";
    }
    // Close connection
    $conn->close();
}
?>