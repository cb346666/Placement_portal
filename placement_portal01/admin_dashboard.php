<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* styles.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

.company-form, .user-forms {
    margin: 20px auto;
    width: 50%;
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 5px;
}

input[type="text"], input[type="email"], input[type="file"], input[type="submit"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome, Admin!</h1>
        <a href="logout.php">Logout</a>
    </div>

    <div class="company-form">
        <h2>Post Company Information</h2>
        <form action="post_company.php" method="post" enctype="multipart/form-data">
            <label for="companyName">Company Name:</label>
            <input type="text" name="companyName" required><br><br>
            <label for="pdfFile">Upload PDF:</label>
            <input type="file" name="pdfFile" accept=".pdf" required><br><br>
            <input type="submit" value="Post Information">
        </form>
    </div>

    <!-- <div class="user-forms">
        <h2>Interested Users Form</h2>
        <form action="handle_form.php" method="post">
            <label for="userName">Name:</label>
            <input type="text" name="userName" required><br><br>
            <label for="userEmail">Email:</label>
            <input type="email" name="userEmail" required><br><br>
            <!-- Other form fields as needed -->
   <!--        <input type="submit" value="Submit">
        </form>
    </div> -->

    <!-- Other dashboard features as needed -->

    <script src="dashboard.js"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* styles.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

.company-form, .user-forms {
    margin: 20px auto;
    width: 50%;
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 5px;
}

input[type="text"], input[type="email"], input[type="file"], input[type="submit"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome, Admin!</h1>
        <a href="logout.php">Logout</a>
    </div>

    <div class="company-form">
        <h2>Post Company Information</h2>
        <form action="post_company.php" method="post" enctype="multipart/form-data">
            <label for="companyName">Company Name:</label>
            <input type="text" name="companyName" required><br><br>
            <label for="pdfFile">Upload PDF:</label>
            <input type="file" name="pdfFile" accept=".pdf" required><br><br>
            <input type="submit" value="Post Information">
        </form>
    </div>

    <!-- <div class="user-forms">
        <h2>Interested Users Form</h2>
        <form action="handle_form.php" method="post">
            <label for="userName">Name:</label>
            <input type="text" name="userName" required><br><br>
            <label for="userEmail">Email:</label>
            <input type="email" name="userEmail" required><br><br>
            <!-- Other form fields as needed -->
   <!--        <input type="submit" value="Submit">
        </form>
    </div> -->

    <!-- Other dashboard features as needed -->

    <script src="dashboard.js"></script>
</body>
</html>


