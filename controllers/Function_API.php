<?php
    require_once('../config/db.php');
    require_once('jwt_utils.php');

    class Function_API {

        public function FLogin($user, $passwword){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_login(:user,:password);");
            $stmt -> bindParam(':user', $user, PDO::PARAM_STR);
            $stmt -> bindParam(':password', $passwword, PDO::PARAM_STR);
            $stmt -> execute();
            $row = $stmt->fetch();
            if($row['STATUS'] > 0) {
                $username = $row['username'];
                $headers = array('alg'=>'HS256','typ'=>'JWT');
                $payload = array('username'=>$username, 'exp'=>(time() + 60));
                $jwt = generate_jwt($headers, $payload);

                return array('status' => 'SUCCESS','token' => $jwt);
            } else {
                return array('status' => 'ERROR','token' => "Invalid User");
            }
        }

        public function FSaveInfo($id,$fkey,$name,$index,$result,$unit,$datetime){
            $bearer_token = get_bearer_token();
            $is_jwt_valid = is_jwt_valid($bearer_token);

            if($is_jwt_valid) {
                $pdo = ConnectDb::getInstance()->getConnection();
                $stmt = $pdo->prepare("call p_insert_result_data(:id,:fkey,:name,:index,:result,:unit,:datetime);");
                $stmt -> bindParam(':id', $id, PDO::PARAM_STR);
                $stmt -> bindParam(':fkey', $fkey, PDO::PARAM_STR);
                $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
                $stmt -> bindParam(':index', $index, PDO::PARAM_STR);
                $stmt -> bindParam(':result', $result, PDO::PARAM_STR);
                $stmt -> bindParam(':unit', $unit, PDO::PARAM_STR);
                $stmt -> bindParam(':datetime', $datetime, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return array('RESULT' => '0', 'STATUS' => 'Access denied', 'LOGINSERT' => 'FAIL');
            }
        }

        public function FSaveInfoThuyLoi($id,$fkey,$name,$datetime,$result1,$result2,$result3,$result4){
            $bearer_token = get_bearer_token();
            $is_jwt_valid = is_jwt_valid($bearer_token);

            if($is_jwt_valid) {
                $pdo = ConnectDb::getInstance()->getConnection();
                $stmt = $pdo->prepare("call p_insert_data_thuyloi(:id,:fkey,:name,:datetime,:result1,:result2,:result3,:result4);");
                $stmt -> bindParam(':id', $id, PDO::PARAM_STR);
                $stmt -> bindParam(':fkey', $fkey, PDO::PARAM_STR);
                $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
                $stmt -> bindParam(':datetime', $datetime, PDO::PARAM_STR);
                $stmt -> bindParam(':result1', $result1, PDO::PARAM_STR);
                $stmt -> bindParam(':result2', $result2, PDO::PARAM_STR);
                $stmt -> bindParam(':result3', $result3, PDO::PARAM_STR);
                $stmt -> bindParam(':result4', $result4, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return array('RESULT' => '0', 'STATUS' => 'Access denied', 'LOGINSERT' => 'FAIL');
            }
        }

        public function FGet_all_user(){
            $bearer_token = get_bearer_token();
            $is_jwt_valid = is_jwt_valid($bearer_token);

            if($is_jwt_valid) {
                $pdo = ConnectDb::getInstance()->getConnection();
                $stmt = $pdo->prepare("call p_get_alluser();");
                $stmt -> execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return array('error' => 'Access denied');
            }
        }

        public function FGet_tentram(){
            $bearer_token = get_bearer_token();
            $is_jwt_valid = is_jwt_valid($bearer_token);

            if($is_jwt_valid) {
                $pdo = ConnectDb::getInstance()->getConnection();
                $stmt = $pdo->prepare("call p_get_tramquantrac(-1);");
                $stmt -> execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return array('error' => 'Access denied');
            }
        }

        public function FGet_tentram_TNMT(){
            $bearer_token = get_bearer_token();
            $is_jwt_valid = is_jwt_valid($bearer_token);

            if($is_jwt_valid) {
                $pdo = ConnectDb::getInstance()->getConnection();
                $stmt = $pdo->prepare("call p_get_tram_tnmt(1);");
                $stmt -> execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return array('error' => 'Access denied');
            }
        }

        public function FGet_All_DataType(){
            $bearer_token = get_bearer_token();
            $is_jwt_valid = is_jwt_valid($bearer_token);

            if($is_jwt_valid) {
                $pdo = ConnectDb::getInstance()->getConnection();
                $stmt = $pdo->prepare("call p_get_all_datatype();");
                $stmt -> execute();
                return array('status' => true, "data" => array("data_item" => ($stmt->fetchAll(PDO::FETCH_ASSOC))), "total_row" => "1", "msg" => array("message" => null));
            } else {
                return array('status' => false, "data" => array("data_item" => ""), "total_row" => "0", "msg" => array("message" => "Access denied"));
            }
        }

        public function FGet_All_Data(){
            $bearer_token = get_bearer_token();
            $is_jwt_valid = is_jwt_valid($bearer_token);

            if($is_jwt_valid) {
                $pdo = ConnectDb::getInstance()->getConnection();
                $stmt = $pdo->prepare("call p_get_tramquantrac(-1);");
                $stmt -> execute();
                if($stmt->rowCount() > 0){
                    $row = $stmt->fetchAll();
                    $new_array = array();
                    foreach ($row as $result) {
                        $pdo_detail = ConnectDb::getInstance()->getConnection();
                        $stmt_detail = $pdo_detail->prepare("call p_get_detail_id(:idtram);");
                        $stmt_detail -> bindParam(':idtram', $result["ID"], PDO::PARAM_STR);
                        $stmt_detail -> execute();
                        $detail_json = json_encode($stmt_detail->fetchAll(PDO::FETCH_ASSOC));
                        $new_array[] = array("su_id" => $result["ID"], "su_name" => $result["TENTRAM"], "su_location_lat" => $result["FLOCATION_LAT"], "su_location_lng" => $result["FLOCATION_LNG"], "area_id" => $result["FAREA_ID"], "area_name" => $result["area_name"], "su_description" => $result["FDESCRIPTION"], "data_details" => $detail_json);
                    }
                    return array("status" => true, "data" => array("data_item" => $new_array), "total_row" => 1, "msg" => array("message" => null));
                } else {
                    return array("status" => false, "data" => "", "total_row" => 0, "msg" => array("message" => null));
                }
            } else {
                return array('status' => false, "data" => "", "total_row" => "0", "msg" => array("message" => "Access denied"));
            }
        }

        public function FGet_detail_id($id){
            $bearer_token = get_bearer_token();
            $is_jwt_valid = is_jwt_valid($bearer_token);

            if($is_jwt_valid) {
                $pdo = ConnectDb::getInstance()->getConnection();
                $stmt_name = $pdo->prepare("call p_get_tramquantrac(:id);");
                $stmt_name -> bindParam(':id', $id, PDO::PARAM_STR);
                $stmt_name -> execute();
                if($stmt_name->rowCount() > 0){
                    $row = $stmt_name->fetch();
                    $pdo_detail = ConnectDb::getInstance()->getConnection();
                    $stmt_detail = $pdo_detail->prepare("call p_get_detail_id(:idtram);");
                    $stmt_detail -> bindParam(':idtram', $row["ID"], PDO::PARAM_STR);
                    $stmt_detail -> execute();
                    return array('status' => true, "data" => array(0 => array("su_id" => $row["ID"], "su_name" => $row["TENTRAM"], "su_code" => $row["FCODE"], "su_location_lat" => $row["FLOCATION_LAT"], "su_location_lng" => $row["FLOCATION_LNG"], "data_details" => array(0 => ($stmt_detail->fetchAll(PDO::FETCH_ASSOC))))), "msg" => array("message" => null));
                } else {
                    return array('status' => false, "data" => "", "msg" => array("message" => null));
                }
            } else {
                return array('status' => false, "data" => "", "msg" => array("message" => "Access denied"));
            }
        }
    }
?>