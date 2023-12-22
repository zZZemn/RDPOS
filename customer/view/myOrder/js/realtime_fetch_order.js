function view_product(id) {
  
    window.location.href = "view_product.php?view_id=" + id;
  
  }


  function contactAdministrator() {
  
    window.location.href = "chat.php";
  
  }
  







    function fetchData() {
        
     
        $.ajax({
            url: "view/myOrder/endpoint/fetch_orders.php", 
            method: "GET",
            dataType: "json", 
            success: function (data) {
                updateDOM(data);
            },
            
            
            error: function (xhr, status, error) {
                console.error("Error fetching data:", status, error);
                
            }
        });
    }
    
    

    function updateDOM(data) {
        
        // Assuming your data is an array of orders
        const containerAll = $("#all-content");
        const containerToPay = $("#topay-content");
        const containerToShip = $("#toship-content");
        const containerToReceived = $("#toreceived-content");
        const containerToComplete = $("#completed-content");
        const containerToCancel = $("#canceled-content");
        

        //toreceived-content
        containerAll.empty(); // Clear existing content
        containerToPay.empty(); // Clear existing content for To Pay tab
        containerToShip.empty();
        containerToReceived.empty();
        containerToComplete.empty();
        containerToCancel.empty();
        
       
     
        data.forEach((order) => {
    //.attr("onclick", `view_product(${order.orders_prod_id})`)

  
  //  console.log(order)
  //  .attr("onclick", `view_product(${order.orders_prod_id})`)

    const card = $("<div>")

    .addClass("container-fluid")
    .append(
        $("<div>").addClass("card mb-3").append(
            $("<div>").addClass("card-body").append(
                $("<div>").addClass("row").append(
                    $("<div>").addClass("col text-end").append(
                        $("<p>")
                            .addClass(order.orders_status === "Completed" ? "text-success" : "text-danger")
                            .text(order.orders_status)
                    )
                ).append($("<hr>"))
            ).append(
                $("<div>").attr("onclick", `view_product(${order.orders_prod_id})`).addClass("row").append(
                    $("<div>").addClass("col-12 col-md-2").append(
                        $("<div>").addClass("border d-flex justify-content-center").append(
                            $("<img>").attr("src", "../upload_prodImg/" + order.prod_image).attr("alt", order.prod_name).css({ "width": "75px", "height": "75px" })
                        )
                    )
                ).append(
                    $("<div>").addClass("col-12 col-md-8 overflow-auto").append(
                        $("<p>").addClass("text-black").text(order.prod_name),
                        $("<p>").addClass("text-black").text("Details: " + order.prod_description),
                        $("<p>").addClass("text-black").text("₱" + order.prod_currprice + " x " + order.orders_qty)
                    )
                ).append(
                    $("<div>").addClass("col-12 col-md")
                )
            ).append($("<hr>")).append(


                $("<div>").addClass("row").append(
                    $("<div>").addClass("col").append(
                        $("<div>").addClass("d-flex justify-content-end").append(
                            (order.orders_status === "Pending") ?
                                [
                                    $("<button>").addClass("btn btn-danger btn-sm toglerBtnCancel")
                                        .attr("value", order.orders_prod_id)
                                        .attr("data-value2", order.order_transaction_code)
                                        .attr("data-orders_status", order.orders_status)
                                        .attr("data-bs-toggle", "modal")
                                        .attr("data-bs-target", ".exampleModal")
                                        .text("Cancel order").click(function (event) {
                                            event.stopPropagation(); // Stop the event propagation
                                            // Add your cancel order logic here
                                        }),
                                    "&nbsp;", // Add a space between buttons
                                ]
                                :
                                [
                                    (order.orders_status === "Canceled") ?
                                        $("<button>").addClass("btn btn-danger btn-sm toglerBtnCancel")
                                            .attr("value", order.orders_prod_id)
                                            .attr("data-value2", order.order_transaction_code)
                                            .attr("data-orders_status", order.orders_status)
                                            .attr("data-bs-toggle", "modal")
                                            .attr("data-bs-target", ".exampleModal")
                                            .text("Remove").click(function (event) {
                                                event.stopPropagation(); // Stop the event propagation
                                                // Add your remove order logic here
                                            })
                                        : null, // Use null if no button is needed
                                    "&nbsp;", // Add a space between buttons
                                ],
                                [
                                    (order.orders_status === "Completed") ?
                                        $("<button>").addClass("btn btn-danger btn-sm toglerBtnCancel")
                                            .attr("value", order.orders_prod_id)
                                            .attr("data-value2", order.order_transaction_code)
                                            .attr("data-orders_status", order.orders_status)
                                            .attr("data-bs-toggle", "modal")
                                            .attr("data-bs-target", "#modTrash")
                                            .text("Archive").click(function (event) {
                                                event.stopPropagation(); // Stop the event propagation
                                                // Add your remove order logic here
                                            })
                                        : null, // Use null if no button is needed
                                    "&nbsp;", // Add a space between buttons
                                ],
                                
                            $("<button>").attr("onclick", `contactAdministrator()`).addClass("btn btn-outline-secondary btn-sm").text("Contact Administrator").click(function (event) {
                                event.stopPropagation(); // Stop the event propagation
                                // Add your contact administrator logic here
                            })
                        )
                    )
                )
                
                



            ).append($("<hr>")).append(
                $("<div>").addClass("d-flex justify-content-end").text("Order Total: ₱" + order.subtotal)
            )
        )
    );



            
    
            containerAll.append(card);

             // Display only orders with status "Pending" in the "To Pay" tab
            if (order.orders_status === "Pending") {
                containerToPay.append(card.clone());
            }
            if (order.orders_status === "To-ship") {
                containerToShip.append(card.clone());
            }
            if (order.orders_status === "To-receive") {
                containerToReceived.append(card.clone());
            }
            if (order.orders_status === "Completed") {
                containerToComplete.append(card.clone());
            }
            if (order.orders_status === "Canceled") {
                containerToCancel.append(card.clone());
            }

            
            $('.toglerBtnCancel').click(function() {

                 // Retrieve the value2 from the .zz button

                console.log(value2);

                var orderId = $(this).val();

                orders_status = $(this).attr('data-orders_status'); 
                $('.orders_status').val(orders_status);

                
                orderTransactionCode = $(this).attr('data-value2'); 
                $('.orders_id').val(orderId);
            
                $('.order_transaction_code').text(orderTransactionCode);
                $('.order_transaction_code').val(orderTransactionCode);

                if(orders_status=="Decline" ||orders_status== "Canceled"){
                $('#warning').text("Remove order from the display ?");

                }else{

                $('#warning').text("Are you sure you want to cancel ?");
                
                }

            
              });
            

        });
    }
    
    
    // Fetch data initially when the page loads
    fetchData();
    
    // Set up an interval to fetch data every 5 seconds (adjust the interval as needed)
    setInterval(fetchData, 2000);