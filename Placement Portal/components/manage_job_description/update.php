<?php
// Include database connection file
include 'db.php';

// Check if form is submitted and ID parameter is set
if(isset($_POST['id']) && isset($_POST['company_name']) && isset($_POST['job_title']) && isset($_POST['description']) && isset($_POST['file_upload'])) {
    // Sanitize input data to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $file_upload = mysqli_real_escape_string($conn, $_POST['file_upload']);

    // Update job description in the database
    $sql = "UPDATE job_news SET company_name='$company_name', job_title='$job_title', description='$description', file_upload='$file_upload' WHERE id=$id";

    if(mysqli_query($conn, $sql)) {
        // Redirect to manage job descriptions page on successful update
        header("Location: manage_job_description.php");
        exit();
    } else {
        // Display error message if update query fails
        echo "Error updating job description: " . mysqli_error($conn);
    }
} else {
    // If form is not submitted or ID parameter is not set, redirect to manage job descriptions page
    header("Location: manage_job_descriptions.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>