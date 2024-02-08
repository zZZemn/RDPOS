$(document).ready(function () {
  //   Functions
  const showAlert = (alertType, text) => {
    $(alertType).text(text).css("opacity", "1");
    setTimeout(() => {
      $(alertType).css("opacity", "0");
    }, 1000);
  };

  const getUrlParameter = (name) => {
    name = name.replace(/[[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
    var results = regex.exec(location.search);
    return results === null
      ? ""
      : decodeURIComponent(results[1].replace(/\+/g, " "));
  };

  const displayOrders = () => {
    $.ajax({
      type: "GET",
      url: "backend/endpoints/get-orders.php",
      data: {
        page: getUrlParameter("page"),
      },
      success: function (response) {
        $("#OrdersContainer").html(response);
      },
    });
  };

  setInterval(() => {
    displayOrders();
  }, 3000);

  displayOrders();
});
