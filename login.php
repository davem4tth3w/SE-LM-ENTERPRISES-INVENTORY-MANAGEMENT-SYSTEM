<?php
//login.php

include('database_connection.php');



if(isset($_SESSION['type']))
{
	header("location:index.php");
}

$message = '';

if(isset($_POST["login"]))
{
	$query = "
	SELECT * FROM user_details 
		WHERE user_email = :user_email
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
				'user_email'	=>	$_POST["user_email"]
			)
	);
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if($row['user_status'] == 'Active')
			{
				if(password_verify($_POST["user_password"], $row["user_password"]))
				{
				
					$_SESSION['type'] = $row['user_type'];
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['user_name'] = $row['user_name'];
					header("location:index.php");
				}
				else
				{
					$message = "<label>Wrong Password</label>";
				}
			}
			else
			{
				$message = "<label>Your account is disabled, Contact Master</label>";
			}
		}
	}
	else
	{
		$message = "<label>Wrong Email Address</labe>";
	}
}



?>

<style>
    <?php include"css/pages_stylesheet/login_stylesheet.css"?>
</style>

<!DOCTYPE html>
<html>
	<head>
		<title>LM ENTERPRISES LOGIN</title>		

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


			<div class="login-container">
					

				<div class="panel panel-default">
					<div class="log-in-header">
						<h2>LM ENTERPRISES</h2>
						</div>

						<div class="panel-heading"><h4>Login</h4></div>
							<div class="panel-body">
								<form id="loginForm" method="post">
									<?php echo $message; ?>
									<div class="form-group">
										<label>User Email</label>
										<input type="text" name="user_email" class="form-control" required />
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="user_password" class="form-control" required />
									</div>
									<div class="form-group" id="additionalFieldGroup">
										<!-- Additional fields will be appended here -->
										<!-- <button onclick="addAdditionalField()">Add Additional Field</button> -->
									</div>
									<div class="form-group">
										<input type="submit" name="login" value="Login" class="btn btn-info" />
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
	

	</body>

	<script>
    function addAdditionalField() {
        var additionalFieldGroup = document.getElementById('additionalFieldGroup');
        var checkboxInput = document.createElement('input');
        checkboxInput.type = 'checkbox';
        checkboxInput.name = 'remember_me';
        checkboxInput.id = 'rememberMe';
        var checkboxLabel = document.createElement('label');
        checkboxLabel.htmlFor = 'rememberMe';
        checkboxLabel.appendChild(document.createTextNode('Remember Me'));
        additionalFieldGroup.appendChild(checkboxInput);
        additionalFieldGroup.appendChild(checkboxLabel);
    }
</script>
</html>