$(document).ready(function(){

//datos beneficiario
    //función para seleccionar los estados del país
    $('#pais').change(function(){
        var p =  $(this).val();
        var f = "buscaEstado";
        var r = "estado";
        var id = p;
        var parametros ={
            "formulario": f,
            "id" : id,
            "es" : ""
	    }
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
        var parametros ={
            "formulario": f,
            "id" : id,
            "c"  : ""
	    }
        ajax(parametros,r);
    });

    //función para validar que el beneficiario no sea menor de edad ni menor a 6 años o mayor a 100 años
    $('#dateBen').change(function(){
        f = $(this).val();
        ed = calculaEdad(f);
        console.log("edad"+ed);
        fr= 0; to = 0;
        if(ed < 6 || ed > 100){
            fr = 1;
        }
        if(ed >= 6 && ed < 17){
            to = 1;
        }
        console.log(fr);
        console.log(to);
        edadFueraRango(fr);
        tutorObligatorio(to);
    });

//datos tutor

    //función para ocultar o mostrar los campos de el tutor 
    if( $('input[name$="independiente"]:checked').val() == 1 ){
        rTutor();
        $('.seccionTutor').show(500);
    }
    //función para tutor obligatario, beneficiario menor de edad
    $('input[name$="independiente"]').click(function(){        
        if( $(this).val() == 0 ){
            f = $('#dateBen').val();
            ed = calculaEdad(f);
            if(ed >= 6 && ed <18){
                $('input[name$="independiente"]')[1].checked = true;
                alert('el solicitante es menor de edad porfavor introduce los datos del tutor');
            }else{
                nrTutor();
                $('.seccionTutor').hide(500);
            }
        }    
        if( $(this).val() == 1 ){
            rTutor();
            $('.seccionTutor').show(500);
        }    
    });
    //función para validar que el tutor no sea menor a 18 años ni mayor a 100 años
    $('#dateTut').change(function(){
        f = $(this).val();
        ed = calculaEdad(f);
        console.log("edad Tut"+ed);
        frt= 0;
        if(ed < 18 || ed > 100){
            frt = 1;
        }
        console.log(frt);
        edadFueraRangoTut(frt);
    });

//datos adicionales

    //función para cambiar las condiciones del brazo a color
    $('input[name$="condicion"]').click(function(){
        $('#condiciones .imgCondicion img:nth-child(2)').css({"display":"none"});
        $('#condiciones .imgCondicion img:nth-child(1)').css({"display":"block"});
        $("#condiciones label[for='"+this.id+"'] img:nth-child(1)").css({"display":"none"});   
        $("#condiciones label[for='"+this.id+"'] img:nth-child(2)").css({"display":"block"});
    });
   //desabilitar o habilitar la caja de texto otro de seccion como se entero de fundación 
   $('#enterado').change(function(){
        var ph = $('#enterado option:selected').attr('ph');
        if( ph !== "" ){
            console.log( $('#enterado option:selected').attr('ph') );
            $('input[name$="enteradoOtro"]').show(500);
            $('input[name$="enteradoOtro"]').attr('placeholder',ph);
            $('input[name$="enteradoOtro"]').attr('disabled',false);
        }else{
            $('input[name$="enteradoOtro"]').hide(500);
            $('input[name$="enteradoOtro"]').attr('placeholder',"");
            $('input[name$="enteradoOtro"]').attr('disabled',true);
            $('input[name$="enteradoOtro"]').val("");
        }
   });
   //función para cuando se envía el formulario
   $('form').submit(function(){
        if($('input[name$="formDispositivo"]').val() == "brazo"){
            if (! $('input[name$="condicion"]').is(':checked')){
                alert("Seleccione la condición de su brazo"); 
                return false; 
            }
        }
       if($('#fotofile1').val() == "" || $('#fotofile2').val() == "" || $('#fotofile3').val() == ""){
           alert("ingrese todas las fotografías del beneficiario");
           return false;
       }else{
            if($('#fotofile1')[0].files[0].size > 2097152  || $('#fotofile2')[0].files[0].size > 2097152 || $('#fotofile1')[0].files[0].size > 2097152){
                alert("las fotografías exceden el tamaño permitido");
                return false;
            }
       }
       return true;
    });
    //función para crear miniaturas de las fotografias que sube el usuario 
    $('#foto1 input[type="file"]').change(function(){
        var t =$('#fotofile1')[0].files[0].size;
        var tmb = (t/1024)/1024;
        $('#tamañoFoto1').html("Tamaño - "+ tmb.toFixed(2) + " MB");
        $('#efoto1').hide(500);
        if(t > 2097152){
            $('#etmfoto1').show(500);
        }else{
            $('#etmfoto1').hide(500);
        }
        var id="previewFoto1";
        mostrar(id);
        var foto = $(this).attr('id');
        preview(id,foto);    
    });
    $('#foto2 input[type="file"]').change(function(){
        var t = $('#fotofile2')[0].files[0].size;
        var tmb = (t/1024)/1024;
        $('#tamañoFoto2').html("Tamaño - "+ tmb.toFixed(2) + " MB");
        $('#efoto2').hide(500);
        if(t > 2097152){
            $('#etmfoto2').show(500);
        }else{
            $('#etmfoto2').hide(500);
        }
        var id="previewFoto2";
        mostrar(id);
        var foto = $(this).attr('id');
        preview(id,foto);
    });
    $('#foto3 input[type="file"]').change(function(){
        var t = $('#fotofile3')[0].files[0].size;
        var tmb = (t/1024)/1024;
        $('#tamañoFoto3').html("Tamaño - "+ tmb.toFixed(2) + " MB");
        $('#efoto3').hide(500);
        if(t > 2097152){
            $('#etmfoto3').show(500);
        }else{
            $('#etmfoto3').hide(500);
        }
        var id="previewFoto3";
        mostrar(id);
        var foto = $(this).attr('id');
        preview(id,foto);    
    });
    //posiciona el scroll correctamente en los campos requeridos al tener el menu un margen
    var delay = 0;
    var offset = 100;
    document.addEventListener('invalid', function(e){
        $(e.target).addClass("invalid");
        $('html, body').animate({scrollTop: $($(".invalid")[0]).offset().top - offset }, delay);
    }, true);
    document.addEventListener('change', function(e){
        $(e.target).removeClass("invalid")
    }, true);

});//document ready

