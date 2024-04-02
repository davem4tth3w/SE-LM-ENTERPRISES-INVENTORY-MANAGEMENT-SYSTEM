<?php

//unit_fetch.php

include('database_connection.php');

$query = '';

$output = array();

$query .= "SELECT * FROM unit ";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE unit_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR unit_status LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST['order']))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else   
{
	$query .= 'ORDER BY unit_id DESC ';
}

if($_POST['length'] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
	$status = '';
	if($row['unit_status'] == 'active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['unit_id'];
	$sub_array[] = $row['unit_name'];
	$sub_array[] = $status;
	$sub_array[] = '<button type="button" name="update" id="'.$row["unit_id"].'" class="btn btn-warning btn-xs update"><i class="fa-solid fa-pen-to-square"></i></button>';
	$sub_array[] = '<button type="button" name="status" id="'.$row["unit_id"].'" class="btn btn-success btn-xs status" data-status="'.$row["unit_status"].'">status</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["unit_id"].'" class="btn btn-danger btn-xs delete"><i class="fa-solid fa-trash"></i></button>';
	$data[] = $sub_array;
}

$output = array(
	"draw"			=>	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"				=>	$data
);

function get_total_all_records($connect)
{
	$statement = $connect->prepare("SELECT * FROM unit");
	$statement->execute();
	return $statement->rowCount();
}

echo json_encode($output);

?>