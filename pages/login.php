<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Service Quan Trắc - VNPT STG</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="lib/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="lib/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="lib/fonts/iconic/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="lib/vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="lib/vendor/css-hamburgers/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="lib/vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" type="text/css" href="lib/vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="lib/vendor/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="lib/css/util.css">
        <link rel="stylesheet" type="text/css" href="lib/css/main.css">
        <style>
            body {
                font-family: "Open Sans", sans-serif;
                height: 100vh;
                background: url("lib/images/background.jpg") 50% fixed;
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form" id="fdangnhap" method="post">
                        <span class="login100-form-title p-b-26">
                            LOG IN
                        </span>
                        <div class="wrap-input100 validate-input" data-validate = "Enter username">
                            <input class="input100" type="text" name="username">
                            <span class="focus-input100" data-placeholder="Username"></span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <span class="btn-show-pass">
                                <i class="zmdi zmdi-eye"></i>
                            </span>
                            <input class="input100" type="password" name="password">
                            <span class="focus-input100" data-placeholder="Password"></span>
                        </div>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" onclick="$('#fdangnhap').submit();" id="login">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="dropDownSelect1"></div>
        <script src="lib/vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="lib/vendor/animsition/js/animsition.min.js"></script>
        <script src="lib/vendor/bootstrap/js/popper.js"></script>
        <script src="lib/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="lib/vendor/select2/select2.min.js"></script>
        <script src="lib/vendor/daterangepicker/moment.min.js"></script>
        <script src="lib/vendor/daterangepicker/daterangepicker.js"></script>
        <script src="lib/vendor/countdowntime/countdowntime.js"></script>
        <script src="lib/js/main.js"></script>
    </body>
    <script type="text/javascript">
        $(function(){
            $('#fdangnhap').on('submit', function(donard){
                donard.preventDefault();
                var a = $(this).find('input[name="username"]').val().trim();
			    var b = $(this).find('input[name="password"]').val().trim();
                //console.log(window.location.href);
                window.location.href = "go?page=_index_manage";
            });
            $('#fdangnhap').on('keypress',function(e) {
                if(e.which == 13) {
                    $('#fdangnhap').submit();
                }
            });
        });
    </script>
</html>