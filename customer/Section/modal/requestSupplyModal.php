<div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(96, 0, 0); color: #fafbfe;">
        <h5 class="modal-title">Add to Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="prod_nameText">Product:</label>
          <input disabled style="border:none;" type="text" class="form-control" id="prod_nameText" value="">
        </div>

        <div class="form-group">
          <label for="supplierDropdown">Select supplier:</label>
          <select class="form-control" id="supplierDropdown">
            <?php 
            $view_query = mysqli_query($connections, "SELECT * from supplier "); 
            while($row = mysqli_fetch_assoc($view_query)){ 
              $spl_code = $row["spl_code"];
              $spl_name = $row["spl_name"];
              $spl_email = $row["spl_email"];
              echo '<option value="'.$spl_email.'">'.$spl_name.'</option>';
            }
            ?>
          </select>
        </div>
        

         <center><label for="quantity">Quantity:</label></center>
          <div class="form-group d-flex align-items-center justify-content-center">
            <button class="btn btn-outline-secondary" type="button" onclick="decreaseValue()">-</button>
            <input class="form-control toglerQtyRequest" id="qty" type="number" style="width: 80px; text-align: center;" pattern="[0-9]+" value="1" min="1">
            <button class="btn btn-outline-secondary" type="button" onclick="increaseValue()">+</button>
        </div>


        <div class="form-group">
          <label for="supplierMessage">Messages :</label>
          <textarea class="form-control" id="supplierMessage" cols="30" rows="10"></textarea>
        </div> 
      </div>
      <div class="modal-footer justify-content-center">
        <div id="loadingSpinner"></div>
        <button type="button" class="btn btn-submit me-2" id="sendRequestTogler">Send request</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
