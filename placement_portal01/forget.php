<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forget.css">
    <style>
        /* CSS for Forgot Password Form */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    margin-top: 50px;
    color: #333;
}

form {
    width: 300px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 5px;
    color: #666;
}

input[type="text"] {
    width: calc(100% - 12px);
    padding: 6px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    width: 100%;
    padding: 8px 0;
    border: none;
    border-radius: 4px;
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}

    </style>
</head>
<body>
    <h2>Forgot Password</h2>
    <form action="reset.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>