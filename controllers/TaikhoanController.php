<?php
    include_once('./config/db.php');

    class TaikhoanController {

        public function FLogin_web($user, $passwword){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_login(:user,:password);");
            $stmt -> bindParam(':user', $user, PDO::PARAM_STR);
            $stmt -> bindParam(':password', $passwword, PDO::PARAM_STR);
            $stmt -> execute();
            $row = $stmt->fetch();
            if($row['STATUS'] > 0) {
                $_SESSION["manhanvien"] = $row["id"];
                $_SESSION["taikhoan"] = $row["username"];
                $_SESSION["tennhanvien"] = $row["fname"];
                $_SESSION["ngaysinh"] = $row["fbirthday"];
                $_SESSION["gioitinh"] = $row["fGender"];
                $_SESSION["diachi"] = $row["faddress"];
                $_SESSION["email"] = $row["femail"];
                $_SESSION["admin"] = $row["fadmin"];
                $_SESSION["sansang"] = $row["STATUS"];
                return array('STATUS' => 'SUCCESS','MESSAGE' => "SUCCESS");
            } else {
                return array('STATUS' => 'ERROR','MESSAGE' => $row["STATUS"]);
            }
        }

        public function FLogout_web(){
            if(isset($_SESSION["manhanvien"])){
                unset($_SESSION["manhanvien"]);
                session_destroy();
                return 1;
            } else {
                return 0;
            }
        }
    }
?>