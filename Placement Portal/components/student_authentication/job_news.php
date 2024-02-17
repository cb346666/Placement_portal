<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="job_news.css"> -->
    <title>Document</title>
    <style>
    /* CSS for Job News Items */
    /* .h2 {
        align-items: center;
    } */
    .col-md-5 {
        /* padding: 0vmin 0vmin; */
        padding-left: 0px;
        padding-right: 0px;

    }

    div.row .col-md-7 {
        padding: 22vmin 1vmin;
        padding-bottom: 35vmin;
        font-family: var(--Rubik);
        color: white;
    }

    .row .col-md-5 img {
        width: 90%;
    }

    .job-news-item {
        background-color: white;
        opacity: 10;
        /* opacity: inherit; */
        border: 1px solid #ddd;
        margin-bottom: 20px;
        padding: 20px;
    }

    .job-news-item h4 {
        margin-top: 0;
        color: #333;
    }

    .job-news-item h5 {
        margin-top: 5px;
        color: #666;

    }

    .job-news-item p {
        margin-top: 10px;
        color: #444;
        text-align: left;
    }

    .job-news-item span {
        display: block;
        margin-top: 10px;
        color: #777;

    }

    /* Hover Effect */
    .job-news-item:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }

    .job-news-item a {
        display: inline-block;
        padding: 10px 20px;
        /* background-color: blue; */
        /* background-attachment: inherit; */
        color: #007bff;
        /* White text */
        text-decoration: none;
        border-radius: 5px;
        text-shadow: #333;
        /* transition: background-color 0.3s ease; */
    }

    /* .job-news-item:hover a{
} */


    .button-container a {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 5px;
        background-color: #007bff;
        /* Blue color */
        color: black;
        /* White text */
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .button:hover {
        background-color: red;
        /* Darker shade of blue on hover */
    }
    </style>


</head>

<body>
    <div class="col-md-5 col-sm-12 h-25">
        <!-- <img src="../assests/img/passport js.png" alt="Placement" /> -->
        <!-- <section class="job_news"> -->
        <div class="container">
            <h2>Latest Job News</h2>
            <?php
                            //
                            // <!-- // Include your database connection file/ -->
                            // <!-- include 'db_connection.php'; -->
                            include "db.php";
                            // <!-- // Retrieve job news from the database -->
                            $sql =
                            "SELECT * FROM job_news ORDER BY created_at DESC LIMIT 1";
                            // <!-- // Change the query as needed -->
                            $result = mysqli_query($conn, $sql);

                            // <!-- // Check if there are any job news -->
                            if ($result->num_rows > 0) {
                            // <!-- // Output job news -->
                            while ($row = $result->fetch_assoc()) {
                            echo "<div class='job-news-item'>";
                                echo "<h4>" . $row['company_name'] . "</h4>";
                                echo "<h5>" . $row['job_title'] . "</h5>";
                                echo "<p>" . $row['description'] . "</p><br>";
                                // echo "<span>". $row['file_upload']."</span> <br>";
                                 // Display the file upload link
                            //    $file_path = $row['file_upload']; // Assuming 'file_upload' contains the file path    
                            //    echo "<td><a href='../form/uploads/" . $row["file_upload"] . "' target='_blank'>View CV</a></td>";
                            
                            $file_path = "../post_job_news/uploads/" . $row['file_upload']; // Assuming 'file_upload' contains the file path
                            echo "<a href='$file_path' target='_blank'>View PDF</a><br>";
                                
                                echo "<div class='button-container'>";
                                // echo "<span><a href='$file_path' target='_blank'>".$row['file_upload'] ."</a></span><br>";
                                echo "<a href='../form/index.html' class='button'>Apply Here</a>";
                                    echo "</div>";

                                    }
                                    } else {
                                    echo "<p>No job news available.</p>";
                                    }

                                    // <!-- // Close the database connection -->
                                    mysqli_close($conn);
                                    ?>

        </div>

</body>

</html>