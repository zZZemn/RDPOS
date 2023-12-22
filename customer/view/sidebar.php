<?php 
$currentURL = $_SERVER['REQUEST_URI'];
?>
<?php  if($count){  ?>
<style>
        .notification-counter {
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 12px;
        margin-right: 10px;
        }
</style>
<?php }else{ ?>
    <style>
         .notification-counter {
            display:none;
         }
    </style>
    <?php }?>

<nav class="sb-sidenav accordion sb-sidenav-dark " style="background-color:#600000;" id="navbarTogglerDemo01">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading"><hr></div>
            <a class="nav-link <?php if (strpos($currentURL, 'home.php') !== false) echo 'active'; ?>" href="home.php">
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                Home
            </a>
            
            <a class="nav-link <?php if (strpos($currentURL, 'cart.php') !== false) echo 'active'; ?>" href="cart.php">
            <span class="shopping-cart-icon">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="notification-counter"><?php echo $count; ?></span>
                        </span>
                Cart
            </a>

            <a class="nav-link <?php if (strpos($currentURL, 'myOrders.php') !== false) echo 'active'; ?>" href="myOrders.php">
                <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                My Orders
            </a>

            <a class="nav-link <?php if (strpos($currentURL, 'history.php') !== false) echo 'active'; ?>" href="history.php">
                <div class="sb-nav-link-icon"><i class="fas fa-undo"></i></div>
                History
            </a>
            <a class="nav-link <?php if (strpos($currentURL, 'message.php') !== false) echo 'active'; ?>" href="#">
                <div class="sb-nav-link-icon"><i class="fas fa-message"></i></div>
                Messages
            </a>
            <a class="nav-link <?php if (strpos($currentURL, 'wishlist.php') !== false) echo 'active'; ?>" href="#">
                <div class="sb-nav-link-icon"><i class="fas fa-heart"></i></div>
                Wishlist
            </a>
          
                                        
           
            </div>
            
           
    </div>
    <div class="sb-sidenav-footer" >
        <div class="small" >Logged in as:</div>
        <?php echo $fullname?>
    </div>
</nav>

<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    // Get a reference to the navigation menu and the toggle button
    var navMenu = document.getElementById("navbarTogglerDemo01");
    var navToggle = document.getElementById("navToggle");

    // Add a click event listener to the document
    document.addEventListener("click", function(event) {
      // Check if the click target is outside the navigation menu and the toggle button
      if (
        event.target !== navMenu &&
        event.target !== navToggle &&
        !navMenu.contains(event.target)
      ) {
        // Close the navigation menu (assuming you have a collapse class)
        navMenu.classList.remove("show");
      }
    });
  });





</script>
