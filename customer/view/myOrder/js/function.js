

$(document).ready(function() {

	$('.toglertrash').click(function() {
    var value2 = $(this).attr('data-value2'); 
    var orders_id_remove = $(this).attr('data-orders_id'); // Corrected attribute name
    
    $('#orders_id_remove').val(orders_id_remove);
    $('#value2').val(value2);

    console.log(orders_id_remove);

    var orders_status_rem = $(this).attr('data-orders_status'); 
    $('#orders_status_rem').val(orders_status_rem);

    // console.log(orders_status_rem)
});

	//orders_status



  var orderTransactionCode; 


  /*
  $('.zz').click(function() {

    
    var orderId = $(this).val();

    orders_status = $(this).attr('data-orders_status'); 
    $('.orders_status').val(orders_status);

	
    orderTransactionCode = $(this).attr('data-value2'); 
    $('.orders_id').val(orderId);
   
    $('.order_transaction_code').text(orderTransactionCode);

    if(orders_status=="Decline" ||orders_status== "Cancelled"){
      $('#warning').text("Remove order from the display ?");

      console.log("Remove order from the display ?")
    }else{
      $('#warning').text("Are you sure you want to cancel your order? ?");
    
    }
    console.log(orderId)
  });
  */




  



  
  $('.cancelBtn').click(function() {
    var orderId = $('.orders_id').val();
    var status = $('#status').val();
    var transaction_code = $('.toglerBtnCancel').attr('data-value2');

    $.ajax({
      url: 'back_myOrders.php',
      type: 'POST',
      data: { orders_id: orderId,orders_status:orders_status, status: status, btncancel: true, transaction_code: transaction_code },
      success: function(response) {

        
		console.log(response)
        $('.exampleModal').modal('hide');
        // Refresh the page
      location.reload();

       //console.log(orders_status); // Use the orderTransactionCode variable here
      },
      error: function(xhr, status, error) {
        alert('Failed to cancel the order.');
      }
    });
  });
  
});



function myFunction(order_transaction_code) {
    window.location.href = "order_progress.php?transaction_code=" + order_transaction_code;
  }