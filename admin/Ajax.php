<?php
require('login_auth_admin.php');
require('../db-xyz-abc.php');
require('../php_helper.php');

// --------------------------------- Delete Single For All Start---------------------

if (isset($_POST['delete_singal'])) {
    $variables = $_POST['variables'];

    $var_arr = explode(',', $variables);

    $table = $var_arr[0];
    $col_id = $var_arr[1];


    $status = delete_single($table, "col_id='$col_id'");
    $response_arr = array();
    if ($status) {
        array_push($response_arr, 'true', 'Data Deleted Successfully', '#');
    } else {
        array_push($response_arr, 'false', 'Failed To Delete Data', '#');
    }

    echo json_encode($response_arr);
}

// --------------------------------- Delete Single For All End---------------------

// --------------------------------- Select Navigation , category and sub-category start----------------- 
if (isset($_POST['selected_nav'])) {
    $select_nav = realEscape('selected_nav');

    $get_data =  fetch_data('sub_category', '*', "cat_id='$select_nav'");
    $get_f = $get_data['data'];
    $get_r = $get_data['row'];
    $data_arr = array();
    $response_arr = array();

    if ($get_r != 0) {
        for ($i = 0; $i < $get_data['row']; $i++) {
            $data_arr[$i] = array($get_f[$i]['sub_cat_name'], $get_f[$i]['sub_cat_id']);
        }
        $response_arr['status'] = 'true';
        $response_arr['data'] = $data_arr;
    } else {
        $response_arr['status'] = 'false';
        $response_arr['data'] = $data_arr;
    }

    echo json_encode($response_arr);
}


if (isset($_POST['selected_category_FSC'])) {
    $select_category = realEscape('selected_category_FSC');
    $selected_nav_FSC = realEscape('selected_nav_FSC');


    $get_data =  fetch_data('sub_category', '*', "nav_id='$selected_nav_FSC' and  cat_id='$select_category'");
    $get_f = $get_data['data'];
    $get_r = $get_data['row'];
    $data_arr = array();
    $response_arr = array();



    if ($get_r != 0) {
        for ($i = 0; $i < $get_data['row']; $i++) {
            $data_arr[$i] = array($get_f[$i]['sub_cat_name'], $get_f[$i]['sub_cat_id']);
        }
        $response_arr['status'] = 'true';
        $response_arr['data'] = $data_arr;
    } else {
        $response_arr['status'] = 'false';
        $response_arr['data'] = $data_arr;
    }

    echo json_encode($response_arr);
}

if (isset($_POST['selected_sub_category'])) {
    $selected_sub_category = realEscape('selected_sub_category');
    $selected_pro_category = realEscape('selected_pro_category');
    $selected_pro_nav = realEscape('selected_pro_nav');

    $table_name = return_table_name($selected_pro_nav);

    $get_data =  fetch_data($table_name, '*', "category='$selected_pro_category' and  subcategory='$selected_sub_category'");
    $get_f = $get_data['data'];
    $get_r = $get_data['row'];
    $data_arr = array();
    $response_arr = array();



    if ($get_r != 0) {
        for ($i = 0; $i < $get_data['row']; $i++) {
            $data_arr[$i] = array($get_f[$i]['name'], $get_f[$i]['product_id']);
        }
        $response_arr['status'] = 'true';
        $response_arr['data'] = $data_arr;
    } else {
        $response_arr['status'] = 'false';
        $response_arr['data'] = $data_arr;
    }

    echo json_encode($response_arr);
}

// --------------------------------- Select Navigation , category and sub-category end----------------- 









// ------------------ Add Category Start-------------------



if (isset($_POST['add_new_category'])) {
    $navigation = realEscape('navigation');
    $cat_name = realEscape('cat_name');

    $cat_id = uid_generator();



    $response_arr = array();


    $cat_insert = "INSERT INTO `product_category`(`nav_id`,`cat_id`, `cat_name`) 
            VALUES ('$navigation','$cat_id','$cat_name')";

    if (get_num_row("product_category", "cat_name='$cat_name' and nav_id='$navigation'") == 0) {
        if (mysqli_query($conn, $cat_insert)) {

            array_push($response_arr, 'true', 'Category added successfully', 'pro_category.php');
        } else {
            array_push($response_arr, 'false', 'Failed to add category', '#');
        }
    } else {
        array_push($response_arr, 'false', "Category '$cat_name' is already present", '#');
    }


    echo json_encode($response_arr);
}

// ------------------ Add Category End-------------------


// ------------------ Add Sub- Category start-------------------


if (isset($_POST['add_new_sub_category'])) { 
    $cat_id = realEscape('cat_id');
    $sub_cat_name = realEscape('sub_cat_name');
    $sub_cat_id = uid_generator();
    $check = get_num_row('sub_category', "sub_cat_name='$sub_cat_name' and cat_id='$cat_id'");
    $response_arr = array();

    if ($check == 0) {

        $insert = "INSERT INTO `sub_category`(`cat_id`, `sub_cat_id`, `sub_cat_name`) 
        VALUES ('$cat_id','$sub_cat_id','$sub_cat_name')";

        if (mysqli_query($conn, $insert)) {
            array_push($response_arr, 'true', "Sub-Category '$sub_cat_name' added successfully ", "#");
        } else {
            array_push($response_arr, 'false', "Failed to add sub-category $sub_cat_name ", "#");
        }
    } else {
        array_push($response_arr, 'false', "Sub-Category '$sub_cat_name' is already present ", "#");
    }

    echo json_encode($response_arr);
}


// ------------------ Add Sub- Category end-------------------




// --------------------------- Product Section Start ---------------------
// --------------------------- Product Section Start ---------------------
// --------------------------- Product Section Start ---------------------
// --------------------------- Product Section Start ---------------------
// --------------------------- Product Section Start ---------------------


// ------------------ Add Cake Start  ----- 
// ------------------ Add Cake Start  ----- 

if (isset($_POST['add_cake'])) {
    $pro_id = realEscape('pro_id');
    $category = realEscape('category');
    $sub_cat = realEscape('sub_cat');
    $des = realEscape('des');
    $new_short_des = htmlentities($des);
    $cake_name = realEscape('cake_name');
    $veg_or_non_veg = $_POST['veg_or_non_veg'];
    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description = realEscape('description');

    $mainpic = $_FILES['mainpic']['name'];
    $mainpic_tmp = $_FILES['mainpic']['tmp_name'];

    $pic = $_FILES['pic']['name'];
    $pic_tmp = $_FILES['pic']['tmp_name'];

    // ---------------- directory ------------
    $dir = "../files/cakes/";


    //  --------------- price & discount array------------
    $price_arr = array();
    $dis_arr = array();

    // ------------------ Quantity array -----------
    $qt_arr = ['0.5', '1', '2', '3', '4', '5'];

    // ----------------- converting price array into json string --------------
    for ($i = 0; $i < count($price); $i++) {
        $price_arr[$qt_arr[$i]] = $price[$i];
    }

    $new_price = json_encode($price_arr);  // new price

    // ----------------- converting discount array into json string --------------

    for ($i = 0; $i < count($off); $i++) {
        $dis_arr[$qt_arr[$i]] = $off[$i];
    }

    $new_dis = json_encode($dis_arr);  // new price discount


    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    // ----------------- converting image name into json format --------------
    $new_img_name_arr = array();
    for ($i = 0; $i < count($pic); $i++) {
        $img_new_name = new_fileName($pic[$i]);
        array_push($new_img_name_arr, $img_new_name);
    }

    $new_other_img_json = json_encode($new_img_name_arr);

    //    ------------------------- Creating New name of main image ---------------

    $new_main_img  = new_fileName($mainpic);

    //    ----------------------- Converting description into htmlentities ----------------

    $new_description = htmlentities($description);
 
    $cake_uid = $pro_id;

    $insert = "INSERT INTO `cakes`( `product_id`, `category`, `subcategory`, `name`, `cake_type`, `price`, `discount`, `main_pic`,`other_pic`,`des`,`short_des`)
    VALUES ('$cake_uid','$category','$sub_cat','$cake_name','$veg_or_non_veg','$new_price','$new_dis','$new_main_img','$new_other_img_json','$new_description','$new_short_des')";


    $insert_key = "INSERT INTO `search_keywords`(`table_name`, `product_id`, `search_keys`)
     VALUES ('cakes','$cake_uid','$key_json')";

    $response_arr = array();

    if (mysqli_query($conn, $insert)) {
        for ($i = 0; $i < count($pic); $i++) {
            $new_tmp = $pic_tmp[$i];
            move_uploaded_file($new_tmp, $dir . $new_img_name_arr[$i]);
        }

        move_uploaded_file($mainpic_tmp,  $dir . $new_main_img);

        mysqli_query($conn, $insert_key);

        array_push($response_arr, 'true', 'Product Added Successfully', 'cakes_category.php');
    } else {
        array_push($response_arr, 'false', 'Failed to add product');
    }

    echo json_encode($response_arr);
}

