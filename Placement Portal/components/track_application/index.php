<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="../Header1/main.css">

    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php include("../Header1/sidebar.php"); ?>
    <?php include("../Header1/header.php"); ?>
    <div class="container">
        <h1>Welcome to Your Dashboard</h1>
        <div class="status">
            <h2>Status of Your Application:</h2>
            <p id="status">Pending</p>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="../Header1/script.js"> </script>
</body>

</html>