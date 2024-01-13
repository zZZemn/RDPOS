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

    public function getAllProducts($search, $category)
    {
        if ($search != '') {
            // Get Using Search
            $query = $this->conn->prepare("SELECT * 
                                           FROM `product` 
                                           WHERE (`prod_name` LIKE '%$search%' OR `prod_description` LIKE '%$search%')
                                           AND `prod_status` = '0' 
                                           AND `prod_sell_onlline` = '1'");
        } elseif ($category != 'All') {
            //Get Using Category
            $query = $this->conn->prepare("SELECT * FROM `product` WHERE `prod_status` = '0' AND `prod_sell_onlline` = '1' AND `prod_category_id` = '$category'");
        } else {
            // Get All
            $query = $this->conn->prepare("SELECT * FROM `product` WHERE `prod_status` = '0' AND `prod_sell_onlline` = '1'");
        }

        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function getCategories()
    {
        $query = $this->conn->prepare("SELECT * FROM `category` WHERE `category_status` = '1'");
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

    public function getNewProducts()
    {
        $query = $this->conn->prepare("SELECT * 
                               FROM `product` 
                               WHERE `prod_status` = '0' 
                               AND `prod_sell_onlline` = '1' 
                               AND `prod_added` >= DATE_SUB(NOW(), INTERVAL 3 WEEK)
                               ORDER BY `prod_added` DESC
                               LIMIT 5");
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

    public function getCartItems($userId)
    {
        $query = $this->conn->prepare("SELECT nc.cart_id, nc.qty, p.* FROM `new_cart` AS nc JOIN `product` AS p ON nc.prod_id = p.prod_id WHERE nc.user_id = '$userId'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function updateCart($cartId, $updateType)
    {
        if ($updateType == 'inc') {
            $query = $this->conn->prepare("UPDATE `new_cart` SET `qty`= `qty` + '1'  WHERE `cart_id` = '$cartId'");
        } elseif ($updateType == 'desc') {
            $query = $this->conn->prepare("UPDATE `new_cart` SET `qty`= `qty` - '1'  WHERE `cart_id` = '$cartId'");
        } else {
            $query = $this->conn->prepare("DELETE FROM `new_cart` WHERE `cart_id` = '$cartId'");
        }

        if ($query->execute()) {
            return 200;
        }
    }

    // public function deleteCartItem($cartId)
    // {
    //     $query = $this->conn->prepare("UPDATE `new_cart` SET `qty`= `qty` - '1'  WHERE cart_id = '$cartId'");
    //     if ($query->execute()) {
    //         return 200;
    //     }
    // }
}
