<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Job News</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="main.css">

    <!-- Add inline CSS for the popup to style it -->
    <style>
    #popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border: 1px solid #007bff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        animation: popupFadeIn 0.5s ease-in-out forwards;
    }

    #popup p {
        margin-bottom: 10px;
        font-size: 18px;
        color: #333;
    }

    #popup button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    #popup button:hover {
        background-color: #0056b3;
    }

    @keyframes popupFadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
    </style>
</head>

<body>

    <!-- Popup message -->
    <div id="popup">
        <p id="popupMessage">Job news posted successfully!</p>

        <button onclick="hidePopup()">Close</button>
    </div>

    <div class="container">
        <div class="col-md-4"></div>
        <div class="col-md-6 ">
            <form id="postForm" enctype="multipart/form-data">
                <label for="company_name">Company Name:</label>
                <input type="text" id="company_name" name="company_name" required>
                <label for="job_title">Job Title:</label>
                <input type="text" id="job_title" name="job_title" required>
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="6" required></textarea>
                <label for="file_upload">Document:</label>
                <input type="file" id="file_upload" name="file_upload">
                <button type="button" onclick="showPopup()">Submit</button>
                <button type="button" onclick="hidePopup()">Cancel</button>
            </form>
        </div>
    </div>

    <script>
    function showPopup() {
        // Display the popup
        document.getElementById("popup").style.display = "block";
    }

    function hidePopup() {
        // Hide the popup and reset form fields
        document.getElementById("popup").style.display = "none";
        document.getElementById("postForm").reset();
    }
    </script>
</body>

</html>