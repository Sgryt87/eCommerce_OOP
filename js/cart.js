function addToCart(id) {

    $.ajax({
        url: '../cart/add.php',
        data: {
            id: id
        },
        success: function (data) {
            if (data == 0) {
                $('#' + id + '-quantity').parent.empty();
            } else {
                $('#' + id + '-quantity').html(data);
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
            if (data == 0) {
                console.log($('#tr-' + id));
                $('#tr-' + id).empty();
            } else {
                $('#' + id + '-quantity').html(data);
                console.log($('#tr-' + id));
            }
        },
        type: 'POST'
    });
}
