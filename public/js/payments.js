(function ($) {

	'use strict';

    $('.paystack-payment').on('click', function(event){
        var request = $.ajax({
            method: 'POST',
            url: $(this).attr('data-url'),
            processData: false,
            contentType: false,
            dataType: 'json'
        });

        request.done(function(response){
            if (response.status === 'success') {
                window.location.href = response.redirect;
            }
        });

        request.fail(function() {
            alert('Network Error');
        });
    });

})(jQuery);