// ------------------ Add Cake end ----- 
// ------------------ Add Cake end ----- 



// ------------------ Add Chocolate Start ----- 
// ------------------ Add Chocolate Start ----- 

if (isset($_POST['add_Chocolate'])) {

    $pro_id = realEscape('pro_id');
    $category = realEscape('category');
    $sub_cat = realEscape('sub_cat');

    $Chocolate_name = realEscape('Chocolate_name');
    $des = realEscape('des');
    $new_short_des = htmlentities($des);

    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description =  trim($_POST['description']);

    $mainpic = $_FILES['mainpic']['name'];
    $mainpic_tmp = $_FILES['mainpic']['tmp_name'];

    $pic = $_FILES['pic']['name'];
    $pic_tmp = $_FILES['pic']['tmp_name'];

    // ---------------- directory ------------
    $dir = "../files/chocolate/";


    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    // ----------------- converting image name into json format --------------
    $new_img_name_arr = array();
    for ($i = 0; $i < count($pic); $i++) {
        $img_new_name = new_fileName($pic[$i]);
        array_push($new_img_name_arr, $img_new_name);
    }

    $new_other_img_json = json_encode($new_img_name_arr);

    //    ------------------------- Creating New name of main image ---------------

    $new_main_img  = new_fileName($mainpic);

    //    ----------------------- Converting description into htmlentities ----------------

    $new_description = htmlentities($description);



    $choco_uid = $pro_id;



    $insert = "INSERT INTO `chocolates`(`product_id`, `category`, `subcategory`, `name`, `price`, `discount`, `main_pic`, `other_pic`, `des`,`short_des`) VALUES ('$choco_uid','$category','$sub_cat','$Chocolate_name','$price','$off','$new_main_img','$new_other_img_json','$new_description','$new_short_des')";


    $insert_key = "INSERT INTO `search_keywords`(`table_name`, `product_id`, `search_keys`)
     VALUES ('chocolates','$choco_uid','$key_json')";

    $response_arr = array();

    if (mysqli_query($conn, $insert)) {
        for ($i = 0; $i < count($pic); $i++) {
            $new_tmp = $pic_tmp[$i];
            move_uploaded_file($new_tmp, $dir . $new_img_name_arr[$i]);
        }

        move_uploaded_file($mainpic_tmp,  $dir . $new_main_img);

        mysqli_query($conn, $insert_key);

        array_push($response_arr, 'true', 'Product Added Successfully', 'chocolate_category.php');
    } else {
        array_push($response_arr, 'false', 'Failed to add product');
    }

    echo json_encode($response_arr);
}


// ------------------ Add Chocolate End ----- 
// ------------------ Add Chocolate End ----- 




// ------------------ Add Flowers Start ----- 
// ------------------ Add Flowers Start ----- 

if (isset($_POST['isset_add_flowers'])) {

    $pro_id = realEscape('pro_id');
    $category = realEscape('category');
    $sub_cat = realEscape('sub_cat');

    $name = realEscape('name');
    $des = realEscape('des');
    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description =  trim($_POST['description']);

    $mainpic = $_FILES['mainpic']['name'];
    $mainpic_tmp = $_FILES['mainpic']['tmp_name'];

    $pic = $_FILES['pic']['name'];
    $pic_tmp = $_FILES['pic']['tmp_name'];

    // ---------------- directory ------------
    $dir = "../files/flowers/";


    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    // ----------------- converting image name into json format --------------
    $new_img_name_arr = array();
    for ($i = 0; $i < count($pic); $i++) {
        $img_new_name = new_fileName($pic[$i]);
        array_push($new_img_name_arr, $img_new_name);
    }

    $new_other_img_json = json_encode($new_img_name_arr);

    //    ------------------------- Creating New name of main image ---------------

    $new_main_img  = new_fileName($mainpic);

    //    ----------------------- Converting description into htmlentities ----------------

    $new_description = htmlentities($description);
    $new_short_des = htmlentities($des);


    $uid = $pro_id;

    $insert = "INSERT INTO `flowers`(`product_id`, `category`, `subcategory`, `name`, `price`, `discount`, `main_pic`, `other_pic`, `des`,`short_des`) VALUES ('$uid','$category','$sub_cat','$name','$price','$off','$new_main_img','$new_other_img_json','$new_description','$new_short_des')";

    $insert_key = "INSERT INTO `search_keywords`(`table_name`, `product_id`, `search_keys`)
     VALUES ('flowers','$uid','$key_json')";

    $response_arr = array();

    if (mysqli_query($conn, $insert)) {
        for ($i = 0; $i < count($pic); $i++) {
            $new_tmp = $pic_tmp[$i];
            move_uploaded_file($new_tmp, $dir . $new_img_name_arr[$i]);
        }

        move_uploaded_file($mainpic_tmp,  $dir . $new_main_img);

        mysqli_query($conn, $insert_key);

        array_push($response_arr, 'true', 'Product Added Successfully', 'flower_category.php');
    } else {
        array_push($response_arr, 'false', 'Failed to add product');
    }

    echo json_encode($response_arr);
}



// ------------------ Add flower End --------- 
// ------------------ Add flower End --------- 




// ------------------ Add plant Start ----- 
// ------------------ Add plant Start ----- 

if (isset($_POST['add_plants'])) {
    $pro_id = realEscape('pro_id');

    $category = realEscape('category');
    $sub_cat = realEscape('sub_cat');

    $plant_name = realEscape('plant_name');
    $des = realEscape('des');
    $new_short_des = htmlentities($des);
    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description =  trim($_POST['description']);

    $mainpic = $_FILES['mainpic']['name'];
    $mainpic_tmp = $_FILES['mainpic']['tmp_name'];

    $pic = $_FILES['pic']['name'];
    $pic_tmp = $_FILES['pic']['tmp_name'];

    // ---------------- directory ------------
    $dir = "../files/plants/";


    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    // ----------------- converting image name into json format --------------
    $new_img_name_arr = array();
    for ($i = 0; $i < count($pic); $i++) {
        $img_new_name = new_fileName($pic[$i]);
        array_push($new_img_name_arr, $img_new_name);
    }

    $new_other_img_json = json_encode($new_img_name_arr);

    //    ------------------------- Creating New name of main image ---------------

    $new_main_img  = new_fileName($mainpic);

    //    ----------------------- Converting description into htmlentities ----------------

    $new_description = htmlentities($description);



    $plant_uid = $pro_id;



    $insert = "INSERT INTO `plants`(`product_id`, `category`, `subcategory`, `name`, `price`, `discount`, `main_pic`, `other_pic`, `des`,`short_des`) VALUES ('$plant_uid','$category','$sub_cat','$plant_name','$price','$off','$new_main_img','$new_other_img_json','$new_description','$new_short_des')";


    $insert_key = "INSERT INTO `search_keywords`(`table_name`, `product_id`, `search_keys`)
     VALUES ('plants','$plant_uid','$key_json')";

    $response_arr = array();

    if (mysqli_query($conn, $insert)) {
        for ($i = 0; $i < count($pic); $i++) {
            $new_tmp = $pic_tmp[$i];
            move_uploaded_file($new_tmp, $dir . $new_img_name_arr[$i]);
        }

        move_uploaded_file($mainpic_tmp,  $dir . $new_main_img);

        mysqli_query($conn, $insert_key);

        array_push($response_arr, 'true', 'Product Added Successfully', 'plants_category.php');
    } else {
        array_push($response_arr, 'false', 'Failed to add product');
    }

    echo json_encode($response_arr);
}



