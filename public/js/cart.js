function delete_cart_page_item(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: '/cart/delete',
        method: 'post',
        data: {
            product_id : id
        },
        success: function(result) {
            update_cart();
            $('#cart-page-row-'+id).remove();
            $('#cart-page-total').text('K ' + result["product_subtotal"]);
        },
        error: function (data) {
            console.log("Error: ", data);
            console.log("Errors->", data.errors);
    }});

}

$(".cart-page-number").change(function() {
    var product_id = $( this ).attr('product_id');
    var product_qty = $(this).val();
    var previousValue = $(this).data('prevData');
    console.log(previousValue);
    $(".cart-page-number").prop('disabled', true);
    $(".cart-page-btn").prop('disabled', true);
    //$("input").prop('disabled', false);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: '/cart/update',
        method: 'post',
        data: {
            product_id : product_id,
            product_qty : product_qty
        },
        success: function(result) {
            update_cart();
            $('#cart-page-total').text('K ' + result["product_subtotal"]);
            $('#cart-page-product-total-'+product_id).text('K ' + result["product_total"]);
            $(".cart-page-number").prop('disabled', false);
            $(".cart-page-btn").prop('disabled', false);
        },
        error: function (data) {
            console.log("Error: ", data);
            console.log("Errors->", data.errors);
            var old_val = data.responseJSON.current_qty;
            document.getElementById("cart-number-"+product_id).value = ""+old_val;
            $(".cart-page-number").prop('disabled', false);
            $(".cart-page-btn").prop('disabled', false);
    }});

  });
