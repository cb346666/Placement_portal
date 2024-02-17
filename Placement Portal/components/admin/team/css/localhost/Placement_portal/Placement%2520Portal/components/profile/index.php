<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="../Header/main.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-group button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .container {
            max-width: 90%;
        }
    }

    /* Interactive Styles */
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="file"],
    button {
        transition: background-color 0.3s, border-color 0.3s, color 0.3s;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="tel"]:focus,
    input[type="file"]:focus {
        border-color: #4c51bf;
    }

    input[type="text"]::placeholder,
    input[type="email"]::placeholder,
    input[type="tel"]::placeholder,
    input[type="file"]::placeholder {
        color: #a0aec0;
    }

    input[type="text"]:hover,
    input[type="email"]:hover,
    input[type="tel"]:hover,
    input[type="file"]:hover {
        border-color: #e2e8f0;
    }

    button:hover {
        background-color: #0056b3;
    }

    button:focus-visible {
        outline: none;
        box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
    }
    </style>
</head>

<body>
    <div class="main">

    <div class="navbar-side">
        <h6>
            <span class="icon"><i class="fas fa-user "></i></span>
            <span class="link-text"> Admin Panel</span>
        </h6>
        <ul>
            <li><a href="../admin_authentication/index.php" title="Dashboard">
                    <span class="icon"><i class="fas fa-chart-bar"></i></span>
                    <span class="link-text">Dashboard</span>
                </a></li>

            <li><a href="../manage_job_description/manage_job_description.php" class="link-active" title="Category">
                    <span class="icon"><i class="fas fa-edit"></i></span>
                    <span class="link-text">Manage Posts</span>
                </a></li>
            <li><a href="../admin_authentication/interested_user.php" title="Comment">
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
            <li><a href="../profile/index.php" title="Profile">
                    <span class="icon"><i class="fas fa-user-circle"></i></span>
                    <span class="link-text">Profile</span>
                </a></li>
            <li><a href="#" title="Setting">
                    <span class="icon"><i class="fas fa-cog"></i></span>
                    <span class="link-text">Setting</span>
                </a></li>
            <li><a href="../calendar/index.php" title="Setting">
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
</div>


    <div class="container">
        <div id="profile">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" value="JohnDoe" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" value="johndoe@example.com" readonly>
            </div>
            <button id="editBtn">Edit Profile</button>
        </div>

        <div id="editProfile" style="display: none;">
            <div class="form-group">
                <label for="newUsername">New Username</label>
                <input type="text" id="newUsername" placeholder="Enter new username">
            </div>
            <div class="form-group">
                <label for="newEmail">New Email</label>
                <input type="email" id="newEmail" placeholder="Enter new email">
            </div>
            <button id="saveBtn">Save</button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#navBtn").click(function() {
            $(".main").toggleClass('animate');
        });
    });
    </script>
    <script>
    const profileSection = document.getElementById('profile');
    const editProfileSection = document.getElementById('editProfile');
    const editBtn = document.getElementById('editBtn');
    const saveBtn = document.getElementById('saveBtn');

    editBtn.addEventListener('click', () => {
        profileSection.style.display = 'none';
        editProfileSection.style.display = 'block';
    });

    saveBtn.addEventListener('click', () => {
        const newUsername = document.getElementById('newUsername').value;
        const newEmail = document.getElementById('newEmail').value;

        // Here you can perform AJAX request to save the changes to the server
        // For simplicity, let's just update the profile on the client side
        document.getElementById('username').value = newUsername;
        document.getElementById('email').value = newEmail;

        profileSection.style.display = 'block';
        editProfileSection.style.display = 'none';
    });
    </script>
    <!-- <script src="../Header/script.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    // JavaScript for activating sidebar links
    $(document).ready(function() {
        $('.navbar-side ul li a').click(function() {
            $('.navbar-side ul li').removeClass('link-active');
            $(this).addClass('link-active');
        });
    });
    </script>

</body>

</html>