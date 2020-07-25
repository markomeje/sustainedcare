(function($) {

    'use strict';

    $('.apply-form').submit(function(event) {
        var form = $(this);
        var button = $('.apply-button');
        var spinner = $('.apply-spinner');
        var message = $('.apply-message');
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

        request.done(function(response) {
            if (response.status === 'invalid-firstname') {
                handleButton(button, spinner);
                handleErrors($('.firstname'), $('.firstname-error'), 'Firstname must be between 3 - 55 characters.');
            } else if (response.status === 'invalid-surname') {
                handleButton(button, spinner);
                handleErrors($('.surname'), $('.surname-error'), 'Surname must be between 3 - 55 characters.');
            } else if (response.status === 'invalid-middlename') {
                handleButton(button, spinner);
                handleErrors($('.middlename'), $('.middlename-error'), 'Middlename must be between 3 - 55 characters.');
            } else if (response.status === 'invalid-phone') {
                handleButton(button, spinner);
                handleErrors($('.phone'), $('.phone-error'), 'Phone number must be 11 characters.');
            } else if (response.status === 'invalid-email') {
                handleButton(button, spinner);
                handleErrors($('.email'), $('.email-error'), 'Invalid email format.');
            } else if (response.status === 'email-exist') {
                handleButton(button, spinner);
                handleErrors($('.email'), $('.email-error'), 'Email is already in use.');
            } else if (response.status === 'invalid-code') {
                handleButton(button, spinner);
                handleErrors($('.referrer'), $('.referrer-error'), 'Leave box empty or enter a valid code.');
            } else if (response.status === 'invalid-password') {
                handleButton(button, spinner);
                handleErrors($('.password'), $('.password-error'), 'Password must be between 6 - 15 characters.');
            } else if (response.status === 'invalid-confirm-password') {
                handleButton(button, spinner);
                handleErrors($('.confirm-password'), $('.confirm-password-error'), 'Passwords do not match.');
            } else if (response.status === 'invalid-birthdate') {
                handleButton(button, spinner);
                handleErrors($('.birthdate'), $('.birthdate-error'), 'Invalid birthdate.');
            } else if (response.status === 'invalid-age') {
                handleButton(button, spinner);
                handleErrors($('.birthdate'), $('.birthdate-error'), 'Only ages between 18 - 55 are allowed.');
            } else if (response.status === 'invalid-address') {
                handleButton(button, spinner);
                handleErrors($('.address'), $('.address-error'), 'Address must be between 5 - 55 characters.');
            } else if (response.status === 'invalid-amount') {
                handleButton(button, spinner);
                handleErrors($('.amount'), $('.amount-error'), 'Invalid amount selected.');
            } else if (response.status === 'invalid-state') {
                handleButton(button, spinner);
                handleErrors($('.state'), $('.state-error'), 'Invalid state selected.');
            } else if (response.status === 'invalid-gender') {
                handleButton(button, spinner);
                handleErrors($('.gender'), $('.gender-error'), 'Invalid gender selected.');
            } else if (response.status === 'invalid-relationship') {
                handleButton(button, spinner);
                handleErrors($('.relationship'), $('.relationship-error'), 'Invalid referrer selected.');
            } else if (response.status === 'invalid-why') {
                handleButton(button, spinner);
                handleErrors($('.why'), $('.why-error'), 'Answer must be between 25 - 255 characters');
            } else if (response.status === 'invalid-how') {
                handleButton(button, spinner);
                handleErrors($('.how'), $('.how-error'), 'Answer must be between 25 - 255 characters');
            } else if (response.status === 'invalid-agree') {
                handleButton(button, spinner);
                handleErrors($('.agree'), $('.agree-error'), 'You must agree to our terms and conditions');
            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('alert-danger d-none').addClass('alert-success');
                message.html('Operation Successfull').fadeIn();
                window.location.href = response.redirect;
            } else if (response.status === 'error') {
                handleButton(button, spinner);
                message.removeClass('alert-success d-none').addClass('alert-danger');
                message.html('An error ocurred. Try again').fadeIn();
            } else {
                handleButton(button, spinner);
            }
        });

        request.fail(function() {
            handleButton(button, spinner);
            alert('Network Error');
        });

    });


    $('.edit-form').submit(function(event) {
        var form = $(this);
        var button = $('.edit-button');
        var spinner = $('.edit-spinner');
        var message = $('.edit-message');
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

        request.done(function(response) {
            if (response.status === 'invalid-firstname') {
                handleButton(button, spinner);
                handleErrors($('.firstname'), $('.firstname-error'), 'Firstname must be between 3 - 55 characters.');
            } else if (response.status === 'invalid-surname') {
                handleButton(button, spinner);
                handleErrors($('.surname'), $('.surname-error'), 'Surname must be between 3 - 55 characters.');
            } else if (response.status === 'invalid-middlename') {
                handleButton(button, spinner);
                handleErrors($('.middlename'), $('.middlename-error'), 'Middlename must be between 3 - 55 characters.');
            } else if (response.status === 'invalid-phone') {
                handleButton(button, spinner);
                handleErrors($('.phone'), $('.phone-error'), 'Phone number must be 11 characters.');
            } else if (response.status === 'invalid-email') {
                handleButton(button, spinner);
                handleErrors($('.email'), $('.email-error'), 'Invalid email format.');
            } else if (response.status === 'email-exist') {
                handleButton(button, spinner);
                handleErrors($('.email'), $('.email-error'), 'Email is already in use.');
            } else if (response.status === 'invalid-password') {
                handleButton(button, spinner);
                handleErrors($('.password'), $('.password-error'), 'Password must be between 6 - 15 characters.');
            } else if (response.status === 'invalid-confirm-password') {
                handleButton(button, spinner);
                handleErrors($('.confirm-password'), $('.confirm-password-error'), 'Passwords do not match.');
            } else if (response.status === 'invalid-birthdate') {
                handleButton(button, spinner);
                handleErrors($('.birthdate'), $('.birthdate-error'), 'Invalid birthdate.');
            } else if (response.status === 'invalid-age') {
                handleButton(button, spinner);
                handleErrors($('.birthdate'), $('.birthdate-error'), 'Only ages between 18 - 55 are allowed.');
            } else if (response.status === 'invalid-address') {
                handleButton(button, spinner);
                handleErrors($('.address'), $('.address-error'), 'Address must be between 5 - 55 characters.');
            } else if (response.status === 'invalid-amount') {
                handleButton(button, spinner);
                handleErrors($('.amount'), $('.amount-error'), 'Invalid amount selected.');
            } else if (response.status === 'invalid-state') {
                handleButton(button, spinner);
                handleErrors($('.state'), $('.state-error'), 'Invalid state selected.');
            } else if (response.status === 'invalid-gender') {
                handleButton(button, spinner);
                handleErrors($('.gender'), $('.gender-error'), 'Invalid gender selected.');
            } else if (response.status === 'invalid-relationship') {
                handleButton(button, spinner);
                handleErrors($('.relationship'), $('.relationship-error'), 'Invalid referrer selected.');
            } else if (response.status === 'invalid-why') {
                handleButton(button, spinner);
                handleErrors($('.why'), $('.why-error'), 'Answer must be between 25 - 255 characters');
            } else if (response.status === 'invalid-how') {
                handleButton(button, spinner);
                handleErrors($('.how'), $('.how-error'), 'Answer must be between 25 - 255 characters');
            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('alert-danger d-none').addClass('alert-success');
                message.html('Operation Successfull').fadeIn();
                // window.location.reload();
            } else if (response.status === 'none') {
                handleButton(button, spinner);
                message.removeClass('alert-danger alert-success d-none').addClass('alert-warning');
                message.html('No changes made').fadeIn();
            } else if (response.status === 'error') {
                handleButton(button, spinner);
                message.removeClass('alert-success d-none').addClass('alert-danger');
                message.html('An error ocurred. Try again').fadeIn();
            } else {
                handleButton(button, spinner);
            }
        });

        request.fail(function() {
            handleButton(button, spinner);
            alert('Network Error');
        });

    });

    // $('.delete-patient').on('click', function() {
    //     var caller = $(this);
    //     var id = caller.attr('id');
    //     var confirm = caller.confirm({
    //         text: "Are You Sure To Delete?",
    //         confirm: function(button) {

    //             var request = $.ajax({
    //                 method: 'POST',
    //                 url: 'patients/deleteById/'+id,
    //                 processData: false,
    //                 contentType: false
    //             });

    //             request.done(function(response) {
    //                 if (response.status === "success") {
    //                     window.location.reload();

    //                 } else if (response.status === "error") {
    //                     alert('An error ocurred. Try again');
    //                 }
    //             });

    //             request.fail(function() {
    //                 alert('Network Error');
    //             });
    //         },
    //         cancel: function(button) {},
    //         confirmButton: "Yes",
    //         cancelButton: "No",
    //         post: true,
    //         confirmButtonClass: "btn-danger",
    //         cancelButtonClass: "btn-success",
    //         dialogClass: "modal-dialog modal-sm modal-dialog-centered"
    //     });
    // });

    // $('.delete-all-patients').on('click', function() {
    //     var caller = $(this);
    //     var confirm = caller.confirm({
    //         text: "Are You Sure To Delete All?",
    //         confirm: function(button) {
    //             $.post(+ "/patients/deleteAll", function(response) {
    //                 console.log(response);
    //                 if (response.status === "success") {
    //                     window.location.reload();

    //                 } else if (response.status === "error") {
    //                     caller.addClass('bg-danger');
    //                     setTimeout(function() {
    //                         caller.removeClass('bg-danger').css({ 'transition': '2s' });
    //                     }, 2000);

    //                 }
    //             });
    //         },

    //         cancel: function(button) {},
    //         confirmButton: "Yes",
    //         cancelButton: "No",
    //         post: true,
    //         confirmButtonClass: "btn-danger",
    //         cancelButtonClass: "btn-success",
    //         dialogClass: "modal-dialog modal-sm modal-dialog-centered"
    //     });
    // });
    
    // $(window).on('load', function() {
    //     var loader = $('.seen-chart-loader');
    //     loader.html('Loading . . .').fadeIn();
    //     var request = $.ajax({
    //         method: "GET",
    //         url: 'patients/patientSeen',
    //         processData: false,
    //         contentType: false
    //     });

    //     request.done(function(response) {
    //         loader.fadeOut();
    //         //patientsMonthlyChart(response);

    //     });

    //     request.fail(function() {
    //         alert('Network Error');
    //     });
    // });


})(jQuery);


