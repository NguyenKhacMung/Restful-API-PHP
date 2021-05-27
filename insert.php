<?php
header('content-type: application/json');
header("Access-Control-Allow-Methods: POST");
include('connection.php');
if(isset($_POST["first_name"]))
{
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];

	$query = "INSERT INTO `tbl_sample` (`first_name`, `last_name`) VALUES ('$first_name', '$last_name');";

	if (mysqli_query($con, $query)) {
		$msg = array("status" =>1 , "msg" => "Your record inserted successfully");
	} else {
		$msg = array("status" =>0 , "msg" => "Lỗi");
	}
}
else
{
	$msg = array("status" =>0 , "msg" => "Lỗi");
}

$json = $msg;

header('content-type: application/json');
echo json_encode($json);



?>