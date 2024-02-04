$(function() {

    function showCart(cart) {
        $('#cart-modal .modal-cart-content').html(cart);
        $('#cart-modal').modal();
    }

    $('.add-to-cart').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('id');

        $.ajax({
            url: '../handler/cart.php',
            type: 'GET',
            data: {cart: 'add', id: id},
            dataType: 'json',
            success: function (res) {
                if (res.code == 'ok') {
                    showCart(res.answer);
                } else {
                    alert(res.answer);
                }
            },
            error: function () {
                alert('Error');
            }
        });
    });

    $('#get-cart').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            url: '../handler/cart.php',
            type: 'GET',
            data: {cart: 'show'},
            success: function (res) {
                showCart(res);
            },
            error: function () {
                alert('Error');
            }
        });
    });
});
