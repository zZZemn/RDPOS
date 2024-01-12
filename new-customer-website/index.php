<?php
include('components/header.php');
?>
<h4>All Products</h4>
<div class="">
    <?php
    $getBestSellers = $db->getBestSellers();
    if ($getBestSellers->num_rows > 0) {
    ?>
        <div class="">
            <center class="mt-5">
                <h5 class="text-success">Best Sellers</h5>
            </center>
            <div class="container best-sellers-container d-flex justify-content-center">
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
                    <button class="m-2 p-0 product-container btnViewProduct" data-id="<?= $bestProduct['prod_id'] ?>" data-name="<?= $bestProduct['prod_name'] ?>" data-mg="<?= $bestProduct['prod_mg'] ?>" data-g="<?= $bestProduct['prod_g'] ?>" data-ml="<?= $bestProduct['prod_ml'] ?>" data-unitType="<?= $bestProduct['unit_type'] ?>" data-category="<?= $bestProduct['prod_category_id'] ?>" data-description="<?= $bestProduct['prod_description'] ?>" data-image="<?= $bestProduct['prod_image'] ?>" data-price="<?= $bestProduct['prod_currprice'] ?>" data-stock="<?= $productQty ?>">
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
        </div>
    <?php
    }

    $getNewProducts = $db->getNewProducts();
    if ($getNewProducts->num_rows > 0) {
    ?>
        <div class="">
            <center class="">
                <h5 class="text-success">New Products</h5>
            </center>

            <div class="container best-sellers-container d-flex justify-content-center">
                <?php
                while ($newProduct = $getNewProducts->fetch_assoc()) {
                    $outOfStock = true;
                    $productQty = 0;
                    $checkProductQty = $db->checkProductQty($newProduct['prod_id']);
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
                    <button class="m-2 p-0 product-container btnViewProduct" data-id="<?= $newProduct['prod_id'] ?>" data-name="<?= $newProduct['prod_name'] ?>" data-mg="<?= $newProduct['prod_mg'] ?>" data-g="<?= $newProduct['prod_g'] ?>" data-ml="<?= $newProduct['prod_ml'] ?>" data-unitType="<?= $newProduct['unit_type'] ?>" data-category="<?= $newProduct['prod_category_id'] ?>" data-description="<?= $newProduct['prod_description'] ?>" data-image="<?= $newProduct['prod_image'] ?>" data-price="<?= $newProduct['prod_currprice'] ?>" data-stock="<?= $productQty ?>">
                        <?= ($outOfStock) ? '<span class="txt-out-of-stock text-danger">Out of stock.</span>' : '' ?>
                        <img class="product-image" src="../upload_prodImg/<?= $newProduct['prod_image'] ?>">
                        <div class="p-1 product-contents-container">
                            <p class="product-name">
                                <?= $newProduct['prod_name'] ?>
                            </p>
                            <span class="product-price text-success">PHP <?= $newProduct['prod_currprice'] ?></span>
                        </div>
                    </button>
                    <button class="m-2 p-0 product-container btnViewProduct" data-id="<?= $newProduct['prod_id'] ?>" data-name="<?= $newProduct['prod_name'] ?>" data-mg="<?= $newProduct['prod_mg'] ?>" data-g="<?= $newProduct['prod_g'] ?>" data-ml="<?= $newProduct['prod_ml'] ?>" data-unitType="<?= $newProduct['unit_type'] ?>" data-category="<?= $newProduct['prod_category_id'] ?>" data-description="<?= $newProduct['prod_description'] ?>" data-image="<?= $newProduct['prod_image'] ?>" data-price="<?= $newProduct['prod_currprice'] ?>" data-stock="<?= $productQty ?>">
                        <?= ($outOfStock) ? '<span class="txt-out-of-stock text-danger">Out of stock.</span>' : '' ?>
                        <img class="product-image" src="../upload_prodImg/<?= $newProduct['prod_image'] ?>">
                        <div class="p-1 product-contents-container">
                            <p class="product-name">
                                <?= $newProduct['prod_name'] ?>
                            </p>
                            <span class="product-price text-success">PHP <?= $newProduct['prod_currprice'] ?></span>
                        </div>
                    </button>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<hr>
<?php
$getProducts = $db->getAllProducts();
?>
<div class="container all-products-container">
    <div class="search-product-container">
        <input type="search" class="form-control" placeholder="Search...">
        <button type="button" class="search-product-button btn btn-primary">
            <i class="bi bi-search"></i>
        </button>
    </div>
    <div class="d-flex flex-wrap justify-content-center mt-3">

        <?php
        if ($getProducts->num_rows > 0) {
            while ($product = $getProducts->fetch_assoc()) {
                $outOfStock = true;
                $productQty = 0;
                $checkProductQty = $db->checkProductQty($product['prod_id']);
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
                <button class="m-2 p-0 product-container btnViewProduct" data-id="<?= $product['prod_id'] ?>" data-name="<?= $product['prod_name'] ?>" data-mg="<?= $product['prod_mg'] ?>" data-g="<?= $product['prod_g'] ?>" data-ml="<?= $product['prod_ml'] ?>" data-unitType="<?= $product['unit_type'] ?>" data-category="<?= $product['prod_category_id'] ?>" data-description="<?= $product['prod_description'] ?>" data-image="<?= $product['prod_image'] ?>" data-price="<?= $product['prod_currprice'] ?>" data-stock="<?= $productQty ?>">
                    <?= ($outOfStock) ? '<span class="txt-out-of-stock text-danger">Out of stock.</span>' : '' ?>
                    <img class="product-image" src="../upload_prodImg/<?= $product['prod_image'] ?>">
                    <div class="p-1 product-contents-container">
                        <p class="product-name">
                            <?= $product['prod_name'] ?>
                        </p>
                        <span class="product-price text-success">PHP <?= $product['prod_currprice'] ?></span>
                    </div>
                </button>
            <?php
            }
        } else {
            ?>
            <center>No Product Found.</center>
        <?php
        }
        ?>
    </div>
</div>
<?php
include('components/footer.php');
?>
<script>
    $('.nav-all-products').addClass('nav-active');
</script>