//funciones beneficiario
    //función para mostrar etiqueta de error de edad del beneficiario
    function edadFueraRango(fr){
        if(fr == 1){       
            $('#msgMenorEdadLabel').show(500);
        }else{
            $('#msgMenorEdadLabel').hide(500);
        }
    }

//funciones tutor
    //función para obligar a introducir datos del tutor
    function tutorObligatorio(to){
        if(to == 1){
            $('input[name$="independiente"]')[1].checked = true;
            $('input[name$="independiente"]:not(:checked)').attr('disabled',true);
            rTutor();
            $('.seccionTutor,#msgMenorEdad').show(500);
        }else{
            $('input[name$="independiente"]:not(:checked)').attr('disabled',false);
            $('#msgMenorEdad').hide(500);
        }
    }
    //función para agregar atributo required a los datos del tutor
    function rTutor(){
        $('input[name$="tutNombre"]').prop('required',true);
        $('input[name$="tutApellido"]').prop('required',true);
        $('#sexoTutor').prop('required',true);
        $('input[name$="tutVive"]').prop('required',true);
        $('input[name$="tutDate"]').prop('required',true);
        $('input[name$="tutTel"]').prop('required',true);
        $('input[name$="tutEmail"]').prop('required',true);
        $('#parentesco').prop('required',true);
    }
    //función para eliminar atributo required a los datos del tutor
    function nrTutor(){
        $('input[name$="tutNombre"]').prop('required',false);
        $('input[name$="tutApellido"]').prop('required',false);
        $('#sexoTutor').prop('required',false);
        $('input[name$="tutVive"]').prop('required',false);
        $('input[name$="tutDate"]').prop('required',false);
        $('input[name$="tutTel"]').prop('required',false);
        $('input[name$="tutEmail"]').prop('required',false);
        $('#parentesco').prop('required',false);
    }

//funciones adicionales
    //función para mostrar los bloques ocultos
    function mostrar(id){
        $('#'+id).show();
    }
    //función para generar la miniatura de las imágenes que sube el beneficiario  
    function preview(id,foto){
        var file = $('#'+ foto)[0].files[0];
        var reader = new FileReader();
        reader.onloadend = function () {
            $('#'+ id).attr("src",reader.result);
            $('#'+ id + "label").css({"display":"none"});
        }
        if (file) {
        reader.readAsDataURL(file);
        } else {
            $('#' + id).attr("src","");
        }
    }
    //función para calcular edad actual
    function calculaEdad(f){
        fecha = new Date(f);
        hoy = new Date();
        ed = parseInt((hoy -fecha)/365/24/60/60/1000);
        return ed;
    }
    //función para mostrar etiqueta de error de edad del tutor
    function edadFueraRangoTut(frt){
        if(frt == 1){       
            $('#msgTutMenorEdadLabel').show(500);
        }else{
            $('#msgTutMenorEdadLabel').hide(500);
        }
    }