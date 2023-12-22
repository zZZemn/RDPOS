<?php 
session_start();
include("backend/back_navbar.php");
if (isset($_POST['add'])) {
  $user = htmlentities($_SESSION['acc_id']);
  $qty = htmlentities($_POST['qty']);
  $prod_id = htmlentities($_POST['id']);

  $get_productStocks = mysqli_query($connections, "SELECT *, SUM(b.s_amount) as prod_stocks
  FROM product as a
  LEFT JOIN stocks as b ON a.prod_id = b.s_prod_id
  WHERE prod_id='$prod_id' 
  GROUP BY a.prod_id ");

  $row_stocks = mysqli_fetch_assoc($get_productStocks);
  $db_prod_id = $row_stocks["prod_id"];
  $db_prod_stocks = $row_stocks["prod_stocks"];

  if ($qty <= $db_prod_stocks) {
      // Check if the product already exists in the cart
      $check_existing_query = mysqli_query($connections, "SELECT * FROM cart WHERE cart_prod_id='$prod_id' AND cart_user_id='$user'");
      if (mysqli_num_rows($check_existing_query) > 0) {
          // Update the quantity in the existing cart entry
          $update_query = mysqli_query($connections, "UPDATE cart SET cart_prodQty=cart_prodQty+'$qty' WHERE cart_prod_id='$prod_id' AND cart_user_id='$user'");
          if ($update_query) {
              echo "<script>window.location.href='home.php';</script>";
          } else {
              echo "<script>alert('An error occurred while updating cart quantity.');</script>";
          }
      } else {
          // Insert a new entry into the cart
          $sql = "INSERT INTO `cart` (`cart_id`, `cart_prod_id`, `cart_user_id`, `cart_prodQty`) VALUES (NULL, '$prod_id', '$user', '$qty')";
          if (mysqli_query($connections, $sql)) {
              echo "<script>window.location.href='home.php';</script>";
          } else {
              echo "<script>alert('An error occurred while adding to cart.');</script>";
          }
      }
  } else {


    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    //   echo "<script>
    //   alert('Insufficient stocks');
    //   window.location.href='home.php';
    //   </script>";
  }
} else {
 // echo "<script>window.location.href='home.php';</script>";
}


?>