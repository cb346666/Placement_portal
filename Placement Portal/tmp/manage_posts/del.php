<?php
// Include database connection file
include 'db.php';

// Check if ID parameter is set
if(isset($_GET['id'])) {
    // Sanitize ID input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Prepare and execute SQL query to delete job description based on ID
    $sql = "DELETE FROM job_news WHERE id = $id";

    if(mysqli_query($conn, $sql)) {
        // Redirect to manage job descriptions page on successful delete
        header("Location: manage_job_description.php");
        exit();
    } else {
        // Display error message if delete query fails
        echo "Error deleting job description: " . mysqli_error($conn);
    }
} else {
    // If ID parameter is not set, redirect to manage job descriptions page
    header("Location: manage_job_description.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>