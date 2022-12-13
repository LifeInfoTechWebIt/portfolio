<?php require('Common/Header.php') ?>

<?php
if (isset($_POST['add'])) {
    $sub_cat_id = realEscape('sub_cat_id');
    $title = realEscape('title');
    $cat_id = realEscape('cat_id');
    $url = realEscape('url');
    $description = realEscape('description');
    $mainpic = $_FILES['mainpic']['name'];
    $mainpic_tmp = $_FILES['mainpic']['tmp_name'];

    $new_name = new_fileName($mainpic);

    $insert_col = "`cat_id`,`sub_cat_id`,`title`, `des`, `img`, `url`";
    $insert_val = "'$cat_id','$sub_cat_id','$title','$description','$new_name','$url' ";

    if (insert('portfolio', $insert_col, $insert_val)) {
        move_uploaded_file($mainpic_tmp, '../assets/img/portfolio/' . $new_name);
        SuccessFun('Data added successfully');
    } else {
        DangerFun('Failed to add data');
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
                                <input type="text" name="title" class="form-control" required placeholder="Title">
                            </div>
                            <div class="col-lg-12 col-12 mb-3">
                                <label class="form-label label-color font-weight-bold">Category</label>
                                <select class="form-control selectpicker border select_nav" data-live-search=true required name="cat_id" onchange="navigation_select(this.value)">
                                    <option value="">---</option>
                                    <?php echo get_category() ?>
                                </select>
                            </div>
                            <div class="col-lg-12 col-12 mb-3">
                                <label class="form-label label-color font-weight-bold">Sub-Category</label>
                                <select class="form-control border category_select" required name="sub_cat_id">
                                    <option value="">---</option>
                                </select>
                            </div>
                            <div class="col-lg-12 col-12 mb-3">
                                <label class="form-label label-color font-weight-bold">Photo</label>
                                <input type="file" name="mainpic" accept="image/*" class="form-control files" id="main-pic" required onchange="image_preview('#main-pic', '#img-pre-1', 1)">
                            </div>
                            <div class="col-12 mb-3 img-priview" id="img-pre-1">

                            </div>
                            <div class="col-lg-12 col-12 mb-3">
                                <label class="form-label label-color font-weight-bold">URL</label>
                                <input type="text" name="url" class="form-control" required placeholder="URL">
                            </div>
                            <div class="col-lg-12 col-12 mb-3">
                                <label class="form-label label-color font-weight-bold">Description</label>
                                <textarea name="description" class="form-control" required>
                               </textarea>
                            </div>
                            <div class="col-12 mb-3 text-center">
                                <button type="submit" name="add" class="btn btn-primary pl-4 pr-4 pt-2 pb-2">Add</button>
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