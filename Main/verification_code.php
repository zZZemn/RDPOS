<?php 

include("controller/maintinance.php");

include("back_cunfirmAcc.php");

include "include/session_dir.php";

 
?>

<?php
//include "controller/register/back_register.php";

if(empty($_GET)){
    header("Location: register.php");
    exit; // or die; to stop script execution
}

?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Confirm account</title>
    <link rel="icon" href="assets/images/logos.png" type="image/x-icon">
    
   <!--- <link rel="stylesheet" href="assets/css/address_form.css">--->

    
    <link rel="stylesheet" href="view/Signup/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/Signup/assets/css/style.css">

    
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
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="../administrator/admin_view/assets/plugins/alertify/alertify.min.css">
<link rel="stylesheet" href="view/Signup/assets/css/style.css">

<link rel="stylesheet" href="../administrator/admin_view/assets/plugins/scrollbar/scroll.min.css">

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


    <link rel="stylesheet" href="assets/css/verification.css">

<body>
<?php
$accid = $_GET['accid'];
$view_product_query = mysqli_query($connections, "SELECT * FROM account WHERE acc_id = '$accid'");
$product_row = mysqli_fetch_assoc($view_product_query);

if ($product_row) {
    $db_acc_id = $product_row["acc_id"];
    $db_acc_email = $product_row["acc_email"];
    $email_parts = explode('@', $db_acc_email); // Ihiwalay ang email address sa pamamagitan ng '@'
    $username = $email_parts[0]; // Kunin ang username
    $domain = $email_parts[1]; // Kunin ang domain

    $username_length = strlen($username); // Kunin ang haba ng username
    $hidden_username = substr_replace($username, '*', 1, $username_length - 2); // Palitan ang mga random na titik sa asterisk

    $masked_email = $hidden_username . '@' . $domain; // Isama ang domain upang mabuo ang natatakpan na email

    $db_acc_otp = $product_row["Otp"];

    $db_acc_status = $product_row["acc_status"];
}
?>
<style>
    .error{
        color:red;
       
    }


    /* Add a style for the disabled button */
#btnSendOtp.disabled {
    background-color: #ccc; /* Change this to the desired color for disabled state */
    color: #fff;
    cursor: not-allowed;
}

/* Add a style for the button during verification process */
#btnSendOtp.disabled.verifying {
    background-color: #FFA500; /* Change this to the desired color during verification */
}
/* Add a style for the enabled button */
#btnSendOtp.enabled {
   
    color: #fff;
    cursor: pointer;
}




</style>


<link rel="stylesheet" href="view/confirmOTP/css/style.css">
   



   
      
   
      
    
    <main class="cd__main">
    <br><br><br><br>

<div class="row justify-content-center">

    <div class="col-12 col-md-6 col-lg-4" style="min-width: 500px;">
      <div class="card bg-white mb-5 mt-5 border-0" style="box-shadow: 0 12px 15px rgba(0, 0, 0, 0.02);">
        <div class="card-body p-5 text-center">
        <form method="POST">
        <input hidden type="text" value="<?=$_GET["accid"];?>" name="accid" id="accid">
          <h4>Verify</h4>
          <p>Your otp code was sent to <?php echo $masked_email?></p>

         
          <div class="otp-field mb-4">
             <input name="code1" type="number" min="0" max="9" required />
             <input name="code2" type="number" min="0" max="9" required disabled />
             <input name="code3" type="number" min="0" max="9" required disabled />
             <input name="code4" type="number" min="0" max="9" required disabled />
          </div>

          <button  id="btnSendOtp" <?php if($db_acc_status == 2) { echo "disabled"; } ?> type="submit" name="btnSendOtp" class="btn btn-primary mb-3">
            Confirm
          </button>
          </form>
          <div class="text-center" id="loadingSpinner"></div>
          <div id="resendDiv">
          <center><span class="error" id="errorCount"><?php echo $EnterOtpErr?></span></center>
          <p class="resend text-muted mb-0" >

            Didn't receive code? <a id="resendLink" style="color:green;">Request again</a>
          </p>
          </div>
        </div>
      </div>
    </div>
   
  </div>

    </main>
  
  











    <script>
