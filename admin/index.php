<?php
session_start();
if (isset($_SESSION['admin_login_id'])) {
    echo "<script>window.location.href='dashboard.php'</script>";
}

require('../db-xyz-abc.php');
require('../php_helper.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Login</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <link href="css/main.css" rel="stylesheet">

    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link href="css/Custom.css" rel="stylesheet">
</head>
<style>
    #login-lottie{
         width: 100%;
         height: 100%;
    }
    .main-section{
     
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 100%;
    }
    @media screen and (max-width:1000px) {
        body {
            overflow-y: auto;
        }
       
    }
    @media screen and (max-width:768px){
         .main-section{
            position: relative;
            margin-top: 50px;
            margin-bottom: 50;
            left: 0;
            top: 0;
            transform: translate(0, 0);
         }
    }
   
</style>

<body style="background-color:  #cce6ff;">
    <section class="main-section ">


        <section class="container pb-5 pb-lg-0">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-12 d-flex justify-content-center align-items-center mb-md-0 mb-4">
                    <lottie-player id="login-lottie" src="https://assets4.lottiefiles.com/packages/lf20_apz6z8ne.json" background="transparent" speed="1" loop autoplay >
                    </lottie-player>
                </div>

                <!-- ----------------------- Login form start------------------ -->


                <div class="col-lg-5 col-md-6 col-12 d-flex justify-content-center align-items-center" id="login-form-div">
                    <form method="post" autocomplete="off" id="dashboard-login" onsubmit="loginSubmit('dashboard-login',event)" class="w-100 p-4 pt-5 shadow bg-body rounded" style="background-color:#FFFFFF;">
                        <h3 class="text-center" style="color: #ffaa00;font-weight:600">Welcome Back</h3>
                        <p class="text-center text-danger" id="login-error"></p>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required>

                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>

                        </div>
                        <div class="mb-3 text-center" id="submit-btn">
                            <button type="submit" name="login" class="btn btn-primary mt-4 pt-2 pb-2 pl-5 pr-5">Submit</button>
                        </div>
                        <div class="mb-3 text-center">
                            <a href="#" id="reset-pass-btn">Reset Password</a>
                        </div>
                    </form>
                </div>
                <!-- ----------------------- Login form end------------------ -->

                <!-- --------------------------------- otp verification form start------------------- -->


                <div class="col-lg-5 col-md-6 col-12 d-none justify-content-center align-items-center" id="otp-verification-div">
                    <form method="post" autocomplete="off" id="otp-veri-form" onsubmit="otp_verification('otp-veri-form',event)" class="w-100 p-4 pt-5 shadow bg-body rounded" style="background-color:#FFFFFF;">
                        <h3 class="text-center" style="color: #ffaa00;font-weight:600">OTP Verification</h3>
                        <p class="text-center text-danger" id="login-error2"></p>

                        <div class="mb-3">
                            <label class="text-center" id="counter-box">OTP</label>
                            <input type="text" name="otp" class="form-control" required placeholder="Enter OTP">
                        </div>
                        <div class="mb-3 text-center" id="otp-submit">
                            <button type="submit" name="verify" class="btn btn-primary mt-4 pt-2 pb-2 pl-5 pr-5">Verify</button>
                        </div>
                    </form>
                </div>


                <!-- --------------------------------- otp verification form end------------------- -->

                <!-- ------------------------------------ Forgot Password Start --------------------- -->


                <div class="col-lg-5 col-md-6 col-12 d-none justify-content-center align-items-center" id="reset_pass_form_box">
                    <form method="post" autocomplete="off" id="reset-otp-form" class="w-100 p-4 pt-5 shadow bg-body rounded" style="background-color:#FFFFFF;" onsubmit="send_reset_otp('reset-otp-form', event)">
                        <h3 class="text-center" style="color: #ffaa00;font-weight:600">Reset Password </h3>
                        <p class="text-center text-danger" id="login-error3"></p>

                        <div class="mb-3">
                            <label class="text-center">Email</label>
                            <input type="email" name="email" class="form-control" required placeholder="Enter Registered Email">
                        </div>
                        <div class="mb-3 text-center" id="reset-otp-submit">
                            <button type="submit" name="verify" class="btn btn-primary mt-4 pt-2 pb-2 pl-5 pr-5">Send OTP</button>
                        </div>
                    </form>
                </div>


                <div class="col-lg-5 col-md-6 col-12 d-none justify-content-center align-items-center" id="reset-otp-verification-div">
                    <form method="post" autocomplete="off" id="reset_otp-veri-form" onsubmit="reset_otp_verification('reset_otp-veri-form',event)" class="w-100 p-4 pt-5 shadow bg-body rounded" style="background-color:#FFFFFF;">
                        <h3 class="text-center" style="color: #ffaa00;font-weight:600">OTP Verification</h3>
                        <p class="text-center text-danger" id="login-error4"></p>

                        <div class="mb-3">
                            <label class="text-center">OTP</label>
                            <input type="text" name="otp" class="form-control" required placeholder="Enter OTP">
                        </div>
                        <div class="mb-3 text-center" id="reset-otp-verify">
                            <button type="submit" name="verify" class="btn btn-primary mt-4 pt-2 pb-2 pl-5 pr-5">Verify</button>
                        </div>
                    </form>
                </div>


                <div class="col-lg-5 col-md-6 col-12 d-none justify-content-center align-items-center" id="new-password-div">
                    <form method="post" autocomplete="off" id="new-pass-form" class="w-100 p-4 pt-5 shadow bg-body rounded" style="background-color:#FFFFFF;" onsubmit="reset_password('new-pass-form', event)">
                        <h3 class="text-center" style="color: #ffaa00;font-weight:600">Change Password</h3>
                        <p class="text-center text-danger" id="login-error5"></p>

                        <div class="mb-3">
                            <input type="password" name="NewPassword" id="n-pass" class="form-control" required placeholder="New Password">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="CPassword" id="c-pass" class="form-control" required placeholder="Confirm Password">
                        </div>
                        <div class="mb-3 text-center" id="new-pass-reset">
                            <button type="submit" name="verify" class="btn btn-primary mt-4 pt-2 pb-2 pl-5 pr-5">Reset</button>
                        </div>
                    </form>
                </div>





            </div>
        </section>

    </section>
    <!-- ----------------------- Pop Up --------------------  -->


    <div class="internet-status ">
        <div class="int-status-content bg-white shadow rounded pt-3 pb-5">
            <div class="d-flex justify-content-center align-items-center">
                <img src="img/offline.gif" width="300">
            </div>
            <div class="text-center mt-3 ">
                <h4 class="text-danger text-uppercase font-weight-bold" style="font-size: 25px;">You Are Offline !</h4>
                <p class="text-center text-info"> Internet Required</p>
            </div>
        </div>
    </div>




    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js?v=<?php echo time() ?>"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="js/countdowntimer.js"></script>
    <script src="js/admin_login.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>