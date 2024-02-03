$(document).ready(function () {
  // Get the URL parameters
  const getUrlParameter = (name) => {
    name = name.replace(/[[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
    var results = regex.exec(location.search);
    return results === null
      ? ""
      : decodeURIComponent(results[1].replace(/\+/g, " "));
  };

  const getOrders = () => {
    var page = getUrlParameter("page");

    $.ajax({
      type: "GET",
      url: "backend/endpoints/get-orders.php",
      data: {
        page: page,
      },
      success: function (response) {
        $("#ordersContainer").html(response);
      },
    });
  };

  const getOrderStatus = () => {
    var orderId = getUrlParameter("orderId");
    $.ajax({
      type: "GET",
      url: "backend/endpoints/get-order-status.php",
      data: {
        orderId: orderId,
      },
      success: function (response) {
        $("#viewOrderStatusContainer").html(response);
      },
    });
  };

  const getChangeOrderStatusButtons = () => {
    var orderId = getUrlParameter("orderId");
    $.ajax({
      type: "GET",
      url: "backend/endpoints/get-change-order-status-buttons.php",
      data: {
        orderId: orderId,
      },
      success: function (response) {
        $("#btnChangeOrderStatusContainer").html(response);
      },
    });
  };

  const closeModal = () => {
    $(".modal").modal("hide");
  };

  const showAlert = (alertType, text) => {
    $(alertType).text(text).css("opacity", "1");
    setTimeout(() => {
      $(alertType).css("opacity", "0");
    }, 1000);
  };
  setInterval(() => {
    getOrders();
    getOrderStatus();
    getChangeOrderStatusButtons();
  }, 3000);

  $(document).on("click", ".btnUpgradeStatus", function (e) {
    e.preventDefault();
    $("#changeOrderStatusModalOrderId").val($(this).data("id"));
    $("#changeOrderStatusModal").modal("show");
  });

  $("#frmChangeOrderStatus").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "backend/endpoints/post.php",
      data: formData,
      success: function (response) {
        closeModal();
        if (response == "200") {
          showAlert(".alert-success", "Order Status Changed!");
          getOrderStatus();
          getChangeOrderStatusButtons();
        } else {
          showAlert(".alert-danger", "Something went wrong!");
          window.location.reload();
        }
      },
    });
  });

  $(document).on("click", ".btnRejectOrder", function (e) {
    e.preventDefault();
    $("#rejectOrderId").val($(this).data("id"));
    $("#rejectOrderModal").modal("show");
  });

  $("#frmRejectOrder").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "backend/endpoints/post.php",
      data: formData,
      success: function (response) {
        closeModal();
        if (response == "200") {
          showAlert(".alert-success", "Order Rejected!");
          getOrderStatus();
          getChangeOrderStatusButtons();
        } else {
          showAlert(".alert-danger", "Something went wrong!");
          window.location.reload();
        }
      },
    });
  });

  $(".btnCloseModal").click(function (e) {
    e.preventDefault();
    closeModal();
  });

  getOrders();
  getOrderStatus();
  getChangeOrderStatusButtons();
});
