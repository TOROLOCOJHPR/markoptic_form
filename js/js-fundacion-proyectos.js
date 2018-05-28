$(document).ready(function(){

    $('.card').click(function(){
        //$('.lightbox').css({"display":"block"});
        $('.lightbox-proyectos').addClass('lightbox-block');
        var d =$(this).data('info');        
        $('#dt').html(d).show();

        $('body').css({
            'overflow': 'hidden',
        });
    });
    $('.lightbox-proyectos').click(function(){
        //$(this).css({"display":"none"});
        $(this).removeClass('lightbox-block');
        $('body').css({
            'overflow': 'auto',
        });
    });
    $("#dt").click(function(){
        return false;
    });
});
