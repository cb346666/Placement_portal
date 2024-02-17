// function submitForm() {
    
// }
function showAddPostPopup() {
    // Display the add post popup
    document.getElementById("addPostPopup").style.display = "block";
}

function hideAddPostPopup() {
    // Hide the add post popup and reset form fields
    document.getElementById("addPostPopup").style.display = "none";
    document.getElementById("postForm").reset();
}

// function showSuccessPopup() {
//     // Display the success popup
//     document.getElementById("successPopup").style.display = "block";
//     document.getElementById("postForm").reset();
// }

// function hideSuccessPopup() {
//     // Hide the success popup
//     document.getElementById("successPopup").style.display = "none";
    
// }

// function submitForm() {
//     var formData = new FormData(document.getElementById("postForm"));
//     var xhr = new XMLHttpRequest();
//     xhr.open("POST", "process.php", true); // Corrected URL to post_job_news.php
//     xhr.onload = function() {
//         if (xhr.status === 200) {
//             // Check if the response indicates success
//             if (xhr.responseText.trim() === "success") {
//                 // Display success popup if submission was successful
//                 showSuccessPopup();
//             } else {
//                 // Handle other response scenarios, such as errors
//                 alert("Error: " + xhr.responseText);
//             }
//         } else {
//             // Handle HTTP error status
//             alert("Error: " + xhr.status);
//         }
//     };
//     xhr.onerror = function() {
//         // Handle network errors
//         alert("Request failed.");
//     };
//     xhr.send(formData);
// }
