<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Service Quan Trắc - VNPT STG</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="lib/images/icons/logo.ico"/>
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
            #progressbar {
                font-weight: bold;
                font-size: 14px;
                color: #FFFFFF;
            }
            .sk-chase {
                width: 40px;
                height: 40px;
                position: relative;
                animation: sk-chase 2.5s infinite linear both;
            }
            .sk-chase-dot {
                width: 100%;
                height: 100%;
                position: absolute;
                left: 0;
                top: 0;
                animation: sk-chase-dot 2.0s infinite ease-in-out both;
            }
            .sk-chase-dot:before {
                content: '';
                display: block;
                width: 25%;
                height: 25%;
                background-color: #FFFFFF;
                border-radius: 100%;
                animation: sk-chase-dot-before 2.0s infinite ease-in-out both;
            }
            .sk-chase-dot:nth-child(1) { animation-delay: -1.1s; }
            .sk-chase-dot:nth-child(2) { animation-delay: -1.0s; }
            .sk-chase-dot:nth-child(3) { animation-delay: -0.9s; }
            .sk-chase-dot:nth-child(4) { animation-delay: -0.8s; }
            .sk-chase-dot:nth-child(5) { animation-delay: -0.7s; }
            .sk-chase-dot:nth-child(6) { animation-delay: -0.6s; }
            .sk-chase-dot:nth-child(1):before { animation-delay: -1.1s; }
            .sk-chase-dot:nth-child(2):before { animation-delay: -1.0s; }
            .sk-chase-dot:nth-child(3):before { animation-delay: -0.9s; }
            .sk-chase-dot:nth-child(4):before { animation-delay: -0.8s; }
            .sk-chase-dot:nth-child(5):before { animation-delay: -0.7s; }
            .sk-chase-dot:nth-child(6):before { animation-delay: -0.6s; }
            @keyframes sk-chase {
                100% { transform: rotate(360deg); }
            }
            @keyframes sk-chase-dot {
                80%, 100% { transform: rotate(360deg); }
            }
            @keyframes sk-chase-dot-before {
                50% {
                    transform: scale(0.4);
                } 100%, 0% {
                    transform: scale(1.0);
                }
            }
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
                                <div id="progressbar" style="display: none;width: 100%" align="center">
                                    <div class="sk-chase">
                                        <div class="sk-chase-dot"></div>
                                        <div class="sk-chase-dot"></div>
                                        <div class="sk-chase-dot"></div>
                                        <div class="sk-chase-dot"></div>
                                        <div class="sk-chase-dot"></div>
                                        <div class="sk-chase-dot"></div>
                                    </div>
                                </div>
                                <button class="login100-form-btn" onclick="$('#fdangnhap').submit();" id="login">
                                    Login
                                </button>
                            </div>
                            <div id="error1" align="center" style="display: none;">
                                <p style="color: red;font-weight: bold">Tài khoản không tồn tại.</p>
                            </div>
                            <div id="error2" align="center" style="display: none;">
                                <p style="color: red;font-weight: bold">Tên đăng nhập không đúng.</p>
                            </div>
                            <div id="error3" align="center" style="display: none;">
                                <p style="color: red;font-weight: bold">Mật khẩu không đúng.</p>
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
        <script src="lib/js/lib.js"></script>
    </body>
    <script type="text/javascript">
        $(function(){
            function showDiv() {
			    document.getElementById('login').style.display = "none";
			    document.getElementById('progressbar').style.display = "block";
			}
            $('#fdangnhap').on('submit', function(donard){
                donard.preventDefault();
                var a = $(this).find('input[name="username"]').val().trim();
			    var b = $(this).find('input[name="password"]').val().trim();
                if (a != '' && b != ''){
                    $.ajax({
						type: 'POST',
						url: 'go',
						data: {
							for: "login",
							taikhoan: a,
							matkhau: MD5(b),
							recaptcha: ''
						},
						beforeSend: function(){
							showDiv();
						}
					}).done(function(ret){
                        var val = JSON.parse(ret);
                        if(val.STATUS == "SUCCESS"){
                            window.location.href = "go?page=_index_manage";
                        } else if (val.MESSAGE == "-1"){
                            document.getElementById('error1').style.display = "none";
                            document.getElementById('error2').style.display = "block";
                            document.getElementById('error3').style.display = "none";
                            document.getElementById('login').style.display = "block";
							document.getElementById('progressbar').style.display = "none";
                        } else if (val.MESSAGE == "-2"){
                            document.getElementById('error1').style.display = "none";
                            document.getElementById('error3').style.display = "block";
                            document.getElementById('login').style.display = "block";
							document.getElementById('progressbar').style.display = "none";
                        } else if(val.STATUS == "ERROR"){
                            document.getElementById('error1').style.display = "block";
                            document.getElementById('error2').style.display = "none";
                            document.getElementById('error3').style.display = "none";
                            document.getElementById('login').style.display = "block";
							document.getElementById('progressbar').style.display = "none";
                        } 
                    });
                }
            });
            $('#fdangnhap').on('keypress',function(e) {
                if(e.which == 13) {
                    $('#fdangnhap').submit();
                }
            });
        });
    </script>
</html>