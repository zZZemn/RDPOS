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

    public function getOrdersSetToRider($riderId, $status)
    {
        $query = $this->conn->prepare("SELECT * FROM `new_tbl_orders` WHERE `rider_id` = '$riderId' AND `status` = '$status'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function getOrderUsingOrderId($riderId, $orderId)
    {
        $query = $this->conn->prepare("SELECT * FROM `new_tbl_orders` WHERE `rider_id` = '$riderId' AND `order_id` = '$orderId'");
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

    public function productDelivered($orderId)
    {
        // Add in sales
        $dateTime = date('Y-m-d H:i:s');
        $query = $this->conn->prepare("UPDATE `new_tbl_orders` SET `status`='Delivered', `delivered_date` = '$dateTime' WHERE `order_id` = '$orderId'");
        if ($query->execute()) {
            return 200;
        }
    }
}
