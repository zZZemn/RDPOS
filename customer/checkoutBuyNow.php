
<?php 
//include "../connection.php";

$productId=$accountId=$myCheckbox='';

//echo"<pre>";
//print_r($_POST);
//echo"</pre>";

if (isset($_POST['btnCheckOut'])) {
 
    if (!empty($_POST['myCheckbox'])) {
        $checkboxes = $_POST['myCheckbox'];
      

    

      
            ?>
            


            <?php 

include "controller/function/session_Dir.php";
include("backend/session.php");



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


<link rel="stylesheet" href="css/search_suggestion.css">

<link rel="stylesheet" href="assets/css/style.css">


     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 

    <link rel="stylesheet" href="../administrator/admin_view/assets/plugins/scrollbar/scroll.min.css">
    <link rel="stylesheet" href="css/notification.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/location.css">
    <link rel="stylesheet" href="css/selectAddress.css">

    <link rel="stylesheet" href="css/scrollbar.css">
    <link rel="stylesheet" href="css/search_suggestion.css">

    <link rel="stylesheet" href="view/checkout/css/modalTheme.css">
    <link rel="stylesheet" href="../administrator/admin_view/assets/plugins/alertify/alertify.min.css">
</head>
<?php

include("backend/back_navbar.php");
include "controller/function/query_tbl_user_address.php";
include "controller/function/voucher.php";
include "controller/function/count.php";
include "controller/function/query_tbl_address.php";

?>

<body>
<div id="global-loader">
<div class="whirly-loader"> </div>
</div>
<div class="main-wrapper">
<div class="header">

            <?php include "topBar/header.php"; ?>

  

    <?php include "topBar/mobilUserMenu.php"; ?>
</div>
    <?php  include "Section/sidebar.php"; ?>

    <!---start changable content---->
          <!--- <main>---->
<br><br><br>
  <!-- header -->
  <form  method="POST" enctype="multipart/form-data">

  <input hidden type="text" id="user_acc_code" name="user_acc_code" value="<?=$user_acc_code?>" >
                            <input hidden type="text" class="user_address_id" value="<?=$user_address_id?>">
                            <input hidden type="text" value="<?=$address_code?>" id="address_code">   
                            <input hidden type="text" value="<?=$db_acc_id?>" id="db_acc_id">         
                            <input hidden type="text" value="<?=$user_address_fullname?>" id="user_address_fullname">                 
                            <input hidden type="text" value="<?=$user_address_phone?>" id="user_address_phone">
                            <input hidden type="text" value="<?=$user_address_email?>" id="user_address_email">
                                <input hidden type="text" value="<?=$user_complete_address?>" id="user_complete_address">
                                <input hidden type="text" value="<?=$db_system_tax?>" id="db_system_tax">
                                <input hidden  type="text"  value="<?=$address_rate?>" id="address_rate">


 <input hidden type="text" id="user_acc_code" name="user_acc_code" value="<?=$user_acc_code?>" >
 <input hidden type="text" class="user_address_id" value="<?=$user_address_id?>">

    <div class="container">
		<div class="my-3">
			<div class="card rounded-0 shadow">
				<div class="card-body">
					<div class="container-fluid">
						<div class='row'>
                            
<div class="col-md-6 lh-1" id="labelForm">
    <?php date_default_timezone_set('Asia/Manila'); $currentDateTime = date('Y-m-d g:i A'); ?>
   
            <div class="mb-3">
            <div class="row">
                <div class="col text-start">

                    <button onclick="cart()" type="button" class="btn btn-danger btn-sm" >
                                                <i class="fas fa-arrow-left"></i> 
                    </button>

                    <button type="button" class="btn btn-danger btn-sm togleraddAddress" data-user_acc_code="<?= $user_acc_code ?>"  data-bs-toggle="modal" data-bs-target="#addAddressMod">
                        <i class="fa fa-plus"></i>
                    </button>

                   
                    <button type="button" class="btn btn-danger btn-sm toglereditAddress" data-user_acc_code="<?= $user_acc_code ?>"  data-bs-toggle="modal" data-bs-target="#editAddressMod">
                        <i class="fa fa-pencil"></i> 
                    </button>
                    
                </div>
             </div>
             </div>
    <h6>Date</h6>
    <p class="mb-1"><?php echo $currentDateTime; ?></p>
    <br>
    <p class="mb-1">
    </p>
    <h6>Fullname</h6>
    <?php if(!empty($user_address_fullname)){ echo ucfirst($user_address_fullname); }else{ echo ucfirst($fullname); } ?>
    </p>
    <h6>Contact</h6>
    <?php if(!empty($user_address_phone)){ echo ucfirst($user_address_phone); }else{ echo ucfirst($db_acc_contact); }  ?>
    </p>
    <h6 style="margin: 0;">Address</h6>
    <div class="form-group" style="display: flex; align-items: center;">
 
    <select id="select-address" class="form-select" aria-label="Default select example" style="width: 100%; height: 100%; margin-left: 10px;">
        <?php SelectAddress($connections);/// this is my dropdown ?>
    </select>
</div>

  
  
    <h6>Email</h6>
    <?php if(!empty($user_address_email)){ echo ucfirst($user_address_email); }else{ echo ucfirst($db_acc_email); }  ?>
    </p>
</div>


                            <div class="col-md-12 lh-1" id="inputForm" style="display: none;">
                           
                            
                            <div class="mb-3">
                                    <div class="row">
                                        <div class="col text-start">
                                            

                                        
                                            <button type="button" class="btn btn-danger btn-sm" id="cancelButton">
                                                <i class="fas fa-arrow-left"></i> 
                                            </button>
                                        </div>
                                    </div>
                             </div>

                            <h3>Date</h3>

								<p class="mb-1"><?php echo $currentDateTime;?></p>
                                
                                <input hidden type="text" value="<?=$user_add_users_longitud?>" id="user_add_users_longitud">
                                  <input hidden type="text" value="<?=$user_add_users_latitude?>" id="user_add_users_latitude">
                                
                                  <input hidden type="text" id="timeOrder" value="<?php echo $currentDateTime; ?>" name="timeOrder">
                               

                                 <input hidden type="text"  id="user_add_display_status" value="<?= $user_add_display_status?>" name="user_add_display_status">
                                 <input hidden type="text"  id="user_add_Default_status" value="<?= $user_add_Default_status?>" name="user_add_Default_status">
                                

                                 <input hidden type="text"  id="user_address_id" value="<?php echo $user_address_id?>" name="user_address_id">
                                 <input hidden type="text"   id="GenerateRegionCode" value="<?php echo $address_region_code?>" name="regionCode">
                                 <input hidden type="text"  id="GenerateRegionName" value="<?php echo $user_region_name?>" name="regionName">
                                 <input hidden type="text"  id="acc_code" value="<?php echo $user_acc_code?>" name="acc_code">
                                <br>
                                <p class="mb-1">
                                <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="<?php echo $db_acc_id?>"  style="width:250;" required>
                                
                           

                             
                               <h6>Fullname</h6>
                                <input type="text"  class="form-control" name="nickname" id="edit_Fullname" value="<?php if(!empty($user_address_fullname)){ echo ucfirst($user_address_fullname); }else{ echo ucfirst($fullname); } ?>" placeholder="Full Name" style="width:250;" required>
                               
                            
                          
                               <h6>Contact</h6>
                                <input type="text"  class="form-control" name="contact" id="edit_Contact" value="<?php if(!empty($user_address_phone)){ echo ucfirst($user_address_phone); }else{ echo ucfirst($db_acc_contact); }  ?>" placeholder="Item Name" style="width:250;" required>
                                <h6>Email</h6>
                                <input type="text" class="form-control" name="email" id="edit_email" value="<?php if(!empty($user_address_email)){ echo ucfirst($user_address_email); }else{ echo ucfirst($db_acc_email); }  ?>" placeholder="Gmail" style="width:250;" required>
                                
                          
                               <h6>Address</h6>
                            <div class="mb-3">
                                <textarea name="deliveryaddress" id="address" class="form-control" rows="3" placeholder="Enter Address" style="width: 100%;" required><?= $user_complete_address?></textarea>
                                <div class="form-group" id="ifDefault">
                                         <div class="alert alert-success">Default Address</div>
                                    </div>
                                <div id="addresValidation" class="alert alert-danger" style='display:none;'></div>
                                <div id="showRate" class="alert alert-success" style='display:none;'></div>
                            </div>
                              
                            <div>
                            <div id="EditFormerrorDiv" style="color: red;"></div>
                            
                          
                           
                           
                                    
                                    <div class="form-group" id="ifNotDefault">
                                    <label for="Settings" class="m-3">Settings</label>
                                        <div class="bg-light rounded p-3">
                                        
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="toggleSwitch">
                                                    <label class="custom-control-label" for="toggleSwitch">Set Default</label>
                                                </div>
                                        
                                        </div>
                                    </div>
                            </div>
                            
                              
                            </p>
                          
							</div>

                             

                                
<div id="summaryForm" class="col-md-6 mt-4 lh-1" >
 <h6 class="text-center mb-4">
    <i class="fas fa-shopping-cart mt-4"></i> Shopping Cart
</h6>                  

    <div class="row">
        
            <div class="scrollable-div custom-scroll" style="overflow: hidden;">
                <div style="overflow-y: scroll; max-height: 300px;">
                    <?php include "view/checkout/buynowCart.php"; ?>
                    </div>
            </div>
    </div>
</div>






                       

                                <input hidden type="text" value="<?=$db_system_tax?>" id="db_system_tax">
                                <input hidden type="text" value="<?=$address_rate?>" id="address_rate">

                            


 <div class="container mt-4 border" style="border-radius:15px;">
<div class="card-body pt-0 pb-2">
<div class="setvalue">
<ul>
<li>
<h5>Subtotal </h5>
<h6>₱ <?= number_format($total_bill, 2, '.', ','); ?></h6>
</li>

<li>
<h5>VAT </h5>
<h6>₱ <?= number_format($get_taxt_value, 2); ?></h6>
</li>

<li>
<h5>Shipping </h5>
<h6>₱ <?= number_format($address_rate, 2); ?></h6>
</li>

<li class="total-value">
<h5>Total </h5>
<h6>₱ <?= number_format($total_bill + $address_rate, 2, '.', ','); ?></h6>
</li>
</ul>
</div>

</div>
</div>






                    </div>
					</div>
                        <div class="mb-3"></div>
                        <div style="background-color:#6D0F0F;" class="mb-3">
    <div id="saveCancelContainer" style="display: none;" class="text-center">
        <div class="text-center">
            <button type="button" id="deleteModal" class="btn btn-danger btn-sm btn-block" data-bs-toggle="modal" data-bs-target="#DeleteAddressModal">
                <i class="fa fa-trash"></i> Delete Address
            </button>
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-success btn-sm btn-block" id="saveButton">
                <i class="fa fa-save"></i> Save
            </button>
        </div>
    </div>
    <div id="DefaultAlert" class="alert alert-danger" style='display:none;'></div>
</div>

                    </div>
                
                    <div class="card-footer py-1">
                    
					<div class="row justify-content-center">
						<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        <div class="d-grid">
                                <div id="result-container">
                                    <!-- The result will be displayed here -->
                                </div>
                            </div>

						</div>
					</div>
				</div>
			</div>
		</div>
    </div>

<?php include "view/checkout/modal.php";?>
</form>
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


<!-- The following scripts seem to be unnecessary duplicates or already included above -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
 <script src="assets/js/jquery-3.6.0.min.js"></script> 
<script src="assets/js/feather.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>
<script src="assets/js/script.js"></script>



<script src="../administrator/admin_view/assets/js/jquery.slimscroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php  }else{
      echo "<script> window.location.href = 'cart.php'; </script>"; }

}else{
    echo "<script> window.location.href = 'cart.php'; </script>"; }?>



