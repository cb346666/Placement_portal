<?php

    session_start();

    if(isset($_SESSION['user_login_id']) =="") {
        header("Location: login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Info Dashboard | Tutsmake.com</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Name :- <?php echo $_SESSION['user_name']?></h5>
                        <p class="card-text">Email :- <?php echo $_SESSION['user_email']?></p>
                        <p class="card-text">Mobile :- <?php echo $_SESSION['user_mobile']?></p>
                        <a href="logout.php" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>