<?php
//category.php

include('database_connection.php');

if(!isset($_SESSION['type']))
{
	header('location:login.php');
}

if($_SESSION['type'] != 'admin')
{
	header("location:index.php");
}



include('sidebar.php');

?>

<!-- bootstrap-5.3.2 start FOLDER LINKS-->
<script src="js/jqueryv3.6.0.js"></script>
<link rel="stylesheet" href="bootstrap_v5/bootstrap-5.3.2-dist/css/bootstrap.min.css" />
<script src="bootstrap_v5/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="bootstrap_v5/bootstrap-5.3.2-dist/css/dataTables.bootstrap5.min.css">
<script src="bootstrap_v5/bootstrap-5.3.2-dist/js/jquery.dataTables.min.js"></script>
<script src="bootstrap_v5/bootstrap-5.3.2-dist/js/dataTables.bootstrap5.min.js"></script>
<!-- bootstrap-5.3.2 end -->
    

<style>
    <?php include"css/pages_stylesheet/category.css"?>
</style>

<div class="content-container">

    <span id="alert_action"></span>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-8 col-6">
                            <div class="row">
                                <h3 class="card-title">Category List</h3>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                            <div class="row" style="text-align: right;">
                                <button type="button" name="add" id="add_button" data-bs-toggle="modal" data-bs-target="#categoryModal" class="btn btn-success btn-sm">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table id="category_data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
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
    </div>
    <div class="modal fade" id="categoryModal">
        <div class="modal-dialog">
            <form method="post" id="category_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Category</h4>
                    </div>
                    <div class="modal-body">
                        <label for="category_name">Enter Category Name</label>
                        <input type="text" name="category_name" id="category_name" class="form-control" required />
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="category_id" id="category_id" />
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
            $('#category_form')[0].reset();
            $('.modal-title').html("<i class='fa fa-plus'></i> Add Category");
            $('#action').val('Add');
            $('#btn_action').val('Add');
        });

        $(document).on('submit', '#category_form', function (event) {
            event.preventDefault();
            $('#action').attr('disabled', 'disabled');
            var form_data = $(this).serialize();
            $.ajax({
                url: "category_action.php",
                method: "POST",
                data: form_data,
                success: function (data) {
                    $('#category_form')[0].reset();
                    $('#categoryModal').modal('hide');
                    $('#alert_action').fadeIn().html('<div class="alert alert-success">' + data + '</div>');
                    $('#action').attr('disabled', false);
                    categorydataTable.ajax.reload();
                }
            })
        });

        $(document).on('click', '.update', function () {
            var category_id = $(this).attr("id");
            var btn_action = 'fetch_single';
            $.ajax({
                url: "category_action.php",
                method: "POST",
                data: { category_id: category_id, btn_action: btn_action },
                dataType: "json",
                success: function (data) {
                    $('#categoryModal').modal('show');
                    $('#category_name').val(data.category_name);
                    $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Category");
                    $('#category_id').val(category_id);
                    $('#action').val('Edit');
                    $('#btn_action').val("Edit");
                }
            })
        });

        var categorydataTable = $('#category_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "category_fetch.php",
                type: "POST"
            },
            "columnDefs": [
                {
                    "targets": [3, 4],
                    "orderable": false,
                },
            ],
            "pageLength": 25
        });

        $(document).on('click', '.delete', function () {
            var category_id = $(this).attr('id');
            var status = $(this).data("status");
            var btn_action = 'delete';
            if (confirm("Are you sure you want to change status?")) {
                $.ajax({
                    url: "category_action.php",
                    method: "POST",
                    data: { category_id: category_id, status: status, btn_action: btn_action },
                    success: function (data) {
                        $('#alert_action').fadeIn().html('<div class="alert alert-info">' + data + '</div>');
                        categorydataTable.ajax.reload();
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
