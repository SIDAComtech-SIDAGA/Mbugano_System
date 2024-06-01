<?php

session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {

    require_once "../auth.php";
    require_once"../include/variables.php";

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

        // Debugging
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

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

        <link rel="shortcut icon" type="image/x-icon" href="../img/school_icon.png">


        <!-- CSS here -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/animate.min.css">
        <link rel="stylesheet" href="../css/aos.min.css">
        <link rel="stylesheet" href="../css/magnific-popup.css">
        <link rel="stylesheet" href="../css/icofont.min.css">
        <link rel="stylesheet" href="../css/slick.css">
        <link rel="stylesheet" href="../css/swiper-bundle.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
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
        <main class="main_wrapper overflow-hidden">
    <?php require_once("../include/top_bar.php"); ?>

    <!-- breadcrumbarea__section__start -->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Students</li>
        </ol>
    </nav>
    <!-- end  -->
    <?php require_once '../include/report_navigator.php' ?>

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
                                                    <table border="1" id="ReportTable">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>School Name</th>
                                                                <th>Total Boys</th>
                                                                <th>Total Girls</th>
                                                                <th>Total Students</th>
                                                                <th>Girls Toilets</th>
                                                                <th>Boys Toilets</th>
                                                                <th>Students Desk</th>
                                                                <th>Closets</th>
                                                                <th>Classes Needed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        if (!empty($schoolsData)) {
                                                            $schoolIndex = 1;
                                                            foreach ($schoolsData as $school) {
                                                                $totalBoys = 0;
                                                                $totalGirls = 0;
                                                                $totalStudents = 0;
                                                                $girlsToilets = 0;
                                                                $boysToilets = 0;

                                                                // Calculate total boys, girls, and students
                                                                for ($grade = 0; $grade <= 7; $grade++) {
                                                                    if (isset($school['grades'][$grade])) {
                                                                        $totalBoys += $school['grades'][$grade]['boys'];
                                                                        $totalGirls += $school['grades'][$grade]['girls'];

                                                                    }
                                                                }

                                                                $totalStudents = $totalBoys + $totalGirls;


                                                                if ($totalGirls > 0) {
                                                                    $girlsToilets = ceil($totalGirls / 25) - 1;
                                                                }


                                                                if ($totalBoys > 0) {
                                                                    $boysToilets = ceil($totalBoys / 20);
                                                                }
                                                                if ($totalStudents > 0){
                                                                    $deskRequired = ceil($totalStudents / 2 );
                                                                }
                                                                if ($totalBoys > 0 || $totalGirls > 0) {
                                                                    $closets = 1;
                                                                }
                                                                if($totalStudents > 0){
                                                                    $classesNeeded = ceil($totalStudents / 45) - 1;
                                                                }

                                                                echo "<tr>";
                                                                echo "<td>" . $schoolIndex . "</td>";
                                                                echo "<td>" . htmlspecialchars($school['school_name']) . "</td>";
                                                                echo "<td>" . htmlspecialchars($totalBoys) . "</td>";
                                                                echo "<td>" . htmlspecialchars($totalGirls) . "</td>";
                                                                echo "<td>" . htmlspecialchars($totalStudents) . "</td>";
                                                                echo "<td>" . htmlspecialchars($girlsToilets) . "</td>";
                                                                echo "<td>" . htmlspecialchars($boysToilets) . "</td>";
                                                                echo "<td>". htmlspecialchars($deskRequired). "</td>";
                                                                echo "<td>". htmlspecialchars($closets). "</td>";
                                                                echo "<td>". htmlspecialchars($classesNeeded). "</td>";

                                                                echo "</tr>";

                                                                $schoolIndex++;
                                                            }
                                                        } else {
                                                            echo "<tr><td colspan='10'>No data available</td></tr>";
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
                                        <button class="btn btn-success"  onclick="exportTableToExcel('ReportTable', 'School_Overview_Report')"><strong>Export to Excel</strong></button>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-6 col-12">
                                    <div class="create__course__bottom__button">
                                        <a href="#">Edit</a>
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

<script>
    function exportTableToExcel(tableID, filename = '') {
        var tableSelect = document.getElementById(tableID);
        var workbook = XLSX.utils.table_to_book(tableSelect, { sheet: "Sheet1" });
        filename = filename ? filename + '.xlsx' : 'excel_data.xlsx';
        XLSX.writeFile(workbook, filename);
    }
</script>
        <!-- footer  starts  -->

        <?php require_once '../include/footer.php' ?>
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
