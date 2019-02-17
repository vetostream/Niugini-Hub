function add_cart(id)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: 'cart/post',
        method: 'post',
        data: {
            product_id : id
        },
        success: function(result){
            update_cart();
        },
        error: function (data) {
            console.log("Error: ", data);
            console.log("Errors->", data.errors);
        }});
}

function delete_cart_item(id)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: 'cart/delete',
        method: 'post',
        data: {
            product_id : id
        },
        success: function(result){
            update_cart();
        },
        error: function (data) {
            console.log("Error: ", data);
            console.log("Errors->", data.errors);
    }});
}

function update_cart() {
    $('#cart-list').empty();
    $.ajax({
        type:'get',
        url:'cart/retrieve',
        success:function(result) {
        //document.getElementById("total_items").value=response;
           $("#cart-qty").text(result["product_count"]);
           $("#cart-summary-qty").text(result["product_count"]);
           $("#cart-subtotal").text(result["product_subtotal"]);
           $('#cart-list').append(unescape(result["product_html"]));
        },
        error: function (data) {
            console.log("Error: ", data);
            console.log("Errors->", data.errors);
        }
    });
}

$(document).ready(function(){
    update_cart();
});

