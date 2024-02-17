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
// Check if the connection is successful
include "db.php";

// Example SQL query to select job descriptions from a 'job_descriptions' table
$sql = "SELECT * FROM job_news";
$result = mysqli_query($conn, $sql);

// Check if there are any job descriptions
if (mysqli_num_rows($result) > 0) {
    // Output job descriptions in a table header
    echo "<tr><th>ID</th><th>Company Name</th><th>Job Title</th><th>Description</th><th>File Upload</th><th>Create Time</th><th>Actions</th></tr>";
    
    // Output job descriptions in a table body
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td contenteditable='true'>" . $row['id'] . "</td>";
        echo "<td contenteditable='true'>" . $row['company_name'] . "</td>";
        echo "<td contenteditable='true'>" . $row['job_title'] . "</td>";
        echo "<td contenteditable='true'>" . $row['description'] . "</td>";
        echo "<td contenteditable='true'>" . $row['file_upload'] . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        // Add action buttons for view, edit, and delete
        echo "<td>";
        echo "<a href='view.php?id=" . $row['id'] . "'>View</a> | ";
        echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a> | ";
        echo "<a href='del.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this item?\")'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No job descriptions found.";
}

// Close the database connection
mysqli_close($conn);
?>