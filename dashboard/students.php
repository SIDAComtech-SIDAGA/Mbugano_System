<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {

    require_once "../auth.php";

    $schoolData = [];

    try {
        // Query to get information from school_info table
        $stmt1 = $conn->prepare("SELECT School_id, School_Name, School_Address, Head_Master, Head_Master_Phone FROM school_info");
        $stmt1->execute();
        $schools = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        // Query to get information from schoolgradedata table
        $stmt2 = $conn->prepare("SELECT SchoolID , Boys, Girls FROM schoolgradedata");
        $stmt2->execute();
        $grades = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        // Combine the data from both queries
        foreach ($schools as $school) {
            $school_id = $school['School_id'];
            $schoolData[$school_id] = $school;
            $schoolData[$school_id]['grades'] = [];
            $schoolData[$school_id]['total_students'] = 0; // Initialize total students

            foreach ($grades as $grade) {
                if ($grade['SchoolID'] == $school_id) {
                    $schoolData[$school_id]['grades'][] = $grade;
                    // Calculate the total students for each school
                    $schoolData[$school_id]['total_students'] += $grade['Boys'] + $grade['Girls'];
                }
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Debugging purposes: Print the data
    // echo "<pre>";
    // print_r($schoolData);
    // echo "</pre>";
    
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
        <!-- exporting excel  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    </head>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'block';

                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 4000); // 400 milliseconds = 4 seconds
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
    <?php require_once '../include/report_navigator.php'?>

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
                                                <table>
                                                    <thead border="2px">
                                                        <tr>
                                                            <th>School ID</th>
                                                            <th>Head Master</th>
                                                            <th>Total Students</th>
                                                            <th>Update</th>
                                                            <th>Address</th>
                                                            <th>Export</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($schoolData as $school): ?>
                                                            <tr>
                                                                <td class="cartarea__product__thumbnail"><?= $school['School_id'] ?></td>
                                                                <td class="cartarea__product__name"><?= $school['School_Name'] ?></td>
                                                                <td class="cartarea__product__name"><?= htmlspecialchars($school['total_students']); ?></td>
                                                                <td class="cartarea__product__remove">
                                                                    <a href="#">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                                                                            <title>Pencil</title>
                                                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M364.13 125.25L87 403l-23 45 44.99-23 277.76-277.13-22.62-22.62zM420.69 68.69l-22.62 22.62 22.62 22.63 22.62-22.63a16 16 0 000-22.62h0a16 16 0 00-22.62 0z" />
                                                                        </svg>
                                                                    </a>
                                                                    <a href="#">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                                                                            <title>Trash</title>
                                                                            <path d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 112h352" />
                                                                            <path d="M192 112V72h0a23.93 23.93 0 0124-24h80a23.93 23.93 0 0124 24h0v40M256 176v224M184 176l8 224M328 176l-8 224" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                                                        </svg>
                                                                    </a>
                                                                </td>
                                                                <td class="cartarea__product__thumbnail"><?= $school['School_Address'] ?></td>
                                                                <td class="cartarea__product__quantity">
                                                                    <div class="cartarea__plus__button">
                                                                        <i class="fas fa-file-export"></i>
                                                                        <a class="default__button" href="#">Export</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                    <div class="create__course__bottom__button">
                                        
<div class="btn btn-success">
    <button class="btn btn-success" onclick="exportTableToExcel('schoolTable', 'School_Report')">Export to Excel</button>
</div>
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

<script>
    function exportTableToExcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename ? filename + '.xls' : 'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            // Triggering the function
            downloadLink.click();
        }
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