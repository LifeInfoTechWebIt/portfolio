<?php require('Common/Header.php') ?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="m-0 font-weight-bold text-primary text-md-left text-center " style="width:300px">All Portfolio</h6>
                    <div class="text-center text-md-right mt-2" style=" width:300px">
                        <a href='add-portfolio.php' class="btn btn-primary" data-toggle="tooltip" data-placement="auto" title="Add"><i class="fas fa-plus"></i></a>
                    </div>
                </div>

                <div class="card-body">

                    <table class="table table-bordered DataTable" width="100%" cellspacing="0" id="Admi-Table">
                        <thead>
                            <tr>
                                <th class="text-center">Sr.No.</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Sub-Category</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Url</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $get_data = fetch_data('portfolio', '*', "1");
                            if ($get_data['row'] != 0) {
                                $n = 1;
                                foreach ($get_data['data'] as $d) {
                                    $cat_name =  get_category_name($d['cat_id']);
                                    $sub_cat_name =  get_sub_category_name($d['sub_cat_id']);
                                    echo "
                                <tr id = 'academic_session$n'>
                                <th class = 'text-center'>$n</th>
                                <td class = 'text-center'>$cat_name</td>
                                <td class = 'text-center'>$sub_cat_name</td>
                                <td class = 'text-center'>$d[title]</td>
                                <td class = 'text-center' style='max-width:200px'>$d[des]</td>
                                <td class = 'text-center'>$d[url]</td>
                              
                                <td class = 'text-center'>
                                   <img src = '../assets/img/portfolio/$d[img]' style='height:100px'>
                                </td>
                                <td class = 'text-center'>
                                <div class='dropdown no-arrow'>
                                <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink'
                                    data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <i class='fas fa-ellipsis-v fa-sm fa-fw text-gray-400'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right shadow animated--fade-in'
                                    aria-labelledby='dropdownMenuLink'>
                                    <div class='dropdown-header'>Action</div>
                                    <a class='dropdown-item' href='edit-portfolio.php?col_id=$d[col_id]' ><i class = 'fas fa-edit'></i> Edit</a>
                                    <a class='dropdown-item' href='#' onclick = deleteSingle(['portfolio','$d[col_id]','academic_session$n'])><i class = 'fas fa-trash-alt'></i> Delete</a>
                                </div>
                                </div>
                                </td>
                                </tr>
                                     ";
                                    $n++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>


</div>

<?php require('Common/Footer.php') ?>
</body>

</html>