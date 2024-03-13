<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Job Description</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>View Job Description</h1>
        <!-- Display job description details here -->
        <?php
// PHP code to retrieve job description details from the database based on the ID parameter

// Check if the ID parameter is set in the URL
if(isset($_GET['id'])) {
    // Include database connection file
    include 'db.php';

    // Prepare and execute SQL query to fetch job description details based on ID
    $id = $_GET['id'];
    $sql = "SELECT * FROM job_news WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful and if a row was returned
    if(mysqli_num_rows($result) > 0) {
        // Fetch the row as an associative array
        $row = mysqli_fetch_assoc($result);

        // Display job description details
        echo "<div>";
        echo "<p><strong>ID:</strong> " . $row['id'] . "</p>";
        echo "<p><strong>Company Name:</strong> " . $row['company_name'] . "</p>";
        echo "<p><strong>Job Title:</strong> " . $row['job_title'] . "</p>";
        echo "<p><strong>Description:</strong> " . $row['description'] . "</p>";
        echo "<p><strong>File Upload:</strong> <a href='../post_job_news/uploads/" . $row['file_upload'] . "' target='_blank'>View PDF</a></p>";
        echo "<p><strong>Create Time:</strong> " . $row['created_at'] . "</p>";

        // echo "<p><a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this job description?\")'>Delete</a></p>";
        echo "</div>";
    } else {
        // If no matching job description found, display an error message
        echo "No job description found with ID: " . $id;
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If the ID parameter is not set, display an error message
    echo "Invalid request. Please provide a valid ID parameter.";
}
?>

    </div>
</body>

</html>