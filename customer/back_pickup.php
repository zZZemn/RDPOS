<?php
include "../connection.php";


print_r($_POST);


$customer_name = $contact = $datePick= $timePick = $email = $BankEwallet = $db_voucher_name = $db_voucher_discounts = $orders_voucher_name="";
$attachment =$attachment_tmp =$attachment_dest="";



  // Generate the code

  function generateUniqueCode($connections) {
    do {
        $code = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT); // Generate a random 8-digit code
        $sql = "SELECT p_pickup_code FROM pickup WHERE p_pickup_code = '$code'";
        $result = $connections->query($sql);
    } while ($result->num_rows > 0);

    return $code;
}
  
$p_pickup_code = generateUniqueCode($connections);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file is uploaded
    if (isset($_FILES['attachment']) && $_FILES['attachment']['size'] > 0) {
        $attachment = $_FILES['attachment']['name'];
        $attachment_tmp = $_FILES['attachment']['tmp_name'];
        $attachment_dest = '../upload_proof/' . $attachment;
        move_uploaded_file($attachment_tmp, $attachment_dest);
    }

   


    $cartIds = $_POST['cart_ids']; // Kunin ang string ng cart IDs
    $cartIdArray = explode(',', $cartIds); // I-split ang string base sa koma

    foreach ($cartIdArray as $key => $value) {
        $cartId = trim($value); 

        $prodIds = explode(',', $_POST['prodids']);
        $db_voucher_names = explode(',', $_POST['db_voucher_names']);
        $db_voucher_discounts = explode(',', $_POST['db_voucher_discounts']);

        $db_cart_prodQtys = explode(',', $_POST['db_cart_prodQtys']);

        $cart_id = explode(',', $_POST['cart_ids']);

        $cart_id = $cart_id[$key];


        $prod_currprices = explode(',', $_POST['prod_currprices']);
        $total_prices = explode(',', $_POST['total_prices']);
        $new_total_prices = explode(',', $_POST['new_total_prices']);
        
     

        $prod_currprices = $prod_currprices[$key];

        $prod_id = $prodIds[$key];
        $db_voucher_name = $db_voucher_names[$key];
        $db_voucher_discount =$db_voucher_discounts[$key];
        $db_cart_prodQty = $db_cart_prodQtys[$key];
        $total_price = $total_prices[$key];
        
        
     


        $BankEwallet = $_POST["BankEwallet"];
        $acc_id = $_POST["acc_id"];
        $datePick = $_POST["datePick"];
        $timePick = $_POST["timePick"];
        $db_system_tax = $_POST["db_system_tax"];

        $BankEwallet = $_POST["BankEwallet"];
      
        $customername = $_POST["customername"];

        $new_total_prices=$_POST["new_total_prices"];

        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date('Y-m-d g:i A');

        // Get product stocks
        $get_productStocks = mysqli_query($connections, "SELECT * FROM product WHERE prod_id='$prod_id'");
        $row_stocks = mysqli_fetch_assoc($get_productStocks);
        $db_prod_id = $row_stocks["prod_id"];

        // Start deduct
        $get_record = mysqli_query($connections, "
        SELECT *
        FROM product AS a
        LEFT JOIN stocks AS b ON a.prod_id = b.s_prod_id
        WHERE a.prod_status = '0'
              AND a.prod_id = '$prod_id'
              AND s_amount > 0 
              AND (DATE(b.s_expiration) >= CURDATE() OR b.s_expiration = '0000-00-00')
        ORDER BY b.s_expiration ASC, b.s_created ASC;
        
        ");

        $remainingQty = $db_cart_prodQty;

        while ($row = $get_record->fetch_array()) {
            $db_s_id = $row["s_id"];
            $db_s_amount = $row["s_amount"];
            $db_s_expiration = $row["s_expiration"];

            if ($db_s_amount > 0 && ($db_s_expiration === '0000-00-00' || strtotime($db_s_expiration) >= strtotime('today'))) {
                $deductQty = min($remainingQty, $db_s_amount);
                $remainingQty -= $deductQty;

                // Update stocks
                mysqli_query($connections, "UPDATE stocks SET s_amount = s_amount - '$deductQty' WHERE s_id = '$db_s_id' ");


                $timestamp = date("h:i A", strtotime($timePick));
                // Insert into the database //$code
                mysqli_query($connections, "
                INSERT INTO pickup
                (p_customer_name, p_date,p_pickup_date,p_pickup_time,p_pickup_code, p_prod_id,p_acc_id, p_paymethod, p_proof, p_qty, p_stock_id, p_prod_price, p_subtotal,p_grand_total, p_tax, p_voucher_name, p_voucher_rate, p_status, p_display_status) 
              VALUES 
                ('" . $customername . "', 
                 '" . $currentDateTime . "', 
                 '" . $datePick . "', 
                 '" . $timestamp . "', 
                 'PICK".$p_pickup_code."', 
                 '" . $prod_id . "', 
                 '" . $acc_id . "', 
                 '" . $BankEwallet . "', 
                 '" . $attachment . "',
                 '" . $deductQty . "', 
                 '" . $db_s_id . "', 
                 '" . $prod_currprices . "', 
                 '" . ($prod_currprices * $deductQty) . "', 
                 '" . $new_total_prices . "', 
                 '" . $db_system_tax . "', 
                 '" . $db_voucher_name . "', 
                 '" . $db_voucher_discount . "%', 
                 'Waiting for approval', 
                 '1')");
            
           


                        
                       
                
            }

            if ($remainingQty <= 0) {
                break;
            }
        }

        // Remove from cart
       mysqli_query($connections, "DELETE FROM cart WHERE cart_id ='$cart_id' AND cart_user_id='$acc_id'");
    }

    // Deduct voucher

    if($db_voucher_name){

        
        
        $get_orderrecord = mysqli_query($connections, "SELECT * FROM pickup WHERE p_pickup_code = '$p_pickup_code'");
        $get_rowrecord = mysqli_fetch_assoc($get_orderrecord);
        $orders_voucher_name = $get_rowrecord["p_voucher_name"];
    
        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date('Y-m-d H:i:s');
    
        $view_query = mysqli_query($connections, "SELECT * FROM voucher WHERE voucher_expiration >= '$currentDateTime' AND voucher_name ='$orders_voucher_name'");
        while ($row = mysqli_fetch_assoc($view_query)) {
            $voucher_id = $row["voucher_id"];
            $db_voucher_name = $row["voucher_name"];
            $db_voucher_discount = $row["voucher_discount"];
            $db_voucher_discount_percent = $db_voucher_discount / 100;
    
            $db_voucher_created = $row["voucher_created"];
            $db_voucher_expiration = $row["voucher_expiration"];
            $db_voucher_maximumLimit = $row["voucher_maximumLimit"];
            $db_voucher_status = $row["voucher_status"];
    
            echo $db_voucher_maximumLimit -= 1;
    
            mysqli_query($connections, "UPDATE voucher SET voucher_maximumLimit='$db_voucher_maximumLimit' where voucher_name ='$orders_voucher_name'");
        }
        

    }
   
 
    $formattedDate = date("F j, Y", strtotime($datePick));
    mysqli_query($connections, "INSERT INTO users_log(act_account_id, act_activity, act_date,act_table,act_collumn_id) 
                        VALUES('$acc_id', 'Request pickup order on $formattedDate , $timestamp', '$currentDateTime','pickup','PICK$p_pickup_code')");
   
  
}
?>

<?php

if(isset($_POST['btnRemove'])){
    $value2 = $_POST['value2'];//order_transaction_code
    $order_id=$_POST['order_id'];
        
    // Perform the update query
    $update_query = mysqli_query($connections, "UPDATE pickup SET p_voucher_rate = '1' WHERE pickup_id  = '$order_id'");

    if($update_query) {
        
    //   echo "<script>window.location.href = 'inventory.php';</script>";
    } else {
        // Update failed
        echo "Update failed.";
    } 
    
}
?>