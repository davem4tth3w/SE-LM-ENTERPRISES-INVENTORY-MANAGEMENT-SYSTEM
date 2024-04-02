<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>unit page</title>

    <!-- bootstrap-5.3.2 start FOLDER LINKS-->
<script src="js/jqueryv3.6.0.js"></script>
<link rel="stylesheet" href="bootstrap_v5/bootstrap-5.3.2-dist/css/bootstrap.min.css" />
<script src="bootstrap_v5/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="bootstrap_v5/bootstrap-5.3.2-dist/css/dataTables.bootstrap5.min.css">
<script src="bootstrap_v5/bootstrap-5.3.2-dist/js/jquery.dataTables.min.js"></script>
<script src="bootstrap_v5/bootstrap-5.3.2-dist/js/dataTables.bootstrap5.min.js"></script>
<!-- bootstrap-5.3.2 end -->
    
</head>
<body>


<?php
//unit.php

include('database_connection.php');

if(!isset($_SESSION['type']))
{
	header('location:login.php');
}

// if($_SESSION['type'] != 'admin')
// {
// 	header("location:index.php");
// }



include('sidebar.php');

?>
    

<style>
    <?php include"css/pages_stylesheet/unit.css"?>
</style>

<div class="content-container">

    <span id="alert_action"></span>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                          
                                <h3 class="card-title">Unit List</h3>
                            
                        </div>
                        <div class="col-md-2" style="text-align: right;">
                           
                                <button type="button" name="add" id="add_button" data-bs-toggle="modal" data-bs-target="#unitModal" class="btn btn-success btn-sm">Add</button>
                         
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table id="unit_data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Unit</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>status</th>
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
    <div class="modal fade" id="unitModal">
        <div class="modal-dialog">
            <form method="post" id="unit_form">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Add unit</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="unit_name">Enter unit Name</label>
                        <input type="text" name="unit_name" id="unit_name" class="form-control" required />
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="unit_id" id="unit_id" />
                        <input type="hidden" name="btn_action" id="btn_action" />
                        <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>



<?php
include('footer.php');
?>


    
</body>
</html>

<script>
    $(document).ready(function () {

        $('#add_button').click(function () {
            $('#unit_form')[0].reset();
            $('.modal-title').html("<i class='fa fa-plus'></i> Add unit");
            $('#action').val('Add');
            $('#btn_action').val('Add');
        });

        $(document).on('submit', '#unit_form', function (event) {
            event.preventDefault();
            $('#action').attr('disabled', 'disabled');
            var form_data = $(this).serialize();
            $.ajax({
                url: "unit_action.php",
                method: "POST",
                data: form_data,
                success: function (data) {
                    $('#unit_form')[0].reset();
                    $('#unitModal').modal('hide');
                    $('#alert_action').fadeIn().html('<div class="alert alert-success">' + data + '</div>');
                    $('#action').attr('disabled', false);
                    unitdataTable.ajax.reload();
                }
            })
        });

        $(document).on('click', '.update', function () {
            var unit_id = $(this).attr("id");
            var btn_action = 'fetch_single';
            $.ajax({
                url: "unit_action.php",
                method: "POST",
                data: { unit_id: unit_id, btn_action: btn_action },
                dataType: "json",
                success: function (data) {
                    $('#unitModal').modal('show');
                    $('#unit_name').val(data.unit_name);
                    $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Unit");
                    $('#unit_id').val(unit_id);
                    $('#action').val('Edit');
                    $('#btn_action').val("Edit");
                }
            })
        });

        var unitdataTable = $('#unit_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "unit_fetch.php",
                type: "POST"
            },
            "columnDefs": [
                {
                    "targets": [3, 4, 5,],
                    "orderable": false,
                },
            ],
            "pageLength": 25
        });

        $(document).on('click', '.status', function () {
            var unit_id = $(this).attr('id');
            var status = $(this).data("status");
            var btn_action = 'status';
            if (confirm("Are you sure you want to change status?")) {
                $.ajax({
                    url: "unit_action.php",
                    method: "POST",
                    data: { unit_id: unit_id, status: status, btn_action: btn_action },
                    success: function (data) {
                        $('#alert_action').fadeIn().html('<div class="alert alert-info">' + data + '</div>');
                        unitdataTable.ajax.reload();
                    }
                })
            }
            else {
                return false;
            }
        });

        $(document).on('click', '.delete', function(){
            var unit_id = $(this).attr("id");

            var btn_action = 'delete';
            if(confirm("Are you sure you want to delete this unit?"))
            {
                $.ajax({
                    url:"unit_action.php",
                    method:"POST",
                    data:{unit_id:unit_id, btn_action:btn_action},
                    success:function(data){
                        $('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
                        unitdataTable.ajax.reload();
                    }
                });
            }
            else
            {
                return false;
            }
        });


    });
</script>