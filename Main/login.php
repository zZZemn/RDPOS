<?php
include("back_login.php");


include("controller/maintinance.php");


include "include/session_dir.php";

$current_date = date('Y-m-d');

?>



<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- index-431:41-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo htmlspecialchars($db_system_name); ?> || Browse product</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="../upload_system/<?php echo htmlspecialchars($db_system_logo); ?>">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <!-- Your custom CSS files -->
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
        
           <?php include "view/navigation.php"; ?>
            
















    
<!----<link rel="stylesheet" href="assets/css/login.css">--->
<!-- main div -->

<link rel="stylesheet" href="view/Signup/view/assets/css/bootstrap.min.css">

<link rel="stylesheet" href="view/Signup/view/assets/plugins/fontawesome/css/fontawesome.min.css">

<link rel="stylesheet" href="view/Signup/view/assets/css/style.css">

  


<div class="main-wrapper" style="background-color:#F7F7F7; ">

<div class="account-content" >

<div class="login-wrapper" >

<div class="login-content"  >
    
<div class="container" style="background-color:white; border-radius:15px;"> 

<div class="login-userset"  >


<form method="POST">
  
<div class="login-userheading"  >
<h3>Sign In</h3>
<h4>Please login to your account</h4>
</div>
<div class="form-login">
<label>Email</label>
<div class="form-addons">
<input type="text" placeholder="Enter your email or username" name="email_or_username">

</div>
</div>
<div class="form-login">
<label>Password</label>
<div class="pass-group">
<input type="password" class="pass-input" placeholder="Enter your password" name="password">

</div>
</div>
<div class="form-login">
<div class="alreadyuser">
<h4><a href="forgetpassword.php" class="hover-a">Forgot Password?</a></h4>
</div>
</div>
<div class="form-login">
<button class="btn btn-login" type="submit" name="btnLogin">Sign In</button>
</div>

</form>



<div class="signinform text-center">
<h4>Don’t have an account? <a href="register.php" class="hover-a">Sign Up</a></h4>
</div>
</div>


</div>
</div>
<div class="login-img">
<img src="../upload_system/<?php echo $db_system_banner  ?>" alt="img">
</div>
</div>
</div>
</div>



<script src="view/Signup/view/assets/js/jquery-3.6.0.min.js"></script>

<script src="view/Signup/view/assets/js/feather.min.js"></script>

<script src="view/Signup/view/assets/js/bootstrap.bundle.min.js"></script>

<script src="view/Signup/view/assets/js/script.js"></script>
</body>




 	<!-- Footer -->


















    

</html>
