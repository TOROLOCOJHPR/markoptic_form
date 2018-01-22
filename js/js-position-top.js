// funcion para poner el scroll en cero
function posCero(){
    $('html').animate({scrollTop: 0 + 'px'}, 1000);
}
function aparece(r){
       $('#up').css({'right': r + 'px !important','transition': '.5s ease-in'});
}
$(document).ready(function(){
    //ejecutar la función al hacer click en el boton
    $('#up').click(function() {posCero();});
    $('#up').css({'bottom':'80px','right':'-100px'});
    $(window).scroll(function(){
        var scr=$(window).scrollTop();var dH = $(document).outerHeight(true)/2.5;var r = 0;
        if(dH < scr){ 
            $('#up').css({'right':'0px','transition': '.5s ease-in'});
        }
        else{
            r = 100;
            $('#up').css({'right':'-100px','transition': '.5s ease-in'});
        }
    });
});

