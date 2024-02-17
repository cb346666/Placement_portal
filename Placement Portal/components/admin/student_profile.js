$(document).ready(function() {
    // Handle click event on the "Edit" button
    $('.editBtn').click(function() {
        var edit_id = $(this).data('id');
        $.ajax({
            url: 'edit_student.php',
            type: 'POST',
            data: {
                edit_id: edit_id
            },
            dataType: 'json',
            success: function(response) {
                $('#edit_id').val(response.edit_id);
                $('#username').val(response.username);
                $('#email').val(response.email);
                $('#password').val(response.password);
                $('#profile_name').val(response.profile_name);
                $('#editAdminModalLabel').text('Edit Student');
                $('#editAdminModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Failed to fetch student data. Please try again.");
            }
        }); 
    });

    // AJAX request to update student data
    $('#updateAdminBtn').click(function() {
        if (!confirm("Are you sure you want to update this student profile?")) {
            return;
        }

        var formData = $('#editAdminForm').serialize();
        $.ajax({
            url: './database/update_student.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response === "success") {
                    $('#editAdminModal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    alert("Student data updated successfully!");
                } else {
                    alert(response);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Failed to update student data. Please try again.");
        }
        });
    });

    // Handle click event on the "Add Student Profile" button
    $('#insertStudentBtn').click(function() {
        if (!confirm("Are you sure you want to add this student profile?")) {
            return;
        }

        var username = $('#student_username').val();
        var email = $('#student_email').val();
        var password = $('#student_password').val();
        var profileName = $('#student_profile_name').val();

        if (!username || !email || !password || !profileName) {
            alert('Please fill out all required fields.');
            return;
        }

        var formData = $('#insertStudentForm').serialize();

        $.ajax({
            url: './database/insert_student.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response === "success") {
                    $('#insertStudentModal').modal('hide');
                    alert("Student profile added successfully!");
                    location.reload();
                } else {
                    alert(response);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Failed to add student profile. Please try again.");
            }
        });
    });
});
