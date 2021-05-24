// Remove Loader
$("#preloader").fadeOut(2000, function () {
    $(this).remove()
});

// sticky header
$(window).on('scroll',function() {
    if ($(window).width() >= 992 ) {
        if ($(this).scrollTop() > 120){
            $('.eco-cabins-navbar').addClass("sticky");
        }
        else{
            $('.eco-cabins-navbar').removeClass("sticky");
        }
    }
});

if ( $(window).width() < 992 ) {
    $('.eco-cabins-navbar').addClass("sticky");
}



//magnific popup video
$('.icon-play-wrapper').magnificPopup({
    type: 'video',
});



