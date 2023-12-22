<?php
include("../connection.php");
include("back_forgot.php");


include("../customer/backend/back_navbar.php");

//include "../customer/backend/session.php";
?>


<!DOCTYPE html>
<html lang="en">





<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- index-431:41-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo htmlspecialchars($db_system_name); ?> || Create new password</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="../upload_system/<?php echo htmlspecialchars($db_system_logo); ?>">
    
<link rel="stylesheet" href="../administrator/admin_view/assets/plugins/scrollbar/scroll.min.css">
<link rel="stylesheet" href="../administrator/admin_view/assets/plugins/alertify/alertify.min.css">

<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/fontawesome-stars.css">
<link rel="stylesheet" href="css/meanmenu.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/slick.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/jquery-ui.min.css">
<link rel="stylesheet" href="css/venobox.css">
<link rel="stylesheet" href="css/nice-select.css">
<link rel="stylesheet" href="css/magnific-popup.css">

<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
<link rel="stylesheet" href="css/helper.css">
<link rel="stylesheet" href="css/style.css">


    </head>
    <style>
    a {
        text-decoration: none;
    }
</style>

    <body>
   
        <div class="body-wrapper" >
            <!-- Begin Header Area -->
            <?php include "view/navigation.php"; ?>



<link rel="stylesheet" href="../administrator/admin_view/assets/css/bootstrap.min.css">

<link rel="stylesheet" href="../administrator/admin_view/assets/plugins/fontawesome/css/fontawesome.min.css">

<link rel="stylesheet" href="view/Signup/assets/css/style.css">

<body class="account-page">

<div class="main-wrapper">
<div class="account-content">
<div class="login-wrapper">
<div class="login-content">

<div class="container" style="background-color:white; border-radius:15px;"> 
<div class="login-userset ">
<div class="login-logo">

</div>


<div class="login-userheading">
<h3>Create new password</h3>

</div>
<form method="POST">

<div class="form-login">
<label>New password</label>
<div class="form-addons">
<input type="password" id="newpsw" name="newpsw" placeholder="Enter your new password">
<span class="error text-danger d-block"><?=$newpswErr?></span>
</div>
</div>




<div class="form-login">
<label>Confirm new password</label>
<div class="form-addons">
<input type="password" id="cunfirm_newpsw" name="cunfirm_newpsw" placeholder="Confirm new password">
<span class="error text-danger d-block"><?=$cunfirm_newpswErr?></span>

</div>
</div>



<div class="text-center" id="loadingSpinner"></div>
<div class="form-login">
<button type="submit    " class="btn btn-login"name="btnNewPassword">Submit</button>
</div>
</div>

</form>
</div>
</div>
<div class="login-img">
<img src="../upload_system/<?php echo $db_system_banner  ?>" alt="img">
</div>
</div>
</div>
</div>


</body>

































<script src="../administrator/admin_view/assets/js/jquery-3.6.0.min.js"></script>

<script src="../administrator/admin_view/assets/js/feather.min.js"></script>

<script src="../administrator/admin_view/assets/js/bootstrap.bundle.min.js"></script>

<script src="../administrator/admin_view/assets/js/script.js"></script>



<script src="../administrator/admin_view/assets/js/jquery.slimscroll.min.js"></script>

<script src="../administrator/admin_view/assets/plugins/alertify/alertify.min.js"></script>