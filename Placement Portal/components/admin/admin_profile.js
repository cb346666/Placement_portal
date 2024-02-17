$(document).ready(function() {
    // Handle click event on the "Edit" button
    $('.editBtn').click(function() {
        var edit_id = $(this).data('id');
        $.ajax({
            url: 'edit_admin.php',
            type: 'POST',
            data: { edit_id: edit_id },
            dataType: 'json',
            success: function(response) {
                $('#edit_id').val(response.edit_id);
                $('#username').val(response.username);
                $('#email').val(response.email);
                $('#role').val(response.role);
                $('#password').val(response.password);
                $('#profile_name').val(response.profile_name);
                $('#editAdminModalLabel').text('Edit Admin');
                $('#editAdminModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Failed to fetch admin data. Please try again.");
            }
        }); 
    });

    // AJAX request to update admin data
    $('#updateAdminBtn').click(function() {
        if (!confirm("Are you sure you want to update this Admin profile?")) {
            return;
        }
        var formData = $('#editAdminForm').serialize();
        $.ajax({
            url: './database/update_admin.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response === "success") {
                    $('#editAdminModal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    alert("Admin data updated successfully!");
                } else {
                    alert(response);
                }
            },
            error: function() {
                alert("Failed to update admin data. Please try again.");
            }
        });
    });

    // Handle click event on the "Add Admin Profile" button
    $('#insertAdminBtn').click(function() {

        if (!confirm("Are you sure you want to add this Admin profile?")) {
            return;
        }

        var username = $('#admin_username').val();
        var email = $('#admin_email').val();
        var role = $('#admin_role').val();
        var password = $('#admin_password').val();
        var profileName = $('#admin_profile_name').val();

        if (!username || !email || !role || !password || !profileName) {
            alert('Please fill out all required fields.');
            return;
        }

        // Get form data
        var formData = $('#insertAdminForm').serialize();

        // AJAX request to add admin profile
        $.ajax({
            url: './database/insert_admin.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response === "success") {
                    // Close modal and reload page
                    $('#insertAdminModal').modal('hide');
                    alert("Admin profile added successfully!");
                    location.reload();
                } else {
                    // Show error message
                    alert(response);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Failed to add admin profile. Please try again.");
            }
        });
    });
});
