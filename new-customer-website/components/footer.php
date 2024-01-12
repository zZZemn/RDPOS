</div>
</main>

<!-- View Product Modal -->
<div class="modal" tabindex="-1" role="dialog" id="viewProductModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewProductName"></h5>
                <button type="button" id="closeViewProductModal" class="btn-close btnCloseModal" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container p-2">
                <div class="d-flex justify-content-center m-2">
                    <img src="" id="viewProductPicture" class="product-image">
                </div>
                <hr>
                <div class="input-container-label-top">
                    <label>Product Description</label>
                    <textarea readonly id="viewProductDescription" class="form-control"></textarea>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-end p-1">
                    <div class="p-0">
                        <div id="viewProductStocks" style="font-size: 13px; border-bottom: 1px solid rgb(158, 158, 158);" class="mb-1 text-success p-1 pb-2">

                        </div>

                        <span id="viewProductPrice" class="p-1" style="border-radius: 5px;"></span>
                    </div>
                    <button class="btn text-light" style="height: 40px; background-color: crimson;" id="btnViewProdAddToCart" data-prodid=""><i class="bi bi-cart-plus-fill"></i> Add To Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End of View Product Modal -->

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="javascript/app.js"></script>
</body>

</html>