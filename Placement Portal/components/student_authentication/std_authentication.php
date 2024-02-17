<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./css/std_authentication.css">
    <style>
    </style>
</head>

<body>
    <div class="login-container">
        <h2>User Login</h2>
        <form id="loginForm" method="post" action="std_login.php">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <div style="position: relative;">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <!-- <span class="password-eye" onclick="togglePasswordVisibility()"> -->
                <!-- <img src="eye-icon.png" alt="Show/Hide Password" width="20" height="20"> -->
                </span>
            </div>
            <button type="submit">Login</button>
            <!-- <button type="submit" action="register.php">Register</button> -->
        </form>
        <p>Don't have an account? <a href="std_signup.php">Sign Up</a></p>
        <p>Forgot your password? <a href="forget.php">Reset Password</a></p>
        <p id="message"></p>
    </div>

    <script src="scripts.js"></script>
    <script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    }
    </script>
</body>

</html>