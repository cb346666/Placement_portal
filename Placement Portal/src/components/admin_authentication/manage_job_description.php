<?php
// PHP code here

// CSS styles embedded directly
echo "
<style>
#jobDescriptionsTable {
    width: 100%;
    border-collapse: collapse;
}

#jobDescriptionsTable th,
#jobDescriptionsTable td {
    border: 1px solid #ddd;
    padding: 8px;
}

#jobDescriptionsTable th {
    background-color: #f2f2f2;
}

#jobDescriptionsTable tr:hover {
    background-color: #f2f2f2;
}

#jobDescriptionsTable td[contenteditable='true']:focus {
    outline: 1px solid blue;
}
</style>
";

// Output job descriptions table
echo "<table id='jobDescriptionsTable'>";
    // Rest of your PHP code here
// manage_job_descriptions.php - PHP code to handle managing job descriptions
$servername = "localhost"; 
$username = "if0_35759338"; 
$password = "PN3BkmKJ5IO"; 
$dbname = "if0_35759338_user_authentication"; 

// Assuming you have a database connection already established
// Replace 'your_database_host', 'your_database_name', 'your_database_user', and 'your_database_password' with your actual database credentials
// $conn = mysqli_connect('your_database_host', 'your_database_user', 'your_database_password', 'your_database_name');
$conn = new mysqli($servername, $username, $password, $dbname);
// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Example SQL query to select job descriptions from a 'job_descriptions' table
$sql = "SELECT * FROM job_news";
$result = mysqli_query($conn, $sql);

// Check if there are any job descriptions
if (mysqli_num_rows($result) > 0) {
    // Output job descriptions in a table
    echo "<table id='jobDescriptionsTable'>";
    echo "<tr><th>ID</th><th>Company Name</th><th>Job Title</th><th>Description</th><th>File Upload</th><th>Create Time</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td contenteditable='true'>" . $row['id'] . "</td>";
        echo "<td contenteditable='true'>" . $row['company_name'] . "</td>";
        echo "<td contenteditable='true'>" . $row['job_title'] . "</td>";
        echo "<td contenteditable='true'>" . $row['description'] . "</td>";
        echo "<td contenteditable='true'>" . $row['file_upload'] . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No job descriptions found.";
}

// Close the database connection
mysqli_close($conn);
?>