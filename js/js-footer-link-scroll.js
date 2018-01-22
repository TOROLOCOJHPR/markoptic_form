// funcion para poner el scroll en la posicion del #id
function altura(target){
    $('html').animate({
        scrollTop: $(target).offset().top -49
    }, 1000);
}

$(document).ready(function(){
    //obtener el #id del url 
    target = location.hash;
    console.log(target);
    
    //verificar si existe #id en el url
    if( target !== ''){   
        //posicionar el scroll en la parte superior de la ventana
        $('html,body').scrollTop(0);
        //posicionnar el scroll en el #id correspondiente
        altura(target);
    }
    //ejecutar la función al hacer click en el enlace
    $('footer a').click(function() {        
        //comparar la url de la página web sin el #id contra el url del link sin el #id para saber si estamos en la misma página 
        if(location.hostname + location.pathname == this.hostname + this.pathname){
            //convierto la variable target al #id del link 
            var target = $(this.hash); 
            //posiciono el scroll en el #id correspondiente
            altura(target);
       }
    });
});

