<?php
require('./login_auth_admin.php');
require('../php_helper.php');

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <link href="css/main.css" rel="stylesheet">

    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link href="css/simple-lightbox.min.css" rel="stylesheet" />
    <link href="css/Custom.css" rel="stylesheet">
 
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading"> Module</div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Portfolio" aria-expanded="true">
                    <i class="fas fa-file"></i>
                    <span>Portfolio</span>
                </a>
                <div id="Portfolio" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="category.php">Category</a>
                        <a class="collapse-item" href="sub_category.php">Sub-Category</a>
                        <a class="collapse-item" href="portfolio.php">Portfolio</a>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-file"></i>
                    <span>Reviews</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-file"></i>
                    <span>Clients</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">
                    <i class="fas fa-file"></i>
                    <span>Contact</span>
                </a>
            </li>

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>


        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <div class="w-100">

                        <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_c1hkermx.json" background="transparent" speed="1" style="width: 100px;" loop autoplay></lottie-player>
                        <h4 class="font-weight-bold label-color d-md-block d-none" style="font-size:20px;">Sneha It Freelancer</h4>

                    </div>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle" src="img/admin_info/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="admin_logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- -------------------------------- Modals For All Pages start ---------------------------- -->
                <!-- -------------------------------- Modals For All Pages start ---------------------------- -->
                <!-- -------------------------------- Modals For All Pages start ---------------------------- -->


                <!-- ------------------------------ New Academic Session Modal start -------------------  -->


                <div class="modal fade" id="NewAcaSession" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Academic Session</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="AcaSession" class="form-control" placeholder="Academic Session" required>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button type="submit" name="AddNewAcademicSession" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-------------------------------- New Academic Session Modal end--------------------->


                <!----------------------- Alert Modal start-------------------->

                <!-- --------------Success Alert ----------------- -->
                <!-- --------------Success Alert ----------------- -->
                <!-- --------------Success Alert ----------------- -->

                <div class="modal fade" role="dialog" id="alert-modal" style="z-index:100000">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert-success">
                                <h5 class="modal-title text-success" id="exampleModalLabel">Success Alert</h5>
                            </div>
                            <div class="modal-body" id="alert-modal-body">

                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> -->
                                <a href="#" class="btn btn-secondary" id="alert-ok">OK</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- --------- Failure Alert --------------- -->
                <!-- --------- Failure Alert --------------- -->
                <!-- --------- Failure Alert --------------- -->

                <div class="modal fade" role="dialog" id="alert-fail_modal" style="z-index:100000">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert-danger">
                                <h5 class="modal-title text-danger" id="exampleModalLabel">Failure Alert</h5>
                            </div>
                            <div class="modal-body" id="alert-fail_modal-body">

                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> -->
                                <a href="#" class="btn btn-secondary" id="alert-fail_ok">OK</a>
                            </div>
                        </div>
                    </div>
                </div>



                <!----------------------- Alert Modal End-------------------->

                <!-- ----------------------- Profile Image Modal start----------------- -->
                <div id="profile-image-viewer">
                    <span class="profile-close">&times;</span>
                    <img class="profile-modal-content" id="full-image">
                </div>
                <!-- ----------------------- Profile Image Modal end----------------- -->



                <div class="internet-status ">
                    <div class="int-status-content bg-white shadow rounded pt-3 pb-5">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="img/offline.gif" width="300">
                        </div>
                        <div class="text-center mt-3 ">
                            <h4 class="text-danger text-uppercase font-weight-bold" style="font-size: 25px;">You Are Offline !</h4>
                            <p class="text-center text-info"> Internet Required</p>
                        </div>
                    </div>
                </div>


                <div id="image-modal">
                    <span class="image-close">&times;</span>
                    <img class="image-modal-content" id="modal-image">
                </div>


                <!---------------------------------- Modals For All Pages end ------------------------------>
                <!---------------------------------- Modals For All Pages end ------------------------------>
                <!---------------------------------- Modals For All Pages end ------------------------------>


                <!-- ---------------------- Toast -----------------  -->
                <div id="snackbar"></div>