<?php 
  session_start();
  require_once("../include/session-management.php");

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- CSS here -->
<link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/aos.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/icofont.min.css">
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../css/swiper-bundle.min.css">
    <link rel="stylesheet" href="../css/style.css">


<body class="body__wrapper">
    <!-- pre loader area start -->
    <div id="back__preloader">
        <div id="back__circle_loader"></div>
        <div class="back__loader_logo">
            <img loading="lazy"  src="../img/pre.png" alt="Preload">
        </div>
    </div>
    <!-- pre loader area end -->
    
        <!-- Dark/Light area start -->
        <div class="mode_switcher my_switcher">
            <button id="light--to-dark-button" class="light align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon dark__mode" viewBox="0 0 512 512"><path d="M160 136c0-30.62 4.51-61.61 16-88C99.57 81.27 48 159.32 48 248c0 119.29 96.71 216 216 216 88.68 0 166.73-51.57 200-128-26.39 11.49-57.38 16-88 16-119.29 0-216-96.71-216-216z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
    
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon light__mode" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M256 48v48M256 416v48M403.08 108.92l-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48M96 256H48M403.08 403.08l-33.94-33.94M142.86 142.86l-33.94-33.94"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"/></svg>
    
                <span class="light__mode">Light</span>
                <span class="dark__mode">Dark</span>
            </button>
        </div>
        <!-- Dark/Light area end -->

    <main class="main_wrapper overflow-hidden">


        <!-- topbar__section__stert -->
        <div class="topbararea">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="topbar__left">
                            <ul>
                                <li>
                                    KILOLO IRINGA
                                </li>
                                <li>
                                   KILOLO IRINGA
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="topbar__right">
                            <div class="topbar__icon">
                                <i class="icofont-location-pin"></i>
                            </div>
                            <div class="topbar__text">
                                <p>Ruaha mbuyuni</p>
                            </div>
                            <div class="topbar__list">
                                <ul>
                                    <li>
                                        <a href="#"><i class="icofont-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icofont-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icofont-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icofont-youtube-play"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- topbar__section__end -->


        <!-- headar section start -->
        <header>
            <div class="headerarea headerarea__3 header__sticky header__area">
                <div class="container desktop__menu__wrapper">
                    <div class="row">
                    <marquee behavior="scroll" direction="left"> <strong><h3 class="btn btn-danger">STUDENT DATA MANAGEMENT SYSTEM UNDER MAINTENANCE</h3></strong>
