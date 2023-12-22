
<?php 
// $db_cart_id 
include "../connection.php";

if (isset($_POST['confirmremove'])) {
 // var_dump($_POST);
 $db_cart_id = $_POST["remove_id"];






   mysqli_query($connections, "DELETE FROM cart WHERE cart_prod_id ='$db_cart_id'");
  echo "<script>window.location.href = 'cart.php';</script>";

  
}
?>