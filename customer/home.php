<?php
include("backend/session.php");
include "controller/function/session_Dir.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Home</title>




<!---import from ordering landing page--->
        <link rel="stylesheet" href="../assets_landingpage/css/material-design-iconic-font.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../assets_landingpage/css/font-awesome.min.css">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="../assets_landingpage/css/fontawesome-stars.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="../assets_landingpage/css/meanmenu.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="../assets_landingpage/css/owl.carousel.min.css">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="../assets_landingpage/css/slick.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="../assets_landingpage/css/animate.css">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="../assets_landingpage/css/jquery-ui.min.css">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="../assets_landingpage/css/venobox.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="../assets_landingpage/css/nice-select.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="../assets_landingpage/css/magnific-popup.css">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="../assets_landingpage/css/helper.css">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="../assets_landingpage/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="../assets_landingpage/css/responsive.css">
        <!-- Modernizr js -->
        <script src="../assets_landingpage/js/vendor/modernizr-2.8.3.min.js"></script>


<!---import from ordering landing page--->










<link rel="shortcut icon" type="image/x-icon" href="../../upload_system/<?= $db_system_logo ?>">

<link rel="stylesheet" href="assets/plugins/scrollbar/scroll.min.css">

<link rel="stylesheet" href="assets/plugins/alertify/alertify.min.css">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/animate.css">

<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">




    <link rel="stylesheet" href="../assets_landingpage/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets_landingpage/css/animate.css">
   
    

       


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <!--<style>  a{text-decoration: none;} </style>-->
    

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
   

    


    
    <link rel="stylesheet" href="css/cardHover.css">
     <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/search_suggestion.css">

        
</head>




<body>

<br><br><br>

<div id="global-loader">
<div class="whirly-loader"> </div>
</div>


<?php 

include("backend/back_navbar.php");

include "view/product/function.php";

include "controller/function/count.php";

?>


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
    <?php  include "Section/sidebar.php"; ?>


    
<!---start-changit main>-->

            
            <div class="container mt-3">
                
                
                
                           <?php include "view/home/searchArea.php"; ?>
            
          
            <div class="slider-with-banner ml-0" >
                    <div class="row w-100" >
                          <!-- Begin Slider Area -->
                         
                          <?php include "view/home/TopsliderSection.php";?>
                         
                    </div>
              </div>
                   
                          <?php include "view/home/newArrivalSection.php"; ?>
                          <?php include "view/home/productSection.php";?>
                          <?php include "view/home/VoucherBannerSeaction.php";?>
                  
              
                     
                            <div class="row">
                                <?php include "view/product/section.php";?>
                                
                            </div>

                            
                        
                            
<!---end </main>--->
        
</div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>


<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>

<script src="assets/js/script.js"></script>



<script src="assets/plugins/alertify/alertify.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>










</body>


<?php include "view/product/search_sideModal.php";?>

      
        <script src="../assets_landingpage/js/vendor/popper.min.js"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="../assets_landingpage/js/bootstrap.min.js"></script>
        <!-- Ajax Mail js -->
        <script src="../assets_landingpage/js/ajax-mail.js"></script>
        <!-- Meanmenu js -->


        
        <script src="../assets_landingpage/js/jquery.meanmenu.min.js"></script>
        <!-- Wow.min js -->
        <script src="../assets_landingpage/js/wow.min.js"></script>
        <!-- Slick Carousel js -->
        <script src="../assets_landingpage/js/slick.min.js"></script>
        <!-- Owl Carousel-2 js -->
        <script src="../assets_landingpage/js/owl.carousel.min.js"></script>
        <!-- Magnific popup js -->
        <script src="../assets_landingpage/js/jquery.magnific-popup.min.js"></script>
        <!-- Isotope js -->
        <script src="../assets_landingpage/js/isotope.pkgd.min.js"></script>
        <!-- Imagesloaded js -->
        <script src="../assets_landingpage/js/imagesloaded.pkgd.min.js"></script>
        <!-- Mixitup js -->
        <script src="../assets_landingpage/js/jquery.mixitup.min.js"></script>
        <!-- Countdown -->
        <script src="../assets_landingpage/js/jquery.countdown.min.js"></script>
        <!-- Counterup -->
        <script src="../assets_landingpage/js/jquery.counterup.min.js"></script>
        <!-- Waypoints -->
       <!-- <script src="../assets_landingpage/js/waypoints.min.js"></script>-->
        <!-- Barrating -->
        <script src="../assets_landingpage/js/jquery.barrating.min.js"></script>
        <!-- Jquery-ui -->
        <script src="../assets_landingpage/js/jquery-ui.min.js"></script>
        <!-- Venobox -->
        <script src="../assets_landingpage/js/venobox.min.js"></script>
        <!-- Nice Select js -->
        <script src="../assets_landingpage/js/jquery.nice-select.min.js"></script>
        <!-- ScrollUp js -->
        <script src="../assets_landingpage/js/scrollUp.min.js"></script>
        <!-- Main/Activator js -->
        <script src="../assets_landingpage/js/main.js"></script>
	

<script src='controller/javascript/product.js'></script>



</html>
