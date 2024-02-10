<?php
$servername = "localhost"; 
$username = "if0_35759338"; 
$password = "PN3BkmKJ5IO"; 
$dbname = "if0_35759338_user_authentication"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyName = $_POST['companyName'];

    // Handle PDF file upload
    $targetDirectory = "uploads/"; // Specify your upload directory
    $targetFile = $targetDirectory . basename($_FILES["pdfFile"]["name"]);

    if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
        $sql = "INSERT INTO companies (company_name, pdf_file) VALUES ('$companyName', '$targetFile')";

        if ($conn->query($sql) === TRUE) {
            echo "Company information posted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading file";
    }
}

$conn->close();
?>