</marquee>
                        <div class="col-xl-2 col-lg-2 col-md-6">
                            <div class="headerarea__left">
                                <div class="headerarea__left__logo">

                                    <!-- <a href="../index.html"><img loading="lazy"  src="../img/logo/logo_1.png" alt="logo"></a> -->
                                </div>

                            </div>
                        </div>
                        
                        

                    </div>

                </div>


                <div class="container-fluid mob_menu_wrapper">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="mobile-logo">
                                <a class="logo__dark" href="#"><img loading="lazy"  src="../img/logo/logo_1.png" alt="logo"></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </header>
        <!-- header section end -->

        


        <!-- theme fixed shadow -->
        <div>
            <div class="theme__shadow__circle"></div>
            <div class="theme__shadow__circle shadow__right"></div>
        </div>
        <!-- theme fixed shadow -->


        <!-- dashboardarea__area__start  -->
        <div class="dashboardarea sp_bottom_100">
            <div class="container-fluid full__width__padding">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="dashboardarea__wraper">
                            <div class="dashboardarea__img">
                                <div class="dashboardarea__inner">
                                    <div class="dashboardarea__left">
                                    <div class="dashboardarea__right">
                                        <div class="dashboardarea__right__button">
                                            <a class="default__button" href="add-students.php">Add Students Data
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="dashboardarea__right">
                                        <div class="dashboardarea__right__button">
                                            <a class="default__button" href="add-school.php">Add School Info
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                                        </div>
                                    </div>
                                    <!-- <div class="dashboardarea__right">
                                        
                                    </div> -->
                                    <div class="dashboardarea__right">
                                        <div class="dashboardarea__right__button">
                                            <a class="default__button" href="students.php">Students Data
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dashboard">
                <div class="container-fluid full__width__padding">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-12">
                            <div class="dashboard__inner sticky-top">
                                <div class="dashboard__nav__title">
                                    <h6>Welcome,<?=$_SESSION['user_full_name'] ?></h6>
                                </div>
                                <div class="dashboard__nav">
                                    <ul>
                                        <li>
                                            <a class="active" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                                Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-data"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                View Students Report</a>
                                        </li>
                                        <!-- <li>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                                Total Boys</a><span class="dashboard__label">12</span>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
                                                Total Girls</a>
                                        </li> -->
                                        <li>
                                            <a href="requirements-report.php">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                View Students Report</a>
                                        </li>
                                        
                                        <li>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                                Results</a>
                                        </li>
                                    </ul>
                                </div>

                                
                                
                                <div class="dashboard__nav__title mt-40">
                                    <h6>user</h6>
                                </div>

                                <div class="dashboard__nav">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                              Settings</a>
                                        </li>
                                        <li>
                                            <a href="../logout.php">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-1"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg>
                                                Logout</a>
                                        </li>
                                  
                                  
                                 
                                    </ul>
                                </div>


                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="dashboard__content__wraper">
                                <div class="dashboard__section__title">
                                    <h4>Dashboard</h4>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                        <div class="dashboard__single__counter">
                                            <div class="counterarea__text__wraper">
                                                <div class="counter__img">
                                                    <img loading="lazy"  src="../img/counter/counter__1.png" alt="counter">
                                                </div>
                                                <div class="counter__content__wraper">
                                                    <div class="counter__number">
                                                        <span class="counter">27</span>+
                    
                                                    </div>
                                                    <p>Total Schools </p>
                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                        <div class="dashboard__single__counter">
                                            <div class="counterarea__text__wraper">
                                                <div class="counter__img">
                                                    <img loading="lazy"  src="../img/counter/counter__2.png" alt="counter">
                                                </div>
                                                <div class="counter__content__wraper">
                                                    <div class="counter__number">
                                                        <span class="counter">08</span>+
                    
                                                    </div>
                                                    <p>Active Courses</p>
                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                        <div class="dashboard__single__counter">
                                            <div class="counterarea__text__wraper">
                                                <div class="counter__img">
                                                    <img loading="lazy"  src="../img/counter/counter__3.png" alt="counter">
                                                </div>
                                                <div class="counter__content__wraper">
                                                    <div class="counter__number">
                                                        <span class="counter">5</span>k
                    
                                                    </div>
                                                    <p>Complete Courses</p>
                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                        <div class="dashboard__single__counter">
                                            <div class="counterarea__text__wraper">
                                                <div class="counter__img">
                                                    <img loading="lazy"  src="../img/counter/counter__4.png" alt="counter">
                                                </div>
                                                <div class="counter__content__wraper">
                                                    <div class="counter__number">
                                                        <span class="counter">14</span>+
                    
                                                    </div>
                                                    <p>Total Courses</p>
                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                        <div class="dashboard__single__counter">
                                            <div class="counterarea__text__wraper">
                                                <div class="counter__img">
                                                    <img loading="lazy"  src="../img/counter/counter__3.png" alt="counter">
                                                </div>
                                                <div class="counter__content__wraper">
                                                    <div class="counter__number">
                                                        <span class="counter">10</span>k
                    
                                                    </div>
                                                    <p>Total Students</p>
                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                        <div class="dashboard__single__counter">
                                            <div class="counterarea__text__wraper">
                                                <div class="counter__img">
                                                    <img loading="lazy"  src="../img/counter/counter__4.png" alt="counter">
                                                </div>
                                                <div class="counter__content__wraper">
                                                    <div class="counter__number">
                                                        <span class="counter">30,000</span>+
                    
                                                    </div>
                                                    <p>Total Earning</p>
                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                      
                    </div>
                </div>
            </div>
        </div>
         <!-- dashboardarea__area__end   -->

    </main>


    <!-- JS here -->
    <script src="../js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="../js/vendor/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/isotope.pkgd.min.js"></script>
    <script src="../js/slick.min.js"></script>
    <script src="../js/jquery.meanmenu.min.js"></script>
    <script src="../js/ajax-form.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
    <script src="../js/imagesloaded.pkgd.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script src="../js/main.js"></script>
    
    </body>
</html>

<?php
  }
  else{
    header("Location: ../login.php");
  }