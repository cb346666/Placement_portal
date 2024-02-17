// // Form validation
// document.getElementById("userForm").addEventListener("submit", function(event) {
//     var email = document.getElementById("company_name").value;
//     var uid = document.getElementById("job_title").value;
//     var department = document.getElementById("description").value;
//     // var course = document.getElementById("course").value;
//     // var semester = document.getElementById("semester").value;
//     // var phone = document.getElementById("phone").value;
//     var cv = document.getElementById("file_upload").value;

//     // Simple email validation
//     var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//     if (!emailPattern.test(email)) {
//         alert("Please enter a valid email address");
//         event.preventDefault();
//         return;
//     }

//     // More validation can be added for other fields

//     // CV validation
//     var allowedExtensions = /(\.pdf)$/i;
//     if (!allowedExtensions.exec(file_upload)) {
//         alert("Please upload a PDF file.");
//         event.preventDefault();
//         return;
//     }
// });
