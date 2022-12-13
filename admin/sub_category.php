<?php require('Common/Header.php');
 

?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <form method="post">

                    <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="m-0 font-weight-bold text-primary text-md-left text-center " style="width:300px">All Sub-Category</h6>
                        <div class="text-center text-md-right mt-2" style=" width:300px">
                            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="auto" title="Add" onclick="show_modal('#Add_Cat')"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered DataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                   
                                    <th class="text-center">Category<i class="invisible">_</i>Id</th>
                                    <th class="text-center">Category<i class="invisible">_</i>Name</th>
                                    <th class="text-center">Sub<i class="invisible">_</i>Category<i class="invisible">_</i>Id</th>
                                    <th class="text-center">Sub<i class="invisible">_</i>Category<i class="invisible">_</i>Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $get_data = fetch_data("sub_category", "*",  " 1 order by col_id desc");
                                $get_r = $get_data['row'];
                                $get_f = $get_data['data'];

                                if ($get_r != 0) {
                                    for ($i = 0; $i < count($get_f); $i++) {
                                        $col_id = $get_f[$i]['col_id'];
                                        $cat_id = $get_f[$i]['cat_id'];
                                        $sub_cat_id = $get_f[$i]['sub_cat_id'];
                                        $sub_cat_name =  $get_f[$i]['sub_cat_name'];
                                       

                                        // -------Getting category name --------
                                        $get_cat_data = fetch_data('category', '*', "cat_id='$cat_id'");
                                        $get_cat_r = $get_cat_data['row'];
                                        $get_cat_f = $get_cat_data['data'];

                                        if ($get_cat_r != 0) {
                                            $get_cat_name = $get_cat_f[0]['cat_name'];
                                        } else {
                                            $get_cat_name =  "<b style='color:red'>Not Found</b>";
                                        }

                                        //  ------------Getting navigation -----------------
                                       
                                        echo "
                                            <tr id='pro_tr_$i'>
                                               <td class='text-center'>$cat_id</td>
                                               <td class='text-center'>$get_cat_name </td>
                                               <td class='text-center'>$sub_cat_id</td>
                                               <td class='text-center'>$sub_cat_name</td>
                                               
                                               
                                               <td class = 'text-center'>
                                               <div class='dropdown no-arrow'>
                                               <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink'
                                                   data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                   <i class='fas fa-ellipsis-v fa-sm fa-fw text-gray-400'></i>
                                               </a>

                                               <div class='dropdown-menu dropdown-menu-right shadow animated--fade-in'
                                                   aria-labelledby='dropdownMenuLink'>
                                                   <div class='dropdown-header'>Action</div>                                                  
        
                                                   <a class='dropdown-item' href='pro_sub_category_edit.php?col_id=$col_id'><i class = 'fas fa-edit'></i> Edit</a>
                                                   <a class='dropdown-item' href='#' onclick=deleteSingle(['sub_category','$col_id','pro_tr_$i'])><i class='fas fa-trash-alt'></i> Delete
                                                  
                                              </a>
                                               </div>
                                               </div>                   
                                               </td>


                                            </tr>
                                          ";
                                    }
                                }

                                ?>
                            </tbody>
                        </table>

                    </div>
                </form>
            </div>
        </div>

    </div>


</div>


 

<!-- ------------------------------- Modal Start ---------------------- -->


<div class="modal fade" id="Add_Cat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data" id="cat_form" onsubmit="uploadData('cat_form','add_new_sub_category', event)">
                <div class="modal-header" style="background-color: #008080;">
                    <h5 class="modal-title text-light font-weight-bold">Add New Category</h5>
                    <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="fas fa-times"></i>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-12 mb-3">
                                <label class="form-label label-color">Category</label>
                                <select name="cat_id" class="form-control category_select" data-live-search='true' required>
                                    <option value="">---</option>
                                    <?php echo get_category() ?>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label label-color">Sub-Category</label>
                                <input type="text" name="sub_cat_name" class="form-control make_capital" required placeholder="Category Name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="add" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require('Common/Footer.php') ?>
</body>

</html>