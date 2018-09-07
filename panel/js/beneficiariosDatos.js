$(document).ready(()=>{
    
    //-- mostrar campo descripción cuando el medio lo requiera
    $('#medio').change(()=>{
        var ph = $('#medio option:selected').data("ph");// tomar el valor data seleccionado de la lista difusión
        if( ph !== "" ){// verificar si el atributo data tiene valor        
            $('#medioOtro').show(200);// mostrar el campo otro medio
            $('input[name$="medioOtro"]').attr('placeholder',ph);// colocar valor al atributo placeholder
            $('input[name$="medioOtro"]').attr('disabled',false);// habilitar el campo otro medio
        }else{
            $('#medioOtro').hide(200);// ocultar el campo otro medio
            $('input[name$="medioOtro"]').attr('placeholder',"");// borrar su atributo placeholder
            $('input[name$="medioOtro"]').attr('disabled',true);// deshabilitar el campo otro medio
            $('input[name$="medioOtro"]').val("");// borrar el valor del campo otro medio
        }
    });//-- /mostrar campo descripcioón cuando el medio lo requiera


    //-- botón agregar tutor
    $('#btnMuestraTutor').click(()=>{
        var reqTutor  = $('#datosTutor').data('tutor');
        if(reqTutor  ==  "0" ){
            rTutor();
            $('#datosTutor').data("tutor","1");
            $('#datosTutor').show(200);
        }else{
            nrTutor();
            $('#datosTutor').data("tutor","0");
            $('#datosTutor').hide(200);
        }
        
    });
    //-- /botón agregar tutor

    //-- mostrar mensaje tutor solo mayor de edad
    $('#tutNacimiento').focusout(()=>{
        var tutEdad = calculaEdad($('#tutNacimiento').val());
        if( tutEdad < 17 ){
            alert("el tutor debe ser mayor de edad");
        }
    });//-- /mostrar mensaje tutor solo mayor de edad 

    //-- mostrar mensaje tutor solo mayor de edad
    $('#nacimiento').focusout(()=>{
        var edad = calculaEdad($('#nacimiento').val());
        if( edad < 1 || edad > 120 ){
            alert("edad del beneficiario permitida 1 a 120 años");
        }
    });//-- /mostrar mensaje tutor solo mayor de edad 


    //-- submit formulario 
    $('#form').submit(()=>{
        
        var error = 0;
        $('#submit').prop('disabled',true);// deshabilitar boton de envío
       
        //-- validar la edad del beneficiario
        var edadBen =calculaEdad($('#nacimiento').val());
        if(edadBen < 1  || edadBen > 120){
            error = 1;
            alert('edad del beneficiario permitida 1 a 120 años');
        }

        //-- validar edad del tutor
        if($('#tutor').is(':enabled')){
            var tutEdad = calculaEdad($('#tutNacimiento').val());
            if(tutEdad < 18){
                error = 1;
                alert('el tutor debe ser mayor de edad');
            }
        }

        // validar errores del formulario
        if(error == 0){
            return true;
        }else{
            $('#submit').prop('disabled',false);// deshabilitar boton de envío
            return false;
        }
        
    });
    //-- /submit formulario 

    //mostrar mensaje de exito
    $('#actualiza-alert').show();

});//-- /document ready

//-- función para eliminar atributo required a los datos del tutor
    function nrTutor(){

        $('input[name$="tutNombre"]').prop('required',false);
        $('input[name$="tutApellido"]').prop('required',false);
        $('#tutSexo').prop('required',false);
        $('input[name$="tutNacimiento"]').prop('required',false);
        $('input[name$="tutTelefono"]').prop('required',false);
        $('input[name$="tutEmail"]').prop('required',false);
        $('input[name$="tutor"]').prop('disabled',true);
        $('#viveBen').prop('required',false);
        $('#parentesco').prop('required',false);

    }//-- /función para eliminar atributo required a los datos del tutor

//-- función para agregar atributo required a los datos del tutor
    function rTutor(){
    
        $('input[name$="tutNombre"]').prop('required',true);
        $('input[name$="tutApellido"]').prop('required',true);
        $('#tutSexo').prop('required',true);
        $('input[name$="tutNacimiento"]').prop('required',true);
        $('input[name$="tutTelefono"]').prop('required',true);
        $('input[name$="tutEmail"]').prop('required',true);
        $('input[name$="tutor"]').prop('disabled',false);
        $('#viveBen').prop('required',true);
        $('#parentesco').prop('required',true);
    
    }//-- /función para agregar atributo required a los datos del tutor

//--función para calcular edad actual
    function calculaEdad(f){

        fecha = new Date(f);//convertir la fecha actual
        hoy = new Date();// tomar la fecha actual

        ed = parseInt((hoy -fecha)/365/24/60/60/1000);// generar la edad actual 
        
        return ed;
    }//-- /función para calcular edad actual