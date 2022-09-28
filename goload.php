<?php
    session_start();
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
                
                break;
            default:
                echo "Chức năng không tồn tại";
        }
    }

    if(isset($_GET['page'])) {
        /*
        if(!isset($_SESSION["sansang"])){
                header("Location: go?check=_home");
        } else {
            if($_SESSION["sansang"] != "1"){
                header("Location: go?check=_home");
            }
        }*/

        ob_start();

        switch ($_GET['page']) {
            case "_index_manage":
                include("pages/management.php");
                break;
            default:
                include("php/pages/ferror.php");
        }
        echo ob_get_clean();
    }
?>