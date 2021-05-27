<?php
header('content-type: application/json');
header("Access-Control-Allow-Methods: PUT");
include('connection.php');
if(isset($_POST["first_name"]))
{
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$id = $_POST['id'];

	$query = "UPDATE `tbl_sample` SET `first_name`='$first_name' ,`last_name`='$last_name' WHERE  `id`='$id'";
	if (mysqli_query($con, $query)) {
		$msg = array("status" =>1 , "msg" => "Record Updated successfully");
	}else {
		$msg = array("status" =>0 , "msg" => "Lỗi");
	}
}
else
{
	$msg = array("status" =>0 , "msg" => "Lỗi");
}


$json = $msg;

echo json_encode($json);
?>