$(document).ready(function(){ 
    $("#sort_by").on('change', function(){
        $("form").submit();
    });

    // modul for click scroll
    $("#goTotop").click(function (){
        $('html, body').animate({
            scrollTop: $("#menu-header-top").offset().top
        }, 300);
    });

    $(".scroll-to").click(function (){
        if( $(this).attr('action') == 'description') {
            $('html, body').animate({
                scrollTop: $("#description").offset().top    
            }, 300);
        }else if ($(this).attr('action') == 'highlight'){
            $('html, body').animate({
                scrollTop: $("#highlight").offset().top    
            }, 300);
        }else{
            $('html, body').animate({
                scrollTop: $("#top-program").offset().top    
            }, 300);
        }
    });

    $(window).scroll(function(){
        if($(window).scrollTop() > 250 ){
          $("#goTotop").css('display','block');
        }else{
          $("#goTotop").css('display','none');
        }
    });

    $(".fa-link").on('click', function(){
        $(".modal-backdrop").css({'display': 'block'});
    }); 

    $('.golf-club, .pro-golf').hover(
        function(){
            $(this).find('.caption, .pro-captions').slideDown(300); //.fadeIn(250)
            // $(this).find('.sticker').slideUp(200);
        },
        function(){
            $(this).find('.caption, .pro-captions').slideUp(200); //.fadeOut(205)
            // $(this).find('.sticker').slideDown(300);
        }
    ); 
    
});