// ------------------ Add plant End --------- 
// ------------------ Add plant End --------- 


// ------------------ Add Anniversary Start ----- 
// ------------------ Add Anniversary Start ----- 

if (isset($_POST['isset_add_anniversary'])) {

    $pro_id = realEscape('pro_id');
    $category = realEscape('category');
    $sub_cat = realEscape('sub_cat');

    $name = realEscape('name');

    $des = realEscape('des');
    $new_short_des = htmlentities($des);


    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description =  trim($_POST['description']);

    $mainpic = $_FILES['mainpic']['name'];
    $mainpic_tmp = $_FILES['mainpic']['tmp_name'];

    $pic = $_FILES['pic']['name'];
    $pic_tmp = $_FILES['pic']['tmp_name'];

    // ---------------- directory ------------
    $dir = "../files/anniversary/";


    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    // ----------------- converting image name into json format --------------
    $new_img_name_arr = array();
    for ($i = 0; $i < count($pic); $i++) {
        $img_new_name = new_fileName($pic[$i]);
        array_push($new_img_name_arr, $img_new_name);
    }

    $new_other_img_json = json_encode($new_img_name_arr);

    //    ------------------------- Creating New name of main image ---------------

    $new_main_img  = new_fileName($mainpic);

    //    ----------------------- Converting description into htmlentities ----------------

    $new_description = htmlentities($description);



    $uid = $pro_id;


    $insert = "INSERT INTO `anniversary`(`product_id`, `category`, `subcategory`, `name`, `price`, `discount`, `main_pic`, `other_pic`, `des`,`short_des`) VALUES ('$uid','$category','$sub_cat','$name','$price','$off','$new_main_img','$new_other_img_json','$new_description','$new_short_des')";


    $insert_key = "INSERT INTO `search_keywords`(`table_name`, `product_id`, `search_keys`)
     VALUES ('anniversary','$uid','$key_json')";

    $response_arr = array();

    if (mysqli_query($conn, $insert)) {
        for ($i = 0; $i < count($pic); $i++) {
            $new_tmp = $pic_tmp[$i];
            move_uploaded_file($new_tmp, $dir . $new_img_name_arr[$i]);
        }

        move_uploaded_file($mainpic_tmp,  $dir . $new_main_img);

        mysqli_query($conn, $insert_key);

        array_push($response_arr, 'true', 'Product Added Successfully', 'anniversary_category.php');
    } else {
        array_push($response_arr, 'false', 'Failed to add product');
    }

    echo json_encode($response_arr);
}

//------------------ Add Anniversay End --------- 
//------------------ Add Anniversay End --------- 




// ------------------ Add Birthday Start ----- 
// ------------------ Add Birthday Start ----- 

if (isset($_POST['isset_add_birthday'])) {

    $pro_id = realEscape('pro_id');
    $category = realEscape('category');
    $sub_cat = realEscape('sub_cat');

    $name = realEscape('name');
    $des = realEscape('des');
    $new_short_des = htmlentities($des);


    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description =  trim($_POST['description']);

    $mainpic = $_FILES['mainpic']['name'];
    $mainpic_tmp = $_FILES['mainpic']['tmp_name'];

    $pic = $_FILES['pic']['name'];
    $pic_tmp = $_FILES['pic']['tmp_name'];

    // ---------------- directory ------------
    $dir = "../files/birthday/";


    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    // ----------------- converting image name into json format --------------
    $new_img_name_arr = array();
    for ($i = 0; $i < count($pic); $i++) {
        $img_new_name = new_fileName($pic[$i]);
        array_push($new_img_name_arr, $img_new_name);
    }

    $new_other_img_json = json_encode($new_img_name_arr);

    //    ------------------------- Creating New name of main image ---------------

    $new_main_img  = new_fileName($mainpic);

    //    ----------------------- Converting description into htmlentities ----------------

    $new_description = htmlentities($description);



    $uid = $pro_id;



    $insert = "INSERT INTO `birthday`(`product_id`, `category`, `subcategory`, `name`, `price`, `discount`, `main_pic`, `other_pic`, `des`,`short_des`) VALUES ('$uid','$category','$sub_cat','$name','$price','$off','$new_main_img','$new_other_img_json','$new_description','$new_short_des')";


    $insert_key = "INSERT INTO `search_keywords`(`table_name`, `product_id`, `search_keys`)
     VALUES ('birthday','$uid','$key_json')";

    $response_arr = array();

    if (mysqli_query($conn, $insert)) {
        for ($i = 0; $i < count($pic); $i++) {
            $new_tmp = $pic_tmp[$i];
            move_uploaded_file($new_tmp, $dir . $new_img_name_arr[$i]);
        }

        move_uploaded_file($mainpic_tmp,  $dir . $new_main_img);

        mysqli_query($conn, $insert_key);

        array_push($response_arr, 'true', 'Product Added Successfully', 'birthday_category.php');
    } else {
        array_push($response_arr, 'false', 'Failed to add product');
    }

    echo json_encode($response_arr);
}

//------------------ Add Birthday End --------- 
//------------------ Add Birthday End --------- 



// ------------------ Add Choco Hamper Start ----- 
// ------------------ Add Choco Hamper Start ----- 

if (isset($_POST['isset_add_choco_hamper'])) {
    $pro_id = realEscape('pro_id');
    $category = realEscape('category');
    $sub_cat = realEscape('sub_cat');

    $name = realEscape('name');
    $des = realEscape('des');
    $new_short_des = htmlentities($des);


    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description =  trim($_POST['description']);

    $mainpic = $_FILES['mainpic']['name'];
    $mainpic_tmp = $_FILES['mainpic']['tmp_name'];

    $pic = $_FILES['pic']['name'];
    $pic_tmp = $_FILES['pic']['tmp_name'];

    // ---------------- directory ------------
    $dir = "../files/choco_hamper/";


    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    // ----------------- converting image name into json format --------------
    $new_img_name_arr = array();
    for ($i = 0; $i < count($pic); $i++) {
        $img_new_name = new_fileName($pic[$i]);
        array_push($new_img_name_arr, $img_new_name);
    }

    $new_other_img_json = json_encode($new_img_name_arr);

    //    ------------------------- Creating New name of main image ---------------

    $new_main_img  = new_fileName($mainpic);

    //    ----------------------- Converting description into htmlentities ----------------

    $new_description = htmlentities($description);



    $uid = $pro_id;


    $insert = "INSERT INTO `choco_hamper`(`product_id`, `category`, `subcategory`, `name`, `price`, `discount`, `main_pic`, `other_pic`, `des`,`short_des`) VALUES ('$uid','$category','$sub_cat','$name','$price','$off','$new_main_img','$new_other_img_json','$new_description','$new_short_des')";


    $insert_key = "INSERT INTO `search_keywords`(`table_name`, `product_id`, `search_keys`)
     VALUES ('choco_hamper','$uid','$key_json')";

    $response_arr = array();

    if (mysqli_query($conn, $insert)) {
        for ($i = 0; $i < count($pic); $i++) {
            $new_tmp = $pic_tmp[$i];
            move_uploaded_file($new_tmp, $dir . $new_img_name_arr[$i]);
        }

        move_uploaded_file($mainpic_tmp,  $dir . $new_main_img);

        mysqli_query($conn, $insert_key);

        array_push($response_arr, 'true', 'Product Added Successfully', 'choco_hamper_category.php');
    } else {
        array_push($response_arr, 'false', 'Failed to add product');
    }

    echo json_encode($response_arr);
}

//------------------ Add Choco Hamper End --------- 
//------------------ Add Choco Hamper End --------- 


// ------------------ Add Occassions Start ----- 
// ------------------ Add Occassions Start ----- 

