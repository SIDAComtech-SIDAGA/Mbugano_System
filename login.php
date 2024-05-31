<?php
session_start();

if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])) {
?>
    <!doctype html>
    <html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>SDMS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="../img/school_icon.png">



        <?php require_once("./include/css.php"); ?>

    </head>


    <body class="body__wrapper"  style="background-image:url(img/middle-school.webp); background-size:cover;">
        <!-- pre loader area start -->
        <div id="back__preloader">
            <div id="back__circle_loader"></div>
            <div class="back__loader_logo">
                <img loading="lazy" src="img/school_icon.png" style="background-size: size;" alt="Preload">
            </div>
        </div>       
        </div>
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
        <div>
            <br>
        </div>
        


        <main class="main_wrapper overflow-hidden">
            <div class="tab-content tab__content__wrapper" id="myTabContent" data-aos="fade-up" style="width:80%; margin: 0 auto; ">

                <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                    <div class="col-xl-8 col-md-8 offset-md-2">
                        <div class="loginarea__wraper" style="background-color:aliceblue;">
                            <div class="login__heading">
                                <h5 class="login__title" ><b>Authenication</b></h5>
                                <?php if (isset($_GET['error'])) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= htmlspecialchars($_GET['error']) ?>
                                    </div>
                                <?php } ?>
                            </div>



                            <form action="auth.php" method="post">
                                <div class="login__form">
                                    <label class="form__label">Username or email</label>
                                    <input class="common__login__input form-control" required name="email" type="email" value="<?php if (isset($_GET['email'])) echo (htmlspecialchars($_GET['email'])) ?>" placeholder="Your username or email">

                                </div>
                                <div class="login__form">
                                    <label class="form__label">Password</label>
                                    <input class="common__login__input form-control" required type="password" name="password" placeholder="Password">

                                </div>
                                <div class="login__form d-flex justify-content-between flex-wrap gap-2">
                                    <div class="form__check">
                                        <input id="forgot"  type="checkbox">
                                        <label for="forgot" > Remember me</label>
                                    </div>
                                    <div class="text-end login__form__link">
                                        <a href="#">Forgot your password?</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">LOGIN
                                </button>
                            </form>




                        </div>
                    </div>
                </div>





            </div>

            <!-- login__section__end -->


        </main>



        <?php require_once("./include/script.php"); ?>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
}
?>