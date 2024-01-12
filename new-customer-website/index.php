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
        <?php
        while ($bestProduct = $getBestSellers->fetch_assoc()) {
            $outOfStock = true;
            $productQty = 0;
            $checkProductQty = $db->checkProductQty($bestProduct['prod_id']);
            if ($checkProductQty->num_rows > 0) {
                $productQty = $checkProductQty->fetch_assoc();
                if ($productQty['total_stock'] > 0) {
                    $productQty = $productQty['total_stock'];
                    $outOfStock = false;
                } else {
                    $outOfStock = true;
                }
            }
        ?>
            <button 
            class="m-2 p-0 product-container btnViewProduct"
            data-id="<?=$bestProduct['prod_id']?>"
            data-name="<?=$bestProduct['prod_name']?>"
            data-mg="<?=$bestProduct['prod_mg']?>"
            data-g="<?=$bestProduct['prod_g']?>"
            data-ml="<?=$bestProduct['prod_ml']?>"
            data-unitType="<?=$bestProduct['unit_type']?>"
            data-category="<?=$bestProduct['prod_category_id']?>"
            data-description="<?=$bestProduct['prod_description']?>"
            data-image="<?=$bestProduct['prod_image']?>"
            data-price="<?=$bestProduct['prod_currprice']?>"
            data-stock="<?=$productQty?>"
            >
                <?= ($outOfStock) ? '<span class="txt-out-of-stock text-danger">Out of stock.</span>' : '' ?>
                <img class="product-image" src="../upload_prodImg/<?= $bestProduct['prod_image'] ?>">
                <div class="p-1 product-contents-container">
                    <p class="product-name">
                        <?= $bestProduct['prod_name'] ?>
                    </p>
                    <span class="product-price text-success">PHP <?= $bestProduct['prod_currprice'] ?></span>
                </div>
            </button>
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