if (isset($_POST['isset_add_occasions'])) {
    $pro_id = realEscape('pro_id');
    $category = realEscape('category');
    $sub_cat = realEscape('sub_cat');

    $name = realEscape('name');
    $des = realEscape('des');
    $new_short_des = htmlentities($des);

    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description =  trim($_POST['description']);

    $mainpic = $_FILES['mainpic']['name'];
    $mainpic_tmp = $_FILES['mainpic']['tmp_name'];

    $pic = $_FILES['pic']['name'];
    $pic_tmp = $_FILES['pic']['tmp_name'];

    // ---------------- directory ------------
    $dir = "../files/occasions/";


    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    // ----------------- converting image name into json format --------------
    $new_img_name_arr = array();
    for ($i = 0; $i < count($pic); $i++) {
        $img_new_name = new_fileName($pic[$i]);
        array_push($new_img_name_arr, $img_new_name);
    }

    $new_other_img_json = json_encode($new_img_name_arr);

    //    ------------------------- Creating New name of main image ---------------

    $new_main_img  = new_fileName($mainpic);

    //    ----------------------- Converting description into htmlentities ----------------

    $new_description = htmlentities($description);



    $uid = $pro_id;
 
    $insert = "INSERT INTO `occasions`(`product_id`, `category`, `subcategory`, `name`, `price`, `discount`, `main_pic`, `other_pic`, `des`,`short_des`) VALUES ('$uid','$category','$sub_cat','$name','$price','$off','$new_main_img','$new_other_img_json','$new_description','$new_short_des')";


    $insert_key = "INSERT INTO `search_keywords`(`table_name`, `product_id`, `search_keys`)
     VALUES ('occasions','$uid','$key_json')";

    $response_arr = array();

    if (mysqli_query($conn, $insert)) {
        for ($i = 0; $i < count($pic); $i++) {
            $new_tmp = $pic_tmp[$i];
            move_uploaded_file($new_tmp, $dir . $new_img_name_arr[$i]);
        }

        move_uploaded_file($mainpic_tmp,  $dir . $new_main_img);

        mysqli_query($conn, $insert_key);

        array_push($response_arr, 'true', 'Product Added Successfully', 'occassions_category.php');
    } else {
        array_push($response_arr, 'false', 'Failed to add product');
    }

    echo json_encode($response_arr);
}

//------------------ Add Occassions End --------- 
//------------------ Add Occassions End --------- 




// ---------------------- Delete Cake Start -------------------
// ---------------------- Delete Cake Start -------------------

if (isset($_POST['my_product_delete_cakes'])) {
    $variables = $_POST['variables'];

    $data =  json_decode($variables, true);

    $col_id = $data[0]['col_id'];

    $check_row = get_num_row('cakes', "col_id='$col_id'");

    if ($check_row != 0) {

        $get_data = fetch_data('cakes', '*', "col_id='$col_id'");
        $get_f = $get_data['data'];
        $get_cake_id = $get_f[0]['product_id'];

        delete_single_img('cakes', "col_id='$col_id'", 'main_pic', '../files/cakes/');
        delete_json_type_img('cakes', "col_id='$col_id'", 'other_pic', '../files/cakes/');

        $delete = "DELETE FROM `cakes` WHERE col_id = '$col_id'";
        $response_arr = array();
        if (mysqli_query($conn, $delete)) {
            delete_single('search_keywords', "product_id='$get_cake_id'");
            array_push($response_arr, 'true', 'Data Deleted Successfully', '#');
        } else {
            array_push($response_arr, 'false', 'Failed To Delete Data', '#');
        }
    } else {
        array_push($response_arr, 'false', 'Failed To Delete Data', '#');
    }


    echo json_encode($response_arr);
}

// ---------------------- Delete Cake End -------------------
// ---------------------- Delete Cake End -------------------


// ---------------------- Update Cake Start -----------------
// ---------------------- Update Cake Start -----------------


if (isset($_POST['Update_cake_details'])) {

    $col_id = realEscape('col_id');
    $cake_id = realEscape('cake_id');
    $des = realEscape('des');
    $new_short_des = htmlentities($des);

    $cake_name = realEscape('cake_name');
    $veg_or_non_veg = realEscape('veg_or_non_veg');
    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description = realEscape('description');


    $price_arr = array();
    $dis_arr = array();

    // ------------------ Quantity array -----------
    $qt_arr = ['0.5', '1', '2', '3', '4', '5'];

    // ----------------- converting price array into json string --------------
    for ($i = 0; $i < count($price); $i++) {
        $price_arr[$qt_arr[$i]] = $price[$i];
    }

    $new_price = json_encode($price_arr);  // new price

    // ----------------- converting discount array into json string --------------

    for ($i = 0; $i < count($off); $i++) {
        $dis_arr[$qt_arr[$i]] = $off[$i];
    }

    $new_dis = json_encode($dis_arr);  // new price discount


    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    //    --------------------- converting description into htmlentities------------

    $new_description = htmlentities($description);



    $updatable_fields_cake = "
  
    `name`='$cake_name',
    `cake_type`='$veg_or_non_veg',
    `price`='$new_price',
    `discount`='$new_dis',
    `des`='$new_description',
    `short_des`='$new_short_des'
    ";

    $updatable_fields_keywords = "
       `search_keys` = '$key_json'
    ";

    $update_cake_data =  update_data('cakes', $updatable_fields_cake, "col_id='$col_id'");

    $response_arr = array();

    if ($update_cake_data) {
        $update_keys = update_data('search_keywords', $updatable_fields_keywords, "product_id='$cake_id'");

        array_push($response_arr, 'true', 'Data Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Data', '#');
    }

    echo json_encode($response_arr);
}






