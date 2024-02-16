<?php
//profile.php

include('database_connection.php');

if(!isset($_SESSION['type']))
{
	header("location:login.php");
}

$query = "
SELECT * FROM user_details 
WHERE user_id = '".$_SESSION["user_id"]."'
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$name = '';
$email = '';
$user_id = '';
foreach($result as $row)
{
	$name = $row['user_name'];
	$email = $row['user_email'];
}

include('sidebar.php');

?>

<style>
    <?php include"css/pages_stylesheet/profile.css"?>
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

<div class="panel panel-default">
	<div class="panel-heading"><h4>Edit Profile</h4></div>
	<div class="panel-body">
		<form method="post" id="edit_profile_form">
			<span id="message"></span>
			<div class="mb-3">
				<label for="user_name" class="form-label">Name</label>
				<input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $name; ?>" required />
			</div>
			<div class="mb-3">
				<label for="user_email" class="form-label">Email</label>
				<input type="email" name="user_email" id="user_email" class="form-control" required value="<?php echo $email; ?>" />
			</div>
			<hr />
			<label>Leave Password blank if you do not want to change</label>
			<div class="mb-3">
				<label for="user_new_password" class="form-label">New Password</label>
				<input type="password" name="user_new_password" id="user_new_password" class="form-control" />
			</div>
			<div class="mb-3">
				<label for="user_re_enter_password" class="form-label">Re-enter Password</label>
				<input type="password" name="user_re_enter_password" id="user_re_enter_password" class="form-control" />
				<span id="error_password"></span>
			</div>
			<div class="mb-3">
				<input type="submit" name="edit_prfile" id="edit_prfile" value="Edit" class="btn btn-info" />
			</div>
		</form>
	</div>
</div>

</div>

<script>
$(document).ready(function(){
$('#edit_profile_form').on('submit', function(event){
	event.preventDefault();
	if($('#user_new_password').val() != '')
	{
		if($('#user_new_password').val() != $('#user_re_enter_password').val())
		{
			$('#error_password').html('<label class="text-danger">Password Not Match</label>');
			return false;
		}
		else
		{
			$('#error_password').html('');
		}
	}
	$('#edit_prfile').attr('disabled', 'disabled');
	var form_data = $(this).serialize();
	$('#user_re_enter_password').attr('required',false);
	$.ajax({
		url:"edit_profile.php",
		method:"POST",
		data:form_data,
		success:function(data)
		{
			$('#edit_prfile').attr('disabled', false);
			$('#user_new_password').val('');
			$('#user_re_enter_password').val('');
			$('#message').html(data);
		}
	})
});
});
</script>


			
