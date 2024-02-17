<?php
//product.php

include('database_connection.php');
include('function.php');

if(!isset($_SESSION["type"]))
{
    header('location:login.php');
}

if($_SESSION['type'] != 'admin')
{
    header('location:index.php');
}

// include('header.php');

include('sidebar.php');
?>       

<style>
    <?php include"css/pages_stylesheet/product.css"?>
</style>

<!-- bootstrap-5.3.2 start FOLDER LINKS-->
<script src="js/jqueryv3.6.0.js"></script>
<link rel="stylesheet" href="bootstrap_v5/bootstrap-5.3.2-dist/css/bootstrap.min.css" />
<script src="bootstrap_v5/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>

<!-- original datatables start -->

<!-- <link rel="stylesheet" href="bootstrap_v5/bootstrap-5.3.2-dist/css/dataTables.bootstrap5.min.css"> -->
<link rel="stylesheet" href="DataTables/DataTables-1.13.8/css/dataTables.bootstrap5.min.css">
<!-- <script src="bootstrap_v5/bootstrap-5.3.2-dist/js/jquery.dataTables.min.js"></script> -->

<!-- original datatables end -->

<script src="DataTables/datatables.min.js"></script>
<script src="DataTables/datatables.min.css"></script>

<script src="DataTables/DataTables-1.13.8/css/jquery.dataTables.css"></script>
<script src="DataTables/DataTables-1.13.8/js/jquery.dataTables.js"></script>

<!-- search bar and lists of pages -->
<script src="bootstrap_v5/bootstrap-5.3.2-dist/js/dataTables.bootstrap5.min.js"></script> 
<!-- bootstrap-5.3.2 end -->

<!-- bootstrapv5 -->
        <script src="bootstrap_v5/bootstrap-v5-files/dist/js/bootstrap.min.js"></script> 


