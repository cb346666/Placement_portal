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

// Now you can use $user_role to determine the user's role and apply role-based access control

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


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->

    <!-- Content Row -->
    <div class="row">
        <!-- <?php include('security.php'); ?> -->
        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a
                                    href="admin_profile.php">Total Registered
                                Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php

                                $query = "SELECT user_id FROM staff_super_admins ORDER BY user_id";
                                $query_run = mysqli_query($connection, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<h4> Total Admin: ' . $row . '</h4>';
                                ?>

                            </div>
</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a
                                    href="student_profile.php"> Total Registered
                                    Students
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php

                                $query = "SELECT id FROM users ORDER BY id";
                                $query_run = mysqli_query($connection, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<h4> Total Students: ' . $row . '</h4>';
                                ?>
                            </div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a
                                    href="manage_posts.php">Total Posts</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php

                                        $query = "SELECT id FROM job_news ORDER BY id";
                                        $query_run = mysqli_query($connection, $query);
                                        $row = mysqli_num_rows($query_run);
                                        echo '<h4> Total Posts: ' . $row . '</h4>';
                                        ?>
                                    </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><a
                                    href="interested_user.php">Interested Students
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php

                                $query = "SELECT id FROM user_info ORDER BY id";
                                $query_run = mysqli_query($connection, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<h4> Total: ' . $row . '</h4>';
                                ?>
                            </div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <?php
    include('includes/scripts.php');
    ?>