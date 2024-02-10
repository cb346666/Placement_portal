<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #f44336;
            font-size: 32px;
            margin-bottom: 10px;
        }

        p {
            color: #333;
            font-size: 18px;
            margin-bottom: 20px;
        }

        button {
            background-color: #f44336;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #e53935;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        .heart {
            position: relative;
            width: 100px;
            height: 90px;
            background: #f44336;
            margin: 0 auto;
            animation: pulse 1s infinite;
        }

        .heart::before,
        .heart::after {
            content: "";
            position: absolute;
            top: 50px;
            width: 52px;
            height: 80px;
            background: #f44336;
            border-radius: 50px 50px 0 0;
        }

        .heart::before {
            left: 50px;
            transform: rotate(-45deg);
            transform-origin: 0 100px;
        }

        .heart::after {
            left: 50px;
            transform: rotate(45deg);
            transform-origin: 100% 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Coming Soon</h1>
        <p>Our website is currently under construction. We will be back soon with new content.</p>
        
        <button > <a href="index.php" style="color: #fff;">Go To Homepage</a></button>
        <div class="heart"></div>
    </div>
</body>
</html>