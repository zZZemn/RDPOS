<?php
include "../connection.php";


require '../POS/library/picqer/vendor/autoload.php'; 
date_default_timezone_set('Asia/Manila');



use Picqer\Barcode\BarcodeGeneratorPNG;







// Function to generate a barcode with text below it and save it in a specific folder
function generateBarcodeWithText($text, $folder, $filename) {
    $generator = new BarcodeGeneratorPNG();
    $barcodeImage = $generator->getBarcode($text, $generator::TYPE_CODE_128);

    // Create an image resource from the barcode image
    $barcodeImageResource = imagecreatefromstring($barcodeImage);

    // Set the font size and color
    $fontSize = 20; // You can adjust the font size as needed
    $textColor = imagecolorallocate($barcodeImageResource, 0, 0, 0); // Black color

    // Calculate the position to center the text
    $textWidth = imagefontwidth($fontSize) * strlen($text);
    $textX = (imagesx($barcodeImageResource) - $textWidth) / 2;

    // Calculate the Y position to place the text below the barcode
    $textY = imagesy($barcodeImageResource) + 10; // Adjust the Y position as needed

    // Add the text to the image
    imagestring($barcodeImageResource, $fontSize, $textX, $textY, $text, $textColor);

    // Save the image with text
    $filePath = $folder . '/' . $filename;
    imagepng($barcodeImageResource, $filePath);

    // Clean up the image resources
    imagedestroy($barcodeImageResource);

    return $filePath;
}





$customer_name = $contact = $deliveryaddress = $email = $paymethod = $discountname = $discountrate = $latitude=$longitude="";
$attachment = "";
echo"<pre>";
print_r($_POST);
echo "</pre>";


$transaction_code = 'RD' . str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file is uploaded
    if (isset($_FILES['attachment']) && $_FILES['attachment']['size'] > 0) {
        $attachment = $_FILES['attachment']['name'];
        $attachment_tmp = $_FILES['attachment']['tmp_name'];
        $attachment_dest = '../upload_proof/' . $attachment;
        move_uploaded_file($attachment_tmp, $attachment_dest);
    }

    

    $cartIds = $_POST['cartIds']; // Kunin ang string ng cart IDs
    $cartIdArray = explode(',', $cartIds); // I-split ang string base sa koma
    
    foreach ($cartIdArray as $key => $value) {
        $cartId = trim($value); // tanggalin ang mga white spaces (trim) kung kinakailangan
     
        $prodIds = explode(',', $_POST['prodIds']);
        $prod_currprices = explode(',', $_POST['prod_currprices']);
        $total_price = explode(',', $_POST['total_prices']);
        $db_cart_prodQty = explode(',', $_POST['db_cart_prodQtys']);
        $cart_id = explode(',', $_POST['cartIds']);
        $new_total_prices = explode(',', $_POST['new_total_prices']);
        $vnames = explode(',', $_POST['vnames']);
        $vdiscounts = explode(',', $_POST['vdiscounts']);
        
        $prod_id = $prodIds[$key];
        $prod_currprice = $prod_currprices[$key];
        $total_price =$total_price[$key];
        $db_cart_prodQty = $db_cart_prodQty[$key];
        $cart_id = $cart_id[$key];
        $new_total_price=$new_total_prices[$key];


       

        $discountname = $vnames[$key];
        $discountrate = $vdiscounts[$key];

     


        $orders_tax = $_POST["db_system_tax"];
        $orders_ship_fee = $_POST["address_rate"];

        $customer_id = $_POST["customer_id"];
        $nickname = $_POST["Fullname"];
        $contact = $_POST["Contact"];
        $deliveryaddress = $_POST["address"];
        $email = $_POST["email"];
        $paymethod=$_POST["BankEwallet"];



      

      

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
        ORDER BY b.s_expiration ASC, b.s_stockin_date ASC;
        
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

                // Insert into the database


              

                $barcodeText = $transaction_code; // Change this to your desired barcode data
                $folderPath = '../upload_barcode/'; // Change this to the desired folder path
                $fileName = $barcodeText . ".png";

                $filePath = generateBarcodeWithText($barcodeText, $folderPath, $fileName);



                mysqli_query($connections, "
                INSERT INTO orders
                (orders_prod_id, order_transaction_code, orders_customer_id, orders_nickname, orders_email, orders_contact, orders_paymethod, orders_proof, orders_qty,
                 orders_stock_id, orders_prod_price, orders_subtotal, orders_gradeTotal, orders_ship_fee, orders_tax, orders_voucher_name, orders_voucher_rate, orders_address,
                orders_date, orders_status,order_barcode) 
                VALUES (
                '" . $prod_id . "', 
                '$transaction_code', 
                '" . $customer_id . "', 
                '" . $nickname . "',
                '" . $email . "', 
                '" . $contact . "',
                '" . $paymethod . "',
                " . ($attachment ? "'" . $attachment . "'" : "NULL") . ",
                '" . $deductQty . "', 
                '" . $db_s_id . "', 
                '" . $prod_currprice . "',
                '" . ($prod_currprice * $deductQty) . "', 
                '" . $new_total_price . "', 
                '" . $orders_ship_fee . "', 
                '" . $orders_tax . "', 
                '" . $discountname . "',
                '" . $discountrate . "',
                '" . $deliveryaddress . "',
                NOW(), 
                'Pending',
                '" . $fileName . "'
                
                )");
            
            
            }

            if ($remainingQty <= 0) {
                break;
            }
        }

       
    mysqli_query($connections, "DELETE FROM cart WHERE cart_id ='$cart_id' AND cart_user_id='$customer_id'");
       

     


   // print($orders_voucher_name);

    date_default_timezone_set('Asia/Manila');
    $currentDateTime = date('Y-m-d H:i:s');

    $view_query = mysqli_query($connections, "SELECT * FROM voucher WHERE voucher_expiration >= '$currentDateTime' AND voucher_name ='$discountname'");
    while ($row = mysqli_fetch_assoc($view_query)) {
        $voucher_id = $row["voucher_id"];
        $db_voucher_name = $row["voucher_name"];
        $db_voucher_discount = $row["voucher_discount"];
        $db_voucher_discount_percent = $db_voucher_discount / 100;

        $db_voucher_created = $row["voucher_created"];
        $db_voucher_expiration = $row["voucher_expiration"];
        $db_voucher_maximumLimit = $row["voucher_maximumLimit"];
        $db_voucher_status = $row["voucher_status"];

        $db_voucher_maximumLimit -= 1;

        mysqli_query($connections, "UPDATE voucher SET voucher_maximumLimit='$db_voucher_maximumLimit' where voucher_name ='$discountname'");
    }

   
    }

  
   
   
}

?>






<?php

if(isset($_POST['btnRemove'])){
    $value2 = $_POST['value2'];//order_transaction_code
    $order_id=$_POST['order_id'];
        
    // Perform the update query
    $update_query = mysqli_query($connections, "UPDATE orders SET display_status = '1' WHERE orders_id = '$order_id'");

    if($update_query) {
        
        echo "<script>window.location.href = 'inventory.php';</script>";
    } else {
        // Update failed
        echo "Update failed.";
    } 
    
}
?>