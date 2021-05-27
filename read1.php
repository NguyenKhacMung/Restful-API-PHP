<?php
$id = $_POST['id'];
$url = "http://localhost/webservice/api.php?id=".$id."";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$result = json_decode($response);
$output = '';
$ids = array();
if(count($result) > 0)
{
	foreach($result as $row)
	{
			
		$ids[] = $row->first_name;
		$ids[] = $row->last_name;
		
	}
}

echo json_encode($ids);

?>