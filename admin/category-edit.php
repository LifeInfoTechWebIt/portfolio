<?php require('Common/Header.php');

$col_id = $_GET['col_id'];
goback($col_id);


$get_data = fetch_data('category', '*', "col_id = '$col_id'");

$get_r = $get_data['row'];
$get_f = $get_data['data'];

if (isset($_POST['update_data'])) {
    $cat_name = realEscape('cat_name');
 
    $updatable_fields = "
    `cat_name`='$cat_name'
    ";
    $status = update_data('category', $updatable_fields, "col_id='$col_id'");
    if ($status) {
        SuccessFun('Category Name Updated Successfully');
    } else {
        DangerFun('Failed To Update Category Name');
    }
}

?>


<div class="container-fluid">

    <div class="row">

        <div class="col-12">
            <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="m-0 font-weight-bold text-primary text-md-left text-center " style="width:300px">Update Category</h6>

                </div>

                <div class="card-body">
                    <table class="table" width="100%" cellspacing="0">

                        <form method="POST">
                            <div class="row border pb-4">

                                <div class="col-md-6 col-12 mb-3 p-3">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" name="cat_name" value="<?php echo $get_f[0]['cat_name'] ?>" class="form-control make_capital" required placeholder="Category Name">
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