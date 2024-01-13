$(document).ready(function () {
  var isNavOpen = true;
  var search = "";
  var category = "All";

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

  //   End of functions

  //   Close Modal
  $(".btnCloseModal").click(function (e) {
    e.preventDefault();
    closeModal();
  });

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
    }
  });
  //   End of Side Bar

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

  // Function Call
  displayProduct(search, category);
  displayCartItems();
});
