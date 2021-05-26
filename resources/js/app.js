require('./bootstrap');

jQuery(function () {
    $('#product-names').on('change', function () {
        let productId = $('#product-names').val();

        let option = '<option value="" hidden>Please select tyre size</option>';
        $('#product-size').html(option);

        $.ajax({
            url: `/product-sizes/${productId}`,
            success: function (data) {
                $.each(data, function(key, obj)
                {
                    console.log(obj)
                    $('#product-size').append('<option value=' + obj.size + '>' + obj.size + '</option>');
                });
            }
        })
    });
});
