<?php

include "backend/back_navbar.php";
include "php/session_dir.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Product Details</title>

<link rel="shortcut icon" type="image/x-icon" href="../../upload_system/<?= $db_system_logo ?>">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/animate.css">

<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="assets/plugins/owlcarousel/owl.carousel.min.css">

<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
   
<!-- <div id="global-loader">
<div class="whirly-loader"> </div>
</div>  -->


<div class="main-wrapper">
<div class="header">

            <?php include "topBar/header.php"; ?>

    <ul class="nav user-menu">
            <?php include "topBar/navMenu.php"; ?>
            <?php include "topBar/notification.php"; ?>
            <?php include "topBar/profile.php"; ?>
    </ul>

    <?php include "topbar/mobilUserMenu.php"; ?>
</div>
    <?php include "Section/sidebar.php"; ?>


    <?php
    
$prod_code=$_GET["target_id"];    
$get_record = mysqli_query ($connections,"SELECT *
FROM product
LEFT JOIN category ON category.category_id = product.prod_category_id
LEFT JOIN voucher ON voucher.voucher_id = product.prod_voucher_id
WHERE prod_code = '$prod_code' ");

		$row = mysqli_fetch_assoc($get_record);
		 $db_prod_id = $row["prod_id"];
         $db_prod_code = $row["prod_code"];
         $db_prod_name = $row["prod_name"];
         $db_barcode = $row["barcode"];
       
         $db_prod_currprice = $row["prod_currprice"];
         $db_prod_critical = $row["prod_critical"];
         $db_prod_description = $row["prod_description"];
         $db_prod_image = $row["prod_image"];
         $db_prod_added = $row["prod_added"];
         $db_prod_status=$row["prod_status"];
         $db_prod_added=$row["prod_added"];
         $db_prod_edit=$row["prod_edit"];

      
         $db_prod_category_id=$row["prod_category_id"];
         $db_prod_voucher_id=$row["prod_voucher_id"];

      
         $db_category_name=$row["category_name"];
         $db_voucher_name=$row["voucher_name"];
         $db_voucher_discount=$row["voucher_discount"];
         $db_voucher_expiration=$row["voucher_expiration"];

        


         $db_voucher_maximumLimit=$row["voucher_maximumLimit"];
         
         date_default_timezone_set('Asia/Manila');
         $currentDateTime = date('Y-m-d H:i:s'); 
         $dateAdded = $db_prod_added;
         $dateEdit = $db_prod_edit;
         

         $dateTime = strtotime($db_voucher_expiration);
        // I-set ang time zone sa Manila
        date_default_timezone_set('Asia/Manila');
        // Display ng buwan, taon, araw, at oras sa 12-hour format
        $formattedDateExpiration = date("F j, Y h:i a", $dateTime);

        $dateTime_dateAdded = strtotime($dateAdded);
        // I-set ang time zone sa Manila
        date_default_timezone_set('Asia/Manila');
        // Display ng buwan, taon, araw, at oras sa 12-hour format
        $formatteddateAdded = date("F j, Y h:i a", $dateTime_dateAdded);

        $dateTime_dateEdit = strtotime($dateEdit);
        // I-set ang time zone sa Manila
        date_default_timezone_set('Asia/Manila');
        // Display ng buwan, taon, araw, at oras sa 12-hour format
        $formatteddateEdit= date("F j, Y h:i a", $dateTime_dateEdit);

        

        $query_stocks = "SELECT p.prod_id, SUM(s.s_amount) AS total_amount
FROM stocks s
JOIN product p ON s.s_prod_id = p.prod_id
WHERE s.s_expiration IS NOT NULL AND s.s_expiration >= CURRENT_DATE
GROUP BY p.prod_id
ORDER BY s.s_expiration ASC";

$result = mysqli_query($connections, $query_stocks); // Assuming you have a database connection named $connections

if ($result) {
    $query_stocks_result = mysqli_fetch_assoc($result);
    $total_amount = $query_stocks_result["total_amount"];
} else {
    // Handle the query execution error, e.g., print an error message
    echo "Query failed: " . mysqli_error($connections);
}
    

    ?>
<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Product Details</h4>
<h6>Full details of a product</h6>
</div>
</div>

<div class="row">
<div class="col-lg-8 col-sm-12">
<div class="card">
<div class="card-body">
<div class="bar-code-view">
<img src="../../upload_barcode/<?=$db_barcode?>" alt="barcode">
<a class="printimg">
<img src="assets/img/icons/printer.svg" alt="print">
</a>
</div>
<div class="productdetails">
<ul class="product-bar">
<li>
<h4>Product</h4>
<h6><?= ucfirst($db_prod_name)?></h6>
</li>
<li>
<h4>Category</h4>
<h6><?= $db_category_name ?></h6>
</li>



<li>
<h4>Product Code</h4>
<h6><?= $prod_code?></h6>
</li>


<li>
<h4>Critical Level</h4>
<h6><?= $db_prod_critical?></h6>
</li>


<li>
<h4>Stocks</h4>
<h6><?php if($total_amount){ echo $total_amount; }else{echo "0";}?></h6>
</li>




<li>
<h4>Applicable Vaucher</h4>
<h6><?php if($db_voucher_name==Null){ echo "N/A";}else{ echo $db_voucher_name;}?></h6>
</li>

<?php if($db_voucher_name!==Null){ echo "
<li>
<h4>Voucher Rate</h4>
<h6>$db_voucher_discount%</h6>
</li>
";
}?>

<?php if($db_voucher_name!==Null){ echo "
<li>
<h4>Voucher Expiration</h4>
<h6>$formattedDateExpiration</h6>
</li>
";
}?>

<?php if($db_voucher_name!==Null){ echo "
<li>
<h4>Voucher Limit</h4>
<h6>$db_voucher_maximumLimit</h6>
</li>
";
}?>


<li>
<h4>Current Price</h4>
<h6>₱ <?= number_format($db_prod_currprice)?></h6>
</li>


<li>
<h4>Status</h4>
<h6>
   <?php if($db_prod_status=="0"){ echo "Enable";}else if($db_prod_status=="1"){ echo "Disabled"; } ?> 
</h6>
</li>


<li>
<h4>Date Added</h4>
<h6><?= $formatteddateAdded?></h6>
</li>

<li>
<h4>Last Edit</h4>
<h6><?php echo $formatteddateEdit;?></h6>
</li>


<li>
<h4>Description</h4>
<h6><?= $db_prod_description?></h6>
</li>



</ul>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-12">
<div class="card">
<div class="card-body">
<div class="slider-product-details">
<div class="owl-carousel owl-theme product-slide">
<div class="slider-product">
<center><img src="../../upload_prodImg/<?= $db_prod_image?>" alt="img"></center>

</div>

</div>
</div>
</div>
</div>
</div>
</div>

<div class="col-lg-12">
<?php 
if($db_prod_status=="2"){
     echo '
<button type="button" class="btn btn-submit me-2 toglerRestore" name="btnSubmit" data-prod_code='.$prod_code.' data-acc_id='.$db_acc_id.' data-prod_id='.$db_prod_id.'>Restore</button>
';}?>
<a href="productlist.php" class="btn btn-cancel">Back</a>
</div>


</div>
</div>
</div>

<script>
$(".toglerRestore").on("click", function() {
    prod_id = $(this).attr('data-prod_id');
    acc_id = $(this).attr('data-acc_id');
    prod_code = $(this).attr('data-prod_code');
    //$('#ssid').val(ssid);
    console.log(prod_code);

    Swal.fire({
        title: "Are you sure?",
        text: "Remove this product",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Restore it!",
        confirmButtonClass: "btn btn-primary",
        cancelButtonClass: "btn btn-danger ml-1",
        buttonsStyling: false
    }).then(function(result) {
        if (result.value) {
            // Dito mo isasagawa ang AJAX request para sa pag-update ng product
            $.ajax({
                url: 'productlist/controller/restore.php', // Palitan mo ito ng tamang URL
                type: 'POST',
                data: {
                    prod_id:prod_id,
                    acc_id:acc_id,
                    prod_code: prod_code, // Palitan mo ito ng tamang product ID
                    prod_status: 0
                },
                success: function(response) {
                    // Dito mo ilalagay ang mga actions na kailangan mong gawin kapag successful ang update
                    Swal.fire({
                        type: "success",
                        title: "Restore!",
                        text: "Your product has been Restored.",
                        confirmButtonClass: "btn btn-success"
                    }).then(function() {
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    // Dito mo ilalagay ang mga actions para sa error handling
                    Swal.fire({
                        type: "error",
                        title: "Error",
                        text: "An error occurred while restoring the product.",
                        confirmButtonClass: "btn btn-danger"
                    });


                    console.log(response)
                }
            });
        }
    });
});
</script>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/owlcarousel/owl.carousel.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>
<script src="assets/js/script.js"></script>


</body>
</html>