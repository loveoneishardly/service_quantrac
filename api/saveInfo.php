<?php
	require_once('../controllers/Function_API.php');

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST");

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// get posted data
		$data = json_decode(file_get_contents("php://input", true));
		$results = (new Function_API())->FSaveInfo($data->id, $data->fkey, $data->name, $data->index, $data->result, $data->unit, $data->datetime);

		echo json_encode($results);
	}
?>