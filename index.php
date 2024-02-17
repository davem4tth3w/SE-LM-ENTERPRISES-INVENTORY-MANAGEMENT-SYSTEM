
<!-- <link rel="stylesheet" href="css/headerstylesheet.css"> -->
<?php
//index.php
include('database_connection.php');
include('function.php');

if(!isset($_SESSION["type"]))
{
	header("location:login.php");
}

// include('header.php');



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
			<?php include "css/pages_stylesheet/dashboard.css"?>
		</style>


	<div class="content-container">
		
		<?php	include('sidebar.php');?>
				
	<div class="row">
		<div class="dashbrd-header">
			<h4>Dashboard</h4>
			<!-- <h5>bootstrap v5</h5> -->
		</div>

		<?php
		if ($_SESSION['type'] == 'admin') {
		?>
			<div class="col-md-3">
				<div class="card">
					<div class="card-header"><strong>Total User</strong></div>
					<div class="card-body text-center">
						<h1><?php echo count_total_user($connect); ?></h1>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<div class="card-header"><strong>Total Category</strong></div>
					<div class="card-body text-center">
						<h1><?php echo count_total_category($connect); ?></h1>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<div class="card-header"><strong>Total Brand</strong></div>
					<div class="card-body text-center">
						<h1><?php echo count_total_brand($connect); ?></h1>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<div class="card-header"><strong>Total Item in Stock</strong></div>
					<div class="card-body text-center">
						<h1><?php echo count_total_product($connect); ?></h1>
					</div>
				</div>
			</div>
		<?php
		}
		?>
		
		<div class="col-md-4">
			<div class="card">
				<div class="card-header"><strong>Total Order Value</strong></div>
				<div class="card-body text-center">
					<h1>P<?php echo count_total_order_value($connect); ?></h1>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header"><strong>Total Cash Order Value</strong></div>
				<div class="card-body text-center">
					<h1>P<?php echo count_total_cash_order_value($connect); ?></h1>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header"><strong>Total Credit Order Value</strong></div>
				<div class="card-body text-center">
					<h1>P<?php echo count_total_credit_order_value($connect); ?></h1>
				</div>
			</div>
		</div>
		<hr />
		<?php
		if ($_SESSION['type'] == 'admin') {
		?>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header"><strong>Total Order Value User wise</strong></div>
					<div class="card-body text-center">
						<?php echo get_user_wise_total_order($connect); ?>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</div>

</div>
