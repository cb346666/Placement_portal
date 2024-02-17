<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="./css/bootstrap.min.css">


    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <style>
    body {
        background-color: #f8f9fc;
    }

    .container {
        padding-top: 20px;
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

    .btn-view-cv {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .btn-view-cv:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <?php
    include('includes/header.php');
    include('includes/navbar.php');
    ?>
    <div class="container">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Applications</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>UID</th>
                                <th>Department</th>
                                <th>Course</th>
                                <th>Semester</th>
                                <th>Phone</th>
                                <th>CV</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Establish database connection
                            // $servername = "localhost";
                            // $username = "your_username";
                            // $password = "your_password";
                            // $dbname = "your_database_name";
                            
                            // $conn = new mysqli($servername, $username, $password, $dbname);
                            include 'db-connect.php';

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Fetch user data from the database
                            $sql = "SELECT * FROM user_info";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["uid"] . "</td>";
                                    echo "<td>" . $row["department"] . "</td>";
                                    echo "<td>" . $row["course"] . "</td>";
                                    echo "<td>" . $row["semester"] . "</td>";
                                    echo "<td>" . $row["phone"] . "</td>";
                                    echo "<td><a href='../form/uploads/" . $row["cv"] . "' target='_blank' class='btn btn-view-cv'>View CV</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>No user data available</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
    <!-- <script src="./js/script.js"></script> -->
    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>

</body>

</html>