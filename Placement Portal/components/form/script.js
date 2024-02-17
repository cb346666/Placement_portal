// Form validation
document.getElementById("userForm").addEventListener("submit", function(event) {
    var email = document.getElementById("email").value;
    var uid = document.getElementById("uid").value;
    var department = document.getElementById("department").value;
    var course = document.getElementById("course").value;
    var semester = document.getElementById("semester").value;
    var phone = document.getElementById("phone").value;
    var cv = document.getElementById("cv").value;

    // Simple email validation
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address");
        event.preventDefault();
        return;
    }

    // More validation can be added for other fields

    // CV validation
    var allowedExtensions = /(\.pdf)$/i;
    if (!allowedExtensions.exec(cv)) {
        alert("Please upload a PDF file for CV");
        event.preventDefault();
        return;
    }
});
