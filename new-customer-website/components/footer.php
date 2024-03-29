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

<!-- Delete Cart Item Modal -->
<div class="modal" tabindex="-1" role="dialog" id="deleteCartItemModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCartItemTitle">Delete Item</h5>
                <button type="button" id="closeViewProductModal" class="btn-close btnCloseModal" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container p-2">
                <h6 class="container mt-3 mb-4" id="deleteCartItemQDisplay">
                    Are you sure you want to delete this product in your cart?
                </h6>
                <hr>
                <div class="d-flex justify-content-end align-items-end p-1">
                    <button class="btn text-light" style="height: 40px; background-color: crimson;" id="btnDeleteCartItem" data-prodid=""><i class="bi bi-trash3-fill"></i> Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Delete Cart Item Modal -->


<!-- Check Out Modal -->
<div class="modal" tabindex="-1" role="dialog" id="PlaceOrderModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PlaceOrderModalTitle"><i class="bi bi-bag-check-fill"></i> Check Out</h5>
                <button type="button" id="closeViewProductModal" class="btn-close btnCloseModal" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container p-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id="placeOrderItemsContainer">

                    </tbody>
                </table>

                <div class="select-payment-type-container">
                    <div class="input-container-label-top">
                        <label for="checkOutPaymentTypesSelect">Payment Type</label>
                        <select class="form-control" id="checkOutPaymentTypesSelect">
                            <option value="cod">Cash On Delivery</option>

                        </select>
                    </div>
                    <div class="payment-image-container d-flex flex-column align-items-center mt-3">
                        <h5 id="paymentNumberContainer" class="m-3" style="color: crimson;"></h5>
                        <img src="" id="paymentImgContainer">
                        <div class="upload-payment-container">
                            <h6 class="text-success">Please Upload Proof of Payment.</h6>
                            <input type="file" name="pof" id="paymentTypeImgInput" accept="image/*" class="form-control mt-2">
                            <img id="imagePreview" src="#" alt="Image Preview">
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column align-items-end p-1">
                    <div class="checkout-computation-container" style="width: 100%;">
                        <div class="d-flex justify-content-between">
                            <span>Subtotal:</span>
                            <span>₱ <span id="checkOutSubtotal"></span></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>VAT:</span>
                            <span>₱ <span id="checkOutVat"></span></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Shipping:</span>
                            <span><span id="checkOutShipping"></span></span>
                        </div>
                        <div class="d-flex justify-content-between checkout-total">
                            <span>Total:</span>
                            <span>₱ <span id="checkOutTotal"></span></span>
                        </div>
                    </div>
                    <button class="btn text-light mt-2" style="height: 40px; background-color: crimson;" id="btnPlaceOrder" data-prodid=""><i class="bi bi-bag-check-fill"></i> Place Order</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Check Out Modal -->

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="javascript/app.js"></script>
</body>

</html>