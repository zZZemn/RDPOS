
$(document).ready(function () {
  



    // Listen for the checkbox change event
    $(".check").on("change", function () {
      var checkbox = $(this);
      var acc_id = $('#acc_id').val();

      if (checkbox.is(":checked")) {
        // Checkbox is checked, show "Enable" message
        var message = "Are you sure you want to enable this product?";
      } else {
        // Checkbox is unchecked, show "Disable" message
        var message = "Are you sure you want to disable this product?";
      }

      // Traverse the DOM to find the associated acc_id
      var prod_id = checkbox.val();

      // Show the initial SweetAlert with "Yes" and "Cancel" options
      Swal.fire({
        title: "Are you sure?",
        text: message,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
        confirmButtonClass: "btn btn-primary",
        cancelButtonClass: "btn btn-danger ml-1",
        buttonsStyling: false,
      }).then(function (result) {
        if (result.value) {
          // If the user clicks "Yes," proceed with the AJAX request
          $.ajax({
            url: 'productlist/controller/changeProductStatus.php',
            type: 'POST',
            data: {
              prod_id: prod_id,
              acc_id: acc_id,
              prod_status: checkbox.is(":checked") ? 0 : 1
            },
            success: function (response) {
              // Handle the success response
              Swal.fire({
                type: "success",
                title: "Action Successful",
                text: "Product has been " + (checkbox.is(":checked") ? "enabled" : "disabled") + ".",
                confirmButtonClass: "btn btn-success"
              });

              // Log the response inside the success callback
             console.log(response);
             
            },
            error: function (xhr, status, error) {
              // Handle the error response
              Swal.fire({
                type: "error",
                title: "Error",
                text: "An error occurred while enabling/disabling the account.",
                confirmButtonClass: "btn btn-danger"
              });
            }
          });
        } else {
          // If the user clicks "Cancel," handle any necessary actions (e.g., toggle the checkbox state)
          checkbox.prop('checked', !checkbox.prop('checked'));
        }
      });
    });
  });