$(document).ready(function() {


//toglerDelete
$(".toglerDelete").on("click", function() {
    
    var Delacc_code =$(this).attr("data-user_acc_code");
    var DelompleteAddress =$(this).attr("data-completeAddress");
    var DelDefault_status=$(this).attr("data-user_add_Default_status");
    var Deluser_address_id=$(this).attr("data-user_address_id");

    Swal.fire({
        title: "Remove?",
        text: `${DelompleteAddress} ?`,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, remove it!",
        confirmButtonClass: "btn btn-primary",
        cancelButtonClass: "btn btn-secondary ml-1",
        buttonsStyling: false
      }).then(function(result) {
        if (result.value) {

       


            if(DelDefault_status!="1"){

                $.ajax({
                    type: "POST",
                    url: "remove_address.php",
                    data: { Delacc_code: Delacc_code,DelompleteAddress:DelompleteAddress,DelDefault_status:DelDefault_status,Deluser_address_id:Deluser_address_id }, // Sending the data as JSON string
                    
                    success: function(response) {
                    console.log("Response from PHP: " + response);
                    location.reload();
        
                    },
        
                    beforeSend: function() {
                      $("#loadingSpinner").html('<div class="spinner-border text-warning" role="status"><span class="sr-only">Loading...</span></div>').show();
                    }, 
        
                    error: function(xhr, status, error) {
                      console.error("AJAX Error: " + error);
                    },
                    complete: function() {
                      $("#loadingSpinner").hide();
                    
                    }
                  });


            }else{

                alertify.error("Default address cannot be remove");

            }
         
        }
      });
    });
});