$(document).ready(function() {

    $("#resendLink").click(function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = {
            db_acc_id: $("input[name='accid']").val(),
        };
        // Perform an Ajax POST request to your PHP script
        $.ajax({
            type: "POST",
            url: "back_resendOtp.php", // Replace with the actual PHP script's URL
            data: formData,
            success: function(response) {

                var result = response.result;
                var remaining = response.remaining;
                
              
  console.log("remaining "+remaining);
              console.log("result "+result);
                


                if(result=="success"){
                                $("#resendLink").css("display", "none");
                                $("#resendDiv").css("display", "none");
                            $.ajax({
                            type: "POST",
                            url: "../mailer.php",
                            data: formData,
                            beforeSend: function() {
                                $("#loadingSpinner").html('<div class="spinner-border text-warning" role="status"><span class="sr-only">Loading...</span></div>').show();
                            },
                            success: function(response) {   
                                // Display success message
                    
                                //setTimeout(function() {
                                //window.location.href = "verification_code.php?accid=" + last_id;
                                //}, 1000); // 1000 milliseconds (1 second)

                            },
                            error: function(xhr, status, error) {
                                $("#loadingSpinner").hide();
                                $("#resendLink").css("display", "block");
                                console.error("AJAX Error in mailer.php: " + error);
                            },
                            complete: function() {

                            alertify.success("Otp resend successfully ");

                            $("#loadingSpinner").hide();
                            $("#resendLink").css("display", "block");
                            $("#resendDiv").css("display", "block");
                            }
                        
                        });

                }else{
                    console.log("remaining "+remaining);
                    console.log("result "+result);
                    $("#errorCount").text(result);
                }
             

            },
            error: function() {
                // Handle errors, e.g., show an error message
                console.error("An error occurred while submitting the data.");
            }
        });
        
    });
});
</script>




























    <script src="view/confirmOTP/js/script.js"></script>


<script src="assets/javascript/verify_code_validation.js"></script>

<script>
// Get the countdown value from the PHP variable
var countdown = <?php echo $countdown; ?>;

// Function to start the countdown
function startCountdown() {
    var countdownElement = document.getElementById('countdown');
    var sendOtpButton = document.getElementById('btnSendOtp');
    var resendLink = document.getElementById('resendLink');
    var errorCount = document.getElementById('errorCount'); // Get the errorCount element

    var timer = setInterval(function() {
        countdownElement.innerHTML = countdown;
        countdown--;

        if (countdown < 0) {
            clearInterval(timer);
            countdownElement.style.display = 'none';
            sendOtpButton.removeAttribute('disabled');
            sendOtpButton.classList.remove('disabled');
            sendOtpButton.innerHTML = 'VERIFY';
            resendLink.classList.remove('disabled');
            resendLink.setAttribute('href', 'back_resendOtp.php?accid=<?php echo $accid ?>');

            // Change the text of the errorCount element
            errorCount.innerHTML = 'Enter correct otp.';

        }
    }, 1000);
}

// Call the startCountdown function if countdown is greater than 0
if (countdown > 0) {
    var sendOtpButton = document.getElementById('btnSendOtp');
    var resendLink = document.getElementById('resendLink');

    sendOtpButton.disabled = true;
    sendOtpButton.classList.add('disabled');
    sendOtpButton.innerHTML = 'VERIFICATION IN PROGRESS...';
    resendLink.classList.add('disabled');
    resendLink.removeAttribute('href');

    startCountdown();
} else {
    var errorCount = document.getElementById('errorCount');
    errorCount.innerHTML = 'Enter correct otp.';
    var sendOtpButton = document.getElementById('btnSendOtp');
    sendOtpButton.classList.remove('disabled');
    sendOtpButton.classList.add('enabled');
    sendOtpButton.innerHTML = 'VERIFY';
    errorCount.style.display = 'block'; // Show the errorCount element
}
</script>


  </div>



  








  <script src="../administrator/admin_view/assets/js/jquery.slimscroll.min.js"></script>

  <script src="../administrator/admin_view/assets/plugins/alertify/alertify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
 
</body>
</html>



                