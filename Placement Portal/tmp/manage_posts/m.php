<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./post_job_news/styles.css">
    <link rel="stylesheet" href="../Header/main.css">
    <style>
    .add-post-button {
        float: right;
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 8px 16px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .add-post-button:hover {
        background-color: #0056b3;
    }

    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border: 1px solid #007bff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        animation: popupFadeIn 0.5s ease-in-out forwards;
    }

    .popup p {
        margin-bottom: 10px;
        font-size: 18px;
        color: #333;
    }

    .popup button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    .popup button:hover {
        background-color: #0056b3;
    }

    @keyframes popupFadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
    </style>
</head>

<body>


    <div id="addPostPopup" class="popup">
        <form id="postForm" enctype="multipart/form-data">

            <label for="company_name">Company Name</label>
            <input type="text" id="company_name" name="company_name" required>
            <label for="job_title">Job Title</label>
            <input type="text" id="job_title" name="job_title" required>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="6" required></textarea>
            <label for="file_upload">Document</label>
            <input type="file" id="file_upload" name="file_upload">
            <button type="button" onclick="submitForm()">Submit</button>
            <button type="button" onclick="hideAddPostPopup()">Cancel</button>
        </form>
    </div>

    <!-- Popup for displaying success message -->
    <div id="successPopup" class="popup">
        <p>Job posted successfully!</p>
        <button onclick="hideSuccessPopup()">Close</button>
    </div>

    <div class="main">
        <div class="content">
            <button type="button" onclick="showAddPostPopup()" class="add-post-button">Add Post
            </button>
            <table id="jobDescriptionsTable">
                <thead>
                    <!-- <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Job Title</th>
                        <th>Description</th>
                        <th>File Upload</th>
                        <th>Create Time</th>
                        <th>Actions</th>
                    </tr>
                </thead> -->
                <tbody id="jobDescriptionsBody">

                    <!-- Job descriptions will be populated here -->
                    <?php
                    // PHP code to fetch job descriptions and generate HTML table
                    
                    // Include CSS styles directly
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

                </tbody>
            </table>
        </div>
    </div>
    <script>
    function submitForm() {
        var formData = new FormData(document.getElementById("postForm"));
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "process.php", true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Display popup if submission was successful
                document.getElementById("successPopup").style.display = "block";
            } else {
                // Handle errors if any
                alert("Error: " + xhr.responseText);
            }
        };
        xhr.onerror = function() {
            // Handle errors if any
            alert("Request failed.");
        };
        xhr.send(formData);
    }

    function hideSuccessPopup() {
        // Hide the success popup
        document.getElementById("successPopup").style.display = "none";
        // Reset the form
        document.getElementById("postForm").reset();
    }
    document.getElementById("navBtn").addEventListener("click", function() {
        document.querySelector(".content").classList.toggle("animate");
        document.querySelector(".navbar-side").classList.toggle("animate");
    });
    </script>
    <script src="script.js"></script>
</body>

</html>