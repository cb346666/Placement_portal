$(document).ready(function() {
    $('#loginForm').submit(function(e) {
        e.preventDefault(); // Prevent form submission
        
        // Show loading message
        $('#loading').show();
        
        // Perform AJAX request
        $.ajax({
            url: './database/admin_login.php',
            type: 'POST',
            data: $(this).serialize(), // Serialize form data
            success: function(response) {
                // Hide loading message
                $('#loading').hide();
                
                // Parse JSON response
                var data = JSON.parse(response);
                
                // Check if the response status is success
                if (data.status === "success") {
                    // Redirect based on user role
                    if (data.role === "staff") {
                        // Redirect staff to staff index page
                        window.location.href = './team/index.php';
                    } else if (data.role === "super_admin") {
                        // Redirect super admin to super admin index page
                        window.location.href = './admin/index.php';
                    }
                    
                } else {
                    // Display error message if response status is error
                    $('#message').text(data.message);
                }
            },
            error: function(xhr, status, error) {
                // Hide loading message and display error message
                $('#loading').hide();
                $('#message').text("An error occurred while processing your request");
            }
        });
    });
});
