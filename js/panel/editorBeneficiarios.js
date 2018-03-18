$(document).ready(function(){
    //desabilitar o habilitar la caja de texto otro de seccion como se entero de fundación 
    if($('#medio option:selected').attr('ph') != ""){
        var ph = $('#medio option:selected').attr('ph');
        showMedio(ph);
    }else{
        hideMedio();
    }
    $('#medio').change(function(){
        var ph = $('#medio option:selected').attr('ph');
        if( ph !== "" ){
            showMedio();
        }else{
            hideMedio();
        }
    });
    //función para seleccionar los estados del país
    $('#pais').change(function(){
        var p =  $(this).val();
        var f = "buscaEstado";
        var r = "estado";
        var id = p;
        var parametros ={"formulario":f,"id":id,"es":""}
        ajax(parametros,r);
        $('#ciudad option').remove();
        $('#ciudad').append('<option selected="selected" disabled="disabled">Selecciona una Ciudad</option>');
    });
    //función para seleccionar las ciudades del estado
    $('#estado').change(function(){
        var p =  $(this).val();
        var f = "buscaCiudad";
        var r = "ciudad";
        var id = p;
        var parametros ={"formulario":f,"id":id,"c":""}
        ajax(parametros,r);
    });
    //función botón tutor
    $('#btnTutor').click(function(){
        var ind = $('#independiente').val();
        if(ind == 0){
            $('#independiente').val('1');
            $('#formTutor').show(500);
            rTutor();
        }else{
            $('#independiente').val('0');
            $('#formTutor').hide(500);
            nrTutor();
        }
    });
});
//función ajax
function ajax(ajaxParametros,resultado){
    $.ajax({
        data:ajaxParametros,
                url:'/back/ajax.php',
                type:'post',
               	beforeSend: function () {
            //$("#beforeresultado").html("<div class='beforeSend'><label>Cargando, espere por favor...</label></div>");
                   },
                success:  function (response) {						
            $("#beforeresultado").html("");
            $('#'+ resultado).html(response);
                }
            });
}
function rTutor(){
    $('input[name$="nombreTut"]').prop('required',true);
    $('input[name$="apellidoTut"]').prop('required',true);
    //$('input[name$="viveBen"]').prop('required',true);
    $('input[name$="fNacimientoTut"]').prop('required',true);
    $('input[name$="telTut"]').prop('required',true);
    $('input[name$="emailTut"]').prop('required',true);
    $('#sexoTut').prop('required',true);
    $('#viveBen').prop('required',true);
    $('#parentesco').prop('required',true);
}
function nrTutor(){
    $('input[name$="nombreTut"]').prop('required',false);
    $('input[name$="apellidoTut"]').prop('required',false);
    //$('input[name$="viveBen"]').prop('required',false);
    $('input[name$="fNacimientoTut"]').prop('required',false);
    $('input[name$="telTut"]').prop('required',false);
    $('input[name$="emailTut"]').prop('required',false);
    $('#sexoTut').prop('required',false);
    $('#viveBen').prop('required',true);
    $('#parentesco').prop('required',false);
}
function showMedio(ph){
    console.log( $('#medio option:selected').attr('ph') ); 
    $('input[name$="medioOtro"]').show(500);
    $('input[name$="medioOtro"]').attr('placeholder',ph);
    $('input[name$="medioOtro"]').attr('disabled',false);
}
function hideMedio(){
    $('input[name$="medioOtro"]').hide(500);
    $('input[name$="medioOtro"]').attr('placeholder',"");
    $('input[name$="medioOtro"]').attr('disabled',true);
    //$('input[name$="medioOtro"]').val("");
}
$(window).bind("beforeunload", function() { 
    console.log("Do you really want to close?"); 
    //return confirm("Do you really want to close?"); 
});