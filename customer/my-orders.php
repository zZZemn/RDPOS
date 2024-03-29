<?php
include "backend/session.php";
include "controller/function/session_Dir.php";
?>

<!--- start import --->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>My Orders</title>

    <link rel="shortcut icon" type="image/x-icon" href="../../upload_system/<?= $db_system_logo ?>">

    <link rel="stylesheet" href="assets/plugins/scrollbar/scroll.min.css">

    <link rel="stylesheet" href="assets/plugins/alertify/alertify.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/my-orders.css">

    <!--- end import --->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/search_suggestion.css">


</head>

<?php
include "view/myOrder/viewQuery.php";
include("backend/back_navbar.php");
include("Back_myOrders.php");
include "controller/function/count.php";
?>

<body>
    <div id="global-loader">
        <div class="whirly-loader"></div>
    </div>

    <div class="main-wrapper">
        <div class="header">
            <?php include "topBar/header.php"; ?>
            <ul class="nav user-menu">
                <?php include "topBar/navMenu.php"; ?>
                <?php include "topBar/notification.php"; ?>
                <?php include "topBar/profile.php"; ?>
            </ul>
            <?php include "topBar/mobilUserMenu.php"; ?>
        </div>
        <?php
        include "Section/sidebar.php";
        ?>

        <!---start changable content---->
        <!--- <main>---->
        <div class="container p-0">
            <div class="d-flex justify-content-end">
                <select class="form-control select-order-status">
                    <option value="All">All</option>
                    <option value="Pending">Pending</option>
                    <option value="To-Ship">To-Ship</option>
                    <option value="To-Receive">To-Receive</option>
                    <option value="Completed">Completed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>

            <div class="container bg-dark mt-4" id="orders-items-container">

            </div>

        </div>

        <!--- </main>--->

        <!---end changable content---->
    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="searchpart">
        <div class="searchcontent">
            <div class="searchhead">
                <h3>Search </h3>
                <a id="closesearch"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
            </div>
            <div class="searchcontents">
                <div class="searchparts">
                    <input type="text" placeholder="search here">
                    <a class="btn btn-searchs">Search</a>
                </div>
                <div class="recentsearch">
                    <h2>Recent Search</h2>
                    <ul>
                        <li>


                            <h6><i class="fa fa-search me-2"></i> Settings</h6>
                        </li>
                        <li>
                            <h6><i class="fa fa-search me-2"></i> Report</h6>
                        </li>
                        <li>
                            <h6><i class="fa fa-search me-2"></i> Invoice</h6>
                        </li>
                        <li>
                            <h6><i class="fa fa-search me-2"></i> Sales</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <?php include "view/myOrder/modal.php"; ?>
    <!-- start imported js --->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>

    <script src="assets/js/script.js"></script>
    <!--end imported js --->



    <script src='view/myOrder/js/headerOrderStatus.js'></script>



    <script src='view/myOrder/js/realtime_fetch_order.js'></script>



    <script src='view/myOrder/js/function.js'></script>


    <script>


    </script>