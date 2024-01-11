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

    public function getAllProducts()
    {
        $query = $this->conn->prepare("SELECT * FROM `product` WHERE `prod_status` = '0'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function getBestSellers()
    {
        $query = $this->conn->prepare("SELECT p.prod_description, p.prod_image, p.prod_id, p.prod_currprice, p.prod_name, SUM(po.orders_prodQty) AS total_quantity_sold
                                       FROM `product` AS p 
                                       LEFT JOIN pos_orders AS po ON p.prod_id = po.orders_prod_id 
                                       GROUP BY p.prod_id, p.prod_name
                                       HAVING total_quantity_sold > 0
                                       ORDER BY total_quantity_sold DESC 
                                       LIMIT 5");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }
}
