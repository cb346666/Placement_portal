<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "db.php";
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