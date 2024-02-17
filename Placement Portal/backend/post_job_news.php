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
    $targetDir = "uploads/";
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
}
?>



<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    width: 90%;
    max-width: 500px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
input[type="file"],
textarea {
    width: calc(100% - 12px);
    padding: 6px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

textarea {
    height: 100px;
}

input[type="button"] {
    width: 100%;
    padding: 8px 0;
    border: none;
    border-radius: 4px;
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="button"]:hover {
    background-color: #2980b9;
}

#popup {
    display: none;
    position: fixed;
    top: 0%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

#popup p {
    margin-bottom: 10px;
}

#popup button {
    padding: 8px 20px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#popup button:hover {
    background-color: #2980b9;
}
</style>
</head>

<body>
    <form action="post_job_news.php" method="post">
        <label for="company_name">Company Name:</label>
        <input type="text" id="company_name" name="company_name" required>
        <label for="job_title">Job Title:</label>
        <input type="text" id="job_title" name="job_title" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="6" required></textarea>
        <label for="file_upload">Document:</label>
        <input type="file" name="file_upload" id="file_upload" required>
        <input type="submit" value="Submit">
    </form>

    <!-- Popup message -->
    <div id="popup" style="display: <?php echo $posted_successfully ? 'block' : 'none'; ?>">
        <p>Job news posted successfully!</p>
        <button onclick="hidePopup()">Close</button>
    </div>

    <script>
    // Function to hide the popup
    function hidePopup() {
        document.getElementById("popup").style.display = "none";
    }
    </script>
</body>

</html>