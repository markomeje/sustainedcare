(function ($) {

	'use strict';

    $('.no-earnings').on('click', function() {
        alert('Minimum withdrawal is NGN2,000');
        return;
    });

    $('.unpaid-withdrawal').on('click', function() {
        if (confirm('Are you sure?')) {
            var withdrawal = $('.unpaid-withdrawal');
            withdrawal.html('. . . .');
            var request = $.ajax({
                url: $(this).attr('data-url'),
                processData: false,
                contentType: false,
                dataType: 'json'
            });

            request.done(function(response){
                if (response.status === 'success') {
                    withdrawal.html('Paid');
                    window.location.reload();
                } else if (response.status === 'error') {
                    withdrawal.html('Approve');
                    alert('error');
                } else {
                    withdrawal.html('Approve');
                    alert('Network Error');
                }
            });

            request.fail(function() {
                withdrawal.html('Approve');
                alert('Network Error');
            });
        }
    });

	$('.request-cash-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.request-cash-button');
    	var spinner = $('.request-cash-spinner');
    	var message = $('.request-cash-message');
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
        	if (response.status === 'invalid-amount') {
                handleButton(button, spinner);
                handleErrors($('.amount'), $('.amount-error'), 'Please select amount.');
            } else if (response.status === 'invalid-priority') {
                handleButton(button, spinner);
                handleErrors($('.priority'), $('.priority-error'), 'Please select priority.');
            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Operation successful.').fadeIn();
                window.location.reload();
            } else if (response.status === 'invalid-request') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('Invalid cash request.').fadeIn();
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
