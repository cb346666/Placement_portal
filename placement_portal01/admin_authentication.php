<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- <link rel="stylesheet" href="authentication.css"> -->
    <style>
    /* Your existing styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .login-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        animation: fadeIn 0.5s ease-in-out;
        /* Fade-in animation */
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        animation: slideInDown 0.5s ease-in-out;
        /* Slide-in from top animation */
    }

    input[type="text"],
    input[type="password"],
    button {
        display: block;
        width: calc(100% - 20px);
        margin: 10px auto;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
        /* Smooth transition */
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        border-color: #4caf50;
        /* Highlight input on focus */
    }

    button {
        background-color: #4caf50;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #45a049;
    }

    #message {
        text-align: center;
        color: red;
        margin-top: 10px;
        animation: slideInUp 0.5s ease-in-out;
        /* Slide-in from bottom animation */
    }

    /* Keyframe animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-50px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Additional styles for responsiveness and interactivity */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .login-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        animation: fadeIn 0.5s ease-in-out;
        /* Fade-in animation */
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        animation: slideInDown 0.5s ease-in-out;
        /* Slide-in from top animation */
    }

    input[type="text"],
    input[type="password"],
    button {
        display: block;
        width: calc(100% - 20px);
        margin: 10px auto;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
        /* Smooth transition */
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        border-color: #4caf50;
        /* Highlight input on focus */
    }

    button {
        background-color: #4caf50;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #45a049;
    }

    #message {
        text-align: center;
        color: red;
        margin-top: 10px;
        animation: slideInUp 0.5s ease-in-out;
        /* Slide-in from bottom animation */
    }

    /* Show/hide password eye icon */
    .password-eye {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form id="loginForm" method="post" action="std_login.php">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <div style="position: relative;">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <span class="password-eye" onclick="togglePasswordVisibility()">
                    <img src="eye-icon.png" alt="Show/Hide Password" width="20" height="20">
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