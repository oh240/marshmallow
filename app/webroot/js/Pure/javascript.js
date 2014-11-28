$(function() {

    checkScroll();

    $(window).scroll(function() {
        checkScroll();
    });

    $('#page-top-button').click(function(e){
        $('html,body').animate({scrollTop:0},'slow');
        e.preventDefault();
    });

});


function checkScroll (){
    var scroll_point = $(window).scrollTop();

    if (scroll_point > 50){
        $('.nk-page-up-button-wp').fadeIn();
    } else {
        $('.nk-page-up-button-wp').fadeOut();
    }
}


