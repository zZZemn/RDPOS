<?php 


include "backend/session.php";

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
  <!----  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	---->
  
	<link rel="stylesheet" href="css/faq.css">
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

    <?php include "topbar/mobilUserMenu.php"; ?>
</div>
    <?php  include "Section/sidebar.php"; ?>

    <!---start changable content---->
          <!--- <main>---->


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-9 col-xl-8"> <!-- Adjust the classes as needed -->
                <div class="container-fluid mb-2">
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center;">History of Transaction</h5>
                            <hr>
                            <div class="table-responsive">
                                <table id="example" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Code</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "view/history/view_query.php";
                                        include "view/history/tbody.php";
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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



<?php
 include "view/history/modal.php";

?>
<script>
  
$(document).ready(function() {
 //db_prod_id
 $('.toglerView').click(function() {

  var customer_id_grp = $(this).attr('data-customer_id_grp');

  $("#customer_id_grp").text(customer_id_grp);
  
  var orders_ship_fee = parseFloat($(this).attr('data-orders_ship_fee'));
  
  var formattedTotal = orders_ship_fee.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
  $("#orders_ship_fee").text(formattedTotal);


  var orders_voucher_name = $(this).attr('data-orders_voucher_name');
  $("#orders_voucher_name").text(orders_voucher_name);





  var orders_prod_id = $(this).attr('data-orders_prod_id');
  var transaction = $(this).attr('data-transaction');
  var order_date = $(this).attr('data-order_date');
  var orders_qty = $(this).attr('data-orders_qty');
  var orders_tcode = $(this).attr('data-orders_tcode'); // Bagong pangalan ng variable
  var prod_name = $(this).attr('data-prod_name');
  var prod_currprice = $(this).attr('data-prod_currprice');
  var orders_subtotal = $(this).attr('data-orders_subtotal');
  var product_name_grp = $(this).attr('data-product_name_grp');
  var product_name_grp = $(this).attr('data-product_name_grp');
  var order_qty_grp = $(this).attr('data-order_qty_grp');
  var product_currprice_grp = $(this).attr('data-product_currprice_grp');
  var order_id_grp = $(this).attr('data-order_id_grp');
  var totalprice_data = $(this).attr('data-totalprice'); // Bagong pangalan ng variable

  var tbody = $('#tbody');

  tbody.empty();

  var prodname = product_name_grp.split(',');
  var product_name_grp_data = product_name_grp.split(','); // Bagong pangalan ng variable
  var order_qty_grp = order_qty_grp.split(',');
  var product_currprice_grp = product_currprice_grp.split(',');
  var order_id_grp = order_id_grp.split(',');

  var totalprice = totalprice_data.split(','); // Bagong pangalan ng variable

  var total = 0;

  
  prodname.forEach((product, index) => {

    var tr = $("<tr>");
   
    var td = $("<td>").text(product);
    tr.append(td);
    var td = $("<td>").text(order_qty_grp[index]);
    tr.append(td);
    var td = $("<td>").text(product_currprice_grp[index]);
    tr.append(td);
    var td = $("<td>").text(totalprice[index]);
    tr.append(td);
    tbody.append(tr);
    total += parseFloat(totalprice[index]);
  });

  var tax = parseFloat(<?php echo json_encode($db_system_tax); ?>);
  var taxPercent = tax * 100;
  var subtax = tax * total;
  //$("#subtowtal").text(total.toFixed(2));
  var formattedTotal = total.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
  $("#subtowtal").text(formattedTotal);

  var formattedsubtax = subtax.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
  $("#formattedsubtax").text(formattedsubtax);
  
  $("#taxPercent").text(taxPercent);
  total += subtax;
  var orders_voucher_rate = $(this).attr('data-orders_voucher_rate');
  var clean_orders_voucher_rate = orders_voucher_rate.replace(/[^0-9.]/g, '');
  var clean_orders_voucher_rate_decimal=clean_orders_voucher_rate/100
  var voucher_equvalent= clean_orders_voucher_rate_decimal*(total+orders_ship_fee)
  
  var_total_ship=total+orders_ship_fee
  
  var finalDue= var_total_ship-voucher_equvalent

  $("#subtax").text(subtax.toFixed(2));
  var formattedfinalDue= finalDue.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
  $("#finalDue").text(formattedfinalDue);

  $("#transaction_archive").text(transaction);
  
  orders_tcode = orders_tcode.charAt(0).toUpperCase() + orders_tcode.slice(1);

$("#orders_tcode").text(orders_tcode);

  console.log(order_qty_grp)

});

});


</script> 