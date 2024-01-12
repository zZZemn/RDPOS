<?php
include('components/header.php');
$getCartItems = $db->getCartItems($user['acc_id']);
?>
<h2>Cart</h2>
<div class="container card cart-items-container mt-5" id="cartItemsContainer">
    
</div>
<?php
include('components/footer.php');
?>
<script>
    $('.nav-cart').addClass('nav-active');
</script>