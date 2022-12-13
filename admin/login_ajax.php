<?php


session_start();
require('../db-xyz-abc.php');
require('../php_helper.php');

if (isset($_POST['dashboardlogin'])) {
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));


    $select = "SELECT * FROM `admin_access_info` where u_name = '$username'";
    $query = mysqli_query($conn, $select);
    $row = mysqli_num_rows($query);

    $response_arr = array();


    if ($row != 0) {
        $fetch = mysqli_fetch_assoc($query);
        if (password_verify($password, $fetch['u_pass'])) {
            // $_SESSION['acces_otp'] = mt_rand(100000, 1000000);
            $_SESSION['acces_otp'] = 123456;
            $u_email = $fetch['u_email'];
            $_SESSION['admin_login_email'] = $u_email;
            $_SESSION['admin_name'] = $fetch['u_name'];
            $_SESSION['admin_pic'] = $fetch['u_pic'];

            $receiver = $u_email;
            $body = "
                <style>
                @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');
                </style>
               
                <table style = 'background-color:#252525ef;font-family: Nunito, sans-serif;width: 100%;padding: 50px 10px;'>
                  <tr>
                      <th colspan='2' style='color: #FFFFFF;padding: 5px 10px;font-size:20px'>Device Verification</th>
                  </tr>
                  <tr>
                     <td colspan='3' style='color: #FFFFFF;text-align: center;'>To login in admin dashboard please verify your device.</td>
                  </tr>
                  <tr>
                      <th colspan='2' style='color: #FFFFFF;padding-top: 40px;'><span style='background-color:#4db8ff;padding: 8px 25px;'>$_SESSION[acces_otp]</span></th>
                  </tr>
               </table>
                ";
            $sub  = "Device Verification";

            array_push($response_arr,  'true');
            array_push($response_arr, 'An Otp Is Sent To Your Registered Email Id');



            if (send_mail($receiver, $body, $sub)) {
            } else {
                array_push($response_arr,  'false');
                array_push($response_arr, 'Unable To Login');
            }
        } else {
            array_push($response_arr,  'false');
            array_push($response_arr, 'Incorrect Password');
        }
    } else {
        array_push($response_arr,  'false');
        array_push($response_arr, 'Invalid Username');
    }


    echo json_encode($response_arr);
}

if (isset($_POST['otp_verification'])) {
    $otp = mysqli_real_escape_string($conn, trim($_POST['otp']));

    $otp_response_arr = array();
    if ($otp == $_SESSION['acces_otp']) {
        array_push($otp_response_arr,  'true');
        array_push($otp_response_arr, 'Login Successfull');
        unset($_SESSION['acces_otp']);
        // --------------------- user info setting after login--------------
        $_SESSION['admin_login_id'] = session_id();
    } else {
        array_push($otp_response_arr,  'false');
        array_push($otp_response_arr, 'Invalid OTP');
    }
    echo json_encode($otp_response_arr);
}



if (isset($_POST['reset_otp_send'])) {
    $get_reset_email = realEscape('email');

    $check_email = mysqli_query($conn, "SELECT * FROM `admin_access_info` where u_email = '$get_reset_email'");
    $check_r = mysqli_num_rows($check_email);

    $reset_otp = array();
    if ($check_r != 0) {
        $_SESSION['reset_otp'] = mt_rand(100000, 1000000);
        $_SESSION['reset_email'] = $get_reset_email;

        $receiver = $get_reset_email;
        $body = "
        
       
        <table style = 'background-color:#252525ef;font-family: Nunito, sans-serif;width: 100%;padding: 50px 10px;'>
          <tr>
              <th colspan='2' style='color: #FFFFFF;padding: 5px 10px;font-size:20px'>Device Verification</th>
          </tr>
          <tr>
             <td colspan='3' style='color: #FFFFFF;text-align: center;'>To reset your password, please verify your device.</td>
          </tr>
          <tr>
              <th colspan='2' style='color: #FFFFFF;padding-top: 40px;'><span style='background-color:#4db8ff;padding: 8px 25px;'>$_SESSION[reset_otp]</span></th>
          </tr>
       </table>
        ";
        $sub  = "Device Verification";

        if (send_mail($receiver, $body, $sub)) {
            array_push($reset_otp,  'true');
            array_push($reset_otp, 'An Otp Is Sent To Your Registered Email Id');
        } else {
            array_push($reset_otp,  'false');
            array_push($reset_otp, 'Failed To Send OTP. Please Try Again Latter');
        }
    } else {
        array_push($reset_otp,  'false');
        array_push($reset_otp, 'Invalid Email');
    }
    echo json_encode($reset_otp);
}



if (isset($_POST['reset_otp_verification'])) {

    $otp = realEscape('otp');

    $otp_response_arr = array();
    if ($otp == $_SESSION['reset_otp']) {
        array_push($otp_response_arr,  'true');
        array_push($otp_response_arr, 'OTP Verification Success. Create New Password');
        unset($_SESSION['reset_otp']);
    } else {
        array_push($otp_response_arr,  'false');
        array_push($otp_response_arr, 'Invalid OTP');
    }
    echo json_encode($otp_response_arr);
}



if (isset($_POST['reset_password'])) {

    $_SESSION['reset_email'];
    $NewPassword = realEscape('NewPassword');
    $CPassword = realEscape('CPassword');

    $reset_response = array();

    if ($CPassword != $NewPassword) {
        array_push($reset_response, 'false', 'Confirm Password Should Match With New Password');
    } else {
        $new_hash_pass = password_hash($NewPassword, PASSWORD_DEFAULT);

        $Update_password = "UPDATE `admin_access_info` 
        SET        
        `u_pass`='$new_hash_pass'
         WHERE u_email = '$_SESSION[reset_email]'";

        if (mysqli_query($conn, $Update_password)) {
            array_push($reset_response, 'true', 'Password Updated Successfully');
            unset($_SESSION['reset_email']);
        } else {
            array_push($reset_response, 'false', 'Failed To Update Password');
        }
    }

    echo json_encode($reset_response);
}
