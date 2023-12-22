
$(document).ready(function() {

  $("#sendRequestTogler").on("click", function() {
    // Get input values
    var prod_nameinput = $("#prod_nameText").val();
    var acc_id = $("#acc_id").val();
    var selectedSupplier = $("#supplierDropdown option:selected");
    var selectedEmail = selectedSupplier.val();
    var selectedSupplierText = selectedSupplier.text();
    var message = $("#supplierMessage").val();
    var qty = $("#qty").val();

    // Create a data object to send via AJAX
    var data = {
        selectedSupplier: selectedSupplierText,
        selectedEmail: selectedEmail,
        message: message,
        prod_name: prod_nameinput, // Corrected variable name
        qty: qty,
        acc_id: acc_id
    };

    console.log(prod_nameinput);

    // Show confirmation alert
    Swal.fire({
        title: "Are you sure?",
        text: `Send request from ${selectedEmail}`,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, send it!",
        confirmButtonClass: "btn btn-primary",
        cancelButtonClass: "btn btn-secondary ml-1",
        buttonsStyling: false
    }).then(function(result) {
        if (result.value) {
            // Make an AJAX request to a PHP script
          // Disable the button before making the AJAX request
          //  $("#sendRequestTogler").prop("disabled", true);
          $("#sendRequestTogler").css("display", "none");

       
          

            $.ajax({
                type: "POST",
                url: "../../requestMailer.php",
                data: data,
                beforeSend: function() {
                  $("#loadingSpinner").html('<div class="spinner-border text-warning" role="status"><span class="sr-only">Loading...</span></div>').show();
                },
                success: function(response) {
                    // Handle the response from the PHP script here
                    console.log("Response from PHP: " + response);
                    // Disable the button after successful request
                 //   $("#sendRequestTogler").prop("disabled", true);
               

                    // Display success message
                    alertify.success("Request successfully sent to " + selectedEmail);
                 //   $("#sendRequestTogler").prop("disabled", false);
                 $("#sendRequestTogler").css("display", "block");
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + error);
                },
                complete: function() {
                    // Hide loading spinner after the request is complete (success or error)
                    $("#loadingSpinner").hide();
              
                }
            });



        }
    });
});



    $(".addStockModalTogler").on("click", function() {
      prod_name = $(this).attr('data-prod_name');
      $("#prod_nameText").val(prod_name);
  
     
  
    });
  });