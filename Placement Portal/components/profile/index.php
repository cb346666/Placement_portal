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
    <?php include("../Header/sidebar.php"); ?>
    <?php include("../Header/header.php"); ?>



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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    < <script src="../Header/script.js">
        </script>
</body>

</html>