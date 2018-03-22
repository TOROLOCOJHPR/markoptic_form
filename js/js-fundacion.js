$(document).ready(function(){
    
    /*--sticky-top*/
    $(window).scroll(function(){
        var sT =$(window).scrollTop();
        var posicion = $('#controlMenu').position();
        var menuHeight = $('#menu').children().height();
        console.log(posicion.top);
        console.log(sT);
        var posicionT = posicion.top - menuHeight;
        if(sT >= posicionT){
            $('#menu').addClass('fijo');
        }else{
            $('#menu').removeClass('fijo');
        }
    });
    /*--/sticky-top*/

    /*--solicitudes--*/
    a = $("#contador").attr("valor"); 
    var cont=1;
      for (i = 1; i <= a; i ++) {          
            setTimeout (function () {
                   $ ('#contador').html(cont);
                   cont = cont + 1; 
             }, i * 2);            
       } 
    /*--/solicitudes--*/
});    