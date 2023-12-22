<?php

include("../.../../../../../connection.php");

session_start();
$db_acc_id = $_SESSION["acc_id"]; 

// Fetch orders from the database
$sql = "SELECT
orders_id,
order_transaction_code,
orders_nickname,
orders_email,
orders_contact,
orders_paymethod,
orders_qty,
orders_prod_id,
SUM(orders_qty) AS qty,
SUM(orders_subtotal) AS subtotal,
orders_voucher_rate,
orders_address,
orders_date,
orders_status,
product.prod_name,
product.prod_currprice,
product.prod_image,
product.prod_description
FROM
orders
LEFT JOIN product 
ON orders.orders_prod_id = product.prod_id 
WHERE
display_status='0'
AND orders_customer_id = '".$db_acc_id."'
GROUP BY
orders_prod_id,
order_transaction_code
ORDER BY
orders_id DESC";
$result = $connections->query($sql);

if ($result->num_rows > 0) {
    $data = array();

    // Fetch rows and push them into the data array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Encode the data as JSON and echo it
    if ($data) {
        echo json_encode($data);
    } else {
        echo json_encode([]); // Return an empty array instead of "empty"
    }
    
   
} else {
    echo "0 results";
}

$connections->close();
?>
