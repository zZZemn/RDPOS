
$(document).ready(function () {
    $("#searchInputNew").keyup(function () {//oldname "searchInput"
        var query = $(this).val();
        if (query !== "") {
            $.ajax({
                url: "controller/get_suggestions.php", // Replace with the actual PHP script to fetch suggestions
                method: "POST",
                data: { query: query },
                success: function (data) {
                    $("#suggestionsContainer").html(data);
                },
            });
        } else {
            $("#suggestionsContainer").empty();
        }
    });





    $("#searchInputNew_mobile").keyup(function () {//oldname "searchInput"
        var query = $(this).val();
        if (query !== "") {
            $.ajax({
                url: "controller/get_suggestions.php", // Replace with the actual PHP script to fetch suggestions
                method: "POST",
                data: { query: query },
                success: function (data) {
                    $("#suggestionsContainer_mobile").html(data);
                },
            });
        } else {
            $("#suggestionsContainer_mobile").empty();
        }
    });
});