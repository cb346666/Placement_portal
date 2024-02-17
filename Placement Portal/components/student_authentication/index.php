<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="main.css">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

</head>

<body>
    <div class="main">
        <div class="navbar-side">
            <h6>
                <span class="icon"><i class="fas fa-user   "></i></span>
                <span class="link-text"> User Panel</span>
            </h6>
            <ul>
                <li><a href="#" class="link-active" title="Dashboard">
                        <span class="icon"><i class="fas fa-chart-bar"></i></span>
                        <span class="link-text">Dashboard</span>
                    </a></li>
                <li>
                    <a href="../track_application/index.php" class="myBtn" data-target="post_job_news" title="Post"
                        aria-expanded="false">
                        <!-- <a href="post_job_news.php" title="Category"></a> -->
                        <span class="icon"><i class="fas fa-search"></i></span>
                        <span class="link-text">Track Application</span>
                        <!-- <span class="ml-auto myCaret"></span> -->
                    </a>
                    <!-- <div id="my-sub" class="collapse bg-secondary">
            <a href="#" title="All Post">
              <span class="icon"><i class="fas fa-copy"></i></span>
              <span class="link-text">All Post</span>
            </a>
            <a href="#" title="Add Post">
              <span class="icon"><i class="fas fa-pen-fancy"></i></span>
              <span class="link-text">Add Post</span>
            </a>
          </div> -->
                    <!-- </li>
                <li><a href="#" title="Category">
                        <span class="icon"><i class="fas fa-bell"></i></span>
                        <span class="link-text">Notifications</span>
                    </a></li> -->
                <li><a href="../chat_project1/chatpage.php" title="Comment">
                        <span class="icon"><i class="fas fa-list-alt"></i></span>
                        <span class="link-text">Message</span>
                    </a></li>
                <li><a href="../calendar1/index.php" title="Calendar">
                        <span class="icon"><i class="fas fa-calendar"></i></span>
                        <span class="link-text">Calendar</span>
                    </a></li>
                <!-- <li><a href="#" title="Tags">
              <span class="icon"><i class="fas fa-tags"></i></span>
              <span class="link-text">Tags</span>
            </a></li> -->
                <li><a href="../profile/index.php" title="Profile">
                        <span class="icon"><i class="fas fa-user-circle"></i></span>
                        <span class="link-text">Profile</span>
                    </a></li>
                <!-- <li><a href="#" title="Setting">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="link-text">Setting</span>
                    </a></li> -->
                <li><a href="std_authentication.php" title="Sign Out">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="link-text">Sign Out</span>
                    </a></li>
            </ul>
        </div>
        <div class="content">
            <nav class="navbar navbar-dark bg-dark py-1">

                <a href="#" id="navBtn">
                    <span id="changeIcon" class="fa fa-bars text-light"></span>
                </a>

                <div class="d-flex">
                    <a class="nav-link text-light px-2" href="#"><i class="fas fa-search"></i></a>
                    <a class="nav-link text-light px-2" href="#"><i class="fas fa-bell"></i></a>
                    <a class="nav-link text-light px-2" href="login.php"><i class="fas fa-sign-out-alt"></i></a>
                </div>

            </nav>
            <div class="container-fluid">
                <?php include 'job_news.php'; ?>


            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>