
<head>
<link rel="stylesheet" href="view/Signup/assets/css/bootstrap.min.css">



<link rel="stylesheet" href="view/Signup/assets/css/style.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="account-page">

<div class="main-wrapper">
<div class="account-content">
<div class="login-wrapper">
<div class="login-content">
<div class="login-userset">



<form action="address_form.php" method="POST">
        <div class="login-userheading">
            <h3>Create an Account</h3>
            <h4>Continue where you left off</h4>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-login">
                    <label>First Name</label>
                    <div class="form-addons">
                        <input type="text" placeholder="Enter your first name" name='fname' id="fname" value="">
                        <div style="color:red;" id="fnameError"></div>
                        <img src="view/Signup/assets/img/icons/users1.svg" alt="img">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-login">
                    <label>Last Name</label>
                    <div class="form-addons">
                        <input type="text" placeholder="Enter your last name" name='lname' id="lname" value="">
                        <div style="color:red;" id="lnameError"></div>
                        <img src="view/Signup/assets/img/icons/users1.svg" alt="img">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-login">
            <label for="birthdate">Birthday</label>
            <div class="form-addons">
                <input name='bday' value="" required type="date" id="birthdate">
                <div style="color:red;" id="birthdateError"></div>
            </div>
        </div>

        <div class="form-login">
            <label>Username</label>
            <div class="form-addons">
                <input required type="text" placeholder="Username" name='username' id="username" value="">
                <div style="color:red;" id="usernameLengthError"></div>
                <div style="color:red;" id="usernameError"></div>
                <img src="view/Signup/assets/img/icons/mail.svg" alt="img">
            </div>
        </div>

        <div class="form-login">
            <label>Email</label>
            <div class="form-addons">
                <input required type="email" placeholder="Gmail" name='email' id="email" value="">
                <div style="color:red;" id="emailError"></div>
                <img src="view/Signup/assets/img/icons/mail.svg" alt="img">
            </div>
        </div>

        <div class="form-login">
            <label>Contact</label>
            <div class="form-addons">
                <input required type="text" placeholder="Contact" name='contact' id="contact" value="">
                <div style="color:red;" id="contactError"></div>
                <img src="view/Signup/assets/img/icons/mail.svg" alt="img">
            </div>
        </div>

        <div class="form-login">
            <label>Password</label>
            <div class="pass-group">
                <input class="pass-input" name='pass' required type="password" placeholder="Password" id="password" value="">
            </div>
        </div>

        <div class="form-login">
            <label>Confirm Password</label>
            <div class="pass-group">
                <input class="pass-input" name='cpass' required type="password" placeholder="Confirm Password" id="confirmPassword" value="">
            </div>
        </div>

        <div class="form-login">
            <button class="btn btn-login" type="submit" id="submitButton">NEXT</button>
        </div>

        <div class="error-message" style="color:red;" id="passwordError"></div>
        <div class="error-message" id="errorText"></div>
    </form>

<div class="signinform text-center">
<h4>Already a user? <a href="login.php" class="hover-a">Sign In</a></h4>
</div>
<div class="form-setlogin">
<!--<h4>Or sign up with</h4>--->
</div>


<div class="form-sociallink">
</div>
</div>
</div>
<div class="login-img">
<img src="../upload_system/<?php echo $db_system_banner  ?>" alt="img">
</div>
</div>
</div>
</div>


<script src="view/Signup/assets/js/jquery-3.6.0.min.js"></script>

<script src="view/Signup/assets/js/feather.min.js"></script>

<script src="view/Signup/assets/js/bootstrap.bundle.min.js"></script>

<script src="view/Signup/assets/js/script.js"></script>

<script>
// Retrieve data from local storage
var formData = JSON.parse(localStorage.getItem('formData'));

// Check if there is stored data
if (formData) {
    // Fill the input fields with the stored data
    document.getElementById('fname').value = formData.fname;
    document.getElementById('lname').value = formData.lname;
    document.getElementById('birthdate').value = formData.bday;
    document.getElementById('username').value = formData.username;
    document.getElementById('email').value = formData.email;
    document.getElementById('contact').value = formData.contact;
    document.getElementById('password').value = formData.password;
    document.getElementById('confirmPassword').value = formData.cpass;
} else {
    // Local storage is empty, do something else or provide a default behavior
    console.log('Local storage is empty.');
}

// Add an event listener to clear data on page reload
window.addEventListener('beforeunload', function () {
    // Clear the data from local storage
    localStorage.removeItem('formData');
});

</script>







</body>
</html>