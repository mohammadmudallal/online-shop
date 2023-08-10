$(document).ready(function () {

    $(document).on('click', '.increment-btn', function () {


        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            // $('.input-qty').val(value);
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });


    $(document).on('click', '.decrement-btn', function () {


        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            // $('.input-qty').val(value);
            $(this).closest('.product_data').find('.input-qty').val(value);
        }

        // e.preventDefault();

        // qty = $(this).closest('.product_data').find('.input-qty').val();

        // value = parseInt(qty, 10);
        // value = isNaN(value) ? 0 : value;
        
        // if (value > 1) {
        //     value--;
        //     $(this).closest('.product_data').find('.input-qty').val(value);
        // }
        // console.log(value);
    });



    $(document).on('click', '.addToCartBtn', function () {
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();
        var productQtyFetched = $(this).closest('.product_data').find('.product_qty').val();

        // console.log(qty);
        // console.log(prod_id);

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                //"scope": "add"
            },
            success: function (response) {
                // console.log(response);
                if (response == 201) {
                    alertify.success("Product added to cart");
                } else if (response == "existing") {
                    alertify.success("Product already in cart");
                } else if (response == 401) {
                    alertify.success("Login to continue");
                } else if (response == productQtyFetched) {
                    productQtyFetched == 1 ? alertify.success("Only " + productQtyFetched + " of this item is available at this time")
                        : alertify.success("Only " + productQtyFetched + " of this item are available at this time");
                }


            }
        });

    });

    $(document).on('click', '.update', function () {
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();
        var prod_id = $(this).closest('.product_data').find('.prodId').val();

        $.ajax({
            method: "POST",
            url: "functions/handlecartupdate.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
            },
            success: function (response) {
            }
        });
    });

    $(document).on('click', '.deleteItem', function () {
        var cart_id = $(this).val();
        $.ajax({
            method: "POST",
            url: "functions/handlecartdelete.php",
            data: {
                "cart_id": cart_id,
            },
            success: function (response) {
                if (response == 200) {
                    alertify.success("Product removed successfully");
                    $('#mycart').load(location.href + " #mycart");
                } else if (response == 500) {
                    alertify.success("Something went wrong");
                }
            }
        });
    });

    $(document).on('click', '.removeWishlist', function () {
        var wishId = $(this).val();
        console.log(wishId);
        $.ajax({
            type: "POST",
            url: "deletewishlist.php",
            data: {
                "wish_id": wishId,
            },
            success: function (response) {
                console.log(response);
                if (response == 200) {

                    alertify.success("Product removed successfully");
                    $('#mycart').load(location.href + " #mycart");
                } else if (response == 500) {
                    alertify.success("Something went wrong");
                }
            }
        });
    });

});


