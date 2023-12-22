
<?php 
include "../connection.php";

$productId=$accountId=$myCheckbox='';



if (isset($_POST['btnCheckOut'])) {
 
    if (!empty($_POST['myCheckbox'])) {
        $checkboxes = $_POST['myCheckbox'];
        $checkboxes = array_map('intval', $checkboxes);
        $checkboxesStr = implode(',', $checkboxes);

    

      
            ?>
            


            <?php 

include("backend/session.php");
include("backend/back_navbar.php");

include "controller/function/voucher.php";
include "controller/function/count.php";
include "controller/function/session_Dir.php";

?>
<!DOCTYPE html>
<html>
itl
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place order</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
    <link rel="stylesheet" href="css/notification.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/location.css">

</head>

<body class="sb-nav-fixed">
       <?php include "view/nav.php";?>
   <div id="layoutSidenav">
       <div id="layoutSidenav_nav">
       <?php include "view/sidebar.php";?>
       </div>
       <div id="layoutSidenav_content">
           <main>
<br><br><br>
  <!-- header -->
  <form action="back_ordering.php" method="POST" enctype="multipart/form-data">

 

    <div class="container">
		<div class="my-3">
			<div class="card rounded-0 shadow">
				<div class="card-body">
					<div class="container-fluid">
						<div class='row'>
                            
<div class="col-md-6 lh-1" id="labelForm">
                            
    <?php date_default_timezone_set('Asia/Manila'); $currentDateTime = date('Y-m-d g:i A'); ?>
    <?php SelectAddress($connections); ?>
    <hr>
            <div class="mb-3">
            <div class="row">
                <div class="col text-end">
                    <button class="btn btn-danger btn-sm" >
                        <i class="fa fa-plus"></i> <!-- Pencil icon -->
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> <!-- Trash icon -->
                    </button>
                    <button class="btn btn-danger btn-sm" >
                        <i class="fa fa-pencil"></i> <!-- Pencil icon -->
                    </button>
                    
                </div>
             </div>
             </div>
    <h3>Date</h3>
    <p class="mb-1"><?php echo $currentDateTime; ?></p>
    <br>
    <p class="mb-1">
    </p>
    <h4>Name on your street</h4>
    <?php echo ucfirst($db_acc_fname) ?>
    </p>
    <h4>Contact</h4>
    <?php echo $db_acc_contact ?>
    </p>
    <h4>Delivery Address</h4>
    <div class="mb-3">
        <?= $user_complete_address ?>
    </div>
    <h4>Email</h4>
    <?php echo $db_acc_email ?>
    </p>
</div>


                            <div class="col-md-6 lh-1" id="inputForm" style="display: none;">
        
                            
                            <div class="mb-3 text-end">
                                <button class="btn btn-danger btn-sm" id="saveButton">
                                    <i class="fa fa-save"></i> Save
                                </button>
                                <button class="btn btn-danger btn-sm" id="cancelButton">
                                    <i class="fa fa-close"></i> Cancel
                                </button>
                            </div>

                            <h3>Date</h3>
								<p class="mb-1"><?php echo $currentDateTime;?></p>
                                <input type="hidden" value="<?php echo $currentDateTime; ?>" name="timeOrder">
                                 <input type="hidden" value="PickUp" name="orderMethod">
                                <br>
                                <p class="mb-1">
                                <input type="hidden" class="form-control" name="customer_id" value="<?php echo $db_acc_id?>"  style="width:250;" required>
                                
                               </p>

                             
                               <h4>Name on your street</h4>
                                <input type="text"  class="form-control" name="nickname" value="<?php echo ucfirst($db_acc_fname)?>" placeholder="Item Name" style="width:250;" required>
                               
                            </p>
                          
                               <h4>Contact</h4>
                                <input type="text"  class="form-control" name="contact" value="<?php echo $db_acc_contact?>" placeholder="Item Name" style="width:250;" required>
                               
                            </p>
                               <h4>Delivery Address</h4>
                            <div class="mb-3">
                                <textarea name="deliveryaddress" id="address" class="form-control" rows="3" placeholder="Enter Address" style="width: 100%;" required><?= $user_complete_address?></textarea>
                              
                            </div>
                                <h4>Email</h4>
                                <input type="text" class="form-control" name="email" value=" <?php echo $db_acc_email?>" placeholder="Email" style="width:250;" required>
                              
                            </p>
                            <?php include "view/cart/api/view_mylocation.php"?>   
							</div>


	<div class="col-md-6 lh-1">
    <h3>Order Summary</h3>
  

    <br><br>
   <?php include "controller/function/list_checkout.php"; ?>

   
   <center><p class="mb-4"><strong>Subtotal</strong>:₱ <span id="order-total"><?php echo number_format($total_bill, 2, '.', ',') ?></span></p></center>

    <center><p class="mb-4"><strong>VAT</strong>(<?php echo ($db_system_tax*100) ?>%):₱ <?=number_format($get_taxt_value,2)?> </p></center>
   
    <center><p class="mb-4"><strong >Shipping fee</strong>:₱ <font id="shipFee"><?php echo number_format($address_rate, 2) ?></font></p></center>

    <center>
         <p class="mb-4" hidden><strong>Voucher name: </strong><span id="discountnameTxt"></span>
          
         <span id="voucher_discount"></span>%</p>
         
        
    </center>
    
    <center>
        
        <hr>      
        <p class="mb-4"><strong>Grand Total</strong>:<br>
        <span id="OldTotal_amount"></span>  
        <br>₱
        <span id="total_amount"> <?php echo number_format($order_final= $subtotal_deducted_tax + $address_rate, 2, '.', ',') ?></span></p>
    </center>
</div>
					</div>
				</div>
				<div class="card-footer py-1">
					<div class="row justify-content-center">
						<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
							<div class="d-grid">
                <button type="button" class="btn btn-dark placeOrder" data-bs-toggle="modal" data-bs-target="#exampleModal"> Place Order </button>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
<?php include "view/checkout/modal.php";?>
</form>
</main>


                        <footer >
                             <?php  include "view/footer.php";  ?>
                        </footer>
                     </div>
              </div>
        </div>
    </div>
</body>
</html>

<?php  }else{  echo "<script> window.location.href = 'cart.php'; </script>"; }}?>


