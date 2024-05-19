<?php

session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {

    require_once "../auth.php";

    try {
        // Query to get information from school_info and the table with grade data
        $stmt = $conn->prepare("
            SELECT 
                si.School_id, 
                si.School_Name, 
                gd.Grade, 
                gd.Boys, 
                gd.Girls, 
                gd.StudentsEnrolled 
            FROM 
                school_info si 
            JOIN 
                schoolgradedata gd 
            ON 
                si.School_id = gd.SchoolID
        ");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Debug: Print the fetched data to verify the structure
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        // Check if data is not empty
        if (!empty($data)) {
            // Prepare an array to hold the totals
            $schoolsData = [];
            foreach ($data as $row) {
                $schoolID = $row['School_id'];
                $schoolName = $row['School_Name'];
                $grade = $row['Grade'];

                if (!isset($schoolsData[$schoolID])) {
                    $schoolsData[$schoolID] = [
                        'school_name' => $schoolName,
                        'grades' => [],
                        'total_boys' => 0,
                        'total_girls' => 0,
                        'total_students' => 0
                    ];
                }
                $schoolsData[$schoolID]['grades'][$grade] = [
                    'boys' => $row['Boys'],
                    'girls' => $row['Girls'],
                    'students_enrolled' => $row['StudentsEnrolled']
                ];
                $schoolsData[$schoolID]['total_boys'] += $row['Boys'];
                $schoolsData[$schoolID]['total_girls'] += $row['Girls'];
                $schoolsData[$schoolID]['total_students'] += $row['StudentsEnrolled'];
                
            }
        } else {
            $schoolsData = [];
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $schoolsData = [];
    }


    ?>
    <!doctype html>
    <html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Add |</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/animate.min.css">
        <link rel="stylesheet" href="../css/aos.min.css">
        <link rel="stylesheet" href="../css/magnific-popup.css">
        <link rel="stylesheet" href="../css/icofont.min.css">
        <link rel="stylesheet" href="../css/slick.css">
        <link rel="stylesheet" href="../css/swiper-bundle.min.css">
        <link rel="stylesheet" href="../css/style.css">




    </head>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'block';

                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 4000); // 4000 milliseconds = 4 seconds
            }
        });
    </script>

    <body class="body__wrapper">
        <!-- pre loader area start -->
        <div id="back__preloader">
            <div id="back__circle_loader"></div>
            <div class="back__loader_logo">
                <img loading="lazy" src="../img/pre.png" alt="Preload">
            </div>
        </div>
        <!-- pre loader area end -->

        <!-- Dark/Light area start -->
        <div class="mode_switcher my_switcher">
            <button id="light--to-dark-button" class="light align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon dark__mode" viewBox="0 0 512 512">
                    <path d="M160 136c0-30.62 4.51-61.61 16-88C99.57 81.27 48 159.32 48 248c0 119.29 96.71 216 216 216 88.68 0 166.73-51.57 200-128-26.39 11.49-57.38 16-88 16-119.29 0-216-96.71-216-216z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon light__mode" viewBox="0 0 512 512">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M256 48v48M256 416v48M403.08 108.92l-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48M96 256H48M403.08 403.08l-33.94-33.94M142.86 142.86l-33.94-33.94" />
                    <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" />
                </svg>

                <span class="light__mode">Light</span>
                <span class="dark__mode">Dark</span>
            </button>
        </div>
        <!-- Dark/Light area end -->

        <main class="main_wrapper overflow-hidden">
            <?php require_once("../include/top_bar.php"); ?>



            <!-- breadcrumbarea__section__start -->
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                </ol>
            </nav>
            <!-- end  -->
            <div class="container-fluid full__width__padding">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="dashboardarea__wraper">
                            <div class="dashboardarea__img">
                                <div class="dashboardarea__inner">
                                    <div class="dashboardarea__left">
                                        <div class="dashboardarea__right">
                                            <div class="dashboardarea__right__button">
                                                <a class="default__button" href="add-school.php">Add School information
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                        <polyline points="12 5 19 12 12 19"></polyline>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboardarea__right">
                                        <div class="dashboardarea__right__button">
                                            <a class="default__button" href="add-students.php">Add Students Data
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                </svg></a>
                                        </div>
                                    </div>
                                    <!-- <div class="dashboardarea__right">
                                        
                                    </div> -->
                                    <div class="dashboardarea__right">
                                        <div class="dashboardarea__right__button">
                                            <a class="default__button" href="report.php">See report
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                </svg></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- instructor__start -->
            <div class="add-data">
                <div class="create__course sp_100">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="create__course__accordion__wraper">
                                    <div class="accordion" id="accordionExample">


                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    School Overview Report
                                                </button>
                                                <?php if (isset($_GET['success'])) { ?>
                                                    <div class="alert alert-success" id="successMessage" role="alert">
                                                        <?= htmlspecialchars($_GET['success']) ?>
                                                    </div>
                                                <?php } ?>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <form action="#">
                                                    <div class="cartarea__table__content table-responsive">

                                                        <div class="table-responsive">
                                                        <table class="table table-bordered bg-primary">
    <thead>
        <tr>
            <th rowspan="3">No</th>
            <th rowspan="3">JINA LA SHULE</th>
            <th colspan="3">AWALI</th>
            <th colspan="3">DRS LA I</th>
            <th colspan="3">DRS LA II</th>
            <th colspan="3">DRS LA III</th>
            <th colspan="3">DRS LA IV</th>
            <th colspan="3">DRS LA V</th>
            <th colspan="3">DRS LA VI</th>
            <th colspan="3">DRS LA VII</th>
            <th colspan="3">JUMLA KUU</th>
        </tr>
        <tr>
            <th colspan="3">MADARASA</th>
            <th colspan="3">MADARASA</th>
            <th colspan="3">MADARASA</th>
            <th colspan="3">MADARASA</th>
            <th colspan="3">MADARASA</th>
            <th colspan="3">MADARASA</th>
            <th colspan="3">MADARASA</th>
            <th colspan="3">MADARASA</th>
        </tr>
        <tr>
            <th>WV</th>
            <th>WS</th>
            <th>JML</th>
            <th>WV</th>
            <th>WS</th>
            <th>JML</th>
            <th>WV</th>
            <th>WS</th>
            <th>JML</th>
            <th>WV</th>
            <th>WS</th>
            <th>JML</th>
            <th>WV</th>
            <th>WS</th>
            <th>JML</th>
            <th>WV</th>
            <th>WS</th>
            <th>JML</th>
            <th>WV</th>
            <th>WS</th>
            <th>JML</th>
            <th>WV</th>
            <th>WS</th>
            <th>JML</th>
            <th>WV</th>
            <th>WS</th>
            <th>JML</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($schoolsData)) {
            $schoolIndex = 1;
            foreach ($schoolsData as $school) {
                // Calculate the totals for JUMLA KUU
                $totalBoys = 0;
                $totalGirls = 0;
                $totalStudents = 0;

                for ($grade = 0; $grade <= 7; $grade++) {
                    if (isset($school['grades'][$grade])) {
                        $totalBoys += $school['grades'][$grade]['boys'];
                        $totalGirls += $school['grades'][$grade]['girls'];
                        $totalStudents += $school['grades'][$grade]['students_enrolled'];
                    }
                }

                echo "<tr>";
                echo "<td>" . $schoolIndex . "</td>";
                echo "<td>" . htmlspecialchars($school['school_name']) . "</td>";
                
                // Display grades from AWALI (0) to DRS LA VII (7)
                for ($grade = 0; $grade <= 7; $grade++) {
                    if (isset($school['grades'][$grade])) {
                        $boys = $school['grades'][$grade]['boys'];
                        $girls = $school['grades'][$grade]['girls'];
                        $total = $school['grades'][$grade]['students_enrolled'];
                    } else {
                        $boys = $girls = $total = 0;
                    }
                    echo "<td>" . htmlspecialchars($boys) . "</td>";
                    echo "<td>" . htmlspecialchars($girls) . "</td>";
                    echo "<td>" . htmlspecialchars($total) . "</td>";
                }

                // Display totals for JUMLA KUU
                echo "<td>" . htmlspecialchars($totalBoys) . "</td>";
                echo "<td>" . htmlspecialchars($totalGirls) . "</td>";
                echo "<td>" . htmlspecialchars($totalStudents) . "</td>";
                echo "</tr>";

                $schoolIndex++;
            }
        } else {
            echo "<tr><td colspan='29'>No data available</td></tr>";
        }
        ?>
    </tbody>
</table>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                            <div class="create__course__bottom__button">
                                                <a href="#">Preview</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-8 col-md-6 col-12">
                                            <div class="create__course__bottom__button">
                                                <a href="#">Create Course</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>

            </div>

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
        <script src="../js/main.js"></script>



    </body>

    </html>

<?php } ?>