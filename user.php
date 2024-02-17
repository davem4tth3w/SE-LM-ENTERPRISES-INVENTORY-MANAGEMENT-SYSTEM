<?php
//user.php

include('database_connection.php');

if(!isset($_SESSION["type"]))
{
	header('location:login.php');
}

if($_SESSION["type"] != 'admin')
{
	header("location:index.php");
}

// include('header.php');

include('sidebar.php');




?>

<style>
    <?php include"css/pages_stylesheet/user.css"?>
</style>

<!-- bootstrap-5.3.2 start FOLDER LINKS-->
<script src="js/jqueryv3.6.0.js"></script>
<link rel="stylesheet" href="bootstrap_v5/bootstrap-5.3.2-dist/css/bootstrap.min.css" />
<script src="bootstrap_v5/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="bootstrap_v5/bootstrap-5.3.2-dist/css/dataTables.bootstrap5.min.css">
<script src="bootstrap_v5/bootstrap-5.3.2-dist/js/jquery.dataTables.min.js"></script>
<script src="bootstrap_v5/bootstrap-5.3.2-dist/js/dataTables.bootstrap5.min.js"></script>
<!-- bootstrap-5.3.2 end -->
   
<div class="content-container">

    <span id="alert_action"></span>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-8 col-6">
                            <h3 class="card-title">User List</h3>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-6" align="right">
                            <button type="button" name="add" id="add_button" data-bs-toggle="modal" data-bs-target="#userModal" class="btn btn-success btn-sm">Add</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="user_data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="userModal">
        <div class="modal-dialog">
            <form method="post" id="user_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Add User</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="user_name">Enter User Name</label>
                            <input type="text" name="user_name" id="user_name" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="user_email">Enter User Email</label>
                            <input type="email" name="user_email" id="user_email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="user_password">Enter User Password</label>
                            <input type="password" name="user_password" id="user_password" class="form-control" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" id="user_id" />
                        <input type="hidden" name="btn_action" id="btn_action" />
                        <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {

        $('#add_button').click(function () {
            $('#user_form')[0].reset();
            $('.modal-title').html("<i class='fa fa-plus'></i> Add User");
            $('#action').val("Add");
            $('#btn_action').val("Add");
        });

        var userdataTable = $('#user_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "user_fetch.php",
                type: "POST"
            },
            "columnDefs": [
                {
                    "targets": [4, 5],
                    "orderable": false
                }
            ],
            "pageLength": 25
        });

        $(document).on('submit', '#user_form', function (event) {
            event.preventDefault();
            $('#action').attr('disabled', 'disabled');
            var form_data = $(this).serialize();
            $.ajax({
                url: "user_action.php",
                method: "POST",
                data: form_data,
                success: function (data) {
                    $('#user_form')[0].reset();
                    $('#userModal').modal('hide');
                    $('#alert_action').fadeIn().html('<div class="alert alert-success">' + data + '</div>');
                    $('#action').attr('disabled', false);
                    userdataTable.ajax.reload();
                }
            })
        });

        $(document).on('click', '.update', function () {
            var user_id = $(this).attr("id");
            var btn_action = 'fetch_single';
            $.ajax({
                url: "user_action.php",
                method: "POST",
                data: { user_id: user_id, btn_action: btn_action },
                dataType: "json",
                success: function (data) {
                    $('#userModal').modal('show');
                    $('#user_name').val(data.user_name);
                    $('#user_email').val(data.user_email);
                    $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit User");
                    $('#user_id').val(user_id);
                    $('#action').val('Edit');
                    $('#btn_action').val('Edit');
                    $('#user_password').attr('required', false);
                }
            })
        });

        $(document).on('click', '.delete', function () {
            var user_id = $(this).attr("id");
            var status = $(this).data('status');
            var btn_action = "delete";
            if (confirm("Are you sure you want to change status?")) {
                $.ajax({
                    url: "user_action.php",
                    method: "POST",
                    data: { user_id: user_id, status: status, btn_action: btn_action },
                    success: function (data) {
                        $('#alert_action').fadeIn().html('<div class="alert alert-info">' + data + '</div>');
                        userdataTable.ajax.reload();
                    }
                })
            }
            else {
                return false;
            }
        });

    });
</script>

<?php
include('footer.php');
?>
