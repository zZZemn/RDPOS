$(document).ready(function () {
  var isNavOpen = true;
  var search = $("#searchProduct").val();
  var category = $("#productCategory").val();

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
        console.log(response);
      },
    });
  };

  //   End of functions

  //   Close Modal
  $(".btnCloseModal").click(function (e) {
    e.preventDefault();
    $(".modal").modal("hide");
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

  // Function Call
  displayProduct(search, category);
});
