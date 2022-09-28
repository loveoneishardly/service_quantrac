<?php
	require_once('../controllers/Function_API.php');

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST");

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// get posted data: passdefault = Vnpt@123
		$data = json_decode(file_get_contents("php://input", true));
		$p = md5($data->password);
		$pass = md5(substr($p,0,strlen($p)/2));
		$results = (new Function_API())->FLogin($data->username, $pass);

		echo json_encode($results);
	}
?>