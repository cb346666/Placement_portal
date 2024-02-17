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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job Description</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Edit Job Description</h1>
        <!-- Form for editing job description -->
        <form action="update.php?id=<?php echo $row['id']; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="company_name"
                value="<?php echo $row['company_name']; ?>"><br><br>
            <label for="job_title">Job Title:</label>
            <input type="text" id="job_title" name="job_title" value="<?php echo $row['job_title']; ?>"><br><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description"><?php echo $row['description']; ?></textarea><br><br>
            <label for="file_upload">File Upload:</label>
            <input type="text" id="file_upload" name="file_upload" value="<?php echo $row['file_upload']; ?>"><br><br>
            <input type="submit" value="Update" class="button">
        </form>
    </div>
</body>

</html>
<?php
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