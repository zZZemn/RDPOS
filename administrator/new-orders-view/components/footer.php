<div class="modal" tabindex="-1" role="dialog" id="changeOrderStatusModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-arrow-repeat"></i> Change Order Status</h5>
            </div>
            <form id="frmChangeOrderStatus">
                <input type="hidden" name="requestType" value="UpgradeOrderStatus">
                <input type="hidden" name="orderId" id="changeOrderStatusModalOrderId" value="">
                <div class="modal-body">
                    <h6>Are you sure that you want to change the Order Status?</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <button type="reset" class="btn btn-secondary btnCloseModal" id="btnCloseModal" data-dismiss="modal">No</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="rejectOrderModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-x-lg"></i> Reject Order</h5>
            </div>
            <form id="frmRejectOrder">
                <input type="hidden" name="requestType" value="RejectOrder">
                <input type="hidden" name="orderId" id="rejectOrderId" value="">
                <div class="modal-body">
                    <h6>Are you sure that you want to this order?</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <button type="reset" class="btn btn-secondary btnCloseModal" id="btnCloseModal" data-dismiss="modal">No</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="javascript/app.js"></script>
</body>

</html>