<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <!-- integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <link rel="stylesheet" href="./Header/main.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            /* font-family: Apple Chancery, cursive; */
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }

        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
</head>

<body class="bg-light">
    <div class="main">

    <div class="navbar-side" p-0>
        <h6>
            <span class="icon"><i class="fas fa-user "></i></span>
            <span class="link-text"> Admin Panel</span>
        </h6>
        <ul>
            <li><a href="../admin_authentication/index.php" title="Dashboard">
                    <span class="icon"><i class="fas fa-chart-bar"></i></span>
                    <span class="link-text">Dashboard</span>
                </a></li>

            <li><a href="../manage_job_description/manage_job_description.php" title="Category">
                    <span class="icon"><i class="fas fa-edit"></i></span>
                    <span class="link-text">Manage Posts</span>
                </a></li>
            <li><a href="interested_user.php" title="Comment">
                    <span class="icon"><i class="fas fa-list-alt"></i></span>
                    <span class="link-text">Interested users</span>
                </a></li>
            <li><a href="../messaging/admin.php" title="Comment">
                    <span class="icon"><i class="fas fa-list-alt"></i></span>
                    <span class="link-text">Message</span>
                </a></li>
            <!-- <li><a href="#" title="Tags">
              <span class="icon"><i class="fas fa-tags"></i></span>
              <span class="link-text">Tags</span>
            </a></li> -->
            <li><a href="header.php" title="Profile">
                    <span class="icon"><i class="fas fa-user-circle"></i></span>
                    <span class="link-text">Profile</span>
                </a></li>
            <li><a href="#" title="Setting">
                    <span class="icon"><i class="fas fa-cog"></i></span>
                    <span class="link-text">Setting</span>
                </a></li>
            <li><a href="../calendar/index.php" title="Setting" class="link-active">
                    <span class="icon"><i class="fas fa-calendar"></i></span>
                    <span class="link-text">Calendar</span>
                </a></li>
            <li><a href="admin_authentication.php" title="Sign Out">
                    <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span class="link-text">Sign Out</span>
                </a></li>
        </ul>
    </div>
</div>    <!-- <head>

    <link rel="stylesheet" href="main.css">
</head> -->
<div class="main">
    <div class="content">
        <nav class="navbar navbar-dark bg-dark py-1">

            <a href="#" id="navBtn">
                <span id="changeIcon" class="fa fa-bars text-light"></span>
            </a>

            <div class="d-flex">
                <a class="nav-link text-light px-2" href="#"><i class="fas fa-search"></i></a>
                <a class="nav-link text-light px-2" href="#"><i class="fas fa-bell"></i></a>
                <a class="nav-link text-light px-2" href="#"><i class="fas fa-sign-out-alt"></i></a>
            </div>

        </nav>
    </div>
</div>    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient" id="topNavBar">
        <div class="container">
            <a class="navbar-brand" href="https://sourcecodester.com">
            Sourcecodester
            </a>

            <div>
                <b class="text-light">Sample Scheduling</b>
            </div>
        </div>
    </nav> -->
    <div class="container py-5  " id="page-container">
        <div class="row" style="padding-left:26vmin;">
            <div class=" col-md-9">
                <div id="calendar"></div>
            </div>
            <div class="col-md-3">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">Schedule Form</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="title"
                                        id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description"
                                        id="description" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Start</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0"
                                        name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0"
                                        name="end_datetime" id="end_datetime" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i
                                    class="fa fa-save"></i> Save</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i
                                    class="fa fa-reset"></i> Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Schedule Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Title</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit"
                            data-id="">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete"
                            data-id="">Delete</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

        </body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $("#navBtn").click(function () {
            $(".main").toggleClass('animate');
        });
    });
</script>
<script>
    var scheds = $.parseJSON('[]')
</script>
<script src="./js/script.js"></script>

</html>