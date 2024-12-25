<?php
	include __DIR__ . "/../../controllers/Function_API.php";

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET");
	header("Content-Type: application/json; charset=utf-8");

	$data_id = "";
	$data_parameter = "";
	$data_begin = "";
	$data_end = "";
	if(!empty($_GET['id'])) {
		$data_id = $_GET['id'];
	} else {
		$data_id = "";
	}
	
	if(!empty($_GET['parameter'])) {
		$data_parameter = $_GET['parameter'];
	} else {
		$data_parameter = "";
	}

	if(!empty($_GET['begin'])) {
		$data_begin = $_GET['begin'];
	} else {
		$data_begin = "";
	}

	if(!empty($_GET['end'])) {
		$data_end = $_GET['end'];
	} else {
		$data_end = "";
	}

	$results = (new Function_API())->FGet_detail_id_time_Series($data_id, $data_parameter, $data_begin, $data_end);
	echo json_encode($results);

?>