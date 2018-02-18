function addToCart(id) {

    $.ajax({
        url: '../cart/add.php',
        data: {
            id: id
        },
        success: function (data) {
            console.log(data);
            var data = JSON.parse(data);
            $('#cartTopNav').text(data.total_amount);
            if (data.cart_amount >= data.db_amount) {
                $('#cart_add_btn-' + data.id).prop('disabled', true);
            } else {
                $('#quantity-' + data.id).html(data.cart_amount);
            }
        },
        type: 'POST'
    });
}


function removeFromCart(id) {

    $.ajax({
        url: '../cart/remove.php',
        data: {
            id: id
        },
        success: function (data) {
            console.log(data);
            var data = JSON.parse(data);
            $('#cartTopNav').text(data.total_amount);
            if (data.cart_amount == 0) {
                $('#tr-' + data.id).empty();
            } else {
                $('#cart_add_btn-' + data.id).prop('disabled', false);
                $('#quantity-' + data.id).html(data.cart_amount);
            }
        },
        type: 'POST'
    });
}
