<?php

header("Content-Type:application/json");
header("Access-Control-Allow-Methods: GET");
include('connection.php');

if (isset($_GET["id"])) {
	if ($_GET["id"] == "" ) {
		echo ("Vui lòng nhập id");
		goto end;
	} else {
		$query = "SELECT * FROM tbl_sample WHERE id='" . $_GET["id"] . "'";
		$resouter = mysqli_query($con, $query);
	}
} else {
	$query = "SELECT * FROM tbl_sample";
	$resouter = mysqli_query($con, $query);
}

$temparray = array();
$total_records = mysqli_num_rows($resouter);

if ($total_records >= 1) {
	while ($row = mysqli_fetch_assoc($resouter)) {
		$temparray[] = $row;
	} 
}   
echo json_encode($temparray);
end:
?>