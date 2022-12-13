<?php require('Common/Header.php');

 if(isset($_POST['add'])){
     $cat_name  = realEscape('cat_name');

     $cat_id = uid_generator();

     $insert_col = "`cat_id`, `cat_name`";
     $insert_val = "'$cat_id','$cat_name'";
     if(insert('category', $insert_col, $insert_val)){
         SuccessFun('Category added successfully');
     }else{
         DangerFun('Failed to add category');
     }
 }

?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <form method="post">

                    <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="m-0 font-weight-bold text-primary text-md-left text-center " style="width:300px">All Category</h6>
                        <div class="text-center text-md-right mt-2" style=" width:300px">
                            
                            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="auto" title="Add" onclick="show_modal('#Add_Cat')"><i class="fas fa-plus"></i></button>

                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered DataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    <th class="text-center">Category Id</th>
                                    <th class="text-center">Category Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $get_data = fetch_data("category", "*",  " 1 order by col_id desc");
                                $get_r = $get_data['row'];
                                $get_f = $get_data['data'];

                                if ($get_r != 0) {
                                    for ($i = 0; $i < count($get_f); $i++) {
                                        $col_id = $get_f[$i]['col_id'];
                                        $cat_id = $get_f[$i]['cat_id'];
                                        $cat_name =  $get_f[$i]['cat_name'];

                                        echo "
                                            <tr id='pro_tr_$i'>
                                              
                                               <td class='text-center'>$cat_id</td>
                                               <td class='text-center'>$cat_name</td>
    
                                               <td class = 'text-center'>
                                               <div class='dropdown no-arrow'>
                                               <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink'
                                                   data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                   <i class='fas fa-ellipsis-v fa-sm fa-fw text-gray-400'></i>
                                               </a>

                                               <div class='dropdown-menu dropdown-menu-right shadow animated--fade-in'
                                                   aria-labelledby='dropdownMenuLink'>
                                                   <div class='dropdown-header'>Action</div>                                                  
        
                                                   <a class='dropdown-item' href='category-edit.php?col_id=$col_id'><i class = 'fas fa-edit'></i> Edit</a>
                                                   <a class='dropdown-item' href='#' onclick=deleteSingle(['category','$col_id','pro_tr_$i'])><i class='fas fa-trash-alt'></i> Delete </a>
                                                  
                                              
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
            <form method="POST" enctype="multipart/form-data"  >
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
                                <label class="form-label label-color">Category Name</label>
                                <input type="text" name="cat_name" class="form-control make_capital" required placeholder="Category Name">
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