<script src="view/checkout/js/computation.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $('#discount-select').change(function() {
        var selectedDiscount = $(this).val();
        var totalAmount = <?php echo $order_final; ?>;
        if (selectedDiscount !== 'Select Discount Voucher') {
            var GetdiscountAmount = totalAmount * selectedDiscount;
            var discountedAmount = totalAmount - GetdiscountAmount;
          
          $('#GetdiscountAmount').text(GetdiscountAmount.toFixed(2));
            $('#total_amount').text(discountedAmount.toFixed(2));
            $("#discountnameTxt").parent().removeAttr('hidden');
            

            var voucher_discount=selectedDiscount*100       
        $('#OldTotal_amount').css('text-decoration', 'line-through').text('₱ <?php echo $order_final ?>').show();
        $('#voucher_discount').text(voucher_discount);
        } else {
            $('#OldTotal_amount').hide();
            $('#total_amount').text(<?php echo $order_final ?>);
            $("#discountnameTxt").parent().attr('hidden', true);
        }
    });
});
</script>



<script>
        const locateButton = document.getElementById('locateButton');
        const locationInfo = document.getElementById('locationInfo');
        const coordinatesForm = document.getElementById('coordinatesForm');
        const mapFrame = document.getElementById('mapFrame');
        const addressInput = document.getElementById('address');
        const latitudeInput = document.getElementById('latitude');
        const longitudeInput = document.getElementById('longitude');

        locateButton.addEventListener("click", getLocation);

        function getLocation() {
            if ("geolocation" in navigator) {

                $("#mapFrame").css("display", "block");

                navigator.geolocation.getCurrentPosition(showLocation, showError);
            } else {
                locationInfo.textContent = "Geolocation is not supported by your browser.";
            }
        }

        function showLocation(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            // Set latitude and longitude in the form fields
            latitudeInput.value = latitude;
            longitudeInput.value = longitude;

            // Reverse geocode latitude and longitude to get the address
            reverseGeocode(latitude, longitude, function (placeName) {
                if (placeName) {
                    addressInput.value = placeName;

                    
                  // I-check kung may "Bulacan" sa placeName
                    if (placeName.includes("Ilocos Region")) {
                    console.log(true);   
                    }else if(placeName.includes("Cagayan Valley")){
                        console.log("Cagayan Valley");
                    }else if(placeName.includes("Central Luzon")){

                       // $('#shipFee').text(9999);
                       /// var totalAmount = <?php //echo $order_final; ?>;
                       // var discountedAmount = totalAmount + 9999;


                        
                    //  $('#total_amount').text(discountedAmount.toFixed(2));
                    //$('#UpdatedShipFee').val(99999);

                      console.log("True")
                    

                      
                        
                        console.log("Central Luzon");
                    }else if(placeName.includes("CALABARZON")){
                        console.log("CALABARZON");
                    }else if(placeName.includes("MIMAROPA")){
                        console.log("MIMAROPA");
                    }else if(placeName.includes("Bicol Region")){
                        console.log("Bicol Region");
                    }else if(placeName.includes("Western Visayas")){
                        console.log("Western Visayas");
                    }else if(placeName.includes("Central Visayas")){
                        console.log("Central Visayas");
                    }else if(placeName.includes("Eastern Visayas")){
                        console.log("Eastern Visayas");
                    }else if(placeName.includes("Zamboanga Peninzula")){
                        console.log("Zamboanga Peninzula");
                    }else if(placeName.includes("Northern Mindanao")){ 
                    console.log("Northern Mindanao");
                    }else if(placeName.includes("Davao Region")){ 
                        console.log("Davao Region");
                    }else if(placeName.includes("SOCCSKSARGEN")){ 
                        console.log("SOCCSKSARGEN");
                    }else if(placeName.includes("NCR")){ 
                        console.log("NCR");
                    }else if(placeName.includes("CAR")){ 
                        console.log("CAR");
                    }else if(placeName.includes("ARMM")){ 
                        console.log("ARMM");
                    }else if(placeName.includes("Caraga")){ 
                    console.log("Caraga");
                    } else {
                    console.log("We do not deliver to this place");
                    }

                     
                } else {
                    addressInput.value = "Location name not found.";
                }
            });

            locationInfo.textContent = `Latitude: ${latitude}, Longitude: ${longitude}`;

            // Update the map iframe source
            mapFrame.src = `https://maps.google.com/maps?q=${latitude},${longitude}&output=embed`;

        }

        function reverseGeocode(latitude, longitude, callback) {
            const apiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}&zoom=18&addressdetails=1`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.display_name) {
                        callback(data.display_name);
                    } else {
                        callback(null);
                    }
                })
                .catch(error => {
                    callback("Error fetching location name.");
                });
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    locationInfo.textContent = "Permission to access location was denied.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    locationInfo.textContent = "Location information is unavailable.";
                    break;
                case error.TIMEOUT:
                    locationInfo.textContent = "The request to get location timed out.";
                    break;
                case error.UNKNOWN_ERROR:
                    locationInfo.textContent = "An unknown error occurred.";
                    break;
            }
        }
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {

    // Initially hide the inputForm
    $("#inputForm").hide();

// Add a click event handler to the "Pencil" button
$(".fa-pencil").parent().click(function() {
    // Show the inputForm
    $("#inputForm").show();
    // Hide the labelForm
    $("#labelForm").hide();
});

// Add a click event handler to the "Save" button
$("#saveButton").click(function() {
    // Perform any save logic here

    // Show the labelForm
    $("#labelForm").show();
    // Hide the inputForm
    $("#inputForm").hide();
});

// Add a click event handler to the "Cancel" button
$("#cancelButton").click(function() {
    // Show the labelForm
    $("#labelForm").show();
    // Hide the inputForm
    $("#inputForm").hide();
});


    $('#select-address').change(function() {
        var selectedAddressId = $(this).val();
        
        // Gumawa ng Ajax request para i-update ang user_address_status
        $.ajax({
            url: 'view/checkout/update_user_address_status.php', // Tukuyin ang tamang URL ng PHP endpoint
            method: 'POST',
            data: { address_id: selectedAddressId, user_acc_code: '<?php echo $user_acc_code; ?>' }, // Ipadala ang selectedAddressId
            success: function(response) {
                // Mag-update ng anumang UI kung kinakailangan
              //  alert('User address status updated successfully.');

              //  console.log(response)

                window.location.reload();
            },
            error: function() {
                alert('May naganap na error sa pag-update ng user address status.');
            }
        });
    });
});
</script>