if (isset($_POST['cake_Update_main_img'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $update = update_image('cakes', "`main_pic`='$new_name'", "col_id='$col_id'", '../files/cakes/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['cake_img_up_one'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('cakes', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('cakes', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/cakes/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['cake_img_up_two'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('cakes', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('cakes', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/cakes/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['cake_img_up_three'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('cakes', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('cakes', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/cakes/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



// ---------------------- Update Cake End -----------------
// ---------------------- Update Cake End -----------------

// ------------------ Delete Chocolate Start --------------------
// ------------------ Delete Chocolate Start --------------------

if (isset($_POST['my_product_delete_chocolate'])) {
    $variables = $_POST['variables'];

    $data =  json_decode($variables, true);

    $col_id = $data[0]['col_id'];

    $check_row = get_num_row('chocolates', "col_id='$col_id'");

    if ($check_row != 0) {

        $get_data = fetch_data('chocolates', '*', "col_id='$col_id'");
        $get_f = $get_data['data'];
        $get_choco_id = $get_f[0]['product_id'];

        delete_single_img('chocolates', "col_id='$col_id'", 'main_pic', '../files/chocolate/');
        delete_json_type_img('chocolates', "col_id='$col_id'", 'other_pic', '../files/chocolate/');



        $delete_chocolate = delete_single('chocolates', "col_id='$col_id'");
        $response_arr = array();
        if ($delete_chocolate) {
            delete_single('search_keywords', "product_id='$get_choco_id'");
            array_push($response_arr, 'true', 'Data Deleted Successfully', '#');
        } else {
            array_push($response_arr, 'false', 'Failed To Delete Data', '#');
        }
    } else {
        array_push($response_arr, 'false', 'Failed To Delete Data', '#');
    }


    echo json_encode($response_arr);
}

// ------------------ Delete Chocolate End --------------------
// ------------------ Delete Chocolate End --------------------

// ---------------------- Update chocolate start -----------------
// ---------------------- Update chocolate start -----------------


if (isset($_POST['Update_choco_details'])) {

    $col_id = realEscape('col_id');
    $choco_id = realEscape('choco_id');

    $choco_name = realEscape('choco_name');
    $des = realEscape('des');
    $new_short_des = htmlentities($des);
    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description = realEscape('description');



    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    //    --------------------- converting description into htmlentities------------

    $new_description = htmlentities($description);



    $updatable_fields_choco = "
    `name`='$choco_name',
    `price`='$price',
    `discount`='$off',
    `des`='$new_description',
    `short_des`='$new_short_des'
    ";

    $updatable_fields_keywords = "
       `search_keys` = '$key_json'
    ";

    $update_choco_data =  update_data('chocolates', $updatable_fields_choco, "col_id='$col_id'");

    $response_arr = array();

    if ($update_choco_data) {
        $update_keys = update_data('search_keywords', $updatable_fields_keywords, "product_id='$choco_id'");

        array_push($response_arr, 'true', 'Data Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Data', '#');
    }

    echo json_encode($response_arr);
}




if (isset($_POST['choco_Update_main_pic'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $update = update_image('chocolates', "`main_pic`='$new_name'", "col_id='$col_id'", '../files/chocolate/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['choco_img_up_one'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('chocolates', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('chocolates', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/chocolate/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['choco_img_up_two'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('chocolates', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('chocolates', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/chocolate/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['choco_img_up_three'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('chocolates', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('chocolates', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/chocolate/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



// ---------------------- Update chocolate end -----------------
// ---------------------- Update chocolate end -----------------




// ------------------ Delete Flowers Start --------------------
// ------------------ Delete Flowers Start --------------------

if (isset($_POST['my_product_delete_flowers'])) {
    $variables = $_POST['variables'];

    $data =  json_decode($variables, true);

    $col_id = $data[0]['col_id'];

    $check_row = get_num_row('flowers', "col_id='$col_id'");

    if ($check_row != 0) {

        $get_data = fetch_data('flowers', '*', "col_id='$col_id'");
        $get_f = $get_data['data'];
        $get_flowers_id = $get_f[0]['product_id'];

        delete_single_img('flowers', "col_id='$col_id'", 'main_pic', '../files/flowers/');
        delete_json_type_img('flowers', "col_id='$col_id'", 'other_pic', '../files/flowers/');


        $delete_flowers = delete_single('flowers', "col_id='$col_id'");
        $response_arr = array();
        if ($delete_flowers) {
            delete_single('search_keywords', "product_id='$get_flowers_id'");
            array_push($response_arr, 'true', 'Data Deleted Successfully', '#');
        } else {
            array_push($response_arr, 'false', 'Failed To Delete Data', '#');
        }
    } else {
        array_push($response_arr, 'false', 'Failed To Delete Data', '#');
    }


    echo json_encode($response_arr);
}

// ------------------ Delete Flowers End --------------------
// ------------------ Delete Flowers End --------------------




// ---------------------- Update Flowers start -----------------
// ---------------------- Update Flowers start -----------------


if (isset($_POST['isset_update_flower_details'])) {

    $col_id = realEscape('col_id');
    $Product_id = realEscape('Product_id');

    $name = realEscape('name');
    $des = realEscape('des');
    $new_short_des = htmlentities($des);
    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description = realEscape('description');



    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    //    --------------------- converting description into htmlentities------------

    $new_description = htmlentities($description);



    $updatable_fields_flowers = "
    `name`='$name',
    `price`='$price',
    `discount`='$off',
    `des`='$new_description',
    `short_des`='$new_short_des'
    ";

    $updatable_fields_keywords = "
       `search_keys` = '$key_json'
    ";

    $update_flowers_data =  update_data('flowers', $updatable_fields_flowers, "col_id='$col_id'");

    $response_arr = array();

    if ($update_flowers_data) {
        $update_keys = update_data('search_keywords', $updatable_fields_keywords, "product_id='$Product_id'");

        array_push($response_arr, 'true', 'Data Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Data', '#');
    }

    echo json_encode($response_arr);
}




if (isset($_POST['isset_update_flower_main_pic'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $update = update_image('flowers', "`main_pic`='$new_name'", "col_id='$col_id'", '../files/flowers/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_flower_img_up_one'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('flowers', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('flowers', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/flowers/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_flower_img_up_two'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('flowers', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('flowers', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/flowers/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_flower_img_up_three'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('flowers', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('flowers', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/flowers/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



// ---------------------- Update Flowers end -----------------
// ---------------------- Update Flowers end -----------------




// ------------------ Delete plants Start --------------------
// ------------------ Delete plants Start --------------------

if (isset($_POST['my_product_delete_plants'])) {
    $variables = $_POST['variables'];

    $data =  json_decode($variables, true);

    $col_id = $data[0]['col_id'];

    $check_row = get_num_row('plants', "col_id='$col_id'");

    if ($check_row != 0) {

        $get_data = fetch_data('plants', '*', "col_id='$col_id'");
        $get_f = $get_data['data'];
        $plant_id = $get_f[0]['product_id'];

        delete_single_img('plants', "col_id='$col_id'", 'main_pic', '../files/plants/');
        delete_json_type_img('plants', "col_id='$col_id'", 'other_pic', '../files/plants/');


        $delete_plant = delete_single('plants', "col_id='$col_id'");
        $response_arr = array();
        if ($delete_plant) {
            delete_single('search_keywords', "product_id='$plant_id'");
            array_push($response_arr, 'true', 'Data Deleted Successfully', '#');
        } else {
            array_push($response_arr, 'false', 'Failed To Delete Data', '#');
        }
    } else {
        array_push($response_arr, 'false', 'Failed To Delete Data', '#');
    }


    echo json_encode($response_arr);
}

// ------------------ Delete plants End --------------------
// ------------------ Delete plants End --------------------




// ---------------------- Update plants start -----------------
// ---------------------- Update plants start -----------------


if (isset($_POST['Update_plants_details'])) {

    $col_id = realEscape('col_id');
    $plant_id = realEscape('plant_id');

    $plants_name = realEscape('plants_name');
    $des = realEscape('des');
    $new_short_des = htmlentities($des);
    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description = realEscape('description');



    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    //    --------------------- converting description into htmlentities------------

    $new_description = htmlentities($description);



    $updatable_fields_plants = "
    `name`='$plants_name',
    `price`='$price',
    `discount`='$off',
    `des`='$new_description',
    `short_des`='$new_short_des'
    ";

    $updatable_fields_keywords = "
       `search_keys` = '$key_json'
    ";

    $update_plant_data =  update_data('plants', $updatable_fields_plants, "col_id='$col_id'");

    $response_arr = array();

    if ($update_plant_data) {
        $update_keys = update_data('search_keywords', $updatable_fields_keywords, "product_id='$plant_id'");

        array_push($response_arr, 'true', 'Data Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Data', '#');
    }

    echo json_encode($response_arr);
}




if (isset($_POST['plants_Update_main_pic'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $update = update_image('plants', "`main_pic`='$new_name'", "col_id='$col_id'", '../files/plants/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['plants_img_up_one'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('plants', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('plants', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/plants/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['plants_img_up_two'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('plants', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('plants', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/plants/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['plants_img_up_three'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('plants', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('plants', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/plants/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



// ---------------------- Update plants end -----------------
// ---------------------- Update plants end -----------------





// ------------------ Delete Anniversary Start --------------------
// ------------------ Delete Anniversary Start --------------------

if (isset($_POST['my_product_delete_anniversary'])) {
    $variables = $_POST['variables'];

    $data =  json_decode($variables, true);

    $col_id = $data[0]['col_id'];

    $check_row = get_num_row('anniversary', "col_id='$col_id'");

    if ($check_row != 0) {

        $get_data = fetch_data('anniversary', '*', "col_id='$col_id'");
        $get_f = $get_data['data'];
        $get_product_id = $get_f[0]['product_id'];

        delete_single_img('anniversary', "col_id='$col_id'", 'main_pic', '../files/anniversary/');
        delete_json_type_img('anniversary', "col_id='$col_id'", 'other_pic', '../files/anniversary/');


        $delete_product = delete_single('anniversary', "col_id='$col_id'");
        $response_arr = array();
        if ($delete_product) {
            delete_single('search_keywords', "product_id='$get_product_id'");
            array_push($response_arr, 'true', 'Data Deleted Successfully', '#');
        } else {
            array_push($response_arr, 'false', 'Failed To Delete Data', '#');
        }
    } else {
        array_push($response_arr, 'false', 'Failed To Delete Data', '#');
    }


    echo json_encode($response_arr);
}

// ------------------ Delete Anniversary End --------------------
// ------------------ Delete Anniversary End --------------------

// ------------------ Delete Birthday Start --------------------
// ------------------ Delete Birthday Start --------------------

if (isset($_POST['my_product_delete_birthday'])) {
    $variables = $_POST['variables'];

    $data =  json_decode($variables, true);

    $col_id = $data[0]['col_id'];

    $check_row = get_num_row('birthday', "col_id='$col_id'");

    if ($check_row != 0) {

        $get_data = fetch_data('birthday', '*', "col_id='$col_id'");
        $get_f = $get_data['data'];
        $get_product_id = $get_f[0]['product_id'];

        delete_single_img('birthday', "col_id='$col_id'", 'main_pic', '../files/birthday/');
        delete_json_type_img('birthday', "col_id='$col_id'", 'other_pic', '../files/birthday/');


        $delete_product = delete_single('birthday', "col_id='$col_id'");
        $response_arr = array();
        if ($delete_product) {
            delete_single('search_keywords', "product_id='$get_product_id'");
            array_push($response_arr, 'true', 'Data Deleted Successfully', '#');
        } else {
            array_push($response_arr, 'false', 'Failed To Delete Data', '#');
        }
    } else {
        array_push($response_arr, 'false', 'Failed To Delete Data', '#');
    }


    echo json_encode($response_arr);
}

// ------------------ Delete Birthday End --------------------
// ------------------ Delete Birthday End --------------------



// ------------------ Delete Choco Hamper Start --------------------
// ------------------ Delete Choco Hamper Start --------------------

if (isset($_POST['my_product_delete_choco_hamper'])) {
    $variables = $_POST['variables'];

    $data =  json_decode($variables, true);

    $col_id = $data[0]['col_id'];

    $check_row = get_num_row('choco_hamper', "col_id='$col_id'");

    if ($check_row != 0) {

        $get_data = fetch_data('choco_hamper', '*', "col_id='$col_id'");
        $get_f = $get_data['data'];
        $get_product_id = $get_f[0]['product_id'];

        delete_single_img('choco_hamper', "col_id='$col_id'", 'main_pic', '../files/choco_hamper/');
        delete_json_type_img('choco_hamper', "col_id='$col_id'", 'other_pic', '../files/choco_hamper/');


        $delete_product = delete_single('choco_hamper', "col_id='$col_id'");
        $response_arr = array();
        if ($delete_product) {
            delete_single('search_keywords', "product_id='$get_product_id'");
            array_push($response_arr, 'true', 'Data Deleted Successfully', '#');
        } else {
            array_push($response_arr, 'false', 'Failed To Delete Data', '#');
        }
    } else {
        array_push($response_arr, 'false', 'Failed To Delete Data', '#');
    }


    echo json_encode($response_arr);
}

// ------------------ Delete Choco Hamper End --------------------
// ------------------ Delete Choco Hamper End --------------------

// ------------------ Delete Occassions Start --------------------
// ------------------ Delete Occassions Start --------------------

if (isset($_POST['my_product_delete_occasions'])) {
    $variables = $_POST['variables'];

    $data =  json_decode($variables, true);

    $col_id = $data[0]['col_id'];

    $check_row = get_num_row('occasions', "col_id='$col_id'");

    if ($check_row != 0) {

        $get_data = fetch_data('occasions', '*', "col_id='$col_id'");
        $get_f = $get_data['data'];
        $get_product_id = $get_f[0]['product_id'];

        delete_single_img('occasions', "col_id='$col_id'", 'main_pic', '../files/occasions/');
        delete_json_type_img('occasions', "col_id='$col_id'", 'other_pic', '../files/occasions/');


        $delete_product = delete_single('occasions', "col_id='$col_id'");
        $response_arr = array();
        if ($delete_product) {
            delete_single('search_keywords', "product_id='$get_product_id'");
            array_push($response_arr, 'true', 'Data Deleted Successfully', '#');
        } else {
            array_push($response_arr, 'false', 'Failed To Delete Data', '#');
        }
    } else {
        array_push($response_arr, 'false', 'Failed To Delete Data', '#');
    }
    echo json_encode($response_arr);
}

// ------------------ Delete Occassions End --------------------
// ------------------ Delete Occassions End --------------------



// ---------------------- Update Anniversary start -----------------
// ---------------------- Update Anniversary start -----------------


if (isset($_POST['isset_update_anniversary_details'])) {

    $col_id = realEscape('col_id');
    $Product_id = realEscape('Product_id');
    $name = realEscape('name');
    $des = realEscape('des');
    $new_short_des = htmlentities($des);
    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description = realEscape('description');



    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    //    --------------------- converting description into htmlentities------------

    $new_description = htmlentities($description);



    $updatable_fields_anniversary = "
    `name`='$name',
    `price`='$price',
    `discount`='$off',
    `des`='$new_description',
    `short_des`='$new_short_des'
    ";

    $updatable_fields_keywords = "
       `search_keys` = '$key_json'
    ";

    $update_anniversary_data =  update_data('anniversary', $updatable_fields_anniversary, "col_id='$col_id'");

    $response_arr = array();

    if ($update_anniversary_data) {
        $update_keys = update_data('search_keywords', $updatable_fields_keywords, "product_id='$Product_id'");

        array_push($response_arr, 'true', 'Data Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Data', '#');
    }

    echo json_encode($response_arr);
}




if (isset($_POST['isset_update_anniversary_main_pic'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $update = update_image('anniversary', "`main_pic`='$new_name'", "col_id='$col_id'", '../files/anniversary/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_anniversary_img_up_one'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('anniversary', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('anniversary', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/anniversary/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_anniversary_img_up_two'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('anniversary', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('anniversary', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/anniversary/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_anniversary_img_up_three'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('anniversary', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('anniversary', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/anniversary/', $img_name, $new_name, $file_tmp);

    $response_arr = array();


    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



// ---------------------- Update Anniversary end -----------------
// ---------------------- Update Anniversary end -----------------




// ---------------------- Update Birthday start -----------------
// ---------------------- Update Birthday start -----------------


if (isset($_POST['isset_update_birthday_details'])) {

    $col_id = realEscape('col_id');
    $Product_id = realEscape('Product_id');

    $name = realEscape('name');
    $des = realEscape('des');
    $new_short_des = htmlentities($des);

    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description = realEscape('description');



    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    //    --------------------- converting description into htmlentities------------

    $new_description = htmlentities($description);



    $updatable_fields_birthday = "
    `name`='$name',
    `price`='$price',
    `discount`='$off',
    `des`='$new_description',
    `short_des`='$new_short_des'
    ";

    $updatable_fields_keywords = "
       `search_keys` = '$key_json'
    ";

    $update_birthday_data =  update_data('birthday', $updatable_fields_birthday, "col_id='$col_id'");

    $response_arr = array();

    if ($update_birthday_data) {
        $update_keys = update_data('search_keywords', $updatable_fields_keywords, "product_id='$Product_id'");

        array_push($response_arr, 'true', 'Data Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Data', '#');
    }

    echo json_encode($response_arr);
}




if (isset($_POST['isset_update_birthday_main_pic'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $update = update_image('birthday', "`main_pic`='$new_name'", "col_id='$col_id'", '../files/birthday/', $img_name, $new_name, $file_tmp);

    $response_arr = array();

    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_birthday_img_up_one'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('birthday', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('birthday', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/birthday/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_birthday_img_up_two'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('birthday', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('birthday', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/birthday/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_birthday_img_up_three'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('birthday', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('birthday', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/birthday/', $img_name, $new_name, $file_tmp);

    $response_arr = array();


    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



// ---------------------- Update Birthday end -----------------
// ---------------------- Update Birthday end -----------------

// ---------------------- Update choco_hamper start -----------------
// ---------------------- Update choco_hamper start -----------------


if (isset($_POST['isset_update_choco_hamper_details'])) {

    $col_id = realEscape('col_id');
    $Product_id = realEscape('Product_id');

    $name = realEscape('name');
    $des = realEscape('des');
    $new_short_des = htmlentities($des);
    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description = realEscape('description');



    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    //    --------------------- converting description into htmlentities------------

    $new_description = htmlentities($description);



    $updatable_fields = "
    `name`='$name',
    `price`='$price',
    `discount`='$off',
    `des`='$new_description',
    `short_des`='$new_short_des'
    ";

    $updatable_fields_keywords = "
       `search_keys` = '$key_json'
    ";

    $update_data =  update_data('choco_hamper', $updatable_fields, "col_id='$col_id'");

    $response_arr = array();

    if ($update_data) {
        $update_keys = update_data('search_keywords', $updatable_fields_keywords, "product_id='$Product_id'");

        array_push($response_arr, 'true', 'Data Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Data', '#');
    }

    echo json_encode($response_arr);
}




if (isset($_POST['isset_update_choco_hamper_main_pic'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $update = update_image('choco_hamper', "`main_pic`='$new_name'", "col_id='$col_id'", '../files/choco_hamper/', $img_name, $new_name, $file_tmp);

    $response_arr = array();

    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_choco_hamper_img_up_one'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('choco_hamper', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('choco_hamper', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/choco_hamper/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_choco_hamper_img_up_two'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('choco_hamper', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('choco_hamper', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/choco_hamper/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_choco_hamper_img_up_three'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('choco_hamper', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('choco_hamper', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/choco_hamper/', $img_name, $new_name, $file_tmp);

    $response_arr = array();


    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



// ---------------------- Update choco_hamper end -----------------
// ---------------------- Update choco_hamper end -----------------




// ---------------------- Update Occasions start -----------------
// ---------------------- Update Occasions start -----------------


if (isset($_POST['isset_update_occassion_details'])) {

    $col_id = realEscape('col_id');
    $Product_id = realEscape('Product_id');

    $name = realEscape('name');
    $des = realEscape('des');
    $new_short_des = htmlentities($des);
    $price = $_POST['price'];
    $off = $_POST['off'];
    $searck_key = realEscape('keywords');
    $description = realEscape('description');



    // ----------------- converting keywords into array and then json format --------------

    $new_search_key = str_replace("'", "*", $searck_key);

    $key_arr = explode('/', $new_search_key);
    $key_json = json_encode($key_arr);


    //    --------------------- converting description into htmlentities------------

    $new_description = htmlentities($description);



    $updatable_fields = "
    `name`='$name',
    `price`='$price',
    `discount`='$off',
    `des`='$new_description',
    `short_des`='$new_short_des'
    ";

    $updatable_fields_keywords = "
       `search_keys` = '$key_json'
    ";

    $update_data =  update_data('occasions', $updatable_fields, "col_id='$col_id'");

    $response_arr = array();

    if ($update_data) {
        $update_keys = update_data('search_keywords', $updatable_fields_keywords, "product_id='$Product_id'");

        array_push($response_arr, 'true', 'Data Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Data', '#');
    }

    echo json_encode($response_arr);
}




if (isset($_POST['isset_update_occasions_main_pic'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $update = update_image('occasions', "`main_pic`='$new_name'", "col_id='$col_id'", '../files/occasions/', $img_name, $new_name, $file_tmp);

    $response_arr = array();

    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_occasions_img_up_one'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('occasions', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('occasions', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/occasions/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_occasions_img_up_two'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('occasions', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('occasions', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/occasions/', $img_name, $new_name, $file_tmp);

    $response_arr = array();



    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_occasions_img_up_three'])) {
    $col_id = realEscape('col_id');
    $img_name = realEscape('img_name');
    $index_value = realEscape('index_value');

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $new_name = new_fileName($file);

    $get_data = fetch_data('occasions', '*', "col_id='$col_id'");
    $get_data_f = $get_data['data'];

    $get_other_img =  $get_data_f[0]['other_pic'];
    $other_img_json = json_decode($get_other_img, true);

    $other_img_json[$index_value] = $new_name;

    $new_img_json = json_encode($other_img_json);

    $update = update_image('occasions', "`other_pic`='$new_img_json'", "col_id='$col_id'", '../files/occasions/', $img_name, $new_name, $file_tmp);

    $response_arr = array();


    if ($update) {
        array_push($response_arr, 'true', 'Image Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Image', '#');
    }

    echo json_encode($response_arr);
}



// ---------------------- Update choco_hamper end -----------------
// ---------------------- Update choco_hamper end -----------------






// --------------------------- Product Section End ---------------------
// --------------------------- Product Section End ---------------------
// --------------------------- Product Section End ---------------------
// --------------------------- Product Section End ---------------------
// --------------------------- Product Section End ---------------------



// --------------------------- Product Stock Start ---------------------
// --------------------------- Product Stock Start ---------------------
// --------------------------- Product Stock Start ---------------------
// --------------------------- Product Stock Start ---------------------
// --------------------------- Product Stock Start ---------------------


if (isset($_POST['isset_upload_stock_data'])) {

    $navigation = realEscape('navigation');
    $cat_id = realEscape('cat_id');
    $sub_cat_name = realEscape('sub_cat_name');
    $pro_id = realEscape('pro_id');
    $stock = realEscape('stock');

    $insert_column = "`nav_id`, `cat_id`, `sub_cat_id`, `product_id`, `stock`";
    $insert_value = " '$navigation', '$cat_id', '$sub_cat_name', '$pro_id' , '$stock' ";


    $insert_status = insert('product_stock', $insert_column, $insert_value);

    $response_arr = array();

    if ($insert_status) {
        array_push($response_arr, 'true', 'Data Added Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Add Data', '#');
    }

    echo json_encode($response_arr);
}


if (isset($_POST['isset_Update_instock_details'])) {

    $col_id = realEscape('col_id');
    $navigation = realEscape('navigation');
    $cat_id = realEscape('cat_id');
    $sub_cat_name = realEscape('sub_cat_name');
    $pro_id = realEscape('pro_id');
    $stock = realEscape('stock');


    $updatable_fields = "
    `nav_id`='$navigation',
    `cat_id`='$cat_id',
    `sub_cat_id`='$sub_cat_name',
    `product_id`='$pro_id',
    `stock`='$stock'
    ";

    $update_status = update_data('product_stock', $updatable_fields, "col_id='$col_id'");

    $response_arr = array();
    if ($update_status) {
        array_push($response_arr, 'true', 'Data Updated Successfully', '');
    } else {
        array_push($response_arr, 'false', 'Failed To Update Data', '#');
    }

    echo json_encode($response_arr);
}



// --------------------------- Product Stock End ---------------------
// --------------------------- Product Stock End ---------------------
// --------------------------- Product Stock End ---------------------
// --------------------------- Product Stock End ---------------------
// --------------------------- Product Stock End ---------------------


// ------------------------ Location Start -----------------
// ------------------------ Location Start -----------------
// ------------------------ Location Start -----------------


if (isset($_POST['isset_add_location'])) {

    $state = realEscape('state');
    $city = realEscape('city');
    $region = realEscape('region');
    $pincode = realEscape('pincode');

    $get_loc_r =  get_num_row('location', "pincode='$pincode'");

    $response_arr = array();
    if ($get_loc_r == 0) {
        $insert_col = "`state`, `city`, `region`, `pincode`";
        $insert_val = "'$state','$city','$region','$pincode'";

        $inser_status = insert('location', $insert_col, $insert_val);
        if ($inser_status) {
            array_push($response_arr, 'true', 'Location Added Successfully', 'add_location.php');
        } else {
            array_push($response_arr, 'false', 'Failed To Add Location', '#');
        }
    } else {
        array_push($response_arr, 'false', 'Location Already Added.', '#');
    }

    echo json_encode($response_arr);
}



if (isset($_POST['isset_import_location'])) {

    $file = $_FILES['File']['name'];
    $file_tmp = $_FILES['File']['tmp_name'];

    $response_arr = array();
    $failed_row = array();

    if (file_format($file, $excel)) {
        $Loc_data = ImportFiles($file_tmp);
        $Loc_data = remove_empty_cell($Loc_data);
        $n = 0;
        for ($i = 1; $i < count($Loc_data); $i++) {
            $state = trim($Loc_data[$i]['0']);
            $city = trim($Loc_data[$i]['1']);
            $region = trim($Loc_data[$i]['2']);
            $pin = trim($Loc_data[$i]['3']);

            $pin_code_r = get_num_row('location', "pincode='$pin'");
            if ($pin_code_r == 0) {
                $insert_col = "`state`, `city`, `region`, `pincode`";
                $insert_val = "'$state','$city','$region','$pin'";

                if (insert('location', $insert_col, $insert_val)) {
                    $n++;
                } else {
                    array_push($failed_row, $i);
                }
            } else {
                array_push($failed_row, $i);
            }
        }
        if ($n == 0) {
            array_push($response_arr, 'false', 'Failed to import data.', '#');
        } elseif (count($failed_row) != 0) {
            $failed_row_str = implode(', ', $failed_row);
            array_push($response_arr, 'false', 'Failed To Import Following Row :  ' . $failed_row_str, 'add_location.php');
        } elseif ($n != 0 && count($failed_row) == 0) {
            array_push($response_arr, 'true', 'Locations imported successfully.', 'add_location.php');
        }
    } else {
        array_push($response_arr, 'false', 'Invalid File Format.', '#');
    }
    echo json_encode($response_arr);
}


if (isset($_POST['isset_update_location'])) {
    $col_id = realEscape('col_id');
    $state = realEscape('state');
    $city = realEscape('city');
    $region = realEscape('region');
    $pincode = realEscape('pincode');

    $fields = "
     `state`='$state',
     `city`='$city',
     `region`='$region',
     `pincode`='$pincode' 
     ";
    $update_status = update_data('location', $fields, "col_id='$col_id'");

    $response_arr = array();
    if ($update_status) {
        array_push($response_arr, 'true', 'Location Updated Successfully', 'all_locations.php');
    } else {
        array_push($response_arr, 'false', 'Failed to update location', '#');
    }

    echo json_encode($response_arr);
}

if (isset($_POST['isset_lock_location'])) {
    $col_id = realEscape('col_id');

    $response_arr = array();

    $location = fetch_data('location', '*', "col_id='$col_id'");
    $get_r = $location['row'];
    $get_f = $location['data'];

    if ($get_f[0]['status'] == 'Unlocked') {
        $fields = "
        `status`='Locked'
        ";
        if (update_data('location', $fields, "col_id='$col_id'")) {
            array_push($response_arr, 'true', 'Location locked successfully', 'all_locations.php');
        } else {
            array_push($response_arr, 'false', 'Failed to lock location', '#');
        }
    } else {
        $fields = "
        `status`='Unlocked'
        ";
        if (update_data('location', $fields, "col_id='$col_id'")) {
            array_push($response_arr, 'true', 'Location Unlocked successfully', 'all_locations.php');
        } else {
            array_push($response_arr, 'false', 'Failed to unlock location', '#');
        }
    }

    echo json_encode($response_arr);
}


// ------------------------------- More Product start -------------------
// ------------------------------- More Product start -------------------
// ------------------------------- More Product start -------------------

if (isset($_POST['isset_delete_more_product'])) {
    $variables = $_POST['variables'];

    $data =  json_decode($variables, true);

    $col_id = $data[0]['col_id'];



    $get_data = fetch_data('more_product', '*', "col_id='$col_id'");
    $get_f = $get_data['data'];
    $get_pro_id = $get_f[0]['product_id'];

    delete_single_img('more_product', "col_id='$col_id'", 'img', '../files/more_products/');

    $response_arr = array();

    if (delete_single('more_product', "col_id='$col_id'")) {
        array_push($response_arr, 'true', 'Data Deleted Successfully', '#');
    } else {
        array_push($response_arr, 'false', 'Failed To Delete Data', '#');
    }

    echo json_encode($response_arr);
}


if (isset($_POST['isset_delete_slider_banner'])) {
    $variables = $_POST['variables'];

    $data =  json_decode($variables, true);

    $col_id = $data[0]['col_id'];

    $check_row = get_num_row('slider_banner', "col_id='$col_id'");

    if ($check_row != 0) {

        $get_data = fetch_data('slider_banner', '*', "col_id='$col_id'");
        $get_f = $get_data['data'];

        delete_single_img('slider_banner', "col_id='$col_id'", 'banner', '../files/banner/');

        $delete_banner = delete_single('slider_banner', "col_id='$col_id'");
        $response_arr = array();
        if ($delete_banner) {
            array_push($response_arr, 'true', 'Data Deleted Successfully', '#');
        } else {
            array_push($response_arr, 'false', 'Failed To Delete Data', '#');
        }
    } else {
        array_push($response_arr, 'false', 'Failed To Delete Data', '#');
    }
    echo json_encode($response_arr);
}

if (isset($_POST['isset_delete_shop_banner'])) {
    $variables = $_POST['variables'];

    $data =  json_decode($variables, true);

    $col_id = $data[0]['col_id'];

    $check_row = get_num_row('shop_banner', "col_id='$col_id'");

    if ($check_row != 0) {

        $get_data = fetch_data('shop_banner', '*', "col_id='$col_id'");
        $get_f = $get_data['data'];

        delete_single_img('shop_banner', "col_id='$col_id'", 'banner', '../files/banner/');

        $delete_banner = delete_single('shop_banner', "col_id='$col_id'");
        $response_arr = array();
        if ($delete_banner) {
            array_push($response_arr, 'true', 'Data Deleted Successfully', '#');
        } else {
            array_push($response_arr, 'false', 'Failed To Delete Data', '#');
        }
    } else {
        array_push($response_arr, 'false', 'Failed To Delete Data', '#');
    }
    echo json_encode($response_arr);
}


if (isset($_POST['isset_top_selling'])) {
    $variables = $_POST['variables'];

    $data =  json_decode($variables, true);

    $pro_id = $data[0]['pro_id'];
    $table = $data[0]['table'];

    $response_arr = array();

    if (get_num_row('top_selling', "product_id='$pro_id'") != 0) {
        delete_single('top_selling', "product_id='$pro_id'");
        array_push($response_arr, 'true', 'Romoved from top selling', '');
    } else {
        $insert_col = "`product_id`, `table`";
        $insert_val = "'$pro_id','$table'";

        if (insert('top_selling', $insert_col, $insert_val)) {
            array_push($response_arr, 'true', 'Added in top selling', '');
        } else {
            array_push($response_arr, 'false', 'Failed to add in top selling', '#');
        }
    }

    echo json_encode($response_arr);
}

if (isset($_POST['isset_top_searched'])) {
    $variables = $_POST['variables'];

    $data =  json_decode($variables, true);

    $pro_id = $data[0]['pro_id'];
    $table = $data[0]['table'];

    $response_arr = array();

    if (get_num_row('top_searched', "product_id='$pro_id'") != 0) {
        delete_single('top_searched', "product_id='$pro_id'");
        array_push($response_arr, 'true', 'Romoved from top searched', '');
    } else {
        $insert_col = "`product_id`, `table`";
        $insert_val = "'$pro_id','$table'";

        if (insert('top_searched', $insert_col, $insert_val)) {
            array_push($response_arr, 'true', 'Added in top searched', '');
        } else {
            array_push($response_arr, 'false', 'Failed to add in top searched', '#');
        }
    }

    echo json_encode($response_arr);
}


if (isset($_POST['isset_trending'])) {
    $variables = $_POST['variables'];

    $data =  json_decode($variables, true);

    $pro_id = $data[0]['pro_id'];
    $table = $data[0]['table'];

    $response_arr = array();

    if (get_num_row('trending', "product_id='$pro_id'") != 0) {
        delete_single('trending', "product_id='$pro_id'");
        array_push($response_arr, 'true', 'Romoved from trending', '');
    } else {
        $insert_col = "`product_id`, `table`";
        $insert_val = "'$pro_id','$table'";

        if (insert('trending', $insert_col, $insert_val)) {
            array_push($response_arr, 'true', 'Added in trending', '');
        } else {
            array_push($response_arr, 'false', 'Failed to add in trending', '#');
        }
    }

    echo json_encode($response_arr);
}

if (isset($_POST['isset_delete_sub_category_from_define_sub_cat'])) {
    $pro_id = realEscape('pro_id');
    $sub_cat_id = realEscape('sub_id');
    $response_arr = array();
    if (delete_single('define_sub_category', "product_id='$pro_id' and sub_cat_id = '$sub_cat_id'")) {
        array_push($response_arr, 'true');
    } else {
        array_push($response_arr, 'false');
    }
    echo json_encode($response_arr);
}


if (isset($_POST['isset_check_product_id'])) {
    $table = realEscape('table');
    $pro_id = realEscape('pro_id');
    $response_arr = array();

    if ($pro_id != '') {
        if (get_num_row($table, "product_id = '$pro_id'") != 0) {
            array_push($response_arr, 'false', 'Product id has been used. Please enter another product id');
        } else {
            array_push($response_arr, 'true', 'Product id is available for use');
        }
    } else {
        array_push($response_arr, 'false', 'Please enter a unique product id');
    }



    echo json_encode($response_arr);
}
