<?php
	include __DIR__ . "/../../controllers/Function_API.php";

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET");
	header("Content-Type: application/json; charset=utf-8");

	$data_id = "";
	if(!empty($_GET['su_id'])) {
		$data_id = $_GET['su_id'];
	} else {
		$data_id = "";
	}

	$results = (new Function_API())->FGet_detail_id($data_id);
	echo json_encode($results,JSON_PRETTY_PRINT);

?>