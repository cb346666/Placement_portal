<?php
$servername = "localhost"; 
$username = "if0_35759338"; 
$password = "PN3BkmKJ5IO"; 
$dbname = "if0_35759338_user_authentication"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve company information
$sql = "SELECT * FROM companies";
$result = $conn->query($sql);
$companyInfo = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
</head>
<body>
    <div class="company-info">
        <h2>Company Information</h2>
        <?php
        if ($companyInfo) {
            echo "<p>Company Name: " . $companyInfo['company_name'] . "</p>";
            echo "<a href='" . $companyInfo['pdf_file'] . "' target='_blank'>Download PDF</a>";
        } else {
            echo "<p>No company information available</p>";
        }
        ?>
    </div>

    <div class="user-form">
        <h2>Interested Users Form</h2>
        <form action="handle_form.php" method="post">
            <label for="userName">Name:</label>
            <input type="text" name="userName" required><br><br>
            <label for="userEmail">Email:</label>
            <input type="email" name="userEmail" required><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>









<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    
        <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    h2 {
        color: #333;
    }

    h3 {
        margin-top: 30px;
        color: #555;
    }

    p {
        color: #777;
    }

    a {
        color: #f44336;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
    
</head>
<body>
    <h2>Welcome, Student!</h2>

    <h3>Available Job Listings</h3>
   

    <h3>Your Applications</h3>
    <!-- Display information about the student's applications -->

   <!--  <p><a href="logout.php">Logout</a></p>
</body>
</html> -->
