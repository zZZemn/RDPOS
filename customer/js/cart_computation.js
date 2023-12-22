

function toggleCheckboxes(checkbox) {


    

    var checkboxes = document.getElementsByName('myCheckbox[]');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = checkbox.checked;
    }

    
}



function decreaseQuantity(button) {
    var quantityElement = button.nextElementSibling;
    var cartId = button.getAttribute("data-id");
    var price = button.getAttribute("data-price");
    var totalChanger = '.total' + cartId;

    var quantity = parseInt(quantityElement.value);
    var minValue = parseInt(quantityElement.min);

    if (isNaN(quantity) || quantity === null || quantity === undefined) {
        quantity = 1;
    }

    var qty = (quantity <= minValue) ? minValue : quantity - 1;
    
    var totalprice = price * qty;

    $(totalChanger).text(totalprice.toFixed(2));
    quantityElement.value = qty;

    var consoleLogContentId = 'consoleLogContent_' + cartId;
    var formattedTotal = totalprice.toLocaleString('en-PH', {
        maximumFractionDigits: 2,
        minimumFractionDigits: 2
    });

    $('#' + consoleLogContentId).text(formattedTotal);

    updateConsoleLogTotalBill(); 
}

function increaseQuantity(button) {
    var quantityElement = button.previousElementSibling;
    var cartId = button.getAttribute("data-id");
    var price = button.getAttribute("data-price");
    var totalChanger = '.total' + cartId;

    var quantity = parseInt(quantityElement.value);
    var maxValue = parseInt(quantityElement.max);

    if (isNaN(quantity) || quantity === null || quantity === undefined) {
        quantity = 1;
    }

    var qty = (quantity >= maxValue) ? maxValue : quantity + 1;
    var totalprice = price * qty;

    $(totalChanger).text(totalprice.toFixed(2));
    quantityElement.value = qty;

    var consoleLogContentId = 'consoleLogContent_' + cartId;
    var formattedTotal = totalprice.toLocaleString('en-PH', {
        maximumFractionDigits: 2,
        minimumFractionDigits: 2
    });

    $('#' + consoleLogContentId).text(formattedTotal);


    updateConsoleLogTotalBill(); 
}


function updateTotalPrice(cartId, price) {
    var inputElement = document.getElementById('inputField_' + cartId);
    var totalChanger = '.total' + cartId;

    var quantity = parseInt(inputElement.value);
    var minValue = parseInt(inputElement.min);
    var maxValue = parseInt(inputElement.max);

  

    var qty = Math.min(Math.max(quantity, minValue), maxValue);
    
    if (isNaN(quantity) || quantity === null || quantity === undefined) {
   
        var totalprice = price;
    }else{

        var totalprice = price * qty;       
    }
    console.log(qty)

    $(totalChanger).text(totalprice.toFixed(2));
    inputElement.value = qty;

    var consoleLogContentId = 'consoleLogContent_' + cartId;
    var formattedTotal = totalprice.toLocaleString('en-PH', {
        maximumFractionDigits: 2,
        minimumFractionDigits: 2
    });

    $('#' + consoleLogContentId).text(formattedTotal);

    updateConsoleLogTotalBill(); 
}

$('input[name="myCheckbox[]"]').on('change', function() {
    updateConsoleLogTotalBill(); 
});



function updateConsoleLogTotalBill() {
    var totalBill = 0;
    

    $('.qty-input').each(function () {
        var cartId = $(this).attr('data-cart-id');
        var quantity = parseInt($(this).val());
        var price = parseFloat($('[data-id="' + cartId + '"]').attr('data-price'));
        var isChecked = $(this).closest('div.product_wrapFind').find('input[name="myCheckbox[]"]').is(':checked'); 
        
  
        if (isChecked) {
            var totalprice = price * quantity;

            if (isNaN(quantity) || quantity === null || quantity === undefined) {
                totalBill += 0;
            } else {
                totalBill += totalprice;
            }
        }
    });


    $('#totalBill').text('Total Bill: ₱' + totalBill.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ','));


    
}


updateConsoleLogTotalBill();







document.getElementById('checkboxAll').addEventListener('change', function() {
    if (this.checked) {
     
        $('input[name="myCheckbox[]"]').prop('checked', true);
    } else {
    
        $('input[name="myCheckbox[]"]').prop('checked', false);
    }
    

    updateConsoleLogTotalBill();
});