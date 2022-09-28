<?php
	require_once('../controllers/Function_API.php');

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET");

	$data_id = "";
	if(!empty($_GET['dataid'])) {
		$data_id = $_GET['dataid'];
	} else {
		$data_id = "";
	}

	$results = (new Function_API())->FGet_detail_id($data_id);
	echo json_encode($results);

?>