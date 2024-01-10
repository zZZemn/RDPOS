<?php
include("../connection.php");


echo "<pre>";
print_r($_POST);
echo "</pre>";

echo "eto";
if (isset($_POST['btncancel'])) {
    $orders_id = $_POST['orders_id'];
    $transaction_code = $_POST["transaction_code"]; //transaction code
    $OrderStatus = $_POST['orders_status'];

    // Retrieve all orders_stock_id associated with the cancelled order
    $stock_id_query = "SELECT orders_stock_id, orders_qty FROM orders WHERE orders_prod_id = '$orders_id' AND order_transaction_code='$transaction_code '";
    $stock_id_result = mysqli_query($connections, $stock_id_query);

    if ($stock_id_result && mysqli_num_rows($stock_id_result) > 0) {
        while ($row = mysqli_fetch_assoc($stock_id_result)) {
            echo    $orders_stock_id = $row['orders_stock_id'];
            echo    $cancelled_qty = $row['orders_qty'];
            if ($OrderStatus == "Pending") {

                // Update the stock quantity in the stocks table
                $update_stock_query = "UPDATE stocks SET s_amount = s_amount + '$cancelled_qty' WHERE s_id = '$orders_stock_id'";
                $update_stock_result = mysqli_query($connections, $update_stock_query);

                // Perform the delete operation in the orders table
                $delete_query = "DELETE FROM orders WHERE orders_prod_id = '$orders_id' AND order_transaction_code='$transaction_code'";
                $delete_result = mysqli_query($connections, $delete_query);

                if ($delete_result) {
                    // Deletion successful
                    echo 'success';
                } else {
                    // Deletion failed
                    echo 'error: ' . mysqli_error($connections);
                }


                if (!$update_stock_result) {
                    // Update stock quantity failed
                    echo 'error';
                    exit; // Exit loop on error
                }
            } else {





                $sql = "UPDATE `orders` SET `display_status` = '1' WHERE `order_transaction_code` = '$transaction_code' AND orders_prod_id = '$orders_id';";


                mysqli_query($connections, $sql);
            }
        }
    } else {
        // No matching order found
        echo 'error';
    }
}
