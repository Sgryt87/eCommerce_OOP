$(document).ready(function () {

    $("#ratingField .stars").click(function () {
        $.ajax({
            url: '../rating/rating.php',
            data: {
                points: $(this).val(),
                product_id: $('#product_id').val()
            },
            success: function (data) {
               // console.log(data);
                // $(this).attr("checked");
            },
            type: 'POST'
        });
    });
});