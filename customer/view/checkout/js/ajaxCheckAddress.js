$(document).ready(function () {
    function checkAddress() {
        $.ajax({
            type: "POST",
            url: "check_address.php",
            success: function (response) {
                console.log(response);

                if (response == '1') {
                    // Place Order is available
                    $("#result-container").html('<button type="button" class="btn btn-dark placeOrder" data-bs-toggle="modal" data-bs-target="#exampleModal">Place Order</button>');
                } else if (response == '0') {
                    // Cannot deliver in this barangay
                    $("#result-container").html('<div class="container"><div class="row justify-content-center"><div style="width:300px;"><div class="alert alert-danger error">I\'m sorry; we are not able to deliver in this barangay.<br>Please contact administrators for more information<br><a href="chat.php">Contact administrator</a></div></div></div></div>');
                } else {
                    // Other error
                    $("#result-container").html('<div class="container"><div class="row justify-content-center"><div style="width:300px;"><div class="alert alert-danger error">I\'m sorry; we are not able to deliver in this barangay.<br>Please contact administrators for more information<br><a href="chat.php">Contact administrator</a></div></div></div></div>');
            }
            },
            error: function () {
                // Handle error
                $("#result-container").html('<div class="container"><div class="row justify-content-center"><div style="width:300px;"><div class="alert alert-danger error">An error occurred. Please try again later.</div></div></div></div>');
            }
        });
    }
    checkAddress();
    setInterval(checkAddress, 2000);
});



