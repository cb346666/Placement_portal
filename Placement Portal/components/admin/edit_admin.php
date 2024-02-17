<?php
include_once("db-connect.php");

if (isset($_POST['edit_id'])) {
    $edit_id = $_POST['edit_id'];

    // Fetch the admin data to be edited
    $query = "SELECT * FROM staff_super_admins WHERE user_id = $edit_id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $email = $row['email'];
        $role = $row['role'];
        $password = $row['password']; // Fetch the password
        $profile_name = $row['profile_name'];

        // Prepare form data
        $formData = array(
            'edit_id' => $edit_id,
            'username' => $username,
            'email' => $email,
            'role' => $role,
            'password' => $password,// Include the password in the form data
            'profile_name' => $profile_name
        );

        // Return form data as JSON
        echo json_encode($formData);
    } else {
        echo "Admin not found!";
    }
} else {
    echo "Invalid request!";
}
?>