$(document).ready(function(){
    var y = $('#menu').position().top;
    var z = $('.img-cover-top').outerHeight();
    $(window).scroll(function () {
        //se obtiene la poscicion del scroll
        var x = $(window).scrollTop();
        //si esl scroll es mayor que la poscicion incial del top
        if (x > y) {
            $('#menu').addClass('fixed-top');          
        } else {//si el scroll todavia no es mayor que la poscicion inicial del menu
            $('#menu').removeClass('fixed-top'); 
        }
    });

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