<!-- products page start -->
<div class="content-container">

    <span id='alert_action'></span>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-8 col-6">
                            <h3 class="card-title">Product List</h3>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-4 col-6" style="text-align: right;">
                            <button type="button" name="add" id="add_button" class="btn btn-success btn-sm">Add</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table id="product_data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Enter By</th>
                                        <th>Status</th>
                                        <!-- clickable sorting icon but not functionable -->
                                        <th>Price<span class="sorting"></span></th> 
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                             
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="productModal">
        <div class="modal-dialog modal-lg">
            <form method="post" id="product_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fas fa-plus"></i> Add Product</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form inputs go here -->
                        
                        <div class="form-group">
                            <label for="category_id">Select Category</label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                <option value="">Select Category</option>
                                <?php echo fill_category_list($connect);?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand_id">Select Brand</label>
                            <select name="brand_id" id="brand_id" class="form-select" required>
                                <option value="">Select Brand</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_name">Enter Product Name</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="product_description">Enter Product Description</label>
                            <textarea name="product_description" id="product_description" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_quantity">Enter Product Quantity</label>
                            <div class="input-group">
                                <input type="text" name="product_quantity" id="product_quantity" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+"> 
                                <select name="product_unit" id="product_unit" class="form-select" required>
                                    <option value="">Select Unit</option>
                                    <option value="Bags">Bags</option>
                                   
                                    <option value="Box">Box</option>                                            
                                  
                                    <option value="Pcs">Pcs</option>
                                    <option value="Meter">Meter</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_base_price">Enter Product Base Price</label>
                            <input type="text" name="product_base_price" id="product_base_price" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+">
                        </div>
                        <div class="form-group">
                            <label for="product_tax">Enter Product Tax (%)</label>
                            <input type="text" name="product_tax" id="product_tax" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+">
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="product_id" id="product_id"/>
                        <input type="hidden" name="btn_action" id="btn_action"/>
                        <input type="submit" name="action" id="action" class="btn btn-info" value="Add Product"/>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="productdetailsModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-plus"></i> Product Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="product_details"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
        var productdataTable = $('#product_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                url:"product_fetch.php",
                type:"POST"
            },
            "columnDefs":[
                {   
                    // "targets":[7, 8, 9], //original code
                    "targets":[8, 9, 10,11],
                    "orderable":false,
                },
            ],
            "pageLength": 10
        });
    
        $('#add_button').click(function(){
            $('#productModal').modal('show');
            $('#product_form')[0].reset();
            $('.modal-title').html("<i class='fa fa-plus'></i> Add Product");
            $('#action').val("Add");
            $('#btn_action').val("Add");
        });
    
        $('#category_id').change(function(){
            var category_id = $('#category_id').val();
            var btn_action = 'load_brand';
            $.ajax({
                url:"product_action.php",
                method:"POST",
                data:{category_id:category_id, btn_action:btn_action},
                success:function(data)
                {
                    $('#brand_id').html(data);
                }
            });
        });
    
        $(document).on('submit', '#product_form', function(event){
            event.preventDefault();
            $('#action').attr('disabled', 'disabled');
            var form_data = $(this).serialize();
            $.ajax({
                url:"product_action.php",
                method:"POST",
                data:form_data,
                success:function(data)
                {
                    $('#product_form')[0].reset();
                    $('#productModal').modal('hide');
                    $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
                    $('#action').attr('disabled', false);
                    productdataTable.ajax.reload();
                }
            })
        });
    
        $(document).on('click', '.view', function(){
            var product_id = $(this).attr("id");
            var btn_action = 'product_details';
            $.ajax({
                url:"product_action.php",
                method:"POST",
                data:{product_id:product_id, btn_action:btn_action},
                success:function(data){
                    $('#productdetailsModal').modal('show');
                    $('#product_details').html(data);
                }
            })
        });
    
        $(document).on('click', '.update', function(){
            var product_id = $(this).attr("id");
            var btn_action = 'fetch_single';
            $.ajax({
                url:"product_action.php",
                method:"POST",
                data:{product_id:product_id, btn_action:btn_action},
                dataType:"json",
                success:function(data){
                    $('#productModal').modal('show');
                    $('#category_id').val(data.category_id);
                    $('#brand_id').html(data.brand_select_box);
                    $('#brand_id').val(data.brand_id);
                    $('#product_name').val(data.product_name);
                    $('#product_description').val(data.product_description);
                    $('#product_quantity').val(data.product_quantity);
                    $('#product_unit').val(data.product_unit);
                    $('#product_base_price').val(data.product_base_price);
                    $('#product_tax').val(data.product_tax);
                    $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Product");
                    $('#product_id').val(product_id);
                    $('#action').val("Edit");
                    $('#btn_action').val("Edit");
                }
            })
        });
    
        $(document).on('click', '.status', function(){
            var product_id = $(this).attr("id");
            var status = $(this).data("status");
            var btn_action = 'status';
            if(confirm("Are you sure you want to change the availability this product?"))
            {
                $.ajax({
                    url:"product_action.php",
                    method:"POST",
                    data:{product_id:product_id, status:status, btn_action:btn_action},
                    success:function(data){
                        $('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
                        productdataTable.ajax.reload();
                    }
                });
            }
            else
            {
                return false;
            }
        });



        $(document).on('click', '.delete', function(){
            var product_id = $(this).attr("id");
            // var delete = $(this).data("delete");
            var btn_action = 'delete';
            if(confirm("Are you sure you want to delete this product?"))
            {
                $.ajax({
                    url:"product_action.php",
                    method:"POST",
                    data:{product_id:product_id, btn_action:btn_action},
                    success:function(data){
                        $('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
                        productdataTable.ajax.reload();
                    }
                });
            }
            else
            {
                return false;
            }
        });



        // var productdataTable = $('#product_data').DataTable({
        // "processing": true,
        // "serverSide": true,
        // "order": [
        //     [7, 'asc'] // 7 is the index of the 'Price' column, 'asc' for ascending order, 'desc' for descending
        // ],
        // // Rest of your DataTables initialization options...
        //          });
    
    });
    
    </script>
    
