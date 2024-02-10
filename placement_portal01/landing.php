<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placement Information Website</title>
    <style>
    /* Your existing styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /* background-image: url("landing.png"); */
    }

    body {
        font-family: Arial, sans-serif;
        /* background-color: #f4f4f4; */
        background-image: url("landing.png");
        image-resolution: inherit;
        /* image-rendering:inherit; */
        /* background-repeat: no-repeat; */
        background-attachment: fixed;
        background-position: center;
    }

    .container {
        width: 90%;
        margin: auto;
        overflow: hidden;

    }

    /* Header Styling */
    header {
        /* background: #333; */
        color: #fff;
        padding: 20px 0;
    }

    header .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header h1 {
        font-size: 24px;
        color: #2efff1;
        font-weight: bolder;
        font-variant: small-caps;
    }

    header ul {
        list-style: none;
        text-align: center;
    }

    header ul li {
        display: inline;
        margin-left: 20px;
        list-style: circle;
    }

    header ul li a {
        color: #fff;
        text-decoration: none;
        position: relative;
        font-size: smaller;
        transition: color 0.3s ease;
        display: inline-flex;
    }

    header ul li a::before {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 100%;
        height: 2px;

        background-color: #fff;
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    header ul li a:hover::before {
        transform: scaleX(1);
    }

    /* Hero Section Styling */
    #hero {
        text-align: center;
        padding: 230px 0;
        /* background: #444; */
        color: #fff;
    }

    #hero h1 {
        font-size: 60px;
        margin-bottom: 15px;
        margin-top: -13px;
        animation: fadeInUp 1s ease forwards;
        font-variant: small-caps;
        /* display: inline-flexbox; */
    }

    #hero h2 {
        font-size: 36px;
        margin-bottom: 25px;
        margin-top: 300px;
        animation: fadeInUp 1s ease forwards;
        font-variant: small-caps;
        /* display: inline-flexbox; */
    }

    #hero p {
        font-size: 18px;
        margin-bottom: 30px;
        margin-top: 5px;
        animation: fadeInUp 1s ease 0.5s forwards;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background: #f44336;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s ease;
    }

    .btn:hover {
        background: #d32f2f;
        transform: scale(1.05);
    }

    .btn1 {
        /* display: inline-flex; */
        padding: 2px 6px;
        margin-top: 1px;
        /* padding-bottom: px; */
        /* background: #2efff1; */
        color: #2efff1;
        font-weight: bolder;
        text-decoration: none;
        border-radius: 20px;
        transition: background 0.3s ease;
        font-variant: small-caps;
    }

    .btn1:hover {
        background: #ff0000;
        transform: scale(1.05);
    }

    /* Footer Styling */
    footer {
        /* background: #333; */
        /* color: #fff;
    text-align: center;
    padding: 20px 0; */
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        /* background-color: red; */
        color: white;
        text-align: center;
    }

    /* Keyframes for animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Media Queries for Responsive Design */
    @media only screen and (max-width: 768px) {
        header {
            flex-direction: column;
            text-align: center;
        }

        header h1 {
            margin-bottom: 15px;
        }

        header ul {
            margin-top: 15px;
        }

        header ul li {
            display: block;
            margin: 10px 0;
        }

        #hero {
            padding: 150px 0;
        }

        #hero h1 {
            font-size: 40px;
            margin-bottom: 10px;
        }

        #hero h2 {
            font-size: 24px;
            margin-bottom: 15px;
            margin-top: 150px;
        }
    }
    </style>
</head>

<body>
    <!-- Your existing HTML content -->
    <header>
        <nav>
            <div class="container">
                <h1>College Placement</h1>
                <ul>
                    <li><a href="job_listing.php">About</a></li><br>
                    <li><a href="job_listing.php">Job Listings</a></li><br>
                    <li><a href="std_authentication.php">Student Login</a></li><br>
                    <li><a href="admin_authentication.php">Faculty Login</a></li><br>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section id="hero">
            <div class="container">
                <h1>Welcome.</h1>
                <h3>To College Placement Portal</h3>
                <p>Explore job opportunities and connect with employers.</p>
                <a href="std_authentication.php" class="btn">Explore Job Listings</a>
            </div>
        </section>

        <!-- Other sections: About, Job Listings, Login forms, etc. -->

    </main>

    <footer>
        <div class="container">
            <p>&copy; 2023 College Placement Portal</p>
        </div>
    </footer>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const exploreButton = document.querySelector('.btn');
        const jobListingsSection = document.getElementById('joblistings');

        // Smooth scrolling to job listings section when Explore button is clicked
        exploreButton.addEventListener('click', function(event) {
            event.preventDefault();

            jobListingsSection.scrollIntoView({
                behavior: 'smooth'
            });
        });

        // Example of adding dynamic content on button click
        const addButton = document.getElementById('addContentButton');
        const contentContainer = document.getElementById('dynamicContent');

        addButton.addEventListener('click', function() {
            const newContent = document.createElement('p');
            newContent.textContent = 'New dynamic content added!';
            contentContainer.appendChild(newContent);
        });
    });
    </script>
</body>

</html>