// function patientsMonthlyChart(response) {
//     var screen = ($(window).width());
//     var single = [];
//     for (var i = 0; i < response.months.length; i++) {
//         var first = response.months[i].charAt(0);
//         var third = response.months[i].charAt(2);
//         single.push(first+third);
//     }
//     var ctx = ('#patients-monthly-chart');
//     var ctx = 'patients-monthly-chart';
//     var patientSeen = new Chart(ctx, {
//         type: 'bar',
//         data: {
//             labels: (screen > 767.98) ? response.months : single,
//             datasets: [{
//                 label: 'Total Patients Seen',
//                 data: response.count,
//                 backgroundColor: [
//                     'rgb(255, 128, 102, 1)',
//                     'rgb(255, 128, 102, 1)',
//                     'rgb(255, 128, 102, 1)',
//                     'rgb(255, 128, 102, 1)',
//                     'rgb(255, 128, 102, 1)',
//                     'rgb(255, 128, 102, 1)',
//                     'rgb(255, 128, 102, 1)',
//                     'rgb(255, 128, 102, 1)',
//                     'rgb(255, 128, 102, 1)',
//                     'rgb(255, 128, 102, 1)',
//                     'rgb(255, 128, 102, 1)',
//                     'rgb(255, 128, 102, 1)'
//                 ],
//                 borderColor: [
//                     'rgb(255, 255, 255, 0.1)',
//                     'rgb(255, 255, 255, 0.1)',
//                     'rgb(255, 255, 255, 0.1)',
//                     'rgb(255, 255, 255, 0.1)',
//                     'rgb(255, 255, 255, 0.1)',
//                     'rgb(255, 255, 255, 0.1)',
//                     'rgb(255, 255, 255, 0.1)',
//                     'rgb(255, 255, 255, 0.1)',
//                     'rgb(255, 255, 255, 0.1)',
//                     'rgb(255, 255, 255, 0.1)',
//                     'rgb(255, 255, 255, 0.1)',
//                     'rgb(255, 255, 255, 0.1)'
//                 ],
//                 borderWidth: 2
//             }]
//         },
//         options: {
//             scales: {
//                 yAxes: [{
//                     ticks: {
//                         beginAtZero: true
//                     }
//                 }],
//                 xAxes: [{
//                     gridLines: {
//                         offsetGridLines: false
//                     }
//                 }]
//             }
//         }
//     });
    
// }