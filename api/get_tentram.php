<?php
	require_once('../controllers/Function_API.php');

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET");

	$results = (new Function_API())->FGet_tentram_TNMT();
	echo json_encode($results);

?>