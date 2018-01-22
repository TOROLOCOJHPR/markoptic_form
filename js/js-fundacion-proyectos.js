$(document).ready(function(){

    $('.card').click(function(){
        //$('.lightbox').css({"display":"block"});
        $('.lightbox-proyectos').addClass('c-align-middle');
        var d =$(this).attr('d');        
        $('#dt').html(d).show();
    });
    $('.lightbox-proyectos').click(function(){
        //$(this).css({"display":"none"});
        $(this).removeClass('c-align-middle');
    });
    $("#dt").click(function(){
        return false;
    });
});
