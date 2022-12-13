<?php require('Common/Header.php') ?>

<?php
$col_id = $_GET['col_id'];
$get_data = fetch_data('portfolio', '*', "col_id = '$col_id'");
$get_data_f = $get_data['data'];


if (isset($_POST['update'])) {
    $sub_cat_id = realEscape('sub_cat_id');
    $title = realEscape('title');
    $cat_id = realEscape('cat_id');
    $url = realEscape('url');
    $description = realEscape('description');
    $mainpic = $_FILES['mainpic']['name'];
    $mainpic_tmp = $_FILES['mainpic']['tmp_name'];

    if ($mainpic != '') {
        $new_name = new_fileName($mainpic);
        $update = "
        `cat_id`= '$cat_id', 
        `sub_cat_id`= '$sub_cat_id',
        `title` = '$title', 
        `des` = '$description', 
        `img` = '$new_name',
         `url` = '$url'";

        if (file_exists('../assets/img/portfolio/' . $get_data_f[0]['img'])) {
            unlink('../assets/img/portfolio/' . $get_data_f[0]['img']);
        }
        if (update_data('portfolio', $update, "col_id = '$col_id'")) {
            move_uploaded_file($mainpic_tmp, '../assets/img/portfolio/' . $new_name);
            SuccessFun('Data updated successfully');
        } else {
            DangerFun('Failed to update data');
        }
    } else {
        $new_name = new_fileName($mainpic);
        $new_name = new_fileName($mainpic);
        $update = "
        `cat_id` = '$cat_id', 
        `sub_cat_id` = '$sub_cat_id', 
        `title` = '$title', 
        `des` = '$description', 
         `url` = '$url'";

        if (update_data('portfolio', $update, "col_id = '$col_id'")) {

            SuccessFun('Data updated successfully');
        } else {
            DangerFun('Failed to update data');
        }
    }
}

?>

<div class="container-fluid">

    <div class="row">


        <div class="col-12">
            <div class="card shadow mb-4">


                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="add_Chocolate">

                        <div class="row">
                            <div class="col-lg-12 col-12 mb-3">
                                <label class="form-label label-color font-weight-bold">Title</label>
                                <input type="text" name="title" class="form-control" required placeholder="Title" value="<?php echo $get_data_f[0]['title'] ?>">
                            </div>


                            <div class="col-lg-12 col-12 mb-3">
                                <label class="form-label label-color font-weight-bold">Category</label>
                                <select class="form-control selectpicker border select_nav" data-live-search=true required name="cat_id" onchange="navigation_select(this.value)">
                                    <option value="<?php echo $get_data_f[0]['cat_id'] ?>"><?php echo get_category_name($get_data_f[0]['cat_id']) ?></option>
                                    <?php echo get_category() ?>
                                </select>
                            </div>
                            <div class="col-lg-12 col-12 mb-3">
                                <label class="form-label label-color font-weight-bold">Sub-Category</label>
                                <select class="form-control border category_select" required name="sub_cat_id">
                                    <option value="<?php echo $get_data_f[0]['sub_cat_id'] ?>"><?php echo get_sub_category_name($get_data_f[0]['sub_cat_id'])  ?></option>
                                </select>
                            </div>

                            <div class="col-lg-12 col-12 mb-3">
                                <label class="form-label label-color font-weight-bold">Photo</label>
                                <input type="file" name="mainpic" accept="image/*" class="form-control files" id="main-pic" onchange="image_preview('#main-pic', '#img-pre-1', 1)">
                            </div>
                            <div class="col-12 mb-3 img-priview" id="img-pre-1">

                            </div>

                            <div class="col-lg-12 col-12 mb-3">
                                <label class="form-label label-color font-weight-bold">URL</label>
                                <input type="text" name="url" class="form-control" required placeholder="URL" value="<?php echo $get_data_f[0]['url'] ?>">
                            </div>
                            <div class="col-lg-12 col-12 mb-3">
                                <label class="form-label label-color font-weight-bold">Description</label>
                                <textarea name="description" class="form-control" required>
                                <?php echo $get_data_f[0]['des'] ?> 
                               </textarea>
                            </div>

                            <div class="col-12 mb-3 text-center">
                                <button type="submit" name="update" class="btn btn-primary pl-4 pr-4 pt-2 pb-2">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>



<?php require('Common/Footer.php') ?>
<script>
    CKEDITOR.replace('editor');
</script>

</body>

</html>