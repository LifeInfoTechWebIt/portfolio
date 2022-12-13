<?php require('header.php') ?>
<?php

if (isset($_GET['sub_cat_id'])) {
    $url_sub_cat_id = $_GET['sub_cat_id'];
} else {
    $url_sub_cat_id = '';
}

if (isset($_POST['contact-us'])) {
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $subject = mysqli_real_escape_string($conn, trim($_POST['subject']));
    $message = mysqli_real_escape_string($conn, trim($_POST['message']));

    $insert_contact = "INSERT INTO `contact`(`name`, `phone`, `email`, `subject`, `msg`)
     VALUES ('$name','$phone','$email','$subject','$message')";

    if (mysqli_query($conn, $insert_contact)) {
        echo "<script>alert('Contact form submitted successfully')
       window.location.href = 'index.php';
     </script>";
    } else {
        echo "<script>alert('Form not submitted')
    window.location.href = 'index.php';
  </script>";
    }
}

?>
<main class="main-page-wrapper" style="margin-top:50px;">
    <div class="container" style="margin-top: 150px;">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center text-dark">My Portfolio</h3>
            </div>
        </div>
    </div>
    <!-- Start Client Area -->
    <div class="rn-client-area rn-section-gap section-separator" id="clients">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">

                        <h4 class="title">Category</h4>
                    </div>
                </div>
            </div>
            <div class="row mt--30 mt_md--20 mt_sm--20">
                <div class="col-lg-3">
                    <div class="d-flex flex-wrap align-content-start h-100">
                        <div class="position-sticky clients-wrapper sticky-top rbt-sticky-top-adjust">
                            <ul class="nav tab-navigation-button flex-column nav-pills me-3" id="v-pills-tab" role="tablist">
                                <?php
                                $get_category_data = fetch_data('category', '*', '1');
                                if ($get_category_data['row'] != 0) {
                                    foreach ($get_category_data['data'] as $category) {
                                ?>
                                        <li class="nav-item">
                                            <a class="nav-link bg-white shadow-none" data-bs-toggle="collapse" href="#<?php echo $category['cat_name'] ?>" role="button">
                                                <p class="w-100 d-flex justify-content-between align-items-center">
                                                    <span style="font-size: 18px;"><?php echo get_category_name($category['cat_id']) ?></span>
                                                    <span><i class="fa-solid fa-caret-down"></i></span>
                                                </p>
                                            </a>
                                            <div class="collapse" aria-labelledby="headingTwo" id="<?php echo $category['cat_name'] ?>">
                                                <div class="list-group">
                                                    <?php
                                                    $get_sub_cat_data = fetch_data('sub_category', '*', "cat_id = '$category[cat_id]'");
                                                    if ($get_sub_cat_data['row'] != 0) {
                                                        foreach ($get_sub_cat_data['data'] as $sub_cat_data) {
                                                            $sub_cat_id = $sub_cat_data['sub_cat_id'];
                                                            echo "
                                                            <a href='all-portfolio.php?sub_cat_id=$sub_cat_id' class='list-group-item list-group-item-action list-group-item-light'>
                                                            $sub_cat_data[sub_cat_name]
                                                            </a>";
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="d-flex align-items-start">
                        <div class="">
                            <div class="client-card m-0 p-0">
                                <div class="row">
                                    <?php
                                    if ($sub_cat_id != '') {
                                        $get_portfolio = fetch_data('portfolio', '*', "sub_cat_id='$url_sub_cat_id' order by col_id desc");
                                    } else {
                                        $get_portfolio = fetch_data('portfolio', '*', "1 order by col_id desc");
                                    }

                                    if ($get_portfolio['row'] != 0) {
                                        foreach ($get_portfolio['data'] as $portfolio) {
                                    ?>
                                            <div data-aos="fade-up" data-aos-delay="100" data-aos-once="true" class="col-lg-4 col-md-6 col-12" onclick="show_portfolio('<?php echo $portfolio['col_id'] ?>')">
                                                <div class="rn-portfolio">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="javascript:void(0)">
                                                                <img src="assets/img/portfolio/<?php echo $portfolio['img'] ?>">
                                                            </a>
                                                        </div>
                                                        <div class="content">
                                                            <div class="category-info">
                                                                <div class="category-list d-flex justify-content-between align-items-center w-100">
                                                                    <a href="javascript:void(0)"><?php echo get_category_name($portfolio['cat_id']) ?></a>
                                                                    <a href="<?php echo $portfolio['url'] ?>" target='_blank'>Visit Site</a>

                                                                </div>
                                                            </div>
                                                            <h4 class="title"><a href="javascript:void(0)"><?php echo $portfolio['title'] ?> <i class="feather-arrow-up-right"></i></a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End client section -->


    <!-- Start Contact section -->
    <div class="rn-contact-area rn-section-gap section-separator" id="contacts">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <span class="subtitle">Contact</span>
                        <h2 class="title">Join with us
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row mt--50 mt_md--40 mt_sm--40 mt-contact-sm">
                <div class="col-lg-5">
                    <div class="contact-about-area">
                        <div class="thumbnail">
                            <h6><img src="assets/img/photo1.jpeg" alt="Avatar" style="width: 380px;" height="455px;"></h6>
                        </div>
                        <div class="title-area">
                            <h4 class="title">Sneha Gupta</h4>
                            <span>Freelancer Work Full Time & Parttime</span>
                        </div>
                        <div class="description">
                            <p>I have over 15+ years of Experience in web development.I am available for freelance work. Connect with me via and call in to my account.
                            </p>
                            <span class="phone">Phone: <a href="tel:8542057751">+91-8542057751</a></span>
                            <span class="phone">whatapp: <a href="tel:8542057751">+91-8542057751</a></span>
                            <span class="mail">Email: <a href="mailto:sneha.gupta1214@gmail.com">sneha.gupta1214@gmail.com</a></span>
                        </div>
                        <div class="social-area">

                            <div class="social-icone">
                                <a href="#"><i data-feather="facebook"></i></a>
                                <a href="#"><i data-feather="linkedin"></i></a>
                                <a href="#"><i data-feather="instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos-delay="600" class="col-lg-7 contact-input">
                    <div class="contact-form-wrapper">
                        <div class="introduce">

                            <form class="rnt-contact-form row" method="POST">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="contact-name">Your Name</label>
                                        <input class="form-control form-control-lg" name="name" id="contact-name" type="text" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="contact-phone">Phone Number</label>
                                        <input type="number" name="phone" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="contact-email">Email</label>
                                        <input type="email" name="email" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="subject">subject</label>
                                        <input class="form-control form-control-sm" id="subject" name="subject" type="text" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="contact-message">Your Message</label>
                                        <textarea name="message" id="contact-message" cols="30" rows="10" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <button type="submit" name="contact-us" class="btn rn-btn">
                                            <span>SUBMIT NOW</span>
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contuct section -->

    <!-- Modal Portfolio Body area Start -->
    <div class="modal fade" id="portfolio-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center" id="portolio-content">


                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Portfolio area -->

    <!-- Back to  top Start -->
    <div class="backto-top">
        <div>
            <i data-feather="arrow-up"></i>
        </div>
    </div>
    <!-- Back to top end -->




</main>


<?php require('footer.php') ?>