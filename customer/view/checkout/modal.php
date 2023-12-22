<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style src="view/checkout/css/searchSuggestion.css"></style>













<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">[Payment] Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              
                    <select id="BankEwallet" name="paymethod" class="form-control mt-2" title="Select payment option" required>
                        <option value="">Payment option</option>
                        <option <?php if($session_address_cod==0){ echo "hidden";} ?> style="display:block;" class="codAllowedStatus" value="Cash on Delivery">Cash on Delivery on </option>
                     
                        <?php
                        $view_product_query = mysqli_query($connections, "SELECT * FROM mode_of_payment where payment_status='0'");
                        while ($category_row = mysqli_fetch_assoc($view_product_query)) {
                            $payment_id  = $category_row["payment_id"];
                            $payment_name = $category_row["payment_name"];
                            $payment_number = $category_row["payment_number"];
                            $payment_image = $category_row["payment_image"];
                            $payment_status = $category_row["payment_status"];
                            ?>
                            <option <?php if($session_address_paynow==0){ echo "hidden";} ?> style="display:block;" class="paynowAllowedStatus" data-image="<?= $payment_image ?>" data-number="<?= $payment_number ?>" value="<?= $payment_name ?>"><?= $payment_name ?></option>
                        <?php }?>
                    </select>

                    <input hidden  type="text" name="ship_fee" value='<?=$address_rate ?>'>

                    <input hidden type="text"  name="orders_tax" value="<?= $db_system_tax ?>">

              
                
                    <div class="form-group mt-2 text-center" id="proofAttachment" style="display: none;">
    
                    <div id="paymentImage" class="payment-image"></div>
                    <div id="paymentNumber" class="mt-2"></div>
                    <label for="attachment">Attach Proof of Payment:</label>
                    <input type="file" name="attachment" id="paymentAttachment" class="form-control" accept="image/*">

                </div>
                
                <div id="loadingSpinner" class="text-center" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border: none;">
                <button disabled type="button" name="btnCunfirm" id="btnCunfirmOrder" class="btn btn-danger">Confirm</button>
                <button type="button" id="no" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">No</button>
            </div>
        </div>
    </div>
</div>






















<!-- Modal -->
<div class="modal fade" id="DeleteAddressModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    
                <h5 class="text-center">Delete address ?</h5>

            
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="btnDelete">Confirm</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">No</button>
                </div>
            
        </div>
    </div>
</div>






<!-- Add Address Modal 
#F5F5F5
#FEFCFF
-->



<div class="modal fade" id="addAddressMod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <!-- Contact information section -->
                    <label for="contact" class="m-3">Contact information</label>
                    <div class="form-group m-0 bg-light rounded">
                        <div class="row">
                            <div class="col-md-4">
                                <input required type="text" class="form-control" name="fullname" id="fullname" placeholder="Fullname" value="<?php echo ucfirst($fullname)?>">
                            </div>
                            <div class="col-md-4">
                                <input required type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" value="<?php echo $db_acc_contact?>">
                            </div>
                            <div class="col-md-4">
                                <input required type="text" class="form-control" name="gmail" id="gmail" placeholder="Gmail" value="<?php echo $db_acc_email?>">
                            </div>
                        </div>
                        <div id="errorDiv" style="color: red;"></div>
                    </div>

                    <!-- Address section -->
                    <label for="address" class="m-3">Barangay Address</label>
                    <div class="form-group m-0 bg-light rounded">
                        <textarea style="display:none;" disabled id="complete_address_add" cols="30" rows="10"></textarea>
                        <div class="search-container">
                            <input required type="text" class="form-control" id="searchBarangay_add" placeholder="Search brgy.." name="searchBarangay_add">
                        </div>
                        <div id="barangaySuggestions_add" class="suggestions-row ml-4"></div>
                        <input hidden type="text" id="region_add">
                        <input hidden type="text" id="province_add">
                        <input hidden type="text" id="city_add">
                        <input hidden type="text" id="brgy_add" value="">
                        <input required type="text" class="form-control" name="AddstreetDescription" id="AddstreetDescription" placeholder="Subdivision-Street-Block-Lot" name="address">
                    </div>

                    <!-- Settings section -->
                    <label for="Settings" class="m-3">Settings</label>
                    <div class="form-group bg-light rounded p-3">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="toggleSwitch2">
                            <label class="custom-control-label" for="toggleSwitch2">Set Default</label>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="container text-center">
                        <div class="row justify-content-center">
                            <div id="divConfirmSelectAddress" class="modal-footer col-md-6">
                                <button type="button" id="ConfirmSelectAddress" name="ConfirmSelectAddress" class="btn btn-danger">Add new address</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                        <div class="alert alert-danger" id="formValidationError" style="display: none;"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>











