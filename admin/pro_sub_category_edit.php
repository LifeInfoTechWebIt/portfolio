<?php require('Common/Header.php');

$col_id = $_GET['col_id'];
goback($col_id);


$get_data = fetch_data('sub_category', '*', "col_id = '$col_id'");

$get_r = $get_data['row'];
$get_f = $get_data['data'];
$cat_id = $get_f[0]['cat_id'];


$get_cat_name_data = fetch_data('category', '*', "cat_id='$cat_id'");
$get_cat_f = $get_cat_name_data['data'];
$get_cat_name = $get_cat_f[0]['cat_name'];




if (isset($_POST['update_data'])) {

    $cat_up_id = realEscape('cat_id');
    $sub_cat_name = realEscape('sub_cat_name');

    $get_row = get_num_row('sub_category', "cat_id='$cat_up_id' and col_id != '$col_id' and sub_cat_name = '$sub_cat_name'");

    $updatable_fields = "
    `cat_id`='$cat_up_id',
    `sub_cat_name`='$sub_cat_name'
    ";

    if ($get_row != 0) {
        DangerFun('Sub Category Name Already Present');
    } else {
        $status = update_data('sub_category', $updatable_fields, "col_id='$col_id'");
        if ($status) {
            SuccessFun('Sub Category Name Updated Successfully');
        } else {
            DangerFun('Failed To Update Category Name');
        }
    }
}

?>


<div class="container-fluid">

    <div class="row">

        <div class="col-12 mb-3">
            <?php back_btn('sub_category.php', 'Sub-Category') ?>
        </div>

        <div class="col-12">
            <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="m-0 font-weight-bold text-primary text-md-left text-center " style="width:300px">Udate Sub-Category</h6>

                </div>

                <div class="card-body">
                    <table class="table" width="100%" cellspacing="0">

                        <form method="POST">
                            <div class="row border pb-4">

                                <div class="col-md-6 col-12 mb-3 p-3">
                                    <label class="form-label">Category</label>
                                    <select name="cat_id" class="form-control category_select" required>
                                        <option value="<?php echo $cat_id ?>"><?php echo $get_cat_name ?></option>
                                        <?php echo get_category() ?>
                                    </select>
                                </div>
                                <div class="col-md-6 col-12 mb-3 p-3">
                                    <label class="form-label">Sub-Category</label>
                                    <input type="text" name="sub_cat_name" value="<?php echo $get_f[0]['sub_cat_name'] ?>" class="form-control make_capital" required placeholder="Category Name">
                                </div>
                                <div class="col-12 mb-3  p-3 text-center">
                                    <button type="submit" name="update_data" class="btn btn-primary ">Update</button>
                                </div>
                            </div>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>








<?php require('Common/Footer.php') ?>


</body>

</html>