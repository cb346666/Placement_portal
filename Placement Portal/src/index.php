<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Placement Portal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
        integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">

    <link rel="stylesheet" href="../assests/css/style.css" />
    <link rel="stylesheet" href="../assests/css/mobile-style.css" />
    <link rel="stylesheet" href="job_news.css" />
</head>

<body>
    <header>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-book-reader fa-2x mx-2"></i> Placement
                    Portal</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <i class="fas fa-align-right text-light"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Login
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item"
                                    href="../src/components/student_authentication/std_authentication.php">Student
                                    Login</a>
                                <a class="dropdown-item"
                                    href="../src/components/admin_authentication/admin_authentication.php">Faculty
                                    Login</a>
                                <!-- <a class="dropdown-item" href="../src/components/admin">Faculty
                                    Login</a> -->
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="footer">About</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="container text-center" style="justify-content: center">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <h1>Welcome.</h1>
                    <h3>To College Placement Portal</h3>
                    <p>Explore job opportunities and connect with
                        employers.</p>
                    <a href="../src/components/student_authentication/std_authentication.php" class="btn"><button>
                            Explore Job Listings </button></a>
                </div>
                <div class="col-md-5 col-sm-12 h-25">
                    <!-- <img src="../assests/img/passport js.png" alt="Placement" /> -->
                    <!-- <section class="job_news"> -->
                    <div class="container">
                        <h2>Latest Job News</h2>
                        <?php
                            //
                            // <!-- // Include your database connection file/ -->
                            // <!-- include 'db_connection.php'; -->
                            $servername = "localhost";
                            $username = "if0_35759338";
                            $password = "PN3BkmKJ5IO";
                            $dbname = "if0_35759338_user_authentication";

                            // <!-- // Create connection -->
                            $conn = new mysqli($servername, $username,
                            $password, $dbname);

                            // <!-- // Retrieve job news from the database -->
                            $sql =
                            "SELECT * FROM job_news ORDER BY created_at DESC LIMIT 1";
                            // <!-- // Change the query as needed -->
                            $result = mysqli_query($conn, $sql);

                            // <!-- // Check if there are any job news -->
                            if (mysqli_num_rows($result) > 0) {
                            // <!-- // Output job news -->
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='job-news-item'>";
                                echo "<h4>" . $row['company_name'] . "</h4>";
                                echo "<h5>" . $row['job_title'] . "</h5>";
                                echo "<p>" . $row['description'] . "</p><br>";
                                // echo "<span>". $row['file_upload']."</span> <br>";
                                 // Display the file upload link
                               $file_path = $row['file_upload']; // Assuming 'file_upload' contains the file path
                               echo "<a href='$file_path' target='_blank'>".$row['file_upload'] ."</a><br>";
                                
                                echo "<div class='button-container'>";
                                // echo "<span><a href='$file_path' target='_blank'>".$row['file_upload'] ."</a></span><br>";
                                echo "<a href='./components/student_authentication/std_authentication.php' class='button'>Apply Here</a>";
                                    echo "</div>";

                                    }
                                    } else {
                                    echo "<p>No job news available.</p>";
                                    }

                                    // <!-- // Close the database connection -->
                                    mysqli_close($conn);
                                    ?>
                    </div>
                    <!-- </section> -->
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="section-1">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="pray">
                            <img src="../assests/img/place.png" alt />

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel">
                            <h1>Placement Portal</h1>
                            <p class="pt-4">
                                Lorem ipsum dolor sit amet
                                consectetur
                                adipisicing elit.
                                Suscipit, laboriosam iusto. Facilis
                                accusamus, et ea explicabo
                                dolor blanditiis eveniet temporibus
                                accusantium reiciendis
                                ducimus, maiores qui.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer style="background-color: #24262b">
        <div class="container-fluid p-3">
            <div class="row text-left">
                <div class="col-md-5 col-md-5">
                    <h4 class="text-light">About Us</h4>
                    <p class="text-muted">
                        Phone : 9874342621 <br />
                        Email : xyz@gmail.com <br />
                        Write a Review
                    </p>
                    <p class="pt-4 text-muted">
                        Copyright @2019 All Right reserved | This
                        template
                        is created by.
                    </p>
                    <span>Brijesh Chauhan.</span>
                </div>
                <div class="col-md-5">
                    <h4 class="text-light">Newsletter</h4>
                    <p class="text-muted">Stay Updated</p>
                    <form action class="form-inline">
                        <div class="col pl-">
                            <div class="input-group pr-5">
                                <input type="text" class="form-control bg-dark text-white" placeholder="Email" />
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 col-sm-12">
                    <h4 class="text-light">Follow Us</h4>
                    <p class="text-muted">Let us be social</p>
                    <div class="column">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row text-center">
                jdsjhb
            </div> -->
    </footer>

    <!-- <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <h4>company</h4>
                        <ul>
                            <li><a href="#">about us</a></li>
                            <li><a href="#">our services</a></li>
                            <li><a href="#">privacy policy</a></li>
                            <li><a href="#">affiliate program</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>get help</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">shipping</a></li>
                            <li><a href="#">returns</a></li>
                            <li><a href="#">order status</a></li>
                            <li><a href="#">payment options</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>online shop</h4>
                        <ul>
                            <li><a href="#">watch</a></li>
                            <li><a href="#">bag</a></li>
                            <li><a href="#">shoes</a></li>
                            <li><a href="#">dress</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>follow us</h4>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
       </footer> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
    $(document).ready(function() {
        // Initial state
        var scrollPos = 0;
        var navbar = $(".navbar");

        // Show/hide the navbar on scroll
        $(document).scroll(function() {
            var currentScrollPos = $(this).scrollTop();
            if (currentScrollPos > scrollPos) {
                navbar.addClass("fixed-navbar");
            } else {
                navbar.removeClass("fixed-navbar");
            }
            scrollPos = currentScrollPos;
        });

        // Additional animations can be added here


        // $(document).ready(function () {
        //     var scrollPos = 0;
        //     var navbar = $(".navbar");
        //     var header = $("header");

        //     $(document).scroll(function () {
        //         var currentScrollPos = $(this).scrollTop();

        //         // Show/hide the navbar on scroll
        //         if (currentScrollPos > scrollPos) {
        //             navbar.addClass("fixed-navbar");
        //         } else {
        //             navbar.removeClass("fixed-navbar");
        //         }

        //         // Additional animations for header
        //         if (currentScrollPos > 50) {
        //             header.addClass("scrolled");
        //         } else {
        //             header.removeClass("scrolled");
        //         }

        //         scrollPos = currentScrollPos;
        //     });
        // });


    });
    </script>
</body>

</html>