<script>
  
$('#select-address').change(function() {
        var selectedAddressId = $(this).val();
        
        // Gumawa ng Ajax request para i-update ang user_address_status
        $.ajax({
            url: 'view/checkout/update_user_address_status.php', // Tukuyin ang tamang URL ng PHP endpoint
            method: 'POST',
            data: { address_id: selectedAddressId, user_acc_code: '<?php echo $user_acc_code; ?>' }, // Ipadala ang selectedAddressId
            success: function(response) {
              
               window.location.reload();
              console.log(response)
            },
            error: function() {
                alert('May naganap na error sa pag-update ng user address status.');
            }
        });
    });
</script>


        


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script src="../administrator/admin_view/assets/js/jquery.slimscroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="view/checkout/js/computation.js"></script>
<script src="view/checkout/js/ajaxInsertOrder.js"></script>

<script src="view/checkout/js/checkoutFunction.js"></script>
<script src="view/checkout/js/formValidation.js"></script>

<script src="view/checkout/js/ajaxAddress.js"></script>
<script src="view/checkout/js/ajaxCheckAddress.js"></script>

<script src="view/checkout/js/searchAddressApiForEdit.js"></script>
<script src="view/checkout/js/searchAddressApiForAdd.js"></script>

<script src="view/checkout/js/removeAjax.js"></script>

<script src="view/checkout/js/updateAddress.js"></script>


<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>




<script src="../administrator/admin_view/assets/plugins/alertify/alertify.min.js"></script>

<script src='js/directory.js'></script>
