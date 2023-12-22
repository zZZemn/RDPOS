<?php
$db_prod_name = "";
$db_prod_currprice = "";
$total_bill = 0;

//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

date_default_timezone_set('Asia/Manila');
$currentDateTime = date('Y-m-d H:i:s');

if (!empty($_POST['myCheckbox'])) {
    $stockID = $_POST['ssid'];
    $db_id = $_POST['myCheckbox']; // This line is for prod_id
    $prod_name = $_POST['prod_name'];
    $prod_currprice = $_POST['prod_currprice'];
    $db_cart_prodQty = $_POST['qty'];
    $acc_id=$_SESSION["acc_id"];

    $current_date = date("Y-m-d"); // Get the current date

   

        $get_product_record = mysqli_query($connections, "SELECT *,
            SUM(IF(s.s_expiration = '0000-00-00' OR s.s_expiration > '$current_date', s.s_amount, 0)) AS prod_stocks
        FROM product AS a
        LEFT JOIN stocks AS s ON a.prod_id = s.s_prod_id
        LEFT JOIN voucher AS v ON a.prod_voucher_id = v.voucher_id
        WHERE a.prod_status = '0' AND prod_id='$db_id'
            AND (v.voucher_id IS NULL OR (v.voucher_expiration >= '$current_date' AND v.voucher_maximumLimit >= 1))
       ");

        $row_product = mysqli_fetch_assoc($get_product_record);
        $db_prod_id = $row_product["prod_id"]; 
        $db_prod_name = $row_product["prod_name"]; 
        $db_prod_currprice = $row_product["prod_currprice"]; 
       
        $db_prod_image = $row_product["prod_image"]; 
        $db_prod_category_id = $row_product["prod_category_id"]; 

        $db_prod_kg = $row_product["prod_kg"];
        $db_prod_ml = $row_product["prod_ml"];
        $db_prod_g = $row_product["prod_g"];

        $db_voucher_name = $row_product["voucher_name"];
        $db_voucher_discount = $row_product["voucher_discount"] / 100;
        $db_prod_currprice = $row_product["prod_currprice"];
        $getDiscountValue = $db_prod_currprice * $db_voucher_discount;
        $new_prod_currprice = $db_prod_currprice - $getDiscountValue;

        $original_total_price = $db_prod_currprice * $db_cart_prodQty; // Original total price
        $total_price = $new_prod_currprice * $db_cart_prodQty; // Deducted discount total price
        $total_bill += $total_price; // Add the total price to the total bill

        $get_taxt_value = ($db_system_tax / 100) * $total_bill;
        $subtotal_deducted_tax = $total_bill;
        ?>

    
        <input hidden type="text" value="<?= $db_acc_id ?>" name="acc_id[]">
        <input hidden type="text" value="<?= $db_prod_id ?>" id="prod_id" name="prod_id[]">
        <input hidden type="text" value="<?= $db_prod_currprice ?>" name="prod_currprice[]">
        <input hidden type="text" value="<?= $db_voucher_name ?>" name="db_voucher_name[]">
        <input hidden type="text" value="<?= $db_voucher_discount * 100 ?>" name="db_voucher_discount[]">

        <div class="row mb-2">
            <div class="col-12 col-md-2">
                <picture>
                    <source srcset="../upload_prodImg/<?= $db_prod_image ?>" type="image/svg+xml">
                    <img src="../upload_prodImg/<?= $db_prod_image ?>" class="img-fluid img-thumbnail" alt="Product Image">
                </picture>
            </div>
            <div class="col-12 col-md-10">

            <p class="mb-2"><?php echo $db_prod_name .' ';
                
                if ($db_prod_kg != 0) {
                    echo $db_prod_kg . 'Kg ';
                }
                if ($db_prod_ml != 0) {
                    echo $db_prod_ml . 'Ml ';
                }
                if ($db_prod_g != 0) {
                    echo $db_prod_g . 'g ';
                }
                ?></p>
                
                <?php if ($getDiscountValue > 0): ?>
                    <p class="mb-2">
                        <?= $db_voucher_name; ?><br>
                        <span class="old-price text-decoration-line-through">₱ <?= $db_prod_currprice; ?></span>
                        <span class="new-price">₱ <?= $new_prod_currprice; ?>
                            <?php if (!empty($_POST['myCheckbox'])): ?>
                                x <?= $db_cart_prodQty; ?>
                            <?php endif; ?>
                        </span>
                    </p>
                <?php else: ?>
                    <p class="mb-2">
                        <span class="new-price">₱ <?= $new_prod_currprice; ?>
                            <?php if (!empty($_POST['myCheckbox'])): ?>
                                x <?= $db_cart_prodQty; ?>
                            <?php endif; ?>
                        </span>
                    </p>
                <?php endif; ?>
            </div>
        </div>
  
        <input hidden type="text" value="<?= $db_cart_prodQty ?>" name="db_cart_prodQty[]">
        <input hidden type="text" value="<?= $original_total_price ?>" name="total_price[]">
        <input hidden type="text" value="<?= $total_price ?>" name="new_total_price[]">
    <?php
  
}
?>
