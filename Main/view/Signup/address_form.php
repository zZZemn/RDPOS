<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="assets/img/logo.png" alt="img">
                        </div>
                        <form method="POST">


                            <input hidden type="text" name="fname" value="<?php echo $_GET['fname']; ?>">
                            <input hidden type="text" name="lname" value="<?php echo $_GET['lname']; ?>">
                            <input hidden type="text" name="bday" value="<?php echo $_GET['bday']; ?>">
                            <input hidden type="text" name="username" value="<?php echo $_GET['username']; ?>">
                            <input hidden type="text" name="email" value="<?php echo $_GET['email']; ?>">
                            <input hidden type="text" name="contact" value="<?php echo $_GET['contact']; ?>">
                            <input hidden type="text" name="password" value="<?php echo $_GET['pass']; ?>">
                            <input hidden type="text" name="cpass" value="<?php echo $_GET['cpass']; ?>">
                            <div class="login-userheading">
                                <h3>Address Information</h3>

                            </div>
                            <div class="form-login">
                                <label for="region">Region</label>
                                <div class="form-addons">
                                    <select class="form-select" name="region" id="region">
                                        <!-- insert api response here -->
                                        <option value="">Select Region</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-login">
                                <label for="province">Province</label>
                                <div class="form-addons">
                                    <select class="form-select" name="province" id="province">
                                        <!-- insert api response here -->
                                        <option value="">Select Province</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-login">
                                <label for="city">City</label>
                                <div class="form-addons">
                                    <select class="form-select" name="city" id="city">
                                        <!-- insert api response here -->
                                        <option value="">Select City</option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-login">
                                <label for="barangay">Barangay</label>
                                <div class="form-addons">
                                    <select class="form-select" name="barangay" id="barangay">
                                        <!-- insert api response here -->
                                        <option value="">Select Barangay</option>
                                    </select>
                                    <div style="color:red;" id="usernameLengthError"></div>
                                    <div style="color:red;" id="usernameError"></div>

                                </div>
                            </div>


                            <div class="form-login">
                                <label>Subdivision-Street-Block-Lot</label>
                                <div class="form-addons">
                                    <input required type="text" name="streetDescription" placeholder="Subdivision-Street-Block-Lot" name="address">

                                </div>
                            </div>


                            <div class="form-login">
                                <button class="btn btn-login" type="submit" name="btnRegister" id="btnRegister">REGISTER</button>
                            </div>
                        </form>


                        <div class="signinform text-center">
                            <h4>Already a user? <a href="../signin.php" class="hover-a">Sign In</a></h4>
                        </div>
                        <div class="form-setlogin">
                            <h4>Or sign up with</h4>
                        </div>
                        <div class="form-sociallink">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="assets/img/icons/google.png" class="me-2" alt="google">
                                        Sign Up using Google
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="assets/img/icons/facebook.png" class="me-2" alt="google">
                                        Sign Up using Facebook
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="login-img">
                    <img src="assets/img/login.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <!---start script block--->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="../controller/general/js/address_api.js"></script>
    <!---end script block--->

</body>

</html>