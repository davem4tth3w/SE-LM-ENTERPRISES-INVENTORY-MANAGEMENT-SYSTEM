<?php

//unit_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO unit (unit_name) 
		VALUES (:unit_name)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':unit_name'	=>	$_POST["unit_name"]  
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'unit Name Added';
		}
	}
	
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "SELECT * FROM unit WHERE unit_id = :unit_id";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':unit_id'	=>	$_POST["unit_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['unit_name'] = $row['unit_name'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE unit set unit_name = :unit_name  
		WHERE unit_id = :unit_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':unit_name'	=>	$_POST["unit_name"],
				':unit_id'		=>	$_POST["unit_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Unit Name Edited';
		}
	}
	if($_POST['btn_action'] == 'status')
	{
		$status = 'active';
		if($_POST['status'] == 'active')
		{
			$status = 'inactive';	
		}
		$query = "
		UPDATE unit 
		SET unit_status = :unit_status 
		WHERE unit_id = :unit_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':unit_status'	=>	$status,
				':unit_id'		=>	$_POST["unit_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Unit status change to ' . $status;
		}
	}


	if($_POST['btn_action'] == 'delete')
	{
		$query = "
		DELETE FROM unit 
		WHERE unit_id = :unit_id
		";
		
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':unit_id'		=>	$_POST["unit_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'unit deleted';
		}
	}
}

?>