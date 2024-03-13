<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Posts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="./manage_posts/form.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">


    <style>
        body {
            background-color: #f8f9fc;
        }

        .add-post-button {
            margin-bottom: 10px;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            /* float: right; */
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

        .container {
            /* padding-top: 20px; */
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
        }

        .table th,
        .table td {
            border-top: none;
            border-bottom: 1px solid #dee2e6;
        }

        .table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <?php
    // Start the session (if not already started)
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect the user to the login page if not logged in
        header("Location: index.php");
        exit(); // Stop further execution of the script
    }

    // Retrieve user data from the session
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['role']; // Assuming you store the user's role in the session
    
    // Example usage:
    if ($user_role === "super_admin") {
        // Include files specific to super admins
        include('includes/header.php');
        include('includes/navbar.php');
    } elseif ($user_role === "staff") {
        // Include files specific to staff
        include('includes1/header.php');
        include('includes1/navbar.php');
    }
    ?>

    <div id="addPostPopup" class="popup">
        <form id="postForm" enctype="multipart/form-data" style="padding: 20px;">
            <label for="company_name">Company Name</label>
            <input type="text" id="company_name" name="company_name" required>
            <label for="job_title">Job Title</label>
            <input type="text" id="job_title" name="job_title" required>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="6" required></textarea>
            <label for="file_upload">Document</label>
            <input type="file" id="file_upload" name="file_upload" required>
            <button type="button" onclick="submitForm()" class="btn btn-primary">Submit</button>
            <button type="button" onclick="hideAddPostPopup()" class="btn btn-secondary">Cancel</button>
        </form>
    </div>

    <!-- Popup for displaying success message -->
    <div id="successPopup" class="popup">
        <p>Job posted successfully!</p>
        <button onclick="hideSuccessPopup()" class="btn btn-primary">Close</button>
    </div>

    <div class="container mt-4">
        <h1 class="h3 mb-4 text-gray-800">Manage Posts</h1>
        <button type="button" onclick="showAddPostPopup()" class="add-post-button">Add Post</button>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Job Title</th>
                        <th>Description</th>
                        <th>File Upload</th>
                        <th>Create Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Job descriptions will be populated here -->
                    <?php
                    // Include the database connection file
                    include "db-connect.php";

                    // SQL query to select job descriptions
                    $sql = "SELECT * FROM job_news";
                    $result = mysqli_query($conn, $sql);

                    // Check if there are any job descriptions
                    if (mysqli_num_rows($result) > 0) {
                        // Output job descriptions in a table body
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['company_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['job_title']; ?>
                                </td>
                                <td>
                                    <?php echo $row['description']; ?>
                                </td>
                                <td>
                                    <?php echo $row['file_upload']; ?>
                                </td>
                                <td>
                                    <?php echo $row['created_at']; ?>
                                </td>
                                <td>
                                    <a href='./manage_posts/view.php?id=<?php echo $row['id']; ?>'
                                        class='btn btn-info btn-sm'>View</a>
                                    <a href='./manage_posts/edit.php?id=<?php echo $row['id']; ?>'
                                        class='btn btn-primary btn-sm'>Edit</a>
                                    <a href='./manage_posts/del.php?id=<?php echo $row['id']; ?>'
                                        onclick='return confirm("Are you sure you want to delete this item?")'
                                        class='btn btn-danger btn-sm'>Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        // No job descriptions found
                        echo "<tr><td colspan='7'>No job descriptions found.</td></tr>";
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
    <script src="./manage_posts/script.js"></script>
    <?php
    include('includes/scripts.php');
    ?>
</body>

</html>