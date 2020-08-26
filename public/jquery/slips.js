(function($) {

	$('.payment-slip-form').submit(function(){
        var form = $(this);
        var button = $('.payment-slip-button');
        var spinner = $('.payment-slip-spinner');
        var message = $('.payment-slip-message');
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
            } else if (response.status === 'invalid-paymentdate') {
                handleButton(button, spinner);
                handleErrors($('.paymentdate'), $('.paymentdate-error'), 'Payment date is required.');
            } else if (response.status === 'invalid-branch') {
                handleButton(button, spinner);
                handleErrors($('.branch'), $('.branch-error'), 'Bank branch is required.');
            } else if (response.status === 'invalid-amount') {
                handleButton(button, spinner);
                handleErrors($('.amount'), $('.amount-error'), 'Paid amount is required.');
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
            	alert('Network Error')
                handleButton(button, spinner);
            }
        });

        request.fail(function() {
            handleButton(button, spinner);
            alert('Network Error');
        });
    });

    $('.verify-slip').on('click', function() {
        var button = $('.verify-slip-button');
        var spinner = $('.verify-slip-spinner');
        var message = $('.verify-slip-message');
        button.attr('disabled', true);
        spinner.removeClass('d-none');
        message.hasClass('d-none') ? '' : message.fadeOut();

    	if (confirm('Are you sure?')) {
    		var request = $.ajax({
	            url: $(this).attr('data-url'),
	            processData: false,
	            contentType: false,
	            dataType: 'json'
	        });

	        request.done(function(response){
	            if (response.status === 'success') {
                    handleButton(button, spinner);
                    message.removeClass('d-none alert-danger alert-info').addClass('alert-success');
                    message.html('Operation successful.').fadeIn();
	                window.location.reload();
	            } else if (response.status === 'error') {
	                handleButton(button, spinner);
                    message.removeClass('d-none alert-success alert-info').addClass('alert-danger');
                    message.html('An error occured. Try again.').fadeIn();
                } else if (response.status === 'verified') {
                    handleButton(button, spinner);
                    message.removeClass('d-none alert-success alert-danger').addClass('alert-info');
                    message.html('This slip has been verified.').fadeIn();
	            } else {
                    handleButton(button, spinner);
	            	alert('Network Error')
	            }
	        });

	        request.fail(function() {
                handleButton(button, spinner);
	            alert('Network Error');
	        });
    	}
    });

})(jQuery);