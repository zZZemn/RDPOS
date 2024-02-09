<?php
include('db.php');
date_default_timezone_set('Asia/Manila');

class global_class extends db_connect
{
    public function __construct()
    {
        $this->connect();
    }

    public function checkUser($userId)
    {
        $query = $this->conn->prepare("SELECT * FROM `account` WHERE `acc_id` = '$userId'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function checkId($tableName, $columnName, $id)
    {
        $query = $this->conn->prepare("SELECT * FROM `$tableName` WHERE `$columnName` = '$id'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function getUserType($userType)
    {
        $query = $this->conn->prepare("SELECT * FROM `account` WHERE `acc_type` = '$userType' AND `acc_status` = '0'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    // Orders
    public function getOrders($status)
    {
        $query = $this->conn->prepare("SELECT * FROM `new_tbl_orders` WHERE `status` = '$status'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function getUserOrderItems($orderId)
    {
        $query = $this->conn->prepare("SELECT i.qty, p.* FROM `new_tbl_order_items` AS i JOIN `product` AS p ON i.product_id = p.prod_id WHERE i.order_id = '$orderId'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function rejectOrder($orderId)
    {
        $query = $this->conn->prepare("UPDATE `new_tbl_orders` SET `status`='Rejected' WHERE `order_id` = '$orderId'");
        if ($query->execute()) {
            return 200;
        }
    }

    public function changeOrderStatus($orderId)
    {
        $dateTime = date('Y-m-d H:i:s');
        $getOrder = $this->checkId('new_tbl_orders', 'order_id', $orderId);
        if ($getOrder->num_rows > 0) {
            $order = $getOrder->fetch_assoc();
            $orderStatus = $order['status'];
            if ($orderStatus == 'Pending') {
                $newStatus = 'Accepted';
            } elseif ($orderStatus == 'Accepted') {
                $newStatus = 'Ready For Delivery';
            } elseif ($orderStatus == 'Ready For Delivery') {
                $newStatus = 'Shipped';
                if ($order['rider_id'] == '') {
                    return 'Please select rider!';
                }
            } elseif ($orderStatus == 'Shipped') {
                $newStatus = 'Delivered';
                $query = $this->conn->prepare("UPDATE `new_tbl_orders` SET `status`='$newStatus', `delivered_date` = '$dateTime' WHERE `order_id` = '$orderId'");
                if ($query->execute()) {
                    return 200;
                } else {
                    return 400;
                }
            } else {
                return 400;
            }

            if ($newStatus == 'Ready For Delivery') {
                // Deduct to the inventory
                $getItems = $this->conn->prepare("SELECT * FROM `new_tbl_order_items` WHERE `order_id` = '$orderId'");
                if ($getItems->execute()) {
                    $items = $getItems->get_result();
                    while ($item = $items->fetch_assoc()) {
                        $productId = $item['product_id'];
                        $qty = $item['qty'];

                        $inventorySql = $this->conn->prepare("SELECT * FROM `stocks` WHERE `s_prod_id` = '$productId' AND `s_amount` > 0 ORDER BY `s_expiration` ASC, `s_amount` DESC");
                        if ($inventorySql->execute()) {
                            $inv = $inventorySql->get_result();

                            $detailQty = $qty;

                            while ($inventoryRow = $inv->fetch_assoc()) {
                                $availableQty = $inventoryRow['s_amount'];
                                $subtractedQty = min($detailQty, $availableQty);

                                $stockId = $inventoryRow['s_id'];
                                $updateInvQty = $this->conn->prepare("UPDATE `stocks` SET `s_amount` = `s_amount` - $subtractedQty WHERE `s_id` = '$stockId'");

                                if ($updateInvQty->execute()) {
                                    if ($subtractedQty > 0) {
                                        // Insert Sales Pag need
                                        $detailQty -= $subtractedQty;
                                    }
                                } else {
                                    return 'Update Stock SQL Error!';
                                }

                                if ($detailQty <= 0) {
                                    break;
                                }
                            }
                        } else {
                            return 'Inventory SQL Error!';
                        }
                    }
                } else {
                    return 'Get Items SQL Error';
                }
            }

            $query = $this->conn->prepare("UPDATE `new_tbl_orders` SET `status`='$newStatus' WHERE `order_id` = '$orderId'");
            if ($query->execute()) {
                return 200;
            }

            return $newStatus;
        } else {
            return 400;
        }
    }

    public function changeOrderRider($orderId, $riderId)
    {
        $query = $this->conn->prepare("UPDATE `new_tbl_orders` SET `rider_id`='$riderId' WHERE `order_id` = '$orderId'");
        if ($query->execute()) {
            return 200;
        }
    }

    public function getOrderSales()
    {
        $query = $this->conn->prepare("SELECT o.*, a.acc_fname AS cust_fname, a.acc_lname AS cust_lname, r.acc_fname AS db_fname, r.acc_lname AS db_lname, mop.payment_name AS payment
                                       FROM `new_tbl_orders` AS o 
                                       JOIN `account` AS a ON o.cust_id = a.acc_id
                                       JOIN `account` AS r ON o.rider_id = r.acc_id
                                       LEFT JOIN `mode_of_payment` AS mop ON o.payment_id = mop.payment_id
                                       WHERE `status` = 'Delivered'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function getSalesInPOS()
    {
        $query = $this->conn->prepare("SELECT *, SUM(orders_subtotal) AS subtotal FROM `pos_orders` GROUP BY `orders_tcode`");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }
}
