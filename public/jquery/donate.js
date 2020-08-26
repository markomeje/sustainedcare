(function ($) {

	'use strict';

    $('.donate-option').on('click', function() {
        var clicked = $(this);
        var amount = clicked.attr('id');
        var donateOptions = $('.donate-option');
        $.each(donateOptions, function(key, value) {
            var element = $(value);
            if (element.attr('id') !== amount) {
                element.removeClass('bg-success');
                element.addClass('bg-dark');
                clicked.removeClass('bg-dark')
                clicked.addClass('bg-success');
                clicked.css({transition: 'all 0.4s ease-in-out'});
            }
        });
        $('.amount').val(amount == 0 ? '' : amount);
    });


    $('.donate-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.donate-button');
    	var spinner = $('.donate-spinner');
    	var message = $('.donate-message');
        button.attr('disabled', true);
        spinner.removeClass('d-none');
        message.hasClass('d-none') ? '' : message.fadeOut();

        var request = $.ajax({
            method: form.attr('method'),
            url: form.attr('data-action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json'
        });

        request.done(function(response){
            if (response === null || response === undefined) {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();
            }else if (response.status === 'invalid-amount') {
                handleButton(button, spinner);
                handleErrors($('.amount'), $('.amount-error'), 'Please enter amount.');
            }else if (response.status === 'invalid-firstname') {
                handleButton(button, spinner);
                handleErrors($('.firstname'), $('.firstname-error'), 'Firstname must be between 3 - 255 characters.');
            }else if (response.status === 'invalid-lastname') {
                handleButton(button, spinner);
                handleErrors($('.lastname'), $('.lastname-error'), 'Lastname must be between 3 - 255 characters.');
            }else if (response.status === 'invalid-email') {
                handleButton(button, spinner);
                handleErrors($('.email'), $('.email-error'), 'Invalid email format.');
            }else if (response.status === 'invalid-phone') {
                handleButton(button, spinner);
                handleErrors($('.phone'), $('.phone-error'), 'Invalid phone number.');
            } else if (response.status === 'invalid-country') {
                handleButton(button, spinner);
                handleErrors($('.country'), $('.country-error'), 'Please select country.');
            } else if (response.status === 'invalid-currency') {
                handleButton(button, spinner);
                handleErrors($('.currency'), $('.currency-error'), 'Please select currency.');
            } else if (response.status === 'invalid-comment') {
                handleButton(button, spinner);
                handleErrors($('.comment'), $('.comment-error'), 'Comment must be between 3 - 255 characters.');
            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Redirecting . . .').fadeIn();
                window.location.href = response.redirect;
            } else if (response.status === 'error') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();
            } else {
                handleButton(button, spinner);
            }
        });

        request.fail(function() {
            handleButton(button, spinner);
            alert('Network Error');
        });
    });

})(jQuery);
