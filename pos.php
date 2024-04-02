<?php
//pos_system.php

include('database_connection.php');
include('function.php');

if (!isset($_SESSION['type'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Point of Sale (POS)</title>

<script src="js/jqueryv3.6.0.js"></script>
    
    <link rel="stylesheet" href="bootstrap_v5/bootstrap-5.3.2-dist/css/bootstrap.min.css" />

    <script src="bootstrap_v5/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="bootstrap_v5/bootstrap-5.3.2-dist/css/dataTables.bootstrap5.min.css">
    
    <script src="bootstrap_v5/bootstrap-5.3.2-dist/js/jquery.dataTables.min.js"></script>
    
    <script src="bootstrap_v5/bootstrap-5.3.2-dist/js/dataTables.bootstrap5.min.js"></script>
    
    <link rel="stylesheet" href="bootstrap_v5/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    
    <script src="bootstrap_v5/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<style>
    <?php include"css/pages_stylesheet/pos.css"?>
</style>
<style>
    .card {
        margin-top: 20px;
    }
</style>
</head>
<body>

<div class="container">
    <h2 class="text-left mt-5">POS</h2>
    <form method="post" id="order_form">
                <div class="modal-content">
                    
                    <div class="modal-body">
                    <div class="column1">
                        <div class="card-1">
                            <div class="card-body-1">

                                <div class="row-1">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Enter Receiver Name</label>
                                        <input type="text" name="inventory_order_name" id="inventory_order_name" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="text" name="inventory_order_date" id="inventory_order_date" class="form-control" required />
                                    </div>
                                </div>

                                </div>
                               
                              
                                        
                                <div class="form-group">
                                    <label>Enter Receiver Address</label>
                                    <input name="inventory_order_address" id="inventory_order_address" class="form-control" required></input>
                                </div>

                                    <h5 class="card-title">Select Products</h5>

                                        <div id="product_search_wrapper">
                                            <input type="text" id="product_search" class="form-control" placeholder="Search product...">
                                            <span id="span_product_details"></span>
                                        </div>
                                         <hr />

                            </div>
                            
                        </div>
                    </div>

                <div class="column2">
                    
                        <div class="card2">
                                <div class="card-body-2">
                                    <h5 class="card-title">Payment</h5>
                                        <div class="form-group">
                                            <label>Enter VAT%</label>
                                            <input type="text" name="vat_percentage" id="vat_percentage" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Discount</label>
                                            <input type="text" name="discount" id="discount" class="form-control" />
                                        </div>
                                        <!-- VAT CODE END -->
                                        <div class="form-group">
                                            <label>Select Payment Method</label>
                                            <select name="payment_status" id="payment_status" class="form-control">
                                                <option value="cash">Cash</option>
                                                <option value="credit">Credit</option>
                                            </select>
                                        </div>
                                    

                   

                                
                                    <hr>
                                    <h5>Total Amount: <span id="total-amount">0</span></h5>
                                    
                                    <div class="modal-footer">
                                        <input type="hidden" name="inventory_order_id" id="inventory_order_id" />
                                        <input type="hidden" name="btn_action" id="btn_action" />
                                        <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                                    </div>
                                </div>
                                    
                             </div>


                    
              
                </div>
            </div>

                   

                    
                </div>
            </form>

            
        </div>
    </div>

</div>

</body>
</html>

<script type="text/javascript">
    
        $(document).ready(function () {
            $('#inventory_order_date').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true
            });
        });
    
    
					$(document).ready(function(){

						var orderdataTable = $('#order_data').DataTable({
							"processing":true,
							"serverSide":true,
							"order":[],
							"ajax":{
								url:"order_fetch.php",
								type:"POST"
							},
							<?php
							if($_SESSION["type"] == 'admin')
							{
							?>
							"columnDefs":[
								{
									"targets":[4, 5, 6, 7, 8, 9, 10],
									"orderable":false,
								},
							],
							<?php
							}
							else
							{
							?>
							"columnDefs":[
								{
									"targets":[4, 5, 6, 7, 8],
									"orderable":false,
								},
							],
							<?php
							}
							?>
							"pageLength": 10
						});

						$(document).ready(function(){
							$('#orderModal').modal('show');
							$('#order_form')[0].reset();
							$('.modal-title').html("<i class='fa fa-plus'></i> Create Order");
							$('#action').val('Add');
							$('#btn_action').val('Add');
							$('#span_product_details').html('');
							add_product_row();
						});

						function add_product_row(count = '')
						{
							var html = '';
							html += '<span id="row'+count+'"><div class="row">';
							html += '<div class="col-md-8">';
							html += '<select name="product_id[]" id="product_id'+count+'" class="form-control selectpicker" data-live-search="true" required>';
							html += '<?php echo fill_product_list($connect); ?>';
							html += '</select><input type="hidden" name="hidden_product_id[]" id="hidden_product_id'+count+'" />';
							html += '</div>';
							html += '<div class="col-md-3">';
							html += '<input type="text" name="quantity[]" class="form-control" required />';
							html += '</div>';
							html += '<div class="col-md-1">';
							if(count == '')
							{
								html += '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
							}
							else
							{
								html += '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">-</button>';
							}
							html += '</div>';
							html += '</div></div><br /></span>';
							$('#span_product_details').append(html);

							$('.selectpicker').selectpicker();
						}

						var count = 0;

						$(document).on('click', '#add_more', function(){
							count = count + 1;
							add_product_row(count);
						});
						$(document).on('click', '.remove', function(){
							var row_no = $(this).attr("id");
							$('#row'+row_no).remove();
						});


						$(document).on('submit', '#order_form', function(event){
    event.preventDefault();
    $('#action').attr('disabled', 'disabled');
    var form_data = $(this).serialize();
    $.ajax({
        url:"order_action.php",
        method:"POST",
        data:form_data,
        success:function(data){
            $('#order_form')[0].reset();
            $('#orderModal').modal('hide');
            $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
            $('#action').attr('disabled', false);
            orderdataTable.ajax.reload();
        }
    });
});

});



    $(document).ready(function() {
        // Function to toggle search box visibility
        $('#span_product_details').on('click', function() {
            $('#product_search').on();
        });

        // Function to filter dropdown options based on search input
        $('#product_search').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#span_product_details select option').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    </script>
