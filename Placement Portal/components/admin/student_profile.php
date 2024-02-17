<?php
include('includes/header.php');
include('includes/navbar.php');

// Include database connection file
include_once("db-connect.php");

// Fetch admin data from the database
$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Students Profile
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertStudentModal"
                    data-id="">
                    Add Student Profile
                </button>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Username </th>
                            <th>Email </th>
                            <th>Password</th>
                            <th>Profile Name</th>
                            <th>EDIT </th>
                            <th>DELETE </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td>
                                <?= $row['student_id'] ?>
                            </td>
                            <td>
                                <?= $row['username'] ?>
                            </td>
                            <td>
                                <?= $row['email'] ?>
                            </td>
                            <td>******</td>
                            <td>
                                <?= $row['profile_name'] ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success editBtn" data-toggle="modal"
                                    data-target="#editAdminModal" data-id="<?= $row['student_id'] ?>">EDIT</button>
                            </td>
                            <td>
                                <form action="./database/delete_student.php" method="post"
                                    onsubmit="return confirm('Are you sure you want to delete this record?');">
                                    <input type="hidden" name="delete_id" value="<?= $row['student_id'] ?>">
                                    <button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Edit Admin Modal -->
<div class="modal fade" id="editAdminModal" tabindex="-1" role="dialog" aria-labelledby="editAdminModalLabel"
    aria-hidden="true" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAdminModalLabel">Edit Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editAdminForm">
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Profile Name</label>
                        <input type="text" name="profile_name" id="profile_name" class="form-control">
                    </div>
                    <button type="button" class="btn btn-primary" id="updateAdminBtn">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Insert Admin Modal -->
<div class="modal fade" id="insertStudentModal" tabindex="-1" role="dialog" aria-labelledby="insertStudentModalLabel"
    aria-hidden="true" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertStudentModalLabel">Add Student Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="insertStudentForm">
                    <input type="hidden" name="edit_id" id="insert_edit_id">
                    <div class="form-group">
                        <label for="student_username">Username</label>
                        <input type="text" name="username" id="student_username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="student_email">Email</label>
                        <input type="email" name="email" id="student_email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="student_password">Password</label>
                        <input type="password" name="password" id="student_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="student_profile_name">Profile Name</label>
                        <input type="text" name="profile_name" id="student_profile_name" class="form-control" required>
                    </div>
                    <button type="button" class="btn btn-primary" id="insertStudentBtn">Insert</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Your existing HTML content -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<!-- Your custom JavaScript code -->
<script src="student_profile.js"></script>


<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>