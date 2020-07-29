(function($) {

    'use strict';

    var inputs = $('input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="number"]');
    inputs.attr('autocomplete', 'off');
    $(window).on('shown.bs.modal', function() {
        inputs.attr('autocomplete', 'off');
    });

    $(window).on('load', function() {
        localStorage.clear();
        var preloader = $('.preloader');
        if (preloader.length) {
            preloader.delay(200).fadeOut(500);
        }

        AOS.init({
            // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
            offset: 80, // offset (in px) from the original trigger point
            delay: 400, // values from 0 to 3000, with step 50ms
            duration: 800, // values from 0 to 3000, with step 50ms
            easing: 'ease', // default easing for AOS animations
            once: false, // whether animation should happen only once - while scrolling down
        });
    });
    
    $('.toggle-right-sidebar').on('click', function() {
        $('.right-sidebar').toggleClass('sidebar-right');
        $('.backend-menu').toggleClass('open');
    });

    if ($('.right-sidebar').length) {
        var target = '.right-sidebar' || window;
        $(target).on('click', function() {
            $('.right-sidebar').removeClass('sidebar-right');
            $('.backend-menu').removeClass('open');
        });
    }

    backendLinksNavigation();

})(jQuery);

function backendLinksNavigation() {
    var event = 'change' || 'popstate';
    $('.backend-links').on(event, function() {
        localStorage.clear();
        var link = $('.backend-links').val();
        window.location.href = $(this).attr('data-url')+'/'+link;
    });
}


function handleButton(button, spinner) {
    button.attr('disabled', false);
    spinner.addClass('d-none');
}

function handleErrors(input, span, message = '') {
    input.addClass('is-invalid');
    span.html(message);
    input.focus(function() {
        input.removeClass('is-invalid');
        span.html('');
    });
}
