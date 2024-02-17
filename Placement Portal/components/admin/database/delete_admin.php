<?php
include_once("db-connect.php");

// Check if the delete button is clicked
if (isset($_POST['delete_btn'])) {
    // Check if the delete_id is set
    if (isset($_POST['delete_id'])) {
        // Get the ID of the record to be deleted
        $delete_id = $_POST['delete_id'];

        // Prepare and execute the SQL query to delete the record
        $query = "DELETE FROM staff_super_admins WHERE user_id = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $delete_id);

            if (mysqli_stmt_execute($stmt)) {
                // Record deleted successfully
                echo "<script>alert('Record deleted successfully!');</script>";
                // Redirect or reload the page as needed
                header("Location: ../admin_profile.php");
                exit();
            } else {
                // Failed to delete record
                echo "<script>alert('Failed to delete record. Please try again.');</script>";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            // Error in preparing the statement
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // delete_id is not set
        echo "<script>alert('Delete ID is not set.');</script>";
    }
}
?>