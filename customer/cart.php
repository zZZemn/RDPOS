<?php 
include("backend/session.php");
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
<title>Cart</title>

<link rel="shortcut icon" type="image/x-icon" href="../../upload_system/<?= $db_system_logo ?>">

<link rel="stylesheet" href="assets/plugins/scrollbar/scroll.min.css">

<link rel="stylesheet" href="assets/plugins/alertify/alertify.min.css">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/animate.css">

<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">




<!--- end import --->






    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--->
    
   

   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    --->
    
    <!---<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--->



    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/notification.css">
    <link rel="stylesheet" href="view/checkout/css/modalTheme.css">
    
    <link rel="stylesheet" href="css/search_suggestion.css">
</head>

<?php
include("backend/back_navbar.php");
include "controller/function/count.php";
?>

<body>

<br><br><br>
<div id="global-loader">
<div class="whirly-loader"> </div>
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
    <?php  include "Section/sidebar.php"; ?>

    <!---start changable content---->
          <!--- <main>---->
            
<br><br>


<div   class="container" style="min-height:400px;" >

<?php if ($items == 0) {
    echo "<center><br><h2 class='cart-title mt-4 text-center'>My Cart</h2><h1> is empty</h1></center>";

    echo '
    <script>
    $(document).ready(function () {
        
        $("#totalBillCOntainer").hide();
    });

    </script>
    ';
} else { ?>

<script>
  $(document).ready(function () {
   $("#totalBillCOntainer").show();
});

    </script>

    <div class="wrapper" >
        <div  class="wrapper_content" >
            
            <div class="header_title" > 
                <div class="title" >
                 
                </div>
                <div  class="amount" style='border:none;' >
                    <br>

<form id="checkoutForm" action="checkout.php" method="POST">
                    <button type="button" name="btnRemoveAll" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal"> Delete </button>

                    <input type="checkbox" class="product-checkbox"  id="checkboxAll" onclick="toggleCheckboxes(this)">
                    <label for="checkboxAll">Select All</label>
                    <b>(<?=$count?>)</b>
                      
            </div>
        </div>
        
        </div>
    </div>




<?php } 

 ?>	
  
    
  


<?php 
include "view/cart/cart_table.php";
include "view/cart/checkout.php";
?>
</form>




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





<?php include "view/cart/modal.php";?>


<script src="js/checkbox.js"></script><!--this line for checkbox --->

<script src="js/remove.js"></script><!--this line for remove --->


<script src="js/cart_computation.js"></script>
<!--this line for computation --->



<script src="view/cart/js/ajax.js"></script><!--this line for ajax --->

<script src="view/cart/js/pickup.js"></script><!--this line for ajax --->




