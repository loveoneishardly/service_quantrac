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
    require_once('../controllers/Function_API.php');
    echo "HELLO";
?>