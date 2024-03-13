
function showAddPostPopup() {
    // Show the add post popup
    document.getElementById("addPostPopup").style.display = "block";
}

function hideAddPostPopup() {
    // Hide the add post popup
    document.getElementById("addPostPopup").style.display = "none";
    // Reset the form
    document.getElementById("postForm").reset();
}

function submitForm() {
    var form = document.getElementById("postForm");

    // Check if the form is valid
    if (form.checkValidity()) {
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./manage_posts/process.php", true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Display popup if submission was successful
                document.getElementById("successPopup").style.display = "block";
            } else {
                // Handle errors if any
                alert("Error: " + xhr.responseText);
            }
        };
        xhr.onerror = function() {
            // Handle errors if any
            alert("Request failed.");
        };
        xhr.send(formData);
    } else {
        // If form is not valid, display an error message or perform any desired action
        alert("Please fill in all required fields.");
    }
}


function hideSuccessPopup() {
    // Hide the success popup
    document.getElementById("successPopup").style.display = "none";
}

document.getElementById("navBtn").addEventListener("click", function() {
    document.querySelector(".content").classList.toggle("animate");
    document.querySelector(".navbar-side").classList.toggle("animate");
});
