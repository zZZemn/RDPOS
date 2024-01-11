<?php
include('components/header.php');
?>
<h4>All Products</h4>
<?php
$getBestSellers = $db->getBestSellers();
if ($getBestSellers->num_rows > 0) {
?>
    <center>
        <h5 class="text-success">Best Sellers</h5>
    </center>
    <div class="container best-sellers-container d-flex">
        <br>
        <?php
        while ($bestProduct = $getBestSellers->fetch_assoc()) {
        ?>
            <div class="m-2 product-container">
                <span class="txt-out-of-stock text-danger">Out of stock.</span>
                <img src="../upload_prodImg/<?= $bestProduct['prod_image'] ?>">
                <div class="p-1 product-contents-container">
                    <p class="product-name">
                        <?= $bestProduct['prod_name'] ?>
                    </p>
                    <span class="product-price text-success">PHP <?= $bestProduct['prod_currprice'] ?></span>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>
<?php
// $getProducts = $db->getAllProducts();
// while ($product = $getProducts->fetch_assoc()) {
//     echo $product['prod_name'];
// }
?>
<!-- </div> -->
<!-- <div class="container new-products-container">
    asd
</div> -->
<?php
include('components/footer.php');
?>
<script>
    $('.nav-all-products').addClass('nav-active');
</script>