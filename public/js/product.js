function add_cart(id)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: "cart/post",
        method: 'post',
        data: {
            product_id : id
        },
        success: function(result){
            jQuery('.alert').show();
            jQuery('.alert').html(result.success);
    }});
}
