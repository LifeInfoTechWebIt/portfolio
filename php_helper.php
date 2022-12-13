    <?php
    require('db-xyz-abc.php');

    date_default_timezone_set('asia/kolkata');

    $conection = $conn;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';



    function get_state()
    {
        $states  = array(
            'Andhra Pradesh',
            'Arunachal Pradesh',
            'Assam',
            'Bihar',
            'Chhattisgarh',
            'Goa',
            'Gujarat',
            'Haryana',
            'Himachal Pradesh',
            'Jammu & Kashmir',
            'Jharkhand',
            'Karnataka',
            'Kerala',
            'Madhya Pradesh',
            'Maharashtra',
            'Manipur',
            'Meghalaya',
            'Mizoram',
            'Nagaland',
            'Odisha',
            'Punjab',
            'Rajasthan',
            'Sikkim',
            'Tamil Nadu',
            'Tripura',
            'Uttarakhand',
            'Uttar Pradesh',
            'West Bengal',
            'Andaman & Nicobar',
            'Chandigarh',
            'Dadra and Nagar Haveli',
            'Daman & Diu',
            'Delhi',
            'Lakshadweep',
            'Puducherry'
        );

        $str = "";
        for ($i = 0; $i < count($states); $i++) {
            $str .= "<option value='$states[$i]'>$states[$i]</option>";
        }
        return $str;
    }



    $mail_id = "lifeinfotechitservices@gmail.com";

    function send_mail($receiver, $body, $sub)
    {
        $mail = new PHPMailer();
        // $mail->SMTPDebug=3;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.hostinger.com";
        $mail->Port = "465";
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Username = "info@snehaitfreelancer.com";
        $mail->Password = "9u-rP@)rV78Ygu%7";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SetFrom("info@snehaitfreelancer.com", "Sneha It Freelancer");
        $mail->Subject = $sub;
        $mail->Body = $body;
        $mail->AddAddress($receiver);
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        if (!$mail->Send()) {
            return false;
        } else {
            return true;
        }
    }


    // function send_mail($receiver, $body, $sub)
    // {
    //     $mail = new PHPMailer();
    //     // $mail->SMTPDebug=3;
    //     $mail->IsSMTP();
    //     $mail->SMTPAuth = true;
    //     $mail->Host = "smtp.gmail.com";
    //     $mail->Port = "465";
    //     $mail->IsHTML(true);
    //     $mail->CharSet = 'UTF-8';
    //     $mail->Username = "infoxjob24x7@gmail.com";
    //     $mail->Password = "vvqiegxnlcjobpfw";
    //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    //     $mail->SetFrom("infoxjob24x7@gmail.com", "Jeetdigital");
    //     $mail->Subject = $sub;
    //     $mail->Body = $body;
    //     $mail->AddAddress($receiver);
    //     $mail->SMTPOptions = array('ssl' => array(
    //         'verify_peer' => false,
    //         'verify_peer_name' => false,
    //         'allow_self_signed' => false
    //     ));
    //     if (!$mail->Send()) {
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }

    function send_message($mobile, $message)
    {
        $api = "http://login.yourbulksms.net/api/sendhttp.php?authkey=20455Ak8Rpmif62cea549P15&mobiles=$mobile&message=$message&sender=Picmyflowers&route=4&response=json";
        return $api;
    }

    // ---------------------------- Message Function Start--------------------
    function  SuccessFun($Message)
    {
        echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$Message</strong>  
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
           </div>
            
            ";
        echo "<script>
                if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href)
                }
                </script>";
    }
    function  DangerFun($Message)
    {
        echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>$Message</strong>  
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times; </button>
          
            </div>
            ";
        echo "<script>
                if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href)
                }
                </script>";
    }

    // ---------------------------- Message Function end--------------------



    function remove_empty_cell(array $data)
    {
        for ($i = count($data) - 1; $i >= 0; $i--) {
            $check = implode('', $data[$i]);
            if (empty($check)) {
                unset($data[$i]);
            }
        }
        return array_values($data);
    }

    // -------------------------------- Go back Start ----------------------
    function goback($id)
    {
        if (!isset($id)) {
            echo "<script>window.history.back()</script>";
        }
    }
    // -------------------------------- Go back end----------------------

    // ----------------------------------- Real_escape string start-------------
    function realEscape($data)
    {
        global $conection;
        $escape = mysqli_real_escape_string($conection, trim($_POST[$data]));
        return  $escape;
    }

    // ----------------------------------- Real_escape string end-------------

    // -----------------Some Pre-Defined Files Formate Array----------------

    $pdf_format = ['pdf', 'PDF'];
    $docx_format = ['docx', 'DOCX'];
    $excel = ['xls', 'xlsx'];
    $img_format = ['jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF', 'tif', 'tiff'];
    $img_pdf_format = ['pdf', 'PDF', 'jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF', 'tif', 'tiff'];
    function file_format($file, array $file_format)
    {
        $get_file_ext = pathinfo($file, PATHINFO_EXTENSION);

        if (!in_array($get_file_ext, $file_format)) {
            return false;
        } else {
            return true;
        }
    }

    function new_fileName($file_name)
    {
        $new_file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_name = substr(md5($file_name) . mt_rand(1000, 10000), 22) . '.' . $new_file_ext;
        return $new_name;
    }


    //    ------------------------------------------ Delete Start------------------  
    function delete_single($table, $where)
    {
        global $conection;
        $delete = "DELETE FROM `$table` WHERE  $where";
        if (mysqli_query($conection, $delete)) {
            return true;
        } else {
            return false;
        }
    }





    function delete_single_with_file($table_name, $where, array $file_arr, $path)
    {

        global $conection;

        $Delete = "DELETE FROM `$table_name` WHERE $where";
        $Select = "SELECT * FROM `$table_name` WHERE $where";

        $query = mysqli_query($conection, $Select);
        $Row = mysqli_num_rows($query);
        $fetch_data = mysqli_fetch_assoc($query);
        if ($Row != 0) {
            if (mysqli_query($conection, $Delete)) {
                $select_again = "SELECT * FROM `$table_name` WHERE $where";
                $query_again = mysqli_query($conection, $select_again);
                $Check_row = mysqli_num_rows($query_again);
                if ($Check_row == 0) {

                    for ($j = 0; $j < count($file_arr); $j++) {
                        if (file_exists($path . $fetch_data[$file_arr[$j]])) {
                            unlink($path . $fetch_data[$file_arr[$j]]);
                        }
                    }
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }




    function delete_multiple_with_file($table_name, array $col_ids, array $file_arr, $path)
    {
        //    add '/' in the path at last 

        global $conection;
        $success = 0;
        for ($i = 0; $i < count($col_ids); $i++) {
            $Delete = "DELETE FROM `$table_name` WHERE col_id = '$col_ids[$i]'";
            $Select = "SELECT * FROM `$table_name` WHERE col_id = '$col_ids[$i]'";

            $query = mysqli_query($conection, $Select);
            $Row = mysqli_num_rows($query);
            $fetch_data = mysqli_fetch_assoc($query);
            if ($Row != 0) {
                if (mysqli_query($conection, $Delete)) {
                    $select_again = "SELECT * FROM `$table_name` WHERE col_id = '$col_ids[$i]'";
                    $query_again = mysqli_query($conection, $select_again);
                    $Check_row = mysqli_num_rows($query_again);
                    if ($Check_row == 0) {
                        $success++;
                        for ($j = 0; $j < count($file_arr); $j++) {
                            if (file_exists($path . $fetch_data[$file_arr[$j]])) {
                                unlink($path . $fetch_data[$file_arr[$j]]);
                            }
                        }
                    }
                }
            }
        }


        if ($success == 0) {

            DangerFun('Failed To Delete Data');
        } else {
            SuccessFun('Total ' . $success . ' Data Deleted Successfully');
        }
    }


    function delete_single_img($table, $where, $column, $path)
    {
        global  $conection;

        $get_data = fetch_data($table, '*', $where);
        $get_r = $get_data['row'];
        $get_f = $get_data['data'];

        $img = $get_f[0][$column];

        if ($img != '') {
            if (file_exists($path . $img)) {
                unlink($path . $img);
            }
        }
    }

    function delete_json_type_img($table, $where, $column, $path)
    {
        global  $conection;

        $get_data = fetch_data($table, '*', $where);
        $get_r = $get_data['row'];
        $get_f = $get_data['data'];

        $img = $get_f[0][$column];
        $json_img = json_decode($img, true);

        for ($i = 0; $i < count($json_img); $i++) {

            if (file_exists($path . $json_img[$i])) {
                unlink($path . $json_img[$i]);
            }
        }
    }



    function delete_search_key($table, $where)
    {
        global  $conection;

        $get_r =  get_num_row($table, $where);
        if ($get_r != 0) {
            if (delete_single($table, $where)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //  ------------------------------------------ Delete End------------------  

    //   ---------------------------- Uid generator start-------------------------

    function uid_generator()
    {

        $gen_uid = strtoupper(substr(md5(mt_rand(10000, 10000000000)), 22));
        return $gen_uid;
    }

    function check_uid_availibility($uid, $table, $col)
    {
        global $conection;
        $check_uid = "SELECT * FROM `$table` where `$col` = '$uid'";
        $check_uid_q = mysqli_query($conection, $check_uid);
        $check_uid_r = mysqli_num_rows($check_uid_q);

        if ($check_uid_r != 0) {
            return false;
        } else {
            return true;
        }
    }
    //   ---------------------------- Uid generator end-------------------------


    // --------------------------------------- Indian Number System start--------------------------------
    function IND_num_format($number)
    {
        $decimal = (string)($number - floor($number));
        $money = floor($number);
        $length = strlen($money);
        $delimiter = '';
        $money = strrev($money);

        for ($i = 0; $i < $length; $i++) {
            if (($i == 3 || ($i > 3 && ($i - 1) % 2 == 0)) && $i != $length) {
                $delimiter .= ',';
            }
            $delimiter .= $money[$i];
        }

        $result = strrev($delimiter);
        $decimal = preg_replace("/0\./i", ".", $decimal);
        $decimal = substr($decimal, 0, 3);

        if ($decimal != '0') {
            $result = $result . $decimal;
        }

        return $result;
    }
    // --------------------------------------- Indian Number System end--------------------------------

    function get_num_row($table, $where)
    {
        global $conection;

        $select_data = mysqli_query($conection, "SELECT * FROM `$table` where $where");
        $get_row = mysqli_num_rows($select_data);
        return $get_row;
    }


    function insert($table, $col_name, $values)
    {
        global $conection;

        $insert_data = "INSERT INTO `$table` ($col_name) VALUES ($values)";
        if (mysqli_query($conection, $insert_data)) {
            return true;
        } else {
            return false;
        }
    }






    function fetch_data($table, $fields = '*', $conditions = '1=1')
    {
        global $conection;
        $select_data = mysqli_query($conection, "SELECT $fields FROM `$table` where $conditions");
        $get_row = mysqli_num_rows($select_data);

        $data = array();

        while ($get_data = mysqli_fetch_assoc($select_data)) {
            array_push($data, $get_data);
        }


        return array("row" => $get_row, "data" => $data);
    }




    function update_image($table, $field, $where, $path, $unlink_img, $img, $img_tmp)
    {
        global $conection;
        $update = "UPDATE `$table` SET $field Where $where";

        if (mysqli_query($conection, $update)) {
            move_uploaded_file($img_tmp, $path . $img);
            if ($unlink_img != '') {
                if (file_exists($path . $unlink_img)) {
                    unlink($path . $unlink_img);
                }
            }

            return true;
        } else {
            return false;
        }
    }


    function update_data($table, $field, $where)
    {
        global $conection;
        $update = "UPDATE `$table` SET $field Where $where";
        if (mysqli_query($conection, $update)) {
            return true;
        } else {
            return false;
        }
    }



    function back_btn($href, $btntext)
    {
        echo "<a href='$href' class='text-decoration-none font-weight-bold back-btn text-uppercase'><i class='fas fa-arrow-left'></i> $btntext</a>";
    }



    function redirect($url)
    {
        echo "<script>window.location.href='$url'</script>";
    }


    function show_date($date)
    {
        return  date_format(date_create($date), 'd-M-Y');
    }
    function show_time($date)
    {
        return  date_format(date_create($date), 'g:i A');
    }


    function get_category()
    {

        $str = "";
        $get_data = fetch_data('category', '*', '1=1');
        $get_f = $get_data['data'];
        $get_r = $get_data['row'];
        for ($i = 0; $i < $get_r; $i++) {
            $value = $get_f[$i]['cat_name'];
            $cat_id = $get_f[$i]['cat_id'];
            $str .= "<option value='$cat_id'> $value</option>";
        }

        return $str;
    }


    function get_category_name($cat_id)
    {
        $get_data =  fetch_data('category', '*', "cat_id='$cat_id'");
        $get_f = $get_data['data'];
        $name = $get_f[0]['cat_name'];
        return $name;
    }

    function get_sub_category_name($sub_cat_id)
    {
        $get_data =  fetch_data('sub_category', '*', "sub_cat_id='$sub_cat_id'");
        $get_f = $get_data['data'];
        $name = $get_f[0]['sub_cat_name'];
        return $name;
    }

    function send_otp($mobileNumber, $otp, $country)
    {

        //Your authentication key
        $authKey = "20455Ak8Rpmif62cea549P15";
        //Multiple mobiles numbers separated by comma

        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "DEVEGO";

        //Your message to send, Add URL encoding here.
        // $message = urlencode("Test message");
        $message =  "Dear customer your OTP for registration is $otp DEVEGO ";

        //Define route 
        $route = 14;
        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route,
            'country' => $country,
            'response' => 'json'
        );

        //API URL
        $url = "https://login.yourbulksms.net/api/sendhttp.php";


        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
        ));



        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //get response

        $output = curl_exec($ch);

        //Print error if any
        if (curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
        }


        curl_close($ch);
        // echo $output;

        return $output;
    }


    function verify_captcha($gcaptcha)
    {
        $secrect = '6LdvQfYiAAAAANjhwKGClqUEct-oVPxC5WUSGgNU';
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secrect) .  '&response=' . urlencode($gcaptcha) . '&remoteip=' . $ip;

        $api_content = file_get_contents($url);
        $api_response = json_decode($api_content);


        if ($api_response->success == true) {
            return true;
        } else {
            return false;
        }
    }
