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

    public function changeOrderStatus($orderId)
    {
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
            } elseif ($orderStatus == 'Shipped') {
                $newStatus = 'Delivered';
            } else {
                return 400;
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
}
