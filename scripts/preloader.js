$("body").prepend('<div id="preloader"> <img src="pics/logowhite2.png"></div>');
$(window).on('load', function () { // als alles geload
    $('#preloader').delay(50).fadeOut('slow'); // fade out als alles geladen is
})