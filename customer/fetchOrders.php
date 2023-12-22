<?php



session_start();

if (!isset($_SESSION["acc_id"])) {
    echo "User not authenticated";
    exit();
}

include("../connection.php"); // Adjust the path as needed

$db_acc_id = $_SESSION["acc_id"]; // Retrieve the logged-in user's ID
include "view/myOrder/viewQuery.php";	
include "view/myOrder/tbody.php";

?>


