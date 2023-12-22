<?php 

 include "../../../connection.php";

    $view_id = $_GET["view_id"];
$current_date = date("Y-m-d"); // Get the current date

$get_record = mysqli_query($connections, "SELECT *, b.s_id, SUM(IF(s_expiration = '0000-00-00' OR s_expiration > '$current_date', b.s_amount, 0)) AS prod_stocks
FROM product AS a
LEFT JOIN stocks AS b ON a.prod_id = b.s_prod_id
LEFT JOIN voucher AS v ON a.prod_voucher_id = v.voucher_id
WHERE prod_id='$view_id' AND prod_status='0' AND s_status='1'
GROUP BY a.prod_id");
$row = mysqli_fetch_assoc($get_record);

$db_s_id = $row["s_id"];
$prod_id = $row["prod_id"];
$db_prod_code = $row["prod_code"];
$db_prod_name = $row["prod_name"];

$db_stocks = $row["prod_stocks"];
$db_prod_category_id = $row["prod_category_id"];
$db_prod_description = $row["prod_description"];
$db_prod_image = $row["prod_image"];
$db_voucher_name = $row["voucher_name"];
$db_voucher_discount = $row["voucher_discount"] / 100;

// Calculate the discounted price
$old_product_price = $row["prod_currprice"];
$getDiscountVoucher = $old_product_price * $db_voucher_discount;
$new_product_price = $old_product_price - $getDiscountVoucher;

$prod_kg = $row["prod_kg"];
$prod_ml = $row["prod_ml"];
$prod_g = $row["prod_g"];

$get_category = mysqli_query($connections, "SELECT * FROM category WHERE category_id ='$db_prod_category_id'");
$rowcat = mysqli_fetch_assoc($get_category);
$db_category_name = $rowcat["category_name"];



echo json_encode([
    'view_id' => $view_id,
    'prod_name' => $db_prod_name,
    'prod_code' => $db_prod_code,
    'voucherpercent' => $row["voucher_discount"],
    'category_name' => $db_category_name,
    'db_prod_image' => $db_prod_image,
    'stocks' => $db_stocks,
    'status' => ($db_stocks <= 0) ? 'Out of stocks' : 'Available',
    'voucher_name' => $db_voucher_name,
    'old_product_price' => number_format($old_product_price, 2, '.', ','),
    'new_product_price' => number_format($new_product_price, 2, '.', ','),
    'prod_description' => $db_prod_description,
    'prod_kg' => $prod_kg,
    'prod_ml' => $prod_ml,
    'prod_g' => $prod_g
]);
?>
