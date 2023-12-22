<?php
$view_id = filter_input(INPUT_GET, "view_id", FILTER_VALIDATE_INT);
?>

<div class="container mt-4" id="product-container">
    <div class="row mt-3">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <div class="product-image rounded border border-1">
                <img class="rounded" src="../upload_prodImg/" alt="Product Image">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="rounded p-3">
                <h3 class="mb-3" id="productName"></h3>
                <p class="mb-3" id="prod_code"></p>
                <hr>
                <div class="d-flex justify-content-between">
                  
                    <p id="Category" ></p>
                </div>
                <div class="d-flex justify-content-between">
                    <p id="stocks"></p>
                    <p id="stockStatus" ></p>
                </div>
                <div class="d-flex justify-content-between">
                    <p id="voucherName"></p>
                    <p id="voucherRate" ></p>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    
                </div>
                <hr>
                
                <h6 class="mb-0">₱ </h6>
                <p class="mb-0 mt-2">Description: </p>
            </div>
            <button class="w-100 btn togler mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?=$view_id?>" style="background-color: rgb(128, 0, 0); color: white;">Add to Cart <i class="fa fa-shopping-cart"></i></button>

            <button class="w-100 btn toglerBuyNow mt-3" data-bs-toggle="modal" data-bs-target="#modalBuynow" data-id="<?=$view_id?>" data-db_prod_name="" data-db_prod_currprice="" data-ssid="" style="background-color: rgb(128, 0, 0); color: white;">Buy now </button>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>

<script>
$(document).ready(function () {
    function updateProductInfo() {
        var productId = <?= $view_id ?>;

        $.ajax({
            type: "GET",
            url: "view/view/query_prod.php",
            data: { view_id: productId },
            dataType: "json",
            success: function (data) {
                updateDOM(data);
            },
            error: function (xhr, status, error) {
                console.error("Error fetching product information", xhr, status, error);
            }
        });
    }


    function number_format(number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };

    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }

    return s.join(dec);
}


    function updateDOM(data) {
        console.log(data);
        $("#productName").text(
            `${data.prod_name}
            ${data.prod_kg !== null && data.prod_kg != 0 ? `${data.prod_kg}Kg ` : ''}
            ${data.prod_ml !== null && data.prod_ml != 0 ? `${data.prod_ml}Ml ` : ''}
            ${data.prod_g !== null && data.prod_g != 0 ? `${data.prod_g}g ` : ''}`
        );

        $("#product-container img").attr("src", "../upload_prodImg/" + data.db_prod_image);
        $("#prod_code").text(data.prod_code);
        $("#Category").text("Category: " + data.category_name);
  

        $("#stocks").eq(0).html("<b>Stocks:</b> " + data.stocks);
        $("#stockStatus").html("<b>Status:</b> " + (data.stocks <= 0 ? "<b style='color:red;'>Out of stocks</b>" : "<b style='color:green;'>Available</b>"));

        if(data.stocks <= 0){
            $(".togler").prop('disabled', true);
            $(".toglerBuyNow").prop('disabled', true);
        }else{
            $(".togler").prop('disabled', false);
            $(".toglerBuyNow").prop('disabled', false);
        }
        if (data.voucher_name) {
            $("#voucherName").text("Discount: " + data.voucher_name);
            $("#voucherRate").html((data.voucherpercent) + "%");
         //   $("#voucherRate").html("<del>₱ " + number_format(data.old_product_price, 2, '.', ',') + "</del>");

        }else{
            $("#vouchername").hide()
        }

        if (data.voucher_name) {
        $("#product-container h6.mb-0").html("<del>₱ " + number_format(data.old_product_price, 2, '.', ',') + "</del> ₱ " + number_format(data.new_product_price, 2, '.', ','));
        }else{
            $("#product-container h6.mb-0").html("₱ "+number_format(data.new_product_price, 2, '.', ','));
      
        }
          $("#product-container p.mb-0.mt-2").text("Description: " + data.prod_description);

        $(".togler").data("id", data.view_id);
        $(".toglerBuyNow").data("prod_id", data.prod_id);
        $(".toglerBuyNow").data("db_prod_name", data.prod_name);
        $(".toglerBuyNow").data("db_prod_currprice", data.new_product_price);
        $(".toglerBuyNow").data("ssid", data.db_s_id);
    }

    updateProductInfo();
    setInterval(updateProductInfo, 2000);
});
</script>
