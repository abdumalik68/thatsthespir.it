var menu = $('#js-main-menu');
var WINDOW_CHANGE_EVENT = ('onorientationchange' in window) ? 'orientationchange' : 'resize';

function toggleMenu() {
    // set timeout so that the panel has a chance to roll up
    // before the menu switches states
    if (menu.hasClass('open')) {
        setTimeout(function () {
            $(this).addClass('pure-menu-horizontal');
        }, 500);
    } else {
        $('#js-main-menu .js-custom-can-transform').each(function () {
            $(this).removeClass('pure-menu-horizontal');
        });
    }
    menu.toggleClass('open');
    $('#js-toggle').toggleClass('x');
}

$(window).on(WINDOW_CHANGE_EVENT, function () {
    if (menu.hasClass('open')) {
        toggleMenu();
    }
});

$('#js-toggle').on('click', function (e) {
    toggleMenu();
    e.preventDefault();
});