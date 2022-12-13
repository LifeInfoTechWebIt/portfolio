<?php require('Common/Header.php') ?>

<div class="container-fluid">
 
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="m-0 font-weight-bold text-primary text-md-left text-center " style="width:300px">All Contact Data</h6>
                    <div class="text-center text-md-right mt-2" style=" width:300px">
                      
                        <button type="button" class="btn btn-primary" onclick="Export('Admi-Table', 'Contact')"><i class="fas fa-download"></i></button>
                  
                        
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered DataTable" width="100%" cellspacing="0" id="Admi-Table">
                        <thead>
                            <tr>
                                <th class="text-center">Sr.No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Message</th>
                                <th class="text-center">Date<i class="invisible">_</i>&Time</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                         <?php
                           $get_data = fetch_data('contact' , '*' , "1");
                           if($get_data['row'] != 0){
                            $n = 1;
                             foreach($get_data['data'] as $d){
                                echo "
                                <tr id = 'academic_session$n'>
                                <th class = 'text-center'>$n</th>
                                <td class = 'text-center'>$d[name]</td>
                                <td class = 'text-center'>$d[phone]</td>
                                <td class = 'text-center'>$d[email]</td>
                                <td class = 'text-center'>$d[subject]</td>
                                <td class = 'text-center' style='width:150px'>$d[msg]</td>
                                <td class = 'text-center'>$d[date_time]</td>
                                <td class = 'text-center'>
                                <div class='dropdown no-arrow'>
                                <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink'
                                    data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <i class='fas fa-ellipsis-v fa-sm fa-fw text-gray-400'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right shadow animated--fade-in'
                                    aria-labelledby='dropdownMenuLink'>
                                    <div class='dropdown-header'>Action</div>
                                    <a class='dropdown-item' href='#' onclick = deleteSingle(['contact','$d[col_id]','academic_session$n'])><i class = 'fas fa-trash-alt'></i> Delete</a>
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