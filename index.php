<?php require('header.php') ?>
<?php
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
<main class="main-page-wrapper">

    <!-- Start Slider Area -->
    <div id="home" class="rn-slider-area">
        <div class="slide slider-style-1">
            <div class="container">
                <div class="row row--30 align-items-center">
                    <div class="order-2 order-lg-1 col-lg-7 mt_md--50 mt_sm--50 mt_lg--30">
                        <div class="content">
                            <div class="inner">
                                <span class="subtitle">Welcome to our client</span>
                                <h1 class="title">Hi, I’m <span>sneha gupta</span><br>
                                    <span class="header-caption" id="page-top">
                                        <!-- type headline start-->
                                        <span class="cd-headline clip is-full-width">
                                            <!-- <span>a </span> -->
                                            <!-- ROTATING TEXT -->
                                            <span class="cd-words-wrapper">
                                                <b class="is-visible">Website Developer.</b>
                                                <b class="is-hidden">Professional Coder.</b>
                                                <b class="is-hidden">Mobile App Developer</b>
                                                <b class="is-hidden">Graphic designer</b>
                                                <b class="is-hidden">Freelancer Work Time & Parttime</b>
                                            </span>
                                        </span>
                                        <!-- type headline end -->
                                    </span>
                                </h1>

                                <div>
                                    <p class="description">I have over 15+ years of Experience in web development.I
                                        work on latest technologies of web design and development and deliver the best. I aim to satisfy my client in all manners.I can do both Web Design and Development. I have excellent skills of Wordpress, PHP, Code Ignitor Framework, Mysql, HTML5, CSS3, Javascript, jquery,Bootstrap,.NET,MVC.I have good knowledge in project planning initiative, critical thinking and capable.it was a pleasure to work with us.
                                        <br> Thank you for looking into my profile. Looking forward to working with you,
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12">
                                    <div class="social-share-inner-left">
                                        <span class="title">find with me</span>
                                        <ul class="social-share d-flex liststyle">
                                            <li class="facebook"><a href="https://www.facebook.com/"><i data-feather="facebook"></i></a>
                                            </li>
                                            <li class="instagram"><a href="https://www.instagram.com/"><i data-feather="instagram"></i></a>
                                            </li>
                                            <li class="linkedin"><a href="https://www.linkedin.com/login"><i data-feather="linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12 mt_mobile--30">
                                    <div class="skill-share-inner">
                                        <span class="title">best skill on</span>
                                        <ul class="skill-share d-flex liststyle">
                                            <li><img src="assets/img/icons-01.png" alt="Icons Images"></li>
                                            <li><img src="assets/img/icons-02.png" alt="Icons Images"></li>
                                            <li><img src="assets/img/icons-03.png" alt="Icons Images"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="order-1 order-lg-2 col-lg-5">
                        <!-- <div class="thumbnail"> -->
                        <!-- <div class="inner"> -->
                        <img src="assets/img/photo1.jpeg" alt="Personal Portfolio Images" height="380px" width="340px" class="rounded-corners">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- End Slider Area -->

    <!-- Start Service Area -->
    <div class="rn-service-area rn-section-gap section-separator" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-left" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true">
                        <span class="subtitle">Features</span>
                        <h2 class="title">What I Do</h2>
                    </div>
                </div>
            </div>
            <div class="row row--25 mt_md--10 mt_sm--10">


                <!-- End SIngle Service -->
                <!-- Start Single Service -->
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                    <div class="rn-service">
                        <div class="inner">
                            <div class="icon">
                                <i data-feather="book-open"></i>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="#">Website Devlopment</a></h4>
                                <p class="description"> It is the trick to make your site stand out and generate maximum traffic.
                                    we create designs that are attractive and functional. After all, the website represents you and your business on the internet.</p>
                                <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                        <a class="over-link" href="#"></a>
                    </div>
                </div>
                <!-- End SIngle Service -->
                <!-- Start Single Service -->
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                    <div class="rn-service">
                        <div class="inner">
                            <div class="icon">
                                <i data-feather="tv"></i>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="#">Software Devlopment</a></h4>
                                <p class="description">We can design and develop any custom software and program as
                                    per your needs.We will develop your Software on the latest technologies like on php and .net, Java etc</p>
                                <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                        <a class="over-link" href="#"></a>
                    </div>
                </div>
                <!-- End SIngle Service -->
                <!-- Start Single Service -->
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                    <div class="rn-service">
                        <div class="inner">
                            <div class="icon">
                                <i data-feather="twitch"></i>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="#">App Devlopment</a></h4>
                                <p class="description">Our area of expertise is Web development and Mobile Applications.
                                    We work on almost all the platforms available and have done some innovative projects in these areas.
                                </p>
                                <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                        <a class="over-link" href="#"></a>
                    </div>
                </div>
                <!-- End SIngle Service -->
                <!-- Start Single Service -->
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                    <div class="rn-service">
                        <div class="inner">
                            <div class="icon">
                                <i data-feather="wifi"></i>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="#"></a>Digtal Marketing & SEO</h4>
                                <p class="description">Search Engine Optimization services are specialized to raise the ranking of your website
                                    on the search engines .it is the process of affecting the visibility of a website or a web page in a search engine. .</p>
                                <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                        <a class="over-link" href="#"></a>
                    </div>
                </div>
                <!-- End SIngle Service -->
                <!-- Start Single Service -->
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                    <div class="rn-service">
                        <div class="inner">
                            <div class="icon">
                                <i data-feather="slack"></i>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="#">E-Commerce Solution</a></h4>
                                <p class="description"> It is methodology of modern business organization for providing service at reduced cost and in less time.
                                    E-Commerce offered many advantages to companies and customers</p>

                                <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                        <a class="over-link" href="#"></a>
                    </div>
                </div><br>
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                    <div class="rn-service">
                        <div class="inner">
                            <div class="icon">
                                <i data-feather="slack"></i>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="#">Domain & Hosting</a></h4>
                                <p class="description">A Domain Registration is the Name that identifies your web site. In reality the
                                    name you choose for your site points. Life Infotech provides Domain Service for individuals,corporate etc.</p>

                                <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                        <a class="over-link" href="#"></a>
                    </div>
                </div>
                <!-- End SIngle Service -->

            </div>
        </div>
    </div>
    <!-- End Service Area  -->

    <!-- Start Portfolio Area -->
    <div class="rn-portfolio-area rn-section-gap section-separator" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="secti0on-title text-center">
                        <span class="subtitle">Visit my portfolio and keep your feedback</span>
                        <h2 class="title">My Portfolio</h2>
                    </div>
                </div>
            </div>

            <div class="row row--25 mt--10 mt_md--10 mt_sm--10">
                <!-- Start Single Portfolio -->

                <?php
                $get_portfolio = fetch_data('portfolio', '*', "1 order by col_id DESC limit 6");
                if ($get_portfolio['row'] != 0) {
                    foreach ($get_portfolio['data'] as $portfolio) {
                ?>
                        <div data-aos="fade-up" data-aos-delay="100" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-12 mt--50 mt_md--30 mt_sm--30" onclick="show_portfolio('<?php echo $portfolio['col_id'] ?>')">
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
                                                <a href="<?php echo $portfolio['url'] ?>" target = '_blank' >Visit Site</a>
                                               
                                            </div>
                                        </div>
                                        <h4 class="title">
                                            <a href="javascript:void(0)"><?php echo $portfolio['title'] ?> 
                                            <i class="feather-arrow-up-right"></i>
                                        </a>
                                       </h4>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>
                  <div class="col-12 mt-5 pt-5 pb-5 text-center">
                    <a class="rn-btn" target="_blank" href="all-portfolio.php"><span>View All</span></a>
                  </div>

            </div>
        </div>
    </div>
    <!-- End portfolio Area -->

    <!-- Start Resume Area -->
    <div class="rn-resume-area rn-section-gap section-separator" id="resume">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <span class="subtitle">7+ Years of Experience</span>
                        <h2 class="title">My Resume</h2>
                    </div>
                </div>
            </div>
            <div class="row mt--45">
                <div class="col-lg-12">
                    <ul class="rn-nav-list nav nav-tabs" id="myTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="education-tab" data-bs-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="true">education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="professional-tab" data-bs-toggle="tab" href="#professional" role="tab" aria-controls="professional" aria-selected="false">professional
                                Skills</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="experience-tab" data-bs-toggle="tab" href="#experience" role="tab" aria-controls="experience" aria-selected="false">experience</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="interview-tab" data-bs-toggle="tab" href="#interview" role="tab" aria-controls="interview" aria-selected="false">interview</a>
                        </li>
                    </ul>

                    <!-- Start Tab Content Wrapper  -->
                    <div class="rn-nav-content tab-content" id="myTabContents">
                        <!-- Start Single Tab  -->
                        <div class="tab-pane show active fade single-tab-area" id="education" role="tabpanel" aria-labelledby="education-tab">
                            <div class="personal-experience-inner mt--40">
                                <div class="row">
                                    <!-- Start Skill List Area  -->
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="content">
                                            <span class="subtitle">2007 - 2010</span>
                                            <h4 class="maintitle">Education Quality</h4>
                                            <div class="experience-list">

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Hight School</h4>
                                                                <span>Amity University of UP(1997 - 2001)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.30/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">We recommend these stories for high school students based on
                                                            their literary significance and to deepen student.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Intermediate</h4>
                                                                <span>Amity University of UP (2000 - 2002)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.50/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Topics of high interest level to students.
                                                            Texts should contain aspects of the target culture which
                                                            students can compare and contrast .</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Graduate</h4>
                                                                <span>University of Studies (1997 - 2001)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.80/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description"> Hats off to graduates! Whether they’re earning a diploma,
                                                            a program certificate, a degree or
                                                            even a cool new professional title, .</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Skill List Area  -->

                                    <!-- Start Skill List Area 2nd  -->
                                    <div class="col-lg-6 col-md-12 col-12 mt_md--60 mt_sm--60">
                                        <div class="content">
                                            <span class="subtitle">2007 - 2010</span>
                                            <h4 class="maintitle">Job Experience</h4>
                                            <div class="experience-list">

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Diploma in Computer Science</h4>
                                                                <span>BSE In CSE (2004 - 2008)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.70/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">“We need to understand that if we all work on inclusion together,
                                                            it's going to be faster, broader, better, and more
                                                            thorough than anything we can do on our own.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Law degree</h4>
                                                                <span>Job at Rainbow-Themes (2008 - 2016)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.95/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">“To me, a lawyer is basically the person that knows the rules of the country
                                                            The leading rule for the lawyer, as for the [person] of every calling, is diligence.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Diploma in coding</h4>
                                                                <span>Works at Plugin Development (2016 -
                                                                    2020)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>5.00/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">“I learned the fundamentals for programming, which is just what I needed as a
                                                            first step for my career change!”
                                                            —Takayoshi Y.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Skill List Area  -->
                                </div>
                            </div>
                        </div>
                        <!-- End Single Tab  -->

                        <!-- Start Single Tab  -->
                        <div class="tab-pane fade " id="professional" role="tabpanel" aria-labelledby="professional-tab">
                            <div class="personal-experience-inner mt--40">
                                <div class="row row--40">

                                    <!-- Start Single Progressbar  -->
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="progress-wrapper">
                                            <div class="content">
                                                <span class="subtitle">Features</span>
                                                <h4 class="maintitle">Design Skill</h4>
                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">LOGO DESIGN </h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: 100%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="percent-label">100%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">BANNER DESIGN</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" data-wow-duration="0.6s" data-wow-delay=".4s" role="progressbar" style="width: 95%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="percent-label">95%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">ADOBE PHOTOSHOP </h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay=".5s" role="progressbar" style="width: 60%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="percent-label">60%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">CORAL DRAW,ILLUSTRATOP </h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay=".6s" role="progressbar" style="width: 70%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="percent-label">70%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">SOCIAL MEDIA BANNER DESIGN</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" data-wow-duration="0.9s" data-wow-delay=".7s" role="progressbar" style="width: 90%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="percent-label">90%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Progressbar  -->

                                    <!-- Start Single Progressbar  -->
                                    <div class="col-lg-6 col-md-6 col-12 mt_sm--60">
                                        <div class="progress-wrapper">
                                            <div class="content">
                                                <span class="subtitle">Features</span>
                                                <h4 class="maintitle">Development Skill</h4>
                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">PHP ,JAVA</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="percent-label">85%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">BOOTSTRAP,HTML5</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" data-wow-duration="0.6s" data-wow-delay=".4s" role="progressbar" style="width: 80%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="percent-label">80%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">MOBILE DEVLOPMENT</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay=".5s" role="progressbar" style="width: 90%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="percent-label">90%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">NODE JS , ANGULAR JS,LARAVAEL</h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay=".6s" role="progressbar" style="width: 75%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="percent-label">75%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                                <!-- Start Single Progress Charts -->
                                                <div class="progress-charts">
                                                    <h6 class="heading heading-h6">WORLD PRESS,MAGENTO, CODE IGNITOR </h6>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" data-wow-duration="0.9s" data-wow-delay=".7s" role="progressbar" style="width: 70%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="percent-label">70%</span></div>
                                                    </div>
                                                </div>
                                                <!-- End Single Progress Charts -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Progressbar  -->

                                </div>
                            </div>
                        </div>
                        <!-- End Single Tab  -->

                        <!-- Start Single Tab  -->
                        <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                            <div class="personal-experience-inner mt--40">
                                <div class="row">
                                    <!-- Start Skill List Area  -->
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="content">
                                            <span class="subtitle">2007 - 2010</span>
                                            <h4 class="maintitle">Education Quality</h4>
                                            <div class="experience-list">

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Personal Portfolio in April </h4>
                                                                <span>University of DVI (1997 - 2001)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.30/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">The education should be very
                                                            interactual. Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4> Examples Of Personal Portfolio</h4>
                                                                <span>College of Studies (2000 - 2002)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.50/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Maecenas finibus nec sem ut
                                                            imperdiet. Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Tips For Personal Portfolio</h4>
                                                                <span>University of Studies (1997 - 2001)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.80/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description"> If you are going to use a passage.
                                                            Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Skill List Area  -->

                                    <!-- Start Skill List Area 2nd  -->
                                    <div class="col-lg-6 col-md-12 col-12 mt_md--60 mt_sm--60">
                                        <div class="content">
                                            <span class="subtitle">2007 - 2010</span>
                                            <h4 class="maintitle">Job Experience</h4>
                                            <div class="experience-list">

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Diploma in Web Development</h4>
                                                                <span>BSE In CSE (2004 - 2008)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.70/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Contrary to popular belief. Ut
                                                            tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>The Personal Portfolio Mystery</h4>
                                                                <span>Job at Rainbow-Themes (2008 - 2016)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.95/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Generate Lorem Ipsum which looks. Ut
                                                            tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Diploma in Computer Science</h4>
                                                                <span>Works at Plugin Development (2016 -
                                                                    2020)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>5.00/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Maecenas finibus nec sem ut
                                                            imperdiet. Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Skill List Area  -->
                                </div>
                            </div>
                        </div>
                        <!-- End Single Tab  -->

                        <!-- Start Single Tab  -->
                        <div class="tab-pane fade" id="interview" role="tabpanel" aria-labelledby="interview-tab">
                            <div class="personal-experience-inner mt--40">
                                <div class="row">
                                    <!-- Start Skill List Area  -->
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="content">
                                            <span class="subtitle">2007 - 2010</span>
                                            <h4 class="maintitle">Company Experience</h4>
                                            <div class="experience-list">

                                                <!-- Start Single List  -->
                                                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true" class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Personal Portfolio in April</h4>
                                                                <span>University of DVI (1997 - 2001)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.30/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">The education should be very
                                                            interactual. Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true" class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4> Examples Of Personal Portfolio</h4>
                                                                <span>College of Studies (2000 - 2002)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.50/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Maecenas finibus nec sem ut
                                                            imperdiet. Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="700" data-aos-once="true" class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Tips For Personal Portfolio</h4>
                                                                <span>University of Studies (1997 - 2001)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.80/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description"> If you are going to use a passage.
                                                            Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Skill List Area  -->

                                    <!-- Start Skill List Area 2nd  -->
                                    <div class="col-lg-6 col-md-12 col-12 mt_md--60 mt_sm--60">
                                        <div class="content">
                                            <span class="subtitle">2007 - 2010</span>
                                            <h4 class="maintitle">Job Experience</h4>
                                            <div class="experience-list">

                                                <!-- Start Single List  -->
                                                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true" class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Diploma in Web Development</h4>
                                                                <span>BSE In CSE (2004 - 2008)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.70/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Contrary to popular belief. Ut
                                                            tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="700" data-aos-once="true" class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>The Personal Portfolio Mystery</h4>
                                                                <span>Job at Rainbow-Themes (2008 - 2016)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>4.95/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Generate Lorem Ipsum which looks. Ut
                                                            tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                                <!-- Start Single List  -->
                                                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="900" data-aos-once="true" class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>Diploma in Computer Science</h4>
                                                                <span>Works at Plugin Development (2016 -
                                                                    2020)</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>5.00/5</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">Maecenas finibus nec sem ut
                                                            imperdiet. Ut tincidunt est ac dolor aliquam sodales.
                                                            Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                            mauris hendrerit ante.</p>
                                                    </div>
                                                </div>
                                                <!-- End Single List  -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Skill List Area  -->
                                </div>
                            </div>
                        </div>
                        <!-- End Single Tab  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Resume Area -->

    <!-- Start Testimonia Area  -->
    <div class="rn-testimonial-area rn-section-gap section-separator" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="section-title text-center">
                        <span class="subtitle">What Clients Say</span>
                        <h2 class="title">Testimonial</h2>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true">
                <div class="col-lg-12">
                    <div class="testimonial-activation testimonial-pb mb--30">
                        <!-- Start Single testiminail -->
                        <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                            <div class="inner">
                                <div class="card-info">
                                    <!-- <div class="card-thumbnail"> -->
                                    <img src="assets/img/male boy.webp" alt="Testimonial-image" width="400px" height="370px">
                                    <!-- </div> -->
                                    <div class="card-content">
                                        <span class="subtitle mt--10">Rainbow-Themes</span>
                                        .1 <h3 class="title">steve harrinston</h3>
                                        <span class="designation">Chief Operating Officer</span>
                                    </div>
                                </div>
                                <div class="card-description">
                                    <div class="title-area">
                                        <div class="title-info">
                                            <h3 class="title">Android App Development</h3>
                                            <span class="date">via Upwork - Mar 4, 2015 - Aug 30, 2021</span>
                                        </div>
                                        <!-- <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div> -->
                                    </div>
                                    <div class="seperator"></div>
                                    <p class="discription">
                                        I have called the lifeinfotech help desk just three to four times over the past two years.
                                        Every time, my problem has been resolved within a few minutes, the tech is
                                        very personable and friendly, and it's left me with this thought: If I have a
                                        computer problem and can't figure it out.



                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--End Single testiminail -->
                        <!-- Start Single testiminail -->
                        <!-- <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/testimonial/final-home--2nd.png" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">Bound - Trolola</span>
                                            <h3 class="title">Jone Duone Joe</h3>
                                            <span class="designation">Operating Officer</span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">Web App Development</h3>
                                                <span class="date">Upwork - Mar 4, 2016 - Aug 30, 2021</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            Important fact to nec sem ut imperdiet. Ut tincidunt est ac dolor aliquam
                                            sodales. Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris
                                            hendrerit ante. Ut tincidunt est ac dolor aliquam sodales phasellus smauris
                                            .
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--End Single testiminail -->
                        <!-- Start Single testiminail
                            <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/images/testimonial/final-home--3rd.png" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">Glassfisom</span>
                                            <h3 class="title">Nevine Dhawan</h3>
                                            <span class="designation">CEO Of Officer</span>
                                        </div>
                                    </div> 
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">Android App Design</h3>
                                                <span class="date">Fiver - Mar 4, 2015 - Aug 30, 2021</span>
                                            </div>
                                            <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            No more question for design. Ut tincidunt est ac dolor aliquam
                                            sodales. Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris
                                            hendrerit ante. Ut tincidunt est ac dolor aliquam sodales phasellus smauris
                                            .
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--End Single testiminail -->

                        Start Single testiminail
                        <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                            <div class="inner">
                                <div class="card-info">
                                    <div class="card-thumbnail">
                                        <img src="assets/img/women.jpg" alt="Testimonial-image">
                                    </div>
                                    <div class="card-content">
                                        <span class="subtitle mt--10">NCD - Design</span>
                                        <h3 class="title">Mevine Thoda</h3>
                                        <span class="designation">Marketing Officer</span>
                                    </div>
                                </div>
                                <div class="card-description">
                                    <div class="title-area">
                                        <div class="title-info">
                                            <h3 class="title">CEO - Marketing</h3>
                                            <span class="date">Thoda Department - Mar 4, 2018 - Aug 30, 2021</span>
                                        </div>
                                        <!-- <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div> -->
                                    </div>
                                    <div class="seperator"></div>
                                    <p class="discription">
                                        I believe it was one of the best. ceo-markiting office
                                        As always, you did an extraordinary job of taking a very diverse and informed
                                        audience on a wide ranging tour addressing the critical issues of the day. From
                                        trade…to activism…to consumers…to technology,
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--End Single testiminail -->

                        <!-- Start Single testiminail -->
                        <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                            <div class="inner">
                                <div class="card-info">
                                    <div class="card-thumbnail">
                                        <img src="assets/img/women2.webp" alt="Testimonial-image">
                                    </div>
                                    <div class="card-content">
                                        <span class="subtitle mt--10">Default name</span>
                                        <h3 class="title">Davei Luace</h3>
                                        <span class="designation">Chief Operating Manager</span>
                                    </div>
                                </div>
                                <div class="card-description">
                                    <div class="title-area">
                                        <div class="title-info">
                                            <h3 class="title">Android App design</h3>
                                            <span class="date">via Upwork - Mar 4, 2015 - Aug 30, 2021</span>
                                        </div>
                                        <!-- <div class="rating">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                                <img src="assets/images/icons/rating.png" alt="rating-image">
                                            </div> -->
                                    </div>
                                    <div class="seperator"></div>
                                    <p class="discription">
                                        When managment is so important. Ut tincidunt est ac dolor aliquam
                                        sodales. Phasellus sed mauris android app design hendrerit, laoreet sem in, lobortis mauris
                                        hendrerit ante.was greate design</del> Ut tincidunt est ac dolor aliquam sodales phasellus smauris
                                        .
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--End Single testiminail -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonia Area  -->

    <!-- Start Client Area -->
    <div class="rn-client-area rn-section-gap section-separator" id="clients">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span class="subtitle">Popular Clients</span>
                        <h2 class="title">Awesome Clients</h2>
                    </div>
                </div>
            </div>

            <div class="row row--25 mt--50 mt_md--40 mt_sm--40">
                <div class="col-lg-4">
                    <div class="d-flex flex-wrap align-content-start h-100">
                        <div class="position-sticky clients-wrapper sticky-top rbt-sticky-top-adjust">
                            <ul class="nav tab-navigation-button flex-column nav-pills me-3" id="v-pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link" id="v-pills-home-tab" data-bs-toggle="tab" href="#v-pills-Javascript" role="tab" aria-controls="php, node js,angular js" aria-selected="true">PHP,NODE JS , ANGULAR JS</a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="tab" href="#v-pills-Design" role="tab" aria-controls="bootsrap, html5" aria-selected="true">BOOTSTRAP, HTML5</a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link" id="v-pills-wordpress-tab" data-bs-toggle="tab" href="#v-pills-Wordpress" role="tab" aria-controls="wordpress,code Ignitor" aria-selected="true">WORLD PRESS, CODE IGNITOR

                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="v-pills-settings-tabs" data-bs-toggle="tab" href="#v-pills-settings" role="tab" aria-controls="html to react" aria-selected="true">HTML to React</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="v-pills-laravel-tabs" data-bs-toggle="tab" href="#v-pills-laravel" role="tab" aria-controls="React" aria-selected="true">React
                                        To Laravel</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="v-pills-python-tabs" data-bs-toggle="tab" href="#v-pills-python" role="tab" aria-controls="python" aria-selected="true">Python</a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-8">
                    <div class="tab-area">
                        <div class="d-flex align-items-start">
                            <div class="tab-content" id="v-pills-tabContent">

                                <div class="tab-pane fade" id="v-pills-Javascript" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <div class="client-card">

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-04.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-02.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smiths Marth</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-03.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">sara inn</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-04.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jone Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-05.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">will smith</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href=""><img src="assets/img/brand-05.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#"> will Smith</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smitha Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-02.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Sultana Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-06.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jannat</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-05.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Mila Dus</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-03.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tabs">
                                    <div class="client-card">

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-02.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smiths Marth</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-03.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Add Dev</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-04.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jone Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-05.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Adon Smith</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smitha Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-02.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Sultana Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jannat</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-05.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Mila Dus</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-03.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-laravel" role="tabpanel" aria-labelledby="v-pills-laravel-tabs">
                                    <div class="client-card">

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-02.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smiths Marth</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-03.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Add Dev</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-04.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jone Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-05.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Adon Smith</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smitha Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-02.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Sultana Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jannat</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-05.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Mila Dus</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-03.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-laravel" role="tabpanel" aria-labelledby="v-pills-laravel-tabs">
                                    <div class="client-card">

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-02.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smiths Marth</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-03.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Add Dev</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-04.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jone Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-05.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Adon Smith</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smitha Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-02.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Sultana Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jannat</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-05.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Mila Dus</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-03.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-python" role="tabpanel" aria-labelledby="v-pills-python-tabs">
                                    <div class="client-card">

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-02.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smiths Marth</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-03.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Add Dev</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-04.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jone Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">John Due</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-05.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Adon Smith</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Smitha Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-02.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Sultana Mila</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Jannat</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-05.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Mila Dus</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-01.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                        <!-- Start Single Brand  -->
                                        <div class="main-content">
                                            <div class="inner text-center">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="assets/img/brand-03.png" alt="Client-image"></a>
                                                </div>
                                                <div class="seperator"></div>
                                                <div class="client-name"><span><a href="#">Marth Smiths</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Brand  -->

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End client section -->

    <!-- Pricing Area -->
    <div class="rn-pricing-area rn-section-gap section-separator" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-5 mb_md--40 mb_sm--40 small-margin-pricing">
                    <div class="d-block d-lg-flex text-center d-lg-left section-flex flex-wrap align-content-start h-100">
                        <div class="position-sticky sticky-top rbt-sticky-top-adjust">
                            <div class="section-title text-left">
                                <span class="subtitle text-center text-lg-left">Pricing</span>
                                <h2 class="title text-center text-lg-left">My Pricing</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-xl-7">
                    <!-- Pricing Area -->
                    <div class="navigation-wrapper">
                        <ul class="nav " id="myTab" role="tablist">
                            <li class="nav-item ">
                                <a class="nav-style" id="test-tab" data-bs-toggle="tab" href="#test" role="tab" aria-controls="test" aria-selected="false">Static</a>
                            </li>

                            <li class="nav-item  recommended">
                                <a class="nav-style active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Standard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-style" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Premium</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade " id="test" role="tabpanel" aria-labelledby="test-tab">
                                <!-- Pricing Start -->
                                <div class="rn-pricing">
                                    <div class="pricing-header">
                                        <div class="header-left">
                                            <h2 class="title">make your simple page </h2>
                                            <span>Elementor</span>
                                        </div>
                                        <div class="header-right">
                                            <span>$30.00</span>
                                        </div>
                                    </div>
                                    <div class="pricing-body">
                                        <p class="description">
                                            All the Lorem Ipsum generators on the Internet tend to repeat predefined
                                            chunks as necessary
                                        </p>
                                        <div class="check-wrapper">
                                            <div class="left-area">
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>1 Page with Elementor</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Design Customization</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Responsive Design</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Content Upload</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Design Customization</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>2 Plugins/Extensions</p>
                                                </div>
                                            </div>
                                            <div class="right-area">
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>multipage Elementor</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Design Figma</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>MAintaine Design</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Content Upload</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Design With XD</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>8 Plugins/Extensions</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pricing-footer">
                                        <a href="#" class="rn-btn d-block">
                                            <span>ORDER NOW</span>
                                            <i data-feather="arrow-right"></i>
                                        </a>
                                        <div class="time-line">
                                            <div class="single-cmt d-flex">
                                                <i data-feather="clock"></i>
                                                <span>2 Days Delivery</span>
                                            </div>
                                            <div class="single-cmt d-flex">
                                                <i data-feather="activity"></i>
                                                <span>Unlimited Revission</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                            </div>

                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <!-- Pricing Start -->
                                <div class="rn-pricing">
                                    <div class="pricing-header">
                                        <div class="header-left">
                                            <h2 class="title">Design Make this Page</h2>
                                            <span>Elementor</span>
                                        </div>
                                        <div class="header-right">
                                            <span>$56.00</span>
                                        </div>
                                    </div>
                                    <div class="pricing-body">
                                        <p class="description">
                                            Making this the first true generator on the Internet. It uses a
                                            dictionary & plugin Development.
                                        </p>
                                        <div class="check-wrapper">
                                            <div class="left-area">
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>1 Page with Elementor</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Design Customization</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Responsive Design</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Content Upload</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Design Customization</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>2 Plugins/Extensions</p>
                                                </div>
                                            </div>
                                            <div class="right-area">
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>multipage Elementor</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Design Figma</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>MAintaine Design</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Content Upload</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Design With XD</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>8 Plugins/Extensions</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pricing-footer">
                                        <a href="#" class="rn-btn d-block">
                                            <span>ORDER NOW</span>
                                            <i data-feather="arrow-right"></i>
                                        </a>
                                        <div class="time-line d-flex">
                                            <div class="single-cmt d-flex">
                                                <i data-feather="clock"></i>
                                                <span>2 Days Delivery</span>
                                            </div>
                                            <div class="single-cmt d-flex">
                                                <i data-feather="activity"></i>
                                                <span>Unlimited Revission</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                            </div>

                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <!-- Pricing Start -->
                                <div class="rn-pricing">
                                    <div class="pricing-header">
                                        <div class="header-left">
                                            <h2 class="title">Customize Your Single Page</h2>
                                            <span>Elementor</span>
                                        </div>
                                        <div class="header-right">
                                            <span>$90.00</span>
                                        </div>
                                    </div>
                                    <div class="pricing-body">
                                        <p class="description">
                                            I will install your desire theme and made like Theme demo and customize
                                            your single page( homepage)
                                        </p>
                                        <div class="check-wrapper">
                                            <div class="left-area">
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>1 Page with Elementor</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Design Customization</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Responsive Design</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>content Upload</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>design prejenstion</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>2 Plugins/Extensions</p>
                                                </div>
                                            </div>
                                            <div class="right-area">
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>multipage Elementor</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>disign figma</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>maintain Design</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Content Upload</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>Design With XD</p>
                                                </div>
                                                <div class="check d-flex">
                                                    <i data-feather="check"></i>
                                                    <p>8 Plugins/Extensions</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pricing-footer">
                                        <a href="#" class="rn-btn d-block">
                                            <span>ORDER NOW</span>
                                            <i data-feather="arrow-right"></i>
                                        </a>
                                        <div class="time-line d-flex">
                                            <div class="single-cmt d-flex">
                                                <i data-feather="clock"></i>
                                                <span>2 day delivery</span>
                                            </div>
                                            <div class="single-cmt d-flex">
                                                <i data-feather="activity"></i>
                                                <span>Unlimited Revission</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End -->
                            </div>
                        </div>
                    </div>
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
    <!-- pricing area -->
    <!-- Start News Area -->
    <div class="rn-blog-area rn-section-gap section-separator" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="section-title text-center">
                        <span class="subtitle">Visit my blog and keep your feedback</span>
                        <h2 class="title">My Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row row--25 mt--30 mt_md--10 mt_sm--10">

                <!-- Start Single blog -->
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="col-lg-6 col-xl-4 mt--30 col-md-6 col-sm-12 col-12 mt--30">
                    <div class="rn-blog" data-bs-toggle="modal" data-bs-target="#exampleModalCenters">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="javascript:void(0)">
                                    <img src="assets/img/blog-01.jpg" alt="Personal Portfolio Images">
                                </a>
                            </div>
                            <div class="content">
                                <div class="category-info">
                                    <div class="category-list">
                                        <a href="javascript:void(0)">mobile devlopment</a>
                                    </div>
                                    <div class="meta">
                                        <span><i class="feather-clock"></i> 2 min read</span>
                                    </div>
                                </div>
                                <h4 class="title"><a href="javascript:void(0)">Top Technologies for Development
                                        <i class="feather-arrow-up-right"></i></a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single blog -->

                <!-- Start Single blog -->
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="150" data-aos-once="true" class="col-lg-6 col-xl-4 mt--30 col-md-6 col-sm-12 col-12 mt--30">
                    <div class="rn-blog" data-bs-toggle="modal" data-bs-target="#exampleModalCenters">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="javascript:void(0)">
                                    <img src="assets/img/blog-02.jpg" alt="Personal Portfolio Images">
                                </a>
                            </div>
                            <div class="content">
                                <div class="category-info">
                                    <div class="category-list">
                                        <a href="javascript:void(0)">web devlopment </a>
                                    </div>
                                    <div class="meta">
                                        <span><i class="feather-clock"></i> 2 hour read</span>
                                    </div>
                                </div>
                                <h4 class="title"><a href="javascript:void(0)"> Latest technologies of web design and development <i class="feather-arrow-up-right"></i></a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single blog -->

                <!-- Start Single blog -->
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="200" data-aos-once="true" class="col-lg-6 col-xl-4 mt--30 col-md-6 col-sm-12 col-12 mt--30">
                    <div class="rn-blog" data-bs-toggle="modal" data-bs-target="#exampleModalCenters">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="javascript:void(0)">
                                    <img src="assets/img/blog-03.jpg" alt="Personal Portfolio Images">
                                </a>
                            </div>
                            <div class="content">
                                <div class="category-info">
                                    <div class="category-list">
                                        <a href="javascript:void(0)">Application devlopment</a>
                                    </div>
                                    <div class="meta">
                                        <span><i class="feather-clock"></i> 5 min read</span>
                                    </div>
                                </div>
                                <h4 class="title"><a href="javascript:void(0)"> Our client always 100% satisfy
                                        maintain<i class="feather-arrow-up-right"></i></a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single blog -->

            </div>
        </div>
    </div>
    <!-- ENd Mews Area -->
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
    <!-- Modal Blog Body area Start -->
    <div class="modal fade" id="exampleModalCenters" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-news" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div>

                <!-- End of .modal-header -->

                <div class="modal-body">
                    <img src="assets/images/blog/blog-big-01.jpg" alt="news modal" class="img-fluid modal-feat-img">
                    <div class="news-details">
                        <span class="date">2 May, 2021</span>
                        <h2 class="title">Digital Marketo to Their New Office.</h2>
                        <p>Nobis eleifend option congue nihil imperdiet doming id quod mazim placerat
                            facer
                            possim assum.
                            Typi non
                            habent claritatem insitam; est usus legentis in iis qui facit eorum
                            claritatem.
                            Investigationes
                            demonstraverunt
                            lectores legere me lius quod ii legunt saepius. Claritas est etiam processus
                            dynamicus, qui
                            sequitur
                            mutationem consuetudium lectorum.</p>
                        <h4>Nobis eleifend option conguenes.</h4>
                        <p>Mauris tempor, orci id pellentesque convallis, massa mi congue eros, sed
                            posuere
                            massa nunc quis
                            dui.
                            Integer ornare varius mi, in vehicula orci scelerisque sed. Fusce a massa
                            nisi.
                            Curabitur sit
                            amet
                            suscipit nisl. Sed eget nisl laoreet, suscipit enim nec, viverra eros. Nunc
                            imperdiet risus
                            leo,
                            in rutrum erat dignissim id.</p>
                        <p>Ut rhoncus vestibulum facilisis. Duis et lorem vitae ligula cursus venenatis.
                            Class aptent
                            taciti sociosqu
                            ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc vitae
                            nisi
                            tortor. Morbi
                            leo
                            nulla, posuere vel lectus a, egestas posuere lacus. Fusce eleifend hendrerit
                            bibendum. Morbi
                            nec
                            efficitur ex.</p>
                        <h4>Mauris tempor, orci id pellentesque.</h4>
                        <p>Nulla non ligula vel nisi blandit egestas vel eget leo. Praesent fringilla
                            dapibus dignissim.
                            Pellentesque
                            quis quam enim. Vestibulum ultrices, leo id suscipit efficitur, odio lorem
                            rhoncus dolor, a
                            facilisis
                            neque mi ut ex. Quisque tempor urna a nisi pretium, a pretium massa
                            tristique.
                            Nullam in
                            aliquam
                            diam. Maecenas at nibh gravida, ornare eros non, commodo ligula. Sed
                            efficitur
                            sollicitudin
                            auctor.
                            Quisque nec imperdiet purus, in ornare odio. Quisque odio felis, vestibulum
                            et.</p>
                    </div>

                    <!-- Comment Section Area Start -->
                    <div class="comment-inner">
                        <h3 class="title mb--40 mt--50">Leave a Reply</h3>
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="rnform-group"><input type="text" placeholder="Name">
                                    </div>
                                    <div class="rnform-group"><input type="email" placeholder="Email">
                                    </div>
                                    <div class="rnform-group"><input type="text" placeholder="Website">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="rnform-group">
                                        <textarea placeholder="Comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <a class="rn-btn" href="#"><span>SUBMIT NOW</span></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Comment Section End -->
                </div>
                <!-- End of .modal-body -->
            </div>
        </div>
    </div>
    <!-- End Modal Blog area -->
    <!-- Back to  top Start -->
    <div class="backto-top">
        <div>
            <i data-feather="arrow-up"></i>
        </div>
    </div>
    <!-- Back to top end -->




</main>


<?php require('footer.php') ?>