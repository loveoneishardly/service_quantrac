<?php
	include __DIR__ . "/../../controllers/Function_API.php";
	#include_once(dirname(__FILE__) . '../../controllers/Function_API.php');
	#require_once('../../controllers/Function_API.php');

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET");
	header("Content-Type: application/json");

	$results = (new Function_API())->FGet_AllTentram();
	echo json_encode($results);

?>