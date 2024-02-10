<?php
// interested_users.php - PHP code to handle interested users form
$servername = "localhost"; 
$username = "if0_35759338"; 
$password = "PN3BkmKJ5IO"; 
$dbname = "if0_35759338_user_authentication"; 
// Check if the form has been submitted
$conn = new mysqli($servername, $username, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission
    
    // Extract form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    // Assuming you have a database connection already established
    // Replace 'your_database_host', 'your_database_name', 'your_database_user', and 'your_database_password' with your actual database credentials
    // $conn = mysqli_connect('your_database_host', 'your_database_user', 'your_database_password', 'your_database_name');
   
    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Example SQL query to insert interested users into an 'interested_users' table
    $sql = "INSERT INTO interested_users (name, email) VALUES ('$name', '$email')";
    
    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        echo "Thank you for your interest!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
<!-- HTML form for interested users -->
<form action="" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <input type="submit" value="Submit">
</form>