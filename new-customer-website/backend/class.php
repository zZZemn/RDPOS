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
        $query = $this->conn->prepare("SELECT * FROM `product` WHERE `prod_status` = '0' AND `prod_sell_onlline` = '1'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function getBestSellers()
    {
        $query = $this->conn->prepare("SELECT p.*, SUM(po.orders_prodQty) AS total_quantity_sold
                                       FROM `product` AS p 
                                       LEFT JOIN pos_orders AS po ON p.prod_id = po.orders_prod_id 
                                       WHERE p.prod_sell_onlline = 1
                                       GROUP BY p.prod_id, p.prod_name
                                       HAVING total_quantity_sold > 0
                                       ORDER BY total_quantity_sold DESC 
                                       LIMIT 5");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function checkProductQty($productId)
    {
        $query = $this->conn->prepare("SELECT SUM(s_amount) AS total_stock FROM `stocks` WHERE `s_prod_id` = '$productId'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    // Cart
    public function checkProductInCart($userId, $productId)
    {
        $query = $this->conn->prepare("SELECT * FROM `new_cart` WHERE `prod_id` = '$productId' AND `user_id` = '$userId'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function addToCart($userId, $productId)
    {
        $checkProducyInCart = $this->checkProductInCart($userId, $productId);
        if ($checkProducyInCart->num_rows > 0) {
            $query = $this->conn->prepare("UPDATE `new_cart` SET `qty`= `qty` + '1' WHERE `user_id` = '$userId'");
            $response = 'Cart Updated!';
        } else {
            $query = $this->conn->prepare("INSERT INTO `new_cart`(`prod_id`, `qty`, `user_id`) VALUES ('$productId','1','$userId')");
            $response = 'Added To Cart!';
        }

        if ($query->execute()) {
            return $response;
        } else {
            return 400;
        }
    }
}
