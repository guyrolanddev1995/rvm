$(function(){

    
    new WOW().init();
    $(window).on('load', function(){
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    })

    $('.banner').slick({
        autoplay: true,
        infinite: true,
        arrows: true,
        speed: 1500,
        loop: true,
        dots: false,
        fade: true
    });

    setTimeout(function(){
        $('.alert').fadeOut();
    }, 5000)

    $('#dropdown-btn').click(function(){
        if($('#dropdown').hasClass('display-drop')){
            $('#dropdown').removeClass('display-drop')
        } else {
            $('#dropdown').addClass('display-drop')
        }
    })
})