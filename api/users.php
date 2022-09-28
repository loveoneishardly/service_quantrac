<?php
	require_once('../controllers/Function_API.php');

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET");

	$results = (new Function_API())->FGet_all_user();
	echo json_encode($results);

?>