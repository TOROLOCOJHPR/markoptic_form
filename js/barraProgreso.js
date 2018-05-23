$(document).ready(function(){
    //barra de progreso
    // $('.progress-bar').css('width','50%');
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
    var bbox = document.getElementById('porciento').getBBox().width;
    var width = bbox.width;
    var height = bbox.height;
    var por = ($('#porciento').Width());
    var cir = ($('#contPorcentaje').width()/2);
    var pos = (cir - por) ;
    console.log(bbox);
    console.log(cir);
    console.log(pos);
    $('#porciento').attr('x',pos);
}