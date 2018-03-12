$(document).ready(function(){
    //barra de progreso
    var cont = 0;
    var id;
    $("[id*='circulo']").each(function(){
        id = "#circulo";
        //id = "#circulo" + cont;
        cont=cont+1;
        var dashoffset = $(id).attr('stroke-dashoffset');
        $(id).css({
            "stroke-dasharray" : 628,
            "stroke-dashoffset" : dashoffset,
            "transition" : "3s",
            "stroke" : "orange"
        });
    });
    //centrar texto de porcentaje
    texto();
    $(window).resize(function(){ 
        texto();
    });    
});
function texto(){
    var por = ($('#porciento').width()/2);
    var cir = ($('#contPorcentaje').width()/2);
    var pos = cir - por ;
    $('#porciento').attr('x',pos);
}