
$(document).ready(function() {
    
    

    $('.select-address').change(function() {
        var selectedAddressId = $(this).val();
        var barangaycode = $(this).find('option:selected').data("barangaycode").toString(); // Ensure it's a string
        var shipFeeInput=$("#shipFeeInput").val();

       
    
        
        var selectedRegion = addressArray.find(function(address) {
            // Convert both codes to strings for an exact comparison
            return address.address_code.toString() === barangaycode;
        });

     
  
    
        if (selectedRegion) {
            var addressRate = selectedRegion.address_rate;
            var address_status = selectedRegion.address_status;
            var address_cod = selectedRegion.address_cod;
            var address_paynow = selectedRegion.address_paynow;
        }else{
            var addressRate=0;
            var address_status=0;
            var address_cod=0;
            var address_paynow=0;
        }
           
           // console.log('Region Rate:', addressRate);
            var codAllowedStatus=$(".codAllowedStatus");
            
            var paynowAllowedStatus=$(".paynowAllowedStatus");
            
            var acc_code=$("#user_acc_code").val();
    
    
            
            if(address_status=="1"){
    
    
                if(address_cod=='0' && address_paynow=='0'){
    
                    $('#btnPlaceOrder').prop('disabled', true);
               
                    $("#shipFeeInput").val(addressRate);
                    $("#shipFeeInput").val(addressRate);
    
                 
    

    
    
                }else{
    
                    if(address_cod==0){
                    codAllowedStatus.show();
                    }else{
                        codAllowedStatus.hide();
                    }
                    if(address_paynow==0){
                        paynowAllowedStatus.show();
                        console.log(address_paynow)
                    }else{
                        console.log(address_paynow)
                        paynowAllowedStatus.hide();
                    }
    
             
                    $("#shipFeeInput").val(addressRate);
    
                    
    
                    $('#btnPlaceOrder').prop('disabled', false);
                 
                    
    
    
                }
    
                
    
            }else{
                $('#btnPlaceOrder').prop('disabled', true);
        
                $("#shipFeeInput").val(addressRate);
                $("#shipFeeInput").val(addressRate);
    
              
    
              
    
            }
          
            
    
            // Perform an AJAX request to update the user_address_status
            $.ajax({
                url: 'view/checkout/update_user_address_status.php',
                method: 'POST',
                data: { address_id: selectedAddressId, barangaycode: barangaycode, user_acc_code:acc_code },
                success: function(response) {
                  //  console.log("Update address successful")
                    console.log(response)
                    location.reload();
                },
                error: function() {
                    alert('Error occurred while updating the user address status.');
                }
            });
      
    });
    
    //$('.select-address').trigger('change');
    
    });