<?php
// post_job_news.php - PHP code to handle posting job news

// Initialize a variable to track the status of posting
$posted_successfully = false;

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission
    
    // Extract form data
    $company_name = $_POST['company_name'];
    $job_title = $_POST['job_title'];
    $description = $_POST['description'];
    
    // File upload handling
    if(isset($_FILES["file_upload"])) {
        $targetDir = "/uploads";
        $file_upload = basename($_FILES["file_upload"]["name"]);
        $targetFilePath = $targetDir . $file_upload;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Check if file is a PDF
        if ($fileType != "pdf") {
            echo "Sorry, only PDF files are allowed.";
        } else {
            // Upload file
            if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $targetFilePath)) {
    
                // Check if the connection is successful
                include "db.php";
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Example SQL query to insert job news into a 'job_news' table
                $sql = "INSERT INTO job_news(company_name, job_title, description, file_upload) VALUES ('$company_name', '$job_title', '$description', '$targetFilePath')";
                
                // Execute the SQL query
                if ($conn->query($sql) === TRUE) {
                    $posted_successfully = true;
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                
                // Close the database connection
                mysqli_close($conn);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "File upload field not found.";
    }
}
?>