<div class="modal fade" id="editAddressMod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Address</h5>
            </div>
            <div style="background-color:#F5F5F5;">
                <form method="POST">
                    <!-- Contact information section -->
                    <label for="contact" class="m-3">Contact information</label>
                    <div class="form-group m-0">
                        <div class="bg-light rounded">
                            <div class="row">
                                <div class="col-md-4">
                                    <input required type="text" class="form-control" name="Editfullname" id="Editfullname" placeholder="Fullname" value="<?php echo ucfirst($fullname)?>">
                                </div>
                                <div class="col-md-4">
                                    <input required type="text" class="form-control" name="EditphoneNumber" id="EditphoneNumber" placeholder="Phone Number" value="<?php echo $db_acc_contact?>">
                                </div>
                                <div class="col-md-4">
                                    <input required type="text" class="form-control" name="Editgmail" id="Editgmail" placeholder="Gmail" value="<?php echo $db_acc_email?>">
                                </div>
                            </div>
                            <div id="errorDiv" style="color: red;"></div>
                        </div>
                    </div>

                    <!-- Address section -->
                    <div style="display:block;" id="selectAddressBody">
                        <label for="address" class="m-3">Address</label>
                        <div class="form-group m-0">
                            <div class="bg-light rounded">
                                <textarea disabled id="complete_address" cols="30" rows="10"><?=$user_complete_address?></textarea>

                                <div class="search-container">
                                    <input required type="text" class="form-control"  id="searchBarangay" placeholder="Search brgy.." name="address">
                                </div>

                                <!-- Suggestions container as a row -->
                                <div id="barangaySuggestions" class="suggestions-row ml-4"></div>

                                <!-- Result input fields and textarea -->
                                <input hidden type="text" id="region_code">
                                <input hidden type="text" id="province_code">
                                <input hidden type="text" id="city_code">
                                <input hidden type="text" id="brgy_code" value="<?=$address_code?>">

                                <input required type="text" class="form-control" name="streetDescription" id="EditstreetDescript" placeholder="Subdivision-Street-Block-Lot" name="address">
                                <br>
                            </div>
                        </div>
                    </div>

                    <!-- Settings section -->
                    <label for="Settings" class="m-3">Settings</label>
                    <?php if($user_add_Default_status=="0"){ 
                        echo '
                        <div class="form-group">
                            <div class="bg-light rounded p-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="EditToggleSwitch2">
                                    <label class="custom-control-label" for="EditToggleSwitch2">Set Default</label>
                                </div>
                            </div>
                        </div>
                        ';
                    } else {
                        echo '

                        <div hidden class="form-group">
                            <div class="bg-light rounded p-3">
                                <div class="custom-control custom-switch">
                                    <input checked type="checkbox" class="custom-control-input" id="EditToggleSwitch2">
                                    <label class="custom-control-label" for="EditToggleSwitch2">Set Default</label>
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-group alert alert-success">
                          

                        <font role="alert">
                            Default address
                        </font>
                        </div>
                        ';
                    }
                    ?>
                    
                    <!-- Modal footer -->
                    <div class="container text-center">
                        <div class="row justify-content-center">
                            <div id="divConfirmSelectAddress" class="modal-footer col-md-6">
                                <button type="button" id="UpdateAddressBtn" name="UpdateAddressBtn" class="btn btn-danger">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                        <div class="alert alert-danger" id="formValidationError" style="display: none;"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


