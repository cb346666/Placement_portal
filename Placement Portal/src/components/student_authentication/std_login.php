<html>
<head>
<style> 
.h1 {
    
    display: inline-block;
    padding: 10px 20px;
    background: #f44336;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s ease;

}

</style>
<head>
<body>
<?php
$servername = "localhost"; 
$username = "if0_35759338"; 
$password = "PN3BkmKJ5IO"; 
$dbname = "if0_35759338_user_authentication"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); 
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful, redirect to dashboard or another page
        echo "Login successfull!";
        $_SESSION['username'] = $username;
        header("location: std_dashboard.php");
    } else {
        echo "<center><h1>Invalid username or password</h1></center>";
    }
    // Close connection
    $conn->close();
}
?>

</body>
</html>

