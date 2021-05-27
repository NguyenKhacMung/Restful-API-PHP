<?php
header('content-type: application/json');
header("Access-Control-Allow-Methods: DELETE");
include('connection.php');
//Delete record from database

if (isset($_GET['id'])) {
	$id = $_GET['id'];


	$query = "DELETE FROM `tbl_sample` WHERE   `id`='$id'";
	if (mysqli_query($con, $query)) {
		$msg = array("status" =>1 , "msg" => "Record Deleted successfully");
	} else {
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