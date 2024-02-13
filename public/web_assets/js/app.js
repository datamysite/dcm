$(document).ready(function() {
    $(window).scroll(function() {
        if ($(document).scrollTop() > 70) {
            $('.navbar').addClass('navbar-shadow');
        }
        else {
            $('.navbar').removeClass('navbar-shadow');
        }
    });
});