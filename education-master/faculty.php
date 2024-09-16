<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/Aptech-Favicon.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Education</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
<?php
    include 'usee/nav.php';
    require "../Aptech-Portal/Connection/connection.php";

    ?>

    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Our Faculty
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="courses.html"> Popular Courses</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start popular-courses Area -->
    <section class="popular-courses-area section-gap courses-page">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Our Faculty</h1>
                        <p>There is a moment in the life of any aspiring.</p>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
                                      $read =   "SELECT e.*, u.* FROM employees e INNER JOIN users u ON e.email = u.email where u.is_approved = 1;";
                                      
                                      $result = mysqli_query($connection, $read);

                                            if($result){
                                                
                                                if(mysqli_num_rows($result) > 0){ 
                                                    while($row=mysqli_fetch_assoc($result)){
           echo '     <div class="single-popular-carusel col-lg-3 col-md-6">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="../Aptech-Portal/Auth/images/'.$row['profile'].'" alt="">
                        </div>
                        <div class="meta d-flex justify-content-between">
                            <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                            <h4>$150</h4>
                        </div>
                    </div>
                    <div class="details">
                        <a href="course-details.html">
                            <h4>
                                '.$row["full_name"].'
                            </h4>
                        </a>
                        <p>
                            '.$row["email"].'
                        </p>
                    </div>
                </div>';
            }

            }else{
            echo "<script>alert('record not found')</script>";
     
    }
        }else{
        echo "<script>alert('Failed to execute query')</script>";
        }
        ?>
                <!-- <div class="single-popular-carusel col-lg-3 col-md-6">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/p2.jpg" alt="">
                        </div>
                        <div class="meta d-flex justify-content-between">
                            <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                            <h4>$150</h4>
                        </div>
                    </div>
                    <div class="details">
                        <a href="course-details.html">
                            <h4>
                                Full Stack Development
                            </h4>
                        </a>
                        <p>
                            When television was young, there was a hugely popular show based on the still popular fictional characte
                        </p>
                    </div>
                </div>
                <div class="single-popular-carusel col-lg-3 col-md-6">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/course 2.jpg" alt="">
                        </div>
                        <div class="meta d-flex justify-content-between">
                            <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                            <h4>$150</h4>
                        </div>
                    </div>
                    <div class="details">
                        <a href="course-details.html">
                            <h4>
                                Mern Stack Development
                            </h4>
                        </a>
                        <p>
                            When television was young, there was a hugely popular show based on the still popular fictional characte
                        </p>
                    </div>
                </div>
                <div class="single-popular-carusel col-lg-3 col-md-6">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/course 3.jpg" alt="">
                        </div>
                        <div class="meta d-flex justify-content-between">
                            <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                            <h4>$150</h4>
                        </div>
                    </div>
                    <div class="details">
                        <a href="course-details.html">
                            <h4>
                                Artificial Intelligence
                            </h4>
                        </a>
                        <p>
                            When television was young, there was a hugely popular show based on the still popular fictional characte
                        </p>
                    </div>
                </div>
                <div class="single-popular-carusel col-lg-3 col-md-6">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/p1.jpg" alt="">
                        </div>
                        <div class="meta d-flex justify-content-between">
                            <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                            <h4>$150</h4>
                        </div>
                    </div>
                    <div class="details">
                        <a href="course-details.html">
                            <h4>
                                Cyber Secuirity
                            </h4>
                        </a>
                        <p>
                            When television was young, there was a hugely popular show based on the still popular fictional characte
                        </p>
                    </div>
                </div>
                <div class="single-popular-carusel col-lg-3 col-md-6">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/course 4.jpg" alt="">
                        </div>
                        <div class="meta d-flex justify-content-between">
                            <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                            <h4>$150</h4>
                        </div>
                    </div>
                    <div class="details">
                        <a href="course-details.html">
                            <h4>
                                Machine learning
                            </h4>
                        </a>
                        <p>
                            When television was young, there was a hugely popular show based on the still popular fictional characte
                        </p>
                    </div>
                </div>
                <div class="single-popular-carusel col-lg-3 col-md-6">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/p3.jpg" alt="">
                        </div>
                        <div class="meta d-flex justify-content-between">
                            <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                            <h4>$150</h4>
                        </div>
                    </div>
                    <div class="details">
                        <a href="course-details.html">
                            <h4>
                                Backend Develpement
                            </h4>
                        </a>
                        <p>
                            When television was young, there was a hugely popular show based on the still popular fictional characte
                        </p>
                    </div>
                </div>
                <div class="single-popular-carusel col-lg-3 col-md-6">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="img/p4.jpg" alt="">
                        </div>
                        <div class="meta d-flex justify-content-between">
                            <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                            <h4>$150</h4>
                        </div>
                    </div>
                    <div class="details">
                        <a href="course-details.html">
                            <h4>
                                Microsoft Office
                            </h4>
                        </a>
                        <p>
                            When television was young, there was a hugely popular show based on the still popular fictional characte
                        </p>
                    </div>
                </div> -->
               
            </div>
        </div>
    </section>
    <!-- End popular-courses Area -->

    <!-- Start search-course Area -->
    <section class="search-course-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-md-6 search-course-left">
                    <h1 class="text-white">
                        Get reduced fee <br> during this Summer!
                    </h1>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
                    </p>
                    <div class="row details-content">
                        <div class="col single-detials">
                            <span class="lnr lnr-graduation-hat"></span>
                            <a href="#">
                                <h4>Trained Facuty</h4>
                            </a>
                            <p>
                                Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                            </p>
                        </div>
                        <div class="col single-detials">
                            <span class="lnr lnr-license"></span>
                            <a href="#">
                                <h4>Certification At The End</h4>
                            </a>
                            <p>
                                Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 search-course-right section-gap">
                    <form class="form-wrap" action="#">
                        <h4 class="text-white pb-20 text-center mb-30">Search for Available Course</h4>
                        <input type="text" class="form-control" name="name" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'">
                        <input type="phone" class="form-control" name="phone" placeholder="Your Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Phone Number'">
                        <input type="email" class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'">
                        <div class="form-select" id="service-select">
                            <select>
										<option datd-display="">Choose Course</option>
										<option value="1">Course One</option>
										<option value="2">Course Two</option>
										<option value="3">Course Three</option>
										<option value="4">Course Four</option>
									</select>
                        </div>
                        <button class="primary-btn text-uppercase">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End search-course Area -->

    <!-- Start upcoming-event Area -->
    <section class="upcoming-event-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Upcoming Events of our Institute</h1>
                        <p>If you are a serious astronomy fanatic like a lot of us</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-upcoming-event-carusel">
                <?php
                                      $read =   "SELECT * FROM `events`;";
                                      $result = mysqli_query($connection, $read);

                                            if($result){
                                                if(mysqli_num_rows($result) > 0){ 
                                                    while($row=mysqli_fetch_assoc($result)){
                  echo ' <div class="single-carusel row align-items-center">
                        <div class="col-12 col-md-6 thumb">
                            <img class="img-fluid" src="../Aptech-Portal/Admin-pannel/images/'.$row['image'].'" alt="">
                        </div>
                        <div class="detials col-12 col-md-6">
                            <p>'.$row['event_date'].'</p>
                            <a href="#">
                                <h4>'.$row['event_name'].'t</h4>
                            </a>
                            <p>
                                '.$row['description'].'
                            </p>
                        </div>
                    </div>';
                }
            }
            else{
                echo "<script>alert('record not found')</script>";
            }
            }else{
            echo "<script>alert('Failed to execute query')</script>";
            }
            ?>
                    <!-- <div class="single-carusel row align-items-center">
                        <div class="col-12 col-md-6 thumb">
                            <img class="img-fluid" src="img/e1.jpg" alt="">
                        </div>
                        <div class="detials col-12 col-md-6">
                            <p>25th February, 2018</p>
                            <a href="#">
                                <h4>Aptech Vision</h4>
                            </a>
                            <p>
                                For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
                            </p>
                        </div>
                    </div>
                    <div class="single-carusel row align-items-center">
                        <div class="col-12 col-md-6 thumb">
                            <img class="img-fluid" src="img/e2.jpg" alt="">
                        </div>
                        <div class="detials col-12 col-md-6">
                            <p>25th February, 2018</p>
                            <a href="#">
                                <h4>Tech Fest</h4>
                            </a>
                            <p>
                                For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
                            </p>
                        </div>
                    </div>
                    <div class="single-carusel row align-items-center">
                        <div class="col-12 col-md-6 thumb">
                            <img class="img-fluid" src="img/e1.jpg" alt="">
                        </div>
                        <div class="detials col-12 col-md-6">
                            <p>25th February, 2018</p>
                            <a href="#">
                                <h4>Web Design</h4>
                            </a>
                            <p>
                                For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
                            </p>
                        </div>
                    </div>
                    <div class="single-carusel row align-items-center">
                        <div class="col-12 col-md-6 thumb">
                            <img class="img-fluid" src="img/e1.jpg" alt="">
                        </div>
                        <div class="detials col-12 col-md-6">
                            <p>25th February, 2018</p>
                            <a href="#">
                                <h4>IOT</h4>
                            </a>
                            <p>
                                For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
                            </p>
                        </div>
                    </div>
                    <div class="single-carusel row align-items-center">
                        <div class="col-12 col-md-6 thumb">
                            <img class="img-fluid" src="img/e2.jpg" alt="">
                        </div>
                        <div class="detials col-12 col-md-6">
                            <p>25th February, 2018</p>
                            <a href="#">
                                <h4>The Universe Through A Child S Eyes</h4>
                            </a>
                            <p>
                                For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
                            </p>
                        </div>
                    </div>
                    <div class="single-carusel row align-items-center">
                        <div class="col-12 col-md-6 thumb">
                            <img class="img-fluid" src="img/e1.jpg" alt="">
                        </div>
                        <div class="detials col-12 col-md-6">
                            <p>25th February, 2018</p>
                            <a href="#">
                                <h4>The Universe Through A Child S Eyes</h4>
                            </a>
                            <p>
                                For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
                            </p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- End upcoming-event Area -->

    <!-- Start cta-two Area -->
    <section class="cta-two-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 cta-left">
                    <h1>Not Yet Satisfied with our Trend?</h1>
                </div>
                <div class="col-lg-4 cta-right">
                    <a class="primary-btn wh" href="#">view our blog</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End cta-two Area -->

    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4>Top Products</h4>
                        <ul>
                            <li><a href="#">Managed Website</a></li>
                            <li><a href="#">Manage Reputation</a></li>
                            <li><a href="#">Power Tools</a></li>
                            <li><a href="#">Marketing Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4>Quick links</h4>
                        <ul>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Brand Assets</a></li>
                            <li><a href="#">Investor Relations</a></li>
                            <li><a href="#">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4>Features</h4>
                        <ul>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Brand Assets</a></li>
                            <li><a href="#">Investor Relations</a></li>
                            <li><a href="#">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4>Resources</h4>
                        <ul>
                            <li><a href="#">Guides</a></li>
                            <li><a href="#">Research</a></li>
                            <li><a href="#">Experts</a></li>
                            <li><a href="#">Agencies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4>Newsletter</h4>
                        <p>Stay update with our latest</p>
                        <div class="" id="mc_embed_signup">
                            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '" required="" type="email">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
									        <span class="lnr lnr-arrow-right"></span>
									      </button>
                                    </div>
                                    <div class="info"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom row align-items-center justify-content-between">
                <p class="footer-text m-0 col-lg-6 col-md-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-6 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->


    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="js/easing.min.js"></script>
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.tabs.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>
</body>

</html>