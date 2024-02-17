<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="../Header/main.css">
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>
    <?php include("../Header/sidebar.php"); ?>
    <?php include("../Header/header.php"); ?>

    <h2>User Information</h2>

    <table>
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
        <?php
        // Establish database connection
        // $servername = "localhost";
        // $username = "your_username";
        // $password = "your_password";
        // $dbname = "your_database_name";
        
        // $conn = new mysqli($servername, $username, $password, $dbname);
        include 'db.php';

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
                echo "<td><a href='../form/uploads/" . $row["cv"] . "' target='_blank'>View CV</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No user data available</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="../Header/script.js"></script>


</body>


</html>