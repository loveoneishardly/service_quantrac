<?php
    include_once('./config/db.php');

    class GetApi_Controller {

        public function LoaDataFromApiCSNN(){
            $arr_header = "";
            $curl_post_data =  array(
            );
            $curl = curl_init();
            curl_setopt_array($curl, 
                array(
                    CURLOPT_URL => 'http://csdl-nganhnuoc.soctrang.gov.vn/API/GetStations',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    //CURLOPT_POSTFIELDS => json_encode($curl_post_data),
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json'
                    ),
                )
            );
            $response = curl_exec($curl);
            return $response;
        }
    }
?>