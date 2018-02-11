$(document).ready(function () {

    $('#demo').hover(
        function () {
            $(this).toggle();


        });

    $("ul li").click(function () {
        $(this).addClass('active').siblings().removeClass('active');
        // console.log(this);
        // return false;
    });


});