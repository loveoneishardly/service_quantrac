<?php 
	include_once('./config/db.php');
	$pdo = ConnectDb::getInstance()->getConnection();
	$stmt = $pdo->prepare("call p_get_all_data();");
	$stmt -> execute();
	$stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($stmt);
	//phpinfo(); 
?>
