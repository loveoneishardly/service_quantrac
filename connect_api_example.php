<?php
/*
    $service_url = 'http://localhost/servive_quangtrac/resigter.php';
    $curl = curl_init($service_url);
    $curl_post_data =  array(
        "username"        => "minhminh",
        "password"        => "123"
    );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($curl_post_data));
    $curl_response = curl_exec($curl);

    echo $curl_response;

    $arr_header = "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6InJveSIsImV4cCI6MTY2MzUxMzY1MX0.E146z0SWqmZm0tuwBid4JCy3ZZ5EwsibJ-ee2RXyHTc";
    $curl = curl_init();
    curl_setopt_array($curl, 
        array(
            CURLOPT_URL => 'http://localhost/servive_quangtrac/api/users.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                $arr_header,
                'Content-Type: application/json'
            ),
        )
    );

    $response = curl_exec($curl);
    echo $response;

    $arr_header = "Authorization: VNPTSTG eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6Im1pbmgiLCJleHAiOjE2NjM2NDcwMDl9.DhLqeiVkns-tkh2pWNWxR_9AuoGMVuj47vm1tUmtS00";
    $curl = curl_init();
    curl_setopt_array($curl, 
        array(
            CURLOPT_URL => 'http://localhost/service_quangtrac/api/get_alldata.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                $arr_header,
                'Content-Type: application/json'
            ),
        )
    );

    $response = curl_exec($curl);
    echo $response;
    */
    //require_once('../controllers/Function_API.php');
    //echo "HELLO SERVICE QUAN TRAC";
	
	
	/* $serverName = "localhost\MAYLAB"; 
	$uid = "sa";   
	$pwd = "Vnpt@123";  
	$databaseName = "MANAGEMENT"; 

	$connectionInfo = array( "UID"=>$uid,                            
							 "PWD"=>$pwd,                            
							 "Database"=>$databaseName); */

	/* Connect using SQL Server Authentication. */  
	/*$conn = sqlsrv_connect( $serverName, $connectionInfo);  

	$tsql = "SELECT * from Datalogger";  */

	/* Execute the query. */  

	/*$stmt = sqlsrv_query( $conn, $tsql);  

	if ( $stmt )  
	{  
		 echo "Statement executed.<br>\n";  
	}   
	else   
	{  
		 echo "Error in statement execution.\n";  
		 die( print_r( sqlsrv_errors(), true));  
	}*/
    $jwt = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6InNvY3RyYW5nIiwiZXhwIjoxNjY2MDA2MDExfQ.o7_eW_x3sSyNg8vNh1EYGrPCCjQvC6tlOzCXTLe7z60";
    $tokenParts = explode('.', $jwt);
    $payload = base64_decode($tokenParts[1]);
    echo $payload."***";
    $expiration = json_decode($payload)->exp;
    echo (($expiration - time()) < 0)."***";
	$is_token_expired = ($expiration - time()) < 0;
    echo time()."***";
    if ($is_token_expired) {
		echo 'FALSE';
	} else {
		echo 'TRUE';
	}
?>