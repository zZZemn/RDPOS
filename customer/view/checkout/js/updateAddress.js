$(document).ready(function () {
    // Handle click event for the Update button
    $("#UpdateAddressBtn").on("click", function () {
        // Get values from input fields
        var fullname = $("#Editfullname").val();
        var EditphoneNumber = $("#EditphoneNumber").val();
        var email = $("#Editgmail").val();
        var EditstreetDescript = $("#EditstreetDescript").val();
        var isDefault = $("#EditToggleSwitch2").prop("checked") ? 1 : 0; // 1 if checked, 0 if not
        var user_acc_code = $("#user_acc_code").val();
        var region_code = $("#region_code").val();
        var province_code = $("#province_code").val();
        var city_code = $("#city_code").val();
        var brgy_code = $("#brgy_code").val();
        var complete_address = $("#complete_address").val();
        var user_address_id = $(".user_address_id").val();

        // Validate fullname
        if (fullname === "") {
            alertify.error("Fullname is required");
            return; // Stop execution if fullname is empty
        }


         // Validate fullname
         if (EditphoneNumber === "") {
            alertify.error("Contact number is required");
            return; // Stop execution if fullname is empty
        }

          // Validate fullname
          if (email === "") {
            alertify.error("Email is required");
            return; // Stop execution if fullname is empty
        }

        

       

        // Create data object to be sent via Ajax
        var data = {
            fullname: fullname,
            EditphoneNumber: EditphoneNumber,
            email: email,
            EditstreetDescript: EditstreetDescript,
            isDefault: isDefault,
            region_code: region_code,
            province_code: province_code,
            city_code: city_code,
            brgy_code: brgy_code,
            complete_address: complete_address,
            user_address_id: user_address_id,
            user_acc_code: user_acc_code
        };

        // Perform Ajax request
        $.ajax({
            type: "POST",
            url: "update_user_address.php", // Replace with the actual PHP script URL
            data: data,
            success: function (response) {
                // Handle the response from the server
                console.log(response);

             //   if (response == "success") {
                 location.reload();
              //  }

                // You can add more logic here based on the server response
                // For example, show a success message, update the UI, etc.

                // Close the modal if needed
                $("#editAddressMod").modal("hide");
            },
            error: function (error) {
                // Handle errors
                console.error("Error:", error);
            }
        });
    });
});
