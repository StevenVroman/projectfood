$("body").prepend('<div id="preloader"> <img src="pics/logowhite2.png"></div>'); //bovenaan de body full page zetten 
$(window).on('load', function () { // als alles geload
    $('#preloader').delay(50).fadeOut('slow'); // fade out als alles geladen is 0.5 sec
})