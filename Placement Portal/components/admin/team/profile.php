<?php
// Start session to access session variables
session_start();

// Check if the user is logged in and user ID is available in the session
if (isset($_SESSION['user_id'])) {
    // Include database connection file
    include 'db-connect.php';

    // Retrieve the user ID from session
    $id = $_SESSION['user_id'];

    // Prepare and execute SQL query to fetch user profile details based on user ID
    $sql = "SELECT * FROM staff_super_admins WHERE user_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameter and execute the statement
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Get result set
    $result = $stmt->get_result();

    // Check if the query was successful and if a row was returned
    if ($result->num_rows > 0) {
        // Fetch the row as an associative array
        $row = $result->fetch_assoc();
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin Profile</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: 1px solid #007bff;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        display: none;
        animation: popup 0.3s ease forwards;
    }

    @keyframes popup {
        0% {
            transform: translate(-50%, -70%);
            opacity: 0;
        }

        100% {
            transform: translate(-50%, -50%);
            opacity: 1;
        }
    }

    .popup-con {
        position: relative;
    }

    /* .close {
                                                                                                                                                position: absolute;
                                                                                                                                                top: 5px;
                                                                                                                                                right: 10px;
                                                                                                                                                cursor: pointer;
                                                                                                                                            } */

    form {
        max-width: 400px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: blue;
    }

    .close {
        background-color: #007bff;
        color: #fff;
        padding: 8.5px 20px 11px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-left: 10px;
    }

    .close:hover {
        background-color: blue;
    }

    /* .close-p {
                                                                                                float: right;
                                                                                            } */
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Admin Profile</h2>

        <?php
                if (isset($_SESSION['update_success']) && $_SESSION['update_success']) {
                    echo '<div class="popup" id="successPopup">
                    <div class="popup-con">
                        <span class="close" onclick="closeSuccessPopup()">&times;</span>
                        <p>Profile updated successfully!</p>
                    </div>
                </div>';
                    unset($_SESSION['update_success']);
                }
                ?>

        <div class="popup-content" id="edit-profile-popup">
            <div class="popup-content">

                <form action="./database/update.php?id=<?php echo $row['user_id']; ?>" method="POST"
                    id="editProfileForm">
                    <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username"
                        value="<?php echo isset($row['username']) ? $row['username'] : ''; ?>"><br><br>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email"
                        value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>"><br><br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password"
                        value="<?php echo isset($row['password']) ? $row['password'] : ''; ?>"><br><br>
                    <label for="role">Role:</label>
                    <select id="role" name="role">
                        <option value="staff" <?php if (isset($row['role']) && $row['role'] == 'staff')
                                    echo 'selected'; ?>>
                            Staff</option>
                        <option value="super_admin" <?php if (isset($row['role']) && $row['role'] == 'super_admin')
                                    echo 'selected'; ?>>
                            Super Admin</option>
                    </select><br><br>
                    <label for="profile_name">Profile Name:</label>
                    <input type="text" id="profile_name" name="profile_name"
                        value="<?php echo isset($row['profile_name']) ? $row['profile_name'] : ''; ?>"><br><br>
                    <!-- <button class="submit" type=" button" onclick="submitForm()">Update</button> -->
                    <input type="submit" value="Update" class="button" onclick="submitForm()">
                    <span id="close-p" class="close" onclick="goBack()">Close</span>

                </form>


            </div>
        </div>
    </div>

    <script>
    function submitForm() {
        var form = document.getElementById("editProfileForm");

        // Check if the form is valid
        if (form.checkValidity()) {
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "./database/update.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Display alert upon successful submission
                    alert("Profile updated successfully!");
                    // Redirect to profile.php after showing the alert
                    window.location.href = "./profile.php";
                } else {
                    // Display alert for any errors
                    alert("Error: " + xhr.responseText);
                }
            };
            xhr.onerror = function() {
                // Handle errors if any
                alert("Request failed.");
            };
            xhr.send(formData);
        } else {
            // If form is not valid, display an error message
            alert("Please fill in all required fields.");
        }
    }

    function goBack() {
        if (window.history.length > 1) {
            window.history.back();
        } else {
            // If history stack is empty, handle it gracefully
            alert("No previous page in history.");
        }
    }
    </script>
</body>

</html>
<?php
    } else {
        echo "No user profile found with ID: " . $id;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: login.php");
    exit();
}
?>