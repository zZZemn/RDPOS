<?php
$currentURL = $_SERVER['REQUEST_URI'];
?>


<?php if ($count) {  ?>
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
<?php } else { ?>
    <style>
        .notification-counter {
            display: none;
        }
    </style>
<?php } ?>



<div class="sidebar" id="sidebar">
    <div style="background-color:#600000;" class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>


                <li class="<?php if (strpos($currentURL, 'home.php') !== false) echo 'active'; ?>">
                    <a href="home.php"><i class="fe fe-home" data-bs-toggle="tooltip" title="fe fe-home" style="color:white; font-size: 20px;"></i><span> Home</span> </a>
                </li>

                <li class="<?php if (strpos($currentURL, 'cart.php') !== false) echo 'active'; ?>">
                    <a href="cart.php"><i class="fe fe-shopping-cart" data-bs-toggle="tooltip" title="fe fe-shopping-cart" style="color:gray; font-size: 20px;"></i>


                        <span> Cart</span>
                        <span class="notification-counter" style="color:white;"><?= $count; ?></span>
                    </a>
                </li>


                <li class="<?php if (strpos($currentURL, 'myOrders.php') !== false) echo 'active'; ?>">
                    <a href="myOrders.php"><img src="assets/img/icons/purchase1.svg" alt="img"><span> Check orders</span> </a>
                </li>




                <li class="<?php if (strpos($currentURL, 'history.php') !== false) echo 'active'; ?>">
                    <a href="history.php"><img src="assets/img/icons/transcation.svg" alt="img"><span> History</span> </a>
                </li>




                <li class="<?php if (strpos($currentURL, 'chat.php') !== false) echo 'active'; ?>">
                    <a href="chat.php"><img src="assets/img/icons/mail.svg" alt="img"><span> Messages</span> </a>
                </li>



















            </ul>
        </div>
    </div>
</div>