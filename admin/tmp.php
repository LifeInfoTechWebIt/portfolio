<?php require('Common/Header.php') ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Page Heading</h1>
    </div>

</div>

<?php require('Common/Footer.php') ?>
</body>

</html>





<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="m-0 font-weight-bold text-primary text-md-left text-center " style="width:300px">All Students</h6>
                <div class="text-center text-md-right mt-2" style=" width:300px">
                    <button type="submit" name="DeleteAll" disabled class="btn btn-primary DeleteAllBtn"><i class="fas fa-trash"></i></button>
                    <button type="button" class="btn btn-primary" onclick="Export('Admi-Table', 'Admission')"><i class="fas fa-download"></i></button>
                    <a href='#' class="btn btn-primary" data-toggle="tooltip" data-placement="auto" title="Add"><i class="fas fa-plus"></i></a>
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="auto" title="Import"><i class="fas fa-upload"></i></button>
                </div>
            </div>

            <div class="card-body">

            </div>
        </div>
    </div>
</div>

<div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="m-0 font-weight-bold text-primary text-md-left text-center " style="width:300px">All Marksheet</h6>
    <div class="text-center text-md-right mt-2" style=" width:300px">
        <button type="submit" name="DeleteAll" disabled class="btn btn-primary DeleteAllBtn"><i class="fas fa-trash"></i></button>
        <button type="button" class="btn btn-primary" onclick="Export('Admi-Table', 'Admission')"><i class="fas fa-download"></i></button>
        <a href='#' class="btn btn-primary" data-toggle="tooltip" data-placement="auto" title="Add"><i class="fas fa-plus"></i></a>
        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="auto" title="Import"><i class="fas fa-upload"></i></button>
    </div>
</div>



<table class="table table-bordered DataTable" width="100%" cellspacing="0" id="Admi-Table">
    <thead>
        <tr>
            <th class="text-center"></th>
        </tr>
    </thead>

    <tbody>

    </tbody>
</table>


<!-- ------------------------- Modal Tem--------------- -->


<div class="modal fade" id="Register-Institute" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
       <div class="modal-content">
           <form method="POST">
               <div class="modal-header" style="background-color: #008080;">
                   <h5 class="modal-title text-light font-weight-bold">head</h5>
                   <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">
                           <i class="fas fa-times"></i>
                       </span>
                   </button>
               </div>
               <div class="modal-body">
                    
               </div>
               <div class="modal-footer">
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                   <button type="submit" name="" class="btn btn-primary">Submit</button>
               </div>
           </form>
       </div>
   </div>
</div>


