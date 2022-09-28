<?php
	require_once('../controllers/Function_API.php');

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST");

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// get posted data
		$data = json_decode(file_get_contents("php://input", true));
		$results = (new Function_API())->FSaveInfoThuyLoi($data->id, $data->fkey, $data->name, $data->datetime, $data->result1, $data->result2, $data->result3, $data -> result4);

		echo json_encode($results);
	}
?>