$(document).ready(function() {
    $('#loginForm').submit(function(e) {
        e.preventDefault(); // Prevent form submission
        
        // Show loading message
        $('#loading').show();
        
        // Perform AJAX request
        $.ajax({
            url: 'student_login.php',
            type: 'POST',
            data: $(this).serialize(), // Serialize form data
            success: function(response) {
                // Hide loading message
                $('#loading').hide();
                
                // Check if the response is "success"
                if (response.trim() === 'success') {
                    // Show success popup
                    alert("Login successful!");
                    
                    // Redirect to dashboard after 2 seconds
                    setTimeout(function() {
                        window.location.href = './index.php';
                    }, 2000);
                } else {
                    // Display error message if response is not "success"
                    alert("Invalid username or password");
                }
            },
            error: function(xhr, status, error) {
                // Hide loading message and display error message
                $('#loading').hide();
                alert("An error occurred while processing your request");
            }
        });
    });
});
