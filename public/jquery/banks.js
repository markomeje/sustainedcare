(function($) {

    'use strict';

	$('.add-bank-details-form').submit(function(){
        var form = $(this);
        var button = $('.add-bank-details-button');
        var spinner = $('.add-bank-details-spinner');
        var message = $('.add-bank-details-message');
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
            if (response.status === 'invalid-bankname') {
                handleButton(button, spinner);
                handleErrors($('.bankname'), $('.bankname-error'), 'Please select your bank.');
            }else if (response.status === 'invalid-accountname') {
                handleButton(button, spinner);
                handleErrors($('.accountname'), $('.accountname-error'), 'Please enter account name.');
            } else if (response.status === 'invalid-accountnumber') {
                handleButton(button, spinner);
                handleErrors($('.accountnumber'), $('.accountnumber-error'), 'Please enter account number');
            } else if (response.status === 'invalid-accounttype') {
                handleButton(button, spinner);
                handleErrors($('.accounttype'), $('.accounttype-error'), 'Account type is required.');
            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Operation successful.').fadeIn();
                window.location.reload();
            } else if (response.status === 'error') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();
            } else {
            	alert('Network Error');
                handleButton(button, spinner);
            }
        });

        request.fail(function() {
            handleButton(button, spinner);
            alert('Network Error');
        });
    });

    $('.edit-bank-details-form').submit(function(){
        var form = $(this);
        var button = $('.edit-bank-details-button');
        var spinner = $('.edit-bank-details-spinner');
        var message = $('.edit-bank-details-message');
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
            if (response.status === 'invalid-bankname') {
                handleButton(button, spinner);
                handleErrors($('.bankname'), $('.bankname-error'), 'Please select your bank.');
            }else if (response.status === 'invalid-accountname') {
                handleButton(button, spinner);
                handleErrors($('.accountname'), $('.accountname-error'), 'Please enter account name.');
            } else if (response.status === 'invalid-accountnumber') {
                handleButton(button, spinner);
                handleErrors($('.accountnumber'), $('.accountnumber-error'), 'Please enter account number');
            } else if (response.status === 'invalid-accounttype') {
                handleButton(button, spinner);
                handleErrors($('.accounttype'), $('.accounttype-error'), 'Account type is required.');
            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Operation successful.').fadeIn();
                window.location.reload();
            } else if (response.status === 'error') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();
            } else {
                alert('Network Error');
                handleButton(button, spinner);
            }
        });

        request.fail(function() {
            handleButton(button, spinner);
            alert('Network Error');
        });
    });

})(jQuery);