<?php
include("../../../../connection.php");


$view_new_products_query = mysqli_query($connections, "SELECT * FROM product AS a
INNER JOIN stocks AS b ON a.prod_id = b.s_prod_id
LEFT JOIN voucher AS v ON a.prod_voucher_id = v.voucher_id
WHERE a.prod_status = '0' AND a.prod_added >= NOW() - INTERVAL 7 DAY
GROUP BY b.s_prod_id
ORDER BY b.s_id ASC");

// fetch results
$new_products = array();
while ($new_product_row = mysqli_fetch_assoc($view_new_products_query)) {
    $new_product_id = $new_product_row["prod_id"];
    $db_prod_name = $new_product_row["prod_name"];
    $old_product_price = $new_product_row["prod_currprice"];
    $new_prod_image = $new_product_row["prod_image"];
    $db_voucher_name = $new_product_row["voucher_name"];
    $db_voucher_discount = $new_product_row["voucher_discount"] / 100;
    $getDiscountVoucher = $old_product_price * $db_voucher_discount;
    $new_product_price = $old_product_price - $getDiscountVoucher;

    $new_products[] = array(
        'prod_id' => $new_product_id,
        'prod_name' => $db_prod_name,
        'prod_currprice' => $old_product_price,
        'prod_image' => $new_prod_image,
        'voucher_name' => $db_voucher_name,
        'new_product_price' => $new_product_price
    );
}

// close the database connection
mysqli_close($connections);

// return the data in JSON format
header('Content-Type: application/json');
echo json_encode($new_products);
?>
