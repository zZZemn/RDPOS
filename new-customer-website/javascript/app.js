$(document).ready(function () {
  var isNavOpen = false;
  var search = "";
  var category = "All";

  //   Side Bar
  $("#btnToggleSideBar").click(function (e) {
    e.preventDefault();
    if (isNavOpen) {
      $(".side-nav").css("transform", "translateX(-100%)");
    } else {
      $(".side-nav").css("transform", "translateX(0)");
    }

    isNavOpen = !isNavOpen;
  });

  $(window).resize(function () {
    var windowWidth = $(window).width();
    if (windowWidth > 800) {
      isNavOpen = true;
      $(".side-nav").css("transform", "translateX(0)");
    } else {
      isNavOpen = false;
      $(".side-nav").css("transform", "translateX(-100%)");
    }
  });
  //   End of Side Bar

  //   Functions
  const showAlert = (alertType, text) => {
    $(alertType).text(text).css("opacity", "1");
    setTimeout(() => {
      $(alertType).css("opacity", "0");
    }, 1000);
  };

  const displayProduct = (search, category) => {
    $.ajax({
      type: "GET",
      url: "backend/end-points/get-all-products.php",
      data: {
        requestType: "getAllProducts",
        search: search,
        category: category,
      },
      success: function (response) {
        $("#allProductsContainer").html(response);
      },
    });
  };

  const displayCartItems = () => {
    $.ajax({
      type: "GET",
      url: "backend/end-points/get-cart-items.php",
      data: {
        requestType: "getAllCartItems",
      },
      success: function (response) {
        $("#cartItemsContainer").html(response);
      },
    });
  };

  const closeModal = () => {
    $(".modal").modal("hide");
  };

  const getPaymentTypes = (callback) => {
    var data = [];

    $.ajax({
      type: "GET",
      url: "backend/end-points/random.php",
      data: {
        requestType: "GetPaymentTypes",
      },
      success: function (response) {
        data = JSON.parse(response);
        callback(data);
      },
    });
  };

  const previewImage = (input) => {
    var reader = new FileReader();
    var preview = $("#imagePreview");

    reader.onload = function () {
      preview.attr("src", reader.result);
      preview.show();
    };

    if (input.files && input.files[0]) {
      reader.readAsDataURL(input.files[0]);
    }
  };

  //   End of functions

  //   Close Modal
  $(".btnCloseModal").click(function (e) {
    e.preventDefault();
    closeModal();
  });

  //View Product
  $(document).on("click", ".btnViewProduct", function (e) {
    e.preventDefault();
    var productName = $(this).data("name");
    productName +=
      $(this).data("mg") > 0 ? " " + $(this).data("mg") + "mg" : "";
    productName += $(this).data("g") > 0 ? " " + $(this).data("g") + "g" : "";
    productName +=
      $(this).data("ml") > 0 ? " " + $(this).data("ml") + "ml" : "";

    var availableStock = $(this).data("stock");
    var displayStock =
      availableStock > 0
        ? availableStock + $(this).data("unittype") + " available"
        : "Out of Stock";

    if (displayStock == "Out of Stock") {
      $("#viewProductStocks").addClass("text-danger");
      $("#viewProductStocks").removeClass("text-success");
    } else {
      $("#viewProductStocks").addClass("text-success");
      $("#viewProductStocks").removeClass("text-danger");
    }

    // Displaying Product Data
    $("#viewProductName").text(productName);
    $("#viewProductPicture").attr(
      "src",
      "../upload_prodImg/" + $(this).data("image")
    );
    $("#viewProductDescription").val($(this).data("description"));
    $("#viewProductStocks").text(displayStock);
    $("#viewProductPrice").text("PHP " + $(this).data("price"));

    $("#btnViewProdAddToCart").data("prodid", $(this).data("id"));

    $("#viewProductModal").modal("show");
  });

  //   Add To Cart
  $("#btnViewProdAddToCart").click(function (e) {
    e.preventDefault();
    var productId = $(this).data("prodid");

    $.ajax({
      type: "POST",
      url: "backend/end-points/product.php",
      data: {
        requestType: "AddToCart",
        productId: productId,
      },
      success: function (response) {
        $("#viewProductModal").modal("hide");
        if (response == "400") {
          showAlert(".alert-danger", "Add To Cart Unsuccessful!");
        } else {
          showAlert(".alert-success", response);
        }
      },
    });
  });

  // Search Product
  $("#searchProduct").on("input", function (e) {
    e.preventDefault();
    search = $(this).val();

    $("#productCategory").val("All");
    displayProduct(search, category);
  });

  $("#productCategory").change(function (e) {
    e.preventDefault();
    $("#searchProduct").val("");
    search = "";
    category = $(this).val();
    displayProduct(search, category);
  });

  // Cart
  $(document).on("click", ".minusCartQty", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      type: "POST",
      url: "backend/end-points/cart.php",
      data: {
        requestType: "updateCartQtyMinus",
        id: id,
      },
      success: function (response) {
        displayCartItems();
      },
    });
  });

  $(document).on("click", ".addCartQty", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      type: "POST",
      url: "backend/end-points/cart.php",
      data: {
        requestType: "updateCartQtyAdd",
        id: id,
      },
      success: function (response) {
        displayCartItems();
      },
    });
  });

  $(document).on("blur", ".inputChangeCartItemQty", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var inputQty = $(this).val();
    inputQty = parseInt(inputQty);
    console.log(inputQty);
    if (inputQty == 0 || isNaN(inputQty) || !Number.isInteger(inputQty)) {
      inputQty = 1;
      $(this).val(inputQty);
    }

    $.ajax({
      type: "POST",
      url: "backend/end-points/cart.php",
      data: {
        requestType: "updateCartQty",
        id: id,
        inputQty: inputQty,
      },
      success: function (response) {
        displayCartItems();
      },
    });
  });

  $(document).on("click", ".btnDeleteCartItem", function (e) {
    e.preventDefault();
    var id = $(this).data("id");

    $("#deleteCartItemQDisplay").text(
      "Are you sure that you want to delete this product in your cart?"
    );
    $("#btnDeleteCartItem").data("prodid", id);
    $("#deleteCartItemModal").modal("show");
  });

  $("#deleteAllItemsInCart").click(function (e) {
    e.preventDefault();
    $("#deleteCartItemQDisplay").text(
      "Are you sure that you want to delete all products in your cart?"
    );
    $("#btnDeleteCartItem").data("prodid", "All");
    $("#deleteCartItemModal").modal("show");
  });

  $("#btnDeleteCartItem").click(function (e) {
    e.preventDefault();
    var id = $(this).data("prodid");
    if (id == "All") {
      $.ajax({
        type: "POST",
        url: "backend/end-points/cart.php",
        data: {
          requestType: "deleteAllCartItem",
        },
        success: function (response) {
          closeModal();
          if (response == "200") {
            showAlert(".alert-success", "Items Deleted!");
          } else {
            showAlert(".alert-success", "Something went wrong!");
          }
          displayCartItems();
        },
      });
    } else {
      $.ajax({
        type: "POST",
        url: "backend/end-points/cart.php",
        data: {
          requestType: "deleteCartItem",
          id: id,
        },
        success: function (response) {
          closeModal();
          if (response == "200") {
            showAlert(".alert-success", "Item Deleted!");
          } else {
            showAlert(".alert-success", "Something went wrong!");
          }
          displayCartItems();
        },
      });
    }
  });

  $(document).on("change", ".cartSelect", function (e) {
    e.preventDefault();
    var totalAmount = 0;

    $(".cartSelect:checked").each(function () {
      var amount = $(this).data("amount");

      if (!isNaN(amount)) {
        totalAmount += amount;
      }
    });

    $("#totalSelectedItems").text(totalAmount);
  });

  // Check Out
  var items = [];
  $(document).on("click", "#btnCheckOut", function (e) {
    e.preventDefault();

    var sf = $(this).data("sf");
    items = [];

    var hasInvalidQty = false;
    $(".cartSelect:checked").each(function () {
      var stock = $(this).data("stock");
      var inputQty = $(this).data("inputqty");

      data = {
        productId: $(this).data("id"),
        productImage: $(this).data("image"),
        productName: $(this).data("name"),
        productPrice: $(this).data("price"),
        productUnitType: $(this).data("unittype"),
        productAmount: $(this).data("amount"),
        productVat: $(this).data("itemvat"),
        qty: inputQty,
      };

      if (inputQty > stock) {
        hasInvalidQty = true;
      } else {
        items.push(data);
      }
    });

    if (hasInvalidQty) {
      showAlert(".alert-danger", "Please check your input quantity!");
    } else {
      if (items.length > 0) {
        var subtotal = 0;
        var vat = 0;
        var total = 0;

        $("#placeOrderItemsContainer").html("");
        items.forEach((element) => {
          var tr = $("<tr>");
          $(tr).append(
            "<td class='prod-img-td'><img src='../upload_prodImg/" +
              element.productImage +
              "'></td>"
          );
          $(tr).append("<td>" + element.productName + "</td>");
          $(tr).append(
            "<td>" +
              element.qty +
              element.productUnitType +
              " x " +
              element.productPrice +
              "</td>"
          );

          $(tr).append("<td> ₱ " + element.productAmount + "</td>");

          subtotal += element.productAmount;
          vat += element.productVat;
          $("#placeOrderItemsContainer").append(tr);
        });

        // Computation
        $("#checkOutSubtotal").text(subtotal);
        $("#checkOutVat").text(vat);

        if (sf == "Invalid") {
          $("#checkOutShipping")
            .text("Address out of coverage!")
            .addClass("text-danger");
          $("#btnPlaceOrder").prop("disabled", true);
        } else {
          $("#checkOutShipping").text("₱ " + sf);
          total += sf;
        }

        total += subtotal;
        total += vat;
        $("#checkOutTotal").text(total);

        $("#PlaceOrderModal").modal("show");
      } else {
        showAlert(".alert-danger", "Please select items.");
      }
    }
  });

  // Payment Type
  $("#checkOutPaymentTypesSelect").change(function (e) {
    e.preventDefault();
    var selectedOption = $(this).find("option:selected");
    $("#paymentTypeImgInput").val(null);
    $("#imagePreview").attr("src", "#");
    $("#imagePreview").hide();

    if ($(this).val() == "cod") {
      $("#paymentNumberContainer").text("");
      $("#paymentImgContainer").attr("src", "");
      $(".upload-payment-container").css("display", "none");
    } else {
      $("#paymentNumberContainer").text(selectedOption.data("number"));
      $("#paymentImgContainer").attr(
        "src",
        "../upload_system/" + selectedOption.data("img")
      );

      $(".upload-payment-container").css("display", "flex");
    }
  });

  $("#paymentTypeImgInput").change(function () {
    previewImage(this);
  });

  // Place Order
  $("#btnPlaceOrder").click(function (e) {
    e.preventDefault();
    var paymentType = $("#checkOutPaymentTypesSelect").val();
    if (paymentType == "cod") {
      $.ajax({
        type: "POST",
        url: "backend/end-points/place-order.php",
        data: {
          requestType: "PlaceOrder",
          paymentType: paymentType,
          items: JSON.stringify(items),
        },
        success: function (response) {
          closeModal("PlaceOrderModal");
          displayCartItems();
          if (response == "200") {
            showAlert(".alert-success", "Order Placed!");
          } else {
            showAlert(".alert-success", "Something Went Wrong!");
          }
        },
      });
    } else {
      if ($("#paymentTypeImgInput")[0].files.length === 0) {
        showAlert(".alert-danger", "Please Upload Proof of Payment!");
      } else {
        var formData = new FormData();

        var paymentTypeImgInput = $("#paymentTypeImgInput")[0].files[0];
        formData.append("requestType", "PlaceOrder");
        formData.append("paymentType", paymentType);
        formData.append("items", JSON.stringify(items));
        formData.append("proofOfPayment", paymentTypeImgInput);

        $.ajax({
          type: "POST",
          url: "backend/end-points/place-order.php",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            closeModal("PlaceOrderModal");
            displayCartItems();
            if (response == "200") {
              showAlert(".alert-success", "Order Placed!");
            } else {
              showAlert(".alert-success", "Something Went Wrong!");
            }
          },
          error: function (xhr, status, error) {
            console.error(xhr.responseText);
          },
        });
      }
    }
  });
  // End of Place Order

  // Orders.php
  $("#orderSelectPage").change(function (e) {
    e.preventDefault();
    window.location.href = "orders.php?page=" + $(this).val();
  });
  // End of Orders.php

  // Function Call
  displayProduct(search, category);
  displayCartItems();

  // Put Payment Types in Select
  getPaymentTypes((data) => {
    data.forEach((type) => {
      $("#checkOutPaymentTypesSelect").append(
        `<option value="${type.payment_id}" data-img="${type.payment_image}" data-number="${type.payment_number}">${type.payment_name}</option>`
      );
    });
  });
});
