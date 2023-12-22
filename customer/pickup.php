<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['myCheckbox'])) {
        $checkboxes = $_POST['myCheckbox'];
        $checkboxes = array_map('intval', $checkboxes);
        $checkboxesStr = implode(',', $checkboxes);

    

      
            ?>
            


            <?php 

include("backend/session.php");
include("backend/back_navbar.php");

include "controller/function/count.php";
include "controller/function/session_Dir.php";

?>
<!DOCTYPE html>
<html>
<style>
</style>
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
  
    <link rel="stylesheet" href="../administrator/admin_view/assets/plugins/alertify/alertify.min.css">
    <link rel="stylesheet" href="css/notification.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="view/checkout/css/modalTheme.css">
    <link rel="stylesheet" href="view/pickup/css/image.css">
    

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
  <form id="pickupForm"  method="POST" enctype="multipart/form-data">

    <div class="container">
		<div class="my-3">
			<div class="card rounded-0 shadow">
				<div class="card-body">
					<div class="container-fluid">
						<div class='row'>
                            
                        <div class="col-md-6 lh-1">
    <?php
    date_default_timezone_set('Asia/Manila');
    $currentDateTime = date('Y-m-d g:i A');
    ?>
<button onclick="cart()" type="button" class="btn btn-danger btn-sm" >
  <i class="fas fa-arrow-left"></i> 
    </button>
    <br><br>
    <h6>Date</h6>
    <p class="mb-1"><?php echo $currentDateTime;?></p>
    <input type="hidden" value="<?php echo $currentDateTime; ?>" name="timeOrder">
    <br>
    <p class="mb-1">
        <input type="hidden" class="form-control" name="customer_id" value="<?php echo $db_acc_id?>" id="customer_id" style="width: 250;" required>
    </p>
    <div class="container">
    <div class="form-group mb-3">
        <label for="customername" class="mb-3">Customer Name</label>
        <input type="text" class="form-control" name="customername" id="customername" value="<?= ucfirst($fullname)?>" placeholder="Customer Name" required>
    </div>

    <div class="form-group mb-3">
    <label for="datePick" class="mb-3">Date Pickup</label>
    <input type="date" class="form-control" name="datePick" id="datePick" value="" required>
    </div>

    <div class="form-group mb-3">
        <label for="timePick" class="mb-3">Time Pickup</label>
        <input type="time" class="form-control" name="timePick" id="timePick" value="" required>
    </div>

    </div>

   <hr>
    <div class="text-center">
    <h6><i class="fa fa-store"></i> Store Contact   </h6>
    <?= $db_contact_address?>
<br><br>
    </div>
    <div class="embed-responsive embed-responsive-16by9" style="max-height: 450px; overflow: hidden;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123428.62606932336!2d120.80572843551637!3d14.81714243475318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ad2815babb8d%3A0x866d22682ef13094!2sR.%20De%20Leon%20Poultry%20Supply!5e0!3m2!1sen!2sph!4v1695744113676!5m2!1sen!2sph" width="100%" height="250" style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

<div class="col-md-6 lh-1" >
    
<h6 class="text-center">
    <i class="fas fa-shopping-cart"></i> Shopping Cart
</h6>


<div class="container">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="scrollable-div custom-scroll" style="max-height: 450px; overflow-y: auto;">
                <?php include "view/pickup/view/cartlist.php"; ?>
            </div>
        </div>
    </div>
</div>


        <div class="container">
            
        <div class="row border">
            <div class="col-12 text-center">
                <h5>Total Payment</h5>
            </div>
        </div>

            

            <div class="row border">
                <div class="col-6 text-left">
                    <br>
                    <p><strong>Subtotal:</strong></p>
                    <p><strong>VAT (<?php echo ($db_system_tax) ?>%):</strong></p>
              
                   
                    <p class="mb-4" hidden><strong>Voucher name:</strong></p>
                    <p><strong>Grand Total:</strong></p>
                </div>
                <div class="col-6 text-left">
                    <br>
                            <p>₱ <span id="order-total"><?php echo number_format($total_bill, 2, '.', ',') ?></span></p>
                            <p>₱ <?= number_format($get_taxt_value, 2) ?></p>
                        
                        
                                <p><span id="OldTotal_amount"></span></p>
                                <p>₱ <span id="total_amount"><?php echo number_format($order_final = $subtotal_deducted_tax + $address_rate, 2, '.', ',') ?></span></p>
                            </div>
                        </div>
                </div>
          
</div>




					</div>
				</div>
				<div class="card-footer py-1">
					<div class="row justify-content-center">
						<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
							<div class="d-grid">
                <button type="button" class="btn btn-dark placeOrder" data-bs-toggle="modal" data-bs-target="#exampleModal">
               Pick up
</button>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>



<!-- Modal -->


</div>
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
<?php include "view/pickup/view/modal.php"; ?>



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
          console.log(voucher_discount)
            
           
          

        } else {

            $('#OldTotal_amount').hide();
            $('#total_amount').text(<?php echo $order_final ?>);
            $("#discountnameTxt").parent().attr('hidden', true);
            

            console.log(selectedDiscount)
        }
    });
});


</script>











            
            <?php
        

        
    }else{
         echo "<script> window.location.href = 'cart.php'; </script>";
    }
}else{
    echo "<script> window.location.href = 'cart.php'; </script>";
}

?>


<script src="view/pickup/js/datepicker.js"></script>
<script src="view/pickup/js/function.js"></script>
<script src="view/pickup/js/insertPickupAjax.js"></script>
<script src="../administrator/admin_view/assets/plugins/alertify/alertify.min.js"></script>