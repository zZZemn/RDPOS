
   


$(document).ready(function() {

    
        $('#checkboxAll').change(function() {

            
            var checkboxes = $('input[name="myCheckbox[]"]');
            var selectAllCheckbox = $(this);
            var isChecked = selectAllCheckbox.prop('checked');

            checkboxes.each(function() {
                var checkbox = $(this);
                var isAvailable = checkbox.data('available');
                
                if (isAvailable) {
                    checkbox.prop('checked', isChecked);
                }
            });

            updateCheckoutButtonState(checkboxes);
            
        });

        $('input[name="myCheckbox[]"]').change(function() {
            var checkboxes = $('input[name="myCheckbox[]"]');
            updateCheckoutButtonState(checkboxes);
        });

   function updateCheckoutButtonState(checkboxes) {
    var checkoutButton = $('#checkoutButton');
    var checkDeliveryOrPick =$("#checkDeliveryOrPick");
    var checkedCount = checkboxes.filter(':checked').length;
    var totalCheckboxes = checkboxes.length;

    $('#checkboxAll').prop('checked', checkedCount === totalCheckboxes);

    var isAtLeastOneAvailableUnchecked = false; // Magiging true kung may hindi nau-check na available checkbox

    checkboxes.each(function() {
        var checkbox = $(this);
        var isAvailable = checkbox.data('available');
        
        if (isAvailable && !checkbox.prop('checked')) {
            isAtLeastOneAvailableUnchecked = true;
            return false; // Tumigil sa pag-check ng iba pang checkboxes
        }
    });

    if (checkedCount > 0 && !isAtLeastOneAvailableUnchecked) {
        
        checkoutButton.prop('disabled', false);
        checkDeliveryOrPick.prop('disabled', false);

    } else {
        checkoutButton.prop('disabled', true);
        checkDeliveryOrPick.prop('disabled', true);
        
    }
}


//start code para sa checkbox na walang checked na hindi isasama sa array
$('#checkoutButton').click(function() {
    var checkedCheckboxes = $('input[name="myCheckbox[]"]:checked');
    
    // Create arrays to store cart_id and qty data
    var cartIds = [];
    var quantities = [];

    checkedCheckboxes.each(function() {
        var checkbox = $(this);
        var cartId = checkbox.closest('.product_wrapFind').find('.cart-id').val();
        var quantity = checkbox.closest('.product_wrapFind').find('.qty-input').val();

        // Push cart_id and qty data to the arrays
        cartIds.push(cartId);
        quantities.push(quantity);
    });

    // Add hidden input fields to the form and set their values
    var form = $('#checkoutForm');
    form.empty(); // Clear any previous hidden input fields

    // Add hidden input fields for cart_id and qty
    for (var i = 0; i < cartIds.length; i++) {
        form.append('<input type="hidden" name="cart_id[]" value="' + cartIds[i] + '">');
        form.append('<input type="hidden" name="qty[]" value="' + quantities[i] + '">');
    }

    // Submit the form
    form.submit();
});
//end code para sa checkbox na walang checked na hindi isasama sa array
   

    });

    //checkDeliveryOrPick
    $("#checkDeliveryOrPick").prop("disabled",false)
    $("#checkoutButton").prop("disabled",false)







    