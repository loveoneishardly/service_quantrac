<?php
    session_start();
    include_once('controllers/TaikhoanController.php');
    include_once('controllers/AppController.php');

    if(isset($_GET['check'])) {
        ob_start();
        switch ($_GET['check']) {
            case "_home":
                include("pages/index.php");
            break;
            case "_login":
                include("pages/login.php");
            break;
        }
        echo ob_get_clean();
    }


    if(isset($_POST['for'])) {
        switch ($_POST['for']) {
            case "login":
                if(isset($_POST['taikhoan']) && isset($_POST['matkhau']) ){
                    $md5pass = md5($_POST['matkhau']);
                    $pass = md5(substr($md5pass,0,strlen($md5pass)/2));
                    $res = (new TaikhoanController())->FLogin_web($_POST['taikhoan'], $pass);
                    echo json_encode($res);
                } else {
                    echo json_encode(array("STATUS" => "ERROR", "MESSAGE" => "ACCESS DENIED"));
                }
            break;
            case "_logout":
                echo (new TaikhoanController())->FLogout_web();
            break;
            case "loadHistory":
                $res = (new AppController())->LoadHistory();
                echo json_encode($res);
            break;
            default:
                echo "Chức năng không tồn tại";
        }
    }

    if(isset($_GET['for'])) {
        switch ($_GET['for']) {
            case "loadHistory":
                $res = (new AppController())->LoadHistory();
                echo json_encode($res);
            break;
            case "loadUser":
                $res = (new AppController())->LoadUser();
                echo json_encode($res);
            break;
            case "loadStation":
                $res = (new AppController())->LoadStation();
                echo json_encode($res);
            break;
            default:
                echo "Chức năng không tồn tại";
            break;
        }
    }

    if(isset($_GET['page'])) {
        if(!isset($_SESSION["sansang"])){
                header("Location: go?check=_home");
        } else {
            if($_SESSION["sansang"] != "1"){
                header("Location: go?check=_home");
            }
        }

        ob_start();

        switch ($_GET['page']) {
            case "_index_manage":
                include("pages/management.php");
            break;
            default:
                include("pages/ferror.php");
            break;
        }
        echo ob_get_clean();
    }
?>