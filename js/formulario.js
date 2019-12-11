$(document).ready(function(){

//variables de error del beneficiario
    var error = {"valida":0};
    var eapellido = 0;
    var edate = 0;
    var edateMinima = 0;
    var edateNoPermitida = 0;
    var epais = 0;
    var eestado = 0;
    var eciudad = 0;
    var ecalle = 0;
    var ecolonia = 0;
    var ecp = 0;
    var etel = 0;
    var eemail = 0;
    var eemailValido = 0;

//variables de error del tutor
    var tutorObligatorio = 0;
    var etutNombre = 0;
    var etutApellido = 0;
    var etutSexo = 0;
    var etutVive = 0;
    var etutParentesco = 0;
    var etutDate = 0;
    var etutDateMinima = 0;
    var etutEmail = 0;
    var etutemailValido = 0;

//-- funciónes para validar los datos del beneficiario
        
    //nombre vacío
        $('input[name$="nombre"]').focusout(function(){
            
            if($(this).val().length == 0){
                
                $('*[data-error="enombre"]').css({"display":"inline-block"});
            
            }else{

                $('*[data-error="enombre"]').css({"display":"none"});

            }
        
        });//nombre vacío
        
    //apellido vacío
        $('input[name$="apellido"]').focusout(function(){
            
            if($(this).val().length == 0){
            
                $('*[data-error="eapellido"]').css({"display":"inline-block"});

            }else{
            
                $('*[data-error="eapellido"]').css({"display":"none"});
            
            }
        
        });//apellido vacío
        
    //sexo vacío
        $('#sexo').change(function(){
            
            if($(this).val() == ""){
            
                $('*[data-error="esexo"]').css({"display":"inline-block"});

            }else{
            
                $('*[data-error="esexo"]').css({"display":"none"});
            
            }
        
        });//sexo vacío

    //validaciones para la edad del beneficiario
        $('input[name$="date"]').focusout(function(){
            
            //borrar mensajes de error
            $('*[data-error="edate"],*[data-error="edateMinima"],*[data-error="edateNoPermitida"],*[data-error="tutorObligatorio"]').css({"display":"none"});
            
            validaEdad($(this).val());//valida errores de usuario referentes a la edad del beneficiario

        });//validaciones para la edad del beneficiario

    //país vacío
        $('#pais').change(function(){
            // console.log('hola mundo');
            // if($(this).val() == ""){            
            //     $('#errorPais').addClass("d-block");
            //     $('#estado').prop('disabled', true);
            //     $('#estado').val() = '';
            //     $('#ciudad').prop('disabled', true);
            //     $('#ciudad').val() = '';
            // }else{            
            //     $('#errorPais').removeClass("d-block");  
            //     $('#estado').prop('disabled', false);
            // }        
        });//país vacío
        
    //estado vacío
        $('#estado').change(function(){
            
            if($(this).val() == ""){
            
                $('#errorEstado').css({"display":"inline-block"});
            
            }else{
            
                $('#errorEstado"]').css({"display":"none"});
            
            }
        
        });//país vacío
        
    //ciudad vacío
        $('#ciudad').change(function(){
            
            if($(this).val() == ""){
            
                $('#errorCiudad').css({"display":"inline-block"});
            
            }else{
            
                $('#errorCiudad').css({"display":"none"});
            
            }
        });//país vacío

    //calle vacío
        $('input[name$="calle"]').focusout(function(){
            
            if($(this).val().length == 0){
            
                $('*[data-error="ecalle"]').css({"display":"inline-block"});
            
            }else{
            
                $('*[data-error="ecalle"]').css({"display":"none"});
            
            }
        
        });//calle vacío

    //colonia vacío
        $('input[name$="colonia"]').focusout(function(){
        
            if($(this).val().length == 0){
        
                $('*[data-error="ecolonia"]').css({"display":"inline-block"});
        
            }else{
        
                $('*[data-error="ecolonia"]').css({"display":"none"});
        
            }
        
        });//colonia vacío

    //código postal vacío
        $('input[name$="cp"]').focusout(function(){
        
            if($(this).val().length == 0){
        
                $('*[data-error="ecp"]').css({"display":"inline-block"});
        
            }else{
        
                $('*[data-error="ecp"]').css({"display":"none"});
        
            }
        
        });//código postal vacío

    //teléfono vacío
        $('input[name$="tel"]').focusout(function(){
        
            if($(this).val().length == 0){
        
                $('*[data-error="etel"]').css({"display":"inline-block"});
        
            }else{
        
                $('*[data-error="etel"]').css({"display":"none"});
        
            }
        
        });//teléfono vacío
        
    //email vacío
        $('input[name$="email"]').focusout(function(){
        
            $('*[data-error="eemail"],*[data-error="eemailValido"]').css({"display":"none"});

            if($(this).val().length == 0){
        
                $('*[data-error="eemail"]').css({"display":"inline-block"});
        
            }else{

                var parametros = {"form":"validaEmail","email":$(this).val()}
    
                $.ajax({
	                data:parametros,
                 	url:'/inc/ajax.php',
                    type:'post',
                	beforeSend: function () {
                    },
                    success: function (response) {

                        var result = JSON.parse(response);
                        
                        if(result[0]['result'] == false){//verificar si el email es invalido
                            
                            $('*[data-error="eemailValido"]').css({"display":"inline-block"});//mostrar mensaje de error email invalido

                        }//verificar si el email es invalido

                    }//success
                
                });//ajax
            }
        
        });//email vacío
        
//-- funciónes para validar los datos del beneficiario

//-- funciones para validar los datos del tutor
    
    //-- función para mostrar u ocultar la sección tutor
        $('input[name$="independiente"]').click(function(){
            
            //borrar mensajes de error
            $('*[data-error="edate"],*[data-error="edateMinima"],*[data-error="edateNoPermitida"],*[data-error="tutorObligatorio"]').css({"display":"none"});
            
            var date = $('input[name$="date"]').val();// tomar la fecha de nacimiento del tutor
            var edad = calculaEdad(date);//calculamos la edad actual del beneficiario
        
            if(edad >= 18 && edad <= 120){//verificar si el beneficiario es mayor de edad

                if($(this).val() == 0){//comprobar si el valor es no requiere tutor

                    nrTutor();//función que cambia el atributo required a false en sección tutor
                    $('#seccionTutor').hide(200);//ocultar la sección del tutor
                    $('*[data-error="etutNombre"],*[data-error="etutApellido"],*[data-error="etutSexo"],*[data-error="etutvive"],*[data-error="etutParentesco"],*[data-error="etutDate"],*[data-error="etutDateMinima"],*[data-error="etutTel"],*[data-error="etutEmail"],*[data-error="etutemailValido"]').css({"display":"none"});

                }else{//el valor es 1 requiere tutor
                    // rTutor();//función que cambia el atributo required a true en sección tutor
                    $('#seccionTutor').show(200);//mostrar sección tutor

                }

            }else{//beneficiario con edad desconocida

                validaEdad($('input[name$="date"]').val());//valida errores de usuario referentes a la edad del beneficiario
            }

        });//-- función para mostrar u ocultar la sección tutor


    //-- mostrar los campos de el tutor cuando recarga la página
        if( $('input[name$="independiente"]:checked').val() == 1 ){// verificar si se envio seleccionado la casilla requiere tutor 

            rTutor();//función que cambia el atributo required a true en sección tutor
            
            $('#seccionTutor').show(200);//mostrar datos tutor

        }else{

            nrTutor();//función que cambia el atributo required a false en sección tutor
            
            $('#seccionTutor').hide(200);//mostrar datos tutor

        }//-- función para ocultar o mostrar los campos de el tutor cuando recarga la página

    //-- nombre tutor vacio
        $('input[name$="tutNombre"]').focusout(function(){
        
            if($(this).val().length == 0){
        
                $('*[data-error="etutNombre"]').css({"display":"inline-block"});
        
            }else{
        
                $('*[data-error="etutNombre"]').css({"display":"none"});
        
            }
        
        });//-- nombre tutor vacio
    
    //-- apellido tutor vacio
        $('input[name$="tutApellido"]').focusout(function(){

            if($(this).val().length == 0){
            
                $('*[data-error="etutApellido"]').css({"display":"inline-block"});

            }else{
            
                $('*[data-error="etutApellido"]').css({"display":"none"});

            }

        });//-- apellido tutor vacio
    
    //-- sexo tutor vacio
        $('#tutSexo').change(function(){
        
            if($(this).val() == ""){
        
                $('*[data-error="etutSexo"]').css({"display":"inline-block"});
        
            }else{
        
                $('*[data-error="etutSexo"]').css({"display":"none"});
        
            }
        
        });//-- sexo tutor vacio
    
    //-- vive con el tutor vacio
    $('input[name$="tutVive"]').click(function(){
        
        if( $('input[name$="tutVive"]').val() < 2 ){
                
            $('*[data-error="etutvive"]').css({"display":"none"});
           
        }else{
           
            $('*[data-error="etutvive"]').css({"display":"inline-block"});
           
        }

    });//-- vive con el tutor vacio
    
    //-- Parentesco con tutor vacio
        $('#tutParentesco').change(function(){
        
            if($(this).val() == ""){
        
                $('*[data-error="etutParentesco"]').css({"display":"inline-block"});
        
            }else{
        
                $('*[data-error="etutParentesco"]').css({"display":"none"});
        
            }
        
        });//-- tutParentesco tutor vacio
    
    //-- validaciones para la edad del  tutor
        $('input[name$="tutDate"]').focusout(function(){
            
            //borrar mensajes de error de usuario
            $('*[data-error="etutDateMinima"],*[data-error="etutDate"]').css({"display":"none"});
            
            if($(this).val().length == 0){
        
                $('*[data-error="etutDate"]').css({"display":"inline-block"});
        
            }else{
                
                var tutDate = $(this).val();//tomar la fecha de nacimiento del tutor
                var tutEdad = calculaEdad(tutDate);//calcular la edad actual del tutor
                
                if(tutEdad < 18 || tutEdad > 100){
                    $('*[data-error="etutDateMinima"]').css({"display":"inline-block"});
                }
                
            }
        
        });//-- validaciones para la edad del  tutor
    
    //-- teléfono tutor vacio
        $('input[name$="tutTel"]').focusout(function(){
            
            if($(this).val().length == 0){
            
                $('*[data-error="etutTel"]').css({"display":"inline-block"});
            
            }else{
            
                $('*[data-error="etutTel"]').css({"display":"none"});
            
            }
        
        });//-- teléfono tutor vacio
    
    //-- email tutor vacio
        $('input[name$="tutEmail"]').focusout(function(){
            
            //borrar mensajes de error del usuario
            $('*[data-error="etutEmail"],*[data-error="etutemailValido"]').css({"display":"none"});

            if($(this).val().length == 0){//comprobar si el campo está vacío
         
                $('*[data-error="etutEmail"]').css({"display":"inline-block"});//mostrar error de campo vacio
         
            }else{//comprobar que el email sea valido
         
                var parametros = {"form":"validaEmail","email":$(this).val()}
    
                $.ajax({
	                data:parametros,
                 	url:'/inc/ajax.php',
                    type:'post',
                	beforeSend: function () {
                    },
                    success: function (response) {

                        var result = JSON.parse(response);
                        
                        if(result[0]['result'] == false){//verificar si el email es invalido
                            
                            $('*[data-error="etutemailValido"]').css({"display":"inline-block"});//mostrar mensaje de error email del tutor invalido

                        }else{
                            $('*[data-error="etutemailValido"]').css({"display":"none"});
                        }

                    }//success
                
                });//ajax
         
            }//comprobar que el email sea valido
        
        });//-- email tutor vacio

//-- funciónes para validar los datos del tutor

//-- funciónes para validar los dispositivos
    
    //-- dispositivo vacío
        $('#dispositivo').change(function(){
            if( $(this).val() == "" ){
                $('*[data-error="edispositivo"]').css({"display":"inline-block"});
            }else{
                $('*[data-error="edispositivo"]').css({"display":"none"});
            }
        });

//-- funciónes para validar los dispositivos

//-- funciónes para validar las condiciones de la amputación

    //-- condición vacía
    $('input[name$="condicion"]').click(function(){
        if( $(this).val() != ""){
            $('*[data-error="econdicion"]').css({"display":"none"});
        }
    });//-- condición vacía

    //-- función para cambiar las condiciones de color al seleccionarlas
        $('input[name$="condicion"]').click(function(){

            $('#condiciones .imgCondicion:nth-child(2)').css({"display":"none"});//ocultar todas las imágenes verdes de las condiciones
            $('#condiciones .imgCondicion:nth-child(1)').css({"display":"block"});//mostrar todas las imágenes grises de las condiciones
            $("#condiciones label[for='"+this.id+"'] img:nth-child(1)").css({"display":"none"});//ocultar la imagen gris de la condición que se selecciono
            $("#condiciones label[for='"+this.id+"'] img:nth-child(2)").css({"display":"block"});//mostrar la imagen verde de la condición que se selecciono

        });//-- función para cambiar las condiciones de color al seleccionarlas

//-- funciónes para validar las condiciones de la amputación

//-- funciones para validar los medios de difusión
    
    //-- mostrar campo descripcioón cuando el medio lo requiera
        $('#medio').change(function(){
            
            var ph = $('#medio option:selected').data("ph");// tomar el valor data seleccionado de la lista difusión

            if( ph !== "" ){// verificar si el atributo data tiene valor
                console.log(ph);                
                $('input[name$="medioOtro"]').show(500);// mostrar el campo otro medio
                $('input[name$="medioOtro"]').attr('placeholder',ph);// colocar valor al atributo placeholder
                $('input[name$="medioOtro"]').attr('disabled',false);// habilitar el campo otro medio
        
            }else{

                $('input[name$="medioOtro"]').hide(500);// ocultar el campo otro medio
                $('input[name$="medioOtro"]').attr('placeholder',"");// borrar su atributo placeholder
                $('input[name$="medioOtro"]').attr('disabled',true);// deshabilitar el campo otro medio
                $('input[name$="medioOtro"]').val("");// borrar el valor del campo otro medio

            }

        });//-- mostrar campo descripcioón cuando el medio lo requiera
    
    //-- medio vacío
        $('#medio').change(function(){

            //borrar mensajes de error
            $('*[data-error="emedio"],*[data-error="emedioOtro"]').css({"display":"none"});

            if($(this).val() == ""){
             
                $('*[data-error="emedio"]').css({"display":"inline-block"});
            
            }else{
            
                $('*[data-error="emedio"]').css({"display":"none"});
            
            }
        
        });//-- medio vacío

    //-- descripción del medio vacío
        $('input[name$="medioOtro"]').focusout(function(){
            
            if($(this).val().length == 0){
            
                $('*[data-error="emedioOtro"]').css({"display":"inline-block"});
            
            }else{
            
                $('*[data-error="emedioOtro"]').css({"display":"none"});
            
            }
        
        });//-- descripción del medio vacío

//-- funciones para validar los medios de difusión

//-- función para validar el porque se solicita el dispositivo
    $('[name$="porque"]').focusout(function(){
       
        if($(this).val() == ""){
            
            $('*[data-error="eporque"]').css({"display":"inline-block"});
        
        }else{
        
            $('*[data-error="eporque"]').css({"display":"none"});
        
        }
    
    });//-- función para validar el porque se solicita el dispositivo

//-- funciones para validar las fotografías del usuario

    //-- fotografía número uno
        $('#foto1 input[type="file"]').change(function(){

            var nFoto = 1;
            validaImagen(nFoto);//nFoto(número de foto)

        });//-- fotografía número uno

    //-- fotografía número dos
        $('#foto2 input[type="file"]').change(function(){

            var nFoto = 2;
            validaImagen(nFoto);//nFoto(número de foto)

        });//-- fotografía número dos

    //-- fotografía número tres
        $('#foto3 input[type="file"]').change(function(){

            var nFoto = 3;
            validaImagen(nFoto);//nFoto(número de foto)

        });//-- fotografía número tres

//-- funciones para validar las fotografías del usuario

//-- funciones para validar los términos
    
    //-- términos vacío
        $('input[name$="terminos"]').click(function(){

            if( $('input[name$="terminos"]').prop('checked') ){
                
                $('*[data-error="eterminos"]').css({"display":"none"});
           
            }else{
           
                $('*[data-error="eterminos"]').css({"display":"inline-block"});
           
            }
        
        });//-- términos vacío

//-- funciones para validar los términos


//-- excepciones para el  envío del formulario
   
   //-- envío formulario 
   $('form').submit(function(e){

        // colocamos el valor de error en 0
        error['valida'] = 0;
        
        //nombre vacío
        if($('input[name$="nombre"]').val().length == 0){
            error['valida'] = 1;
            $('*[data-error="enombre"]').css({"display":"inline-block"});
        }

        //apellido vacío
        if($('input[name$="apellido"]').val().length == 0){
            error['valida'] = 1;
            $('*[data-error="eapellido"]').css({"display":"inline-block"});
        }

        //sexo vacío
        if($('#sexo').val() == ""){
            error['valida'] = 1;
            $('*[data-error="esexo"]').css({"display":"inline-block"});
        }

        //edad vacía
        if($('input[name$="date"]').val().length == 0){//verificar si el campo fecha de nacimiento está vacio
            var independiente = $('input[name$="independiente"]');
            error['valida'] = 1;
            $('*[data-error="edate"]').css({"display":"inline-block"});//mostrar error edad vacía

            ocultaTutor();//oculta datos del tutor cuando sucede error de usuario                
        
        }else{//campo fecha de nacimiento contiene valor
                
            //calcular edad actual del beneficiario
            var edad = calculaEdad($('input[name$="date"]').val());
                
            if(edad < 1){//verificar si el beneficiario es menor a la edad permitida
                error['valida'] = 1;
                $('*[data-error="edateMinima"]').css({"display":"inline-block"});//mostrar error edad inferior a la edad permitida
                nrTutor();//función que cambia el atributo required a false en sección tutor
                ocultaTutor();//oculta datos del tutor cuando sucede error de usuario
                
            }else if(edad >120){//verificar si el beneficiario es mayor a la edad permitida
                error['valida'] = 1;
                $('*[data-error="edateNoPermitida"]').css({"display":"inline-block"});//mostrar error edad superior a la edad permitida
                nrTutor();//función que cambia el atributo required a true en sección tutor
                ocultaTutor();//oculta datos del tutor cuando sucede error de usuario
                
            }
            
        }//campo fecha de nacimiento contiene valor
        
        //país vacío
        if($('#pais').val() == ""){
            error['valida'] = 1;
            $('*[data-error="epais"]').css({"display":"inline-block"});
        }

        //estado vacío
        if($('#pais').val() == ""){
            error['valida'] = 1;
            $('*[data-error="eestado"]').css({"display":"inline-block"});
        }

        //ciudad vacía
        if($('#ciudad').val() == ""){
            error['valida'] = 1;
            $('*[data-error="eciudad"]').css({"display":"inline-block"});
        }

        //calle vacía
        if($('input[name$="calle"]').val().length == 0){
            error['valida'] = 1;
            $('*[data-error="ecalle"]').css({"display":"inline-block"});
        }

        //colonia vacía
        if($('input[name$="colonia"]').val().length == 0){
            error['valida'] = 1;
            $('*[data-error="ecolonia"]').css({"display":"inline-block"});
        }

        //código postal vacío 
        if($('input[name$="cp"]').val().length == 0){
            error['valida'] = 1;
            $('*[data-error="ecp"]').css({"display":"inline-block"});
        }

        //teléfono vacío
        if($('input[name$="tel"]').val().length == 0){
            error['valida'] = 1;
            $('*[data-error="etel"]').css({"display":"inline-block"});
        }

        //email vacio
        if($('input[name$="email"]').val().length == 0){
            
            error['valida'] = 1;
            $('*[data-error="eemail"]').css({"display":"inline-block"});
        
        }else{//validar email invalido
        
            var parametros = {"form":"validaEmail","email":$('input[name$="email"]').val()}
    
                $.ajax({
	                data:parametros,
                 	url:'/inc/ajax.php',
                    type:'post',
                	beforeSend: function () {
                    },
                    success: function (response) {

                        var result = JSON.parse(response);
                        
                        if(result[0]['result'] == false){//verificar si el email es invalido
                            error['valida'] = 1;
                            $('*[data-error="eemailValido"]').css({"display":"inline-block"});//mostrar mensaje de error email invalido

                        }//verificar si el email es invalido

                    }//success
                
                });//ajax

        }//validar email invalido

    //validar datos del tutor 
        
        if($('input[name$="independiente"]:checked').val() == 1){

            //nombre tutor vacío
            if($('input[name$="tutNombre"]').val().length == 0){
                error['valida'] = 1;
                $('*[data-error="etutNombre"]').css({"display":"inline-block"});
            }

            //apellido tutor vacío
            if($('input[name$="tutApellido"]').val().length == 0){
                error['valida'] = 1;
                $('*[data-error="etutApellido"]').css({"display":"inline-block"});
            }

            //sexo tutor vacío
            if($('#tutSexo').val() == ""){
                error['valida'] = 1;
                $('*[data-error="etutSexo"]').css({"display":"inline-block"});
            }

            //vive con el tutor vacío
            if($('input[name$="tutVive"]').is(':checked') ){
                $('*[data-error="etutvive"]').css({"display":"none"});            
            }else{
                error['valida'] = 1;
                $('*[data-error="etutvive"]').css({"display":"inline-block"});
            }

            //Parentesco con tutor vacío
            if($('#tutParentesco').val() == ""){
                error['valida'] = 1;
                $('*[data-error="etutParentesco"]').css({"display":"inline-block"});
            }

            //validaciones para la edad del tutor
            if($('input[name$="tutDate"]').val().length == 0){
            
                error['valida'] = 1;
                $('*[data-error="etutDate"]').css({"display":"inline-block"});
        
            }else{//validar si es mayor de edad
        
                var tutEdad = calculaEdad($('input[name$="tutDate"]').val());
                if(tutEdad < 18 || tutEdad > 100){
                    error['valida'] = 1;
                    $('*[data-error="etutDateMinima"]').css({"display":"inline-block"});
                }
        
            }//validar si es mayor de edad

            //teléfono de tutor vacío
            if($('input[name$="tutTel"]').val().length == 0){
                error['valida'] = 1;
                $('*[data-error="etutTel"]').css({"display":"inline-block"});
            }

        //comprobaciones email del tutor
            if($('input[name$="tutEmail"]').val().length == 0){
                error['valida'] = 1;
                $('*[data-error="etutEmail"]').css({"display":"inline-block"});//mostrar error de campo vacio
            }else{//comprobar que el email sea valido
            
                var parametros = {"form":"validaEmail","email":$('input[name$="tutEmail"]').val()}
    
                    $.ajax({
	                    data:parametros,
                     	url:'/inc/ajax.php',
                        type:'post',
                    	beforeSend: function () {
                        },
                        success: function (response) {

                            var result = JSON.parse(response);
                        
                            if(result[0]['result'] == false){//verificar si el email es invalido
                                error['valida'] = 1;
                                $('*[data-error="etutemailValido"]').css({"display":"inline-block"});//mostrar mensaje de error email del tutor invalido

                            }//verificar si el email es invalido

                        }//success
                
                    });//ajax

            }//comprobar que el email sea valido

        }else{
            $('*[data-error="etutNombre"],*[data-error="etutApellido"],*[data-error="etutSexo"],*[data-error="etutvive"],*[data-error="etutParentesco"],*[data-error="etutDate"],*[data-error="etutDateMinima"],*[data-error="etutTel"],*[data-error="etutEmail"],*[data-error="etutemailValido"]').css({"display":"none"});
        }

        //dispositivo  y condición vacías
        if ( $('input[name$="formDispositivo"]').val() != "colchon" ){

            //dispositivo vacío
            if($('#dispositivo').val() == ""){
                error['valida'] = 1;
                $('*[data-error="edispositivo"]').css({"display":"inline-block"});
            }

            //condición vacía
            if( $('input[name$="condicion"]').is(':checked') ){
                $('*[data-error="econdicion"]').css({"display":"none"});
            }else{
                error['valida'] = 1;
                $('*[data-error="econdicion"]').css({"display":"inline-block"});
            }

        }
        //medio vacío
        if( $('#medio').val() =="" ){
            error['valida'] = 1;
        }else{//descripción del medio vacío
            if($('#medio option:selected').data("ph") != ""){//verificar si el medio seleccionado requiere descripción
                if($('input[name$="medioOtro"]').val().length == 0){
                    error['valida'] = 1;
                    $('*[data-error="emedioOtro"]').css({"display":"inline-block"});
                }
            }
        }//descripción del medio vacío

        //porque solicita vacío
        if($('[name$="porque"]').val() == "" ){
            error['valida'] = 1;
            $('*[data-error="eporque"]').css({"display":"inline-block"});
        } 

        //validaciones de fotografías
        for(i = 1; i<4; i++){

            var fotoFile = "fotofile" + i;
            var eFoto = "efoto" + i;//eFoto(error archivo no cargada)
            var etmFoto = "etmfoto" + i;//etmFoto(error tamaño de archivo)
            var efiFoto = "efifoto" + i;// efiFoto(error de formato invalido)
            var previewFoto = "previewFoto" + i;// id del archivo al cual se le creara su preview
        
            if($('#' + fotoFile).val().length == "" ){
                error['valida'] = 1;
                $( '*[data-error="'+ eFoto +'"]').css({"display":"inline-block"});
            }else{//comprobar errores

                var tipo = $( '#' + fotoFile )[0].files[0].type;//tomar el tamaño de el archivo
                var t = $( '#' + fotoFile )[0].files[0].size;//tomar el tamaño de el archivo
                var tmb = ( t/1024 )/1024;// convertir de kilobytes a megabytes

                //ocultar los mensajes de error
                $( '*[data-error="'+ eFoto +'"], *[data-error="' + etmFoto + '"], *[data-error="' + efiFoto + '"]' ).css({"display":"none"});

                //colocar imagen en blanco 
                $( '#' + previewFoto ).attr("src","/img/form/img-sin-foto.png");


                if( t > 2097152 ){//comprobar el tamaño de el archivo de la imagen
                    error['valida'] = 1;
                    $( '*[data-error="' + etmFoto + '"]' ).css({"display":"inline-block"});//mostrar error de tamaño de archivo excedido

                }else{
            
                    if( tipo == "image/jpeg" || tipo == "image/png" ){// comprobar si el archivo es una imagen

                        preview(previewFoto,fotoFile);// crear preview de archivo subido
            
                    }else{
                        error['valida'] = 1;
                        $( '*[data-error="' + efiFoto + '"]' ).css({"display":"inline-block"});//mostrar error formato invalido
            
                    }// comprobar si el archivo es una imagen

                }//comprobar el tamaño de el archivo de la imagen
        
            }//comprobar errores
        }//for

        //términos vacío
        if($('input[name$="terminos"]').prop('checked')){
            $('*[data-error="eterminos"]').css({"display":"none"});
        }else{
            error['valida'] = 1;
            $('*[data-error="eterminos"]').css({"display":"inline-block"});
        }

        //comprobación 
        if(error['valida'] == 1){
            console.log('false');
            return false;
        }else{
            console.log('true');
            return true;
        }
        
    });//-- envío de formulario

//-- excepciones para el  envío del formulario

//-- posiciona el scroll correctamente en los campos requeridos al tener el menu un margen
    var delay = 0;
    var offset = 100;
    document.addEventListener('invalid', function(e){
        $(e.target).addClass("invalid");
        $('html, body').animate({scrollTop: $($(".invalid")[0]).offset().top - offset }, delay);
    }, true);

    document.addEventListener('change', function(e){
        $(e.target).removeClass("invalid")
    }, true);
    //-- posiciona el scroll correctamente en los campos requeridos al tener el menu un margen

});//document ready

//funciones 

//--función para calcular edad actual
    function calculaEdad(f){

        fecha = new Date(f);//convertir la fecha actual
        hoy = new Date();// tomar la fecha actual

        ed = parseInt((hoy -fecha)/365/24/60/60/1000);// generar la edad actual 
        
        return ed;
    }//--función para calcular edad actual

//-- función para eliminar atributo required a los datos del tutor
    function nrTutor(){

        $('input[name$="tutNombre"]').prop('required',false);
        $('input[name$="tutApellido"]').prop('required',false);
        $('#sexoTutor').prop('required',false);
        $('input[name$="tutVive"]').prop('required',false);
        $('input[name$="tutDate"]').prop('required',false);
        $('input[name$="tutTel"]').prop('required',false);
        $('input[name$="tutEmail"]').prop('required',false);
        $('#parentesco').prop('required',false);

    }//-- función para eliminar atributo required a los datos del tutor

//-- función para agregar atributo required a los datos del tutor
    function rTutor(){
    
        $('input[name$="tutNombre"]').prop('required',true);
        $('input[name$="tutApellido"]').prop('required',true);
        $('#sexoTutor').prop('required',true);
        $('input[name$="tutVive"]').prop('required',true);
        $('input[name$="tutDate"]').prop('required',true);
        $('input[name$="tutTel"]').prop('required',true);
        $('input[name$="tutEmail"]').prop('required',true);
        $('#parentesco').prop('required',true);
    
    }//-- función para agregar atributo required a los datos del tutor

//-- ocultar sección tutor
    function ocultaTutor(){
        $('input[name$="independiente"]')[0].checked = true;// marcar la casilla si requiere tutor en sección confirmación del tutor
        $('input[name$="independiente"]')[0].disabled = false;//habilitar la casilla no requiere tutor en sección confirmación del tutor
        $('input[name$="independiente"]')[1].disabled = true;//deshabilitar la casilla si requiere tutor en sección confirmación del tutor
        $('#seccionTutor').hide(200);//ocultar sección de tutor
    }//-- ocultar sección tutor

//-- muestra sección tutor
    function muestraTutor(){
        $('input[name$="independiente"]')[1].checked = true;// marcar la casilla si requiere tutor en sección confirmación del tutor
        $('input[name$="independiente"]')[1].disabled = false;//habilitar la casilla si requiere tutor en sección confirmación del tutor
        $('input[name$="independiente"]')[0].disabled = true;//deshabilitar la casilla no requiere tutor en sección confirmación del tutor
        $('#seccionTutor').show(200);//mostrar sección de tutor
    }//-- muestra sección tutor


//-- función para validar la edad del beneficiario
    function validaEdad(fNacimiento){

        if(fNacimiento.length == 0){//verificar si el campo fecha de nacimiento está vacio
            var independiente = $('input[name$="independiente"]');
                
            $('*[data-error="edate"]').css({"display":"inline-block"});//mostrar error edad vacía

            ocultaTutor();//oculta datos del tutor cuando sucede error de usuario
                        
        }else{//campo fecha de nacimiento contiene valor
                
            //calcular edad actual del beneficiario
            var edad = calculaEdad(fNacimiento);
                
            if(edad < 1){//verificar si el beneficiario es menor a la edad permitida

                $('*[data-error="edateMinima"]').css({"display":"inline-block"});//mostrar error edad inferior a la edad permitida
                nrTutor();//función que cambia el atributo required a false en sección tutor
                ocultaTutor();//oculta datos del tutor cuando sucede error de usuario
                
            }else if(edad >120){//verificar si el beneficiario es mayor a la edad permitida
                
                $('*[data-error="edateNoPermitida"]').css({"display":"inline-block"});//mostrar error edad superior a la edad permitida
                nrTutor();//función que cambia el atributo required a true en sección tutor
                ocultaTutor();//oculta datos del tutor cuando sucede error de usuario
                
            }else if(edad >= 1 && edad < 18){//verificar si el beneficiario es menor de edad
                
                $('*[data-error="tutorObligatorio"]').css({"display":"inline-block"});//mostrar error de tutor obligatorio
                // rTutor();////función que cambia el atributo required a true en sección tutor
                muestraTutor();//muestra la sección tutor en caso de error de usuario beneficiario menor de edad
                
            }else{//beneficiario mayor de edad
                    
                $('input[name$="independiente"]:not(:checked)').attr("disabled",false);//habilitar las casillas requiere tutor en sección confirmación del tutor
                    
                if(independiente == 0){

                    nrTutor();//función que cambia el atributo required a false en sección tutor
                    
                }else{
                
                    // rTutor();//función que cambia el atributo required a true en sección tutor
        
                }
                
            }//beneficiario mayor de edad
            
        }//campo fecha de nacimiento contiene valor

    }//-- función para validar la edad del beneficiario

//-- función para validar las imágenes del beneficiario
    function validaImagen(nFoto){

        // crear variables 
        var fotoFile = "fotofile" + nFoto;
        var eFoto = "efoto" + nFoto;//eFoto(error archivo no cargada)
        var etmFoto = "etmfoto" + nFoto;//etmFoto(error tamaño de archivo)
        var efiFoto = "efifoto" + nFoto;// efiFoto(error de formato invalido)
        var previewFoto = "previewFoto" + nFoto;// id del archivo al cual se le creara su preview
        

        var tipo = $( '#' + fotoFile )[0].files[0].type;//tomar el tamaño de el archivo
        var t = $( '#' + fotoFile )[0].files[0].size;//tomar el tamaño de el archivo
        var tmb = ( t/1024 )/1024;// convertir de kilobytes a megabytes
        
        //ocultar los mensajes de error
        $( '*[data-error="'+ eFoto +'"], *[data-error="' + etmFoto + '"], *[data-error="' + efiFoto + '"]' ).css({"display":"none"});

        //colocar imagen en blanco 
        $( '#' + previewFoto ).attr("src","/img/form/img-sin-foto.png");


        if( t > 2097152 ){//comprobar el tamaño de el archivo de la imagen

            $( '*[data-error="' + etmFoto + '"]' ).css({"display":"inline-block"});//mostrar error de tamaño de archivo excedido

        }else{
            
            if( tipo == "image/jpeg" || tipo == "image/png" ){// comprobar si el archivo es una imagen

                preview(previewFoto,fotoFile);// crear preview de archivo subido
            
            }else{

                $( '*[data-error="' + efiFoto + '"]' ).css({"display":"inline-block"});//mostrar error formato invalido
            
            }// comprobar si el archivo es una imagen

        }//comprobar el tamaño de el archivo de la imagen

    }//-- función para validar las imágenes del beneficiario


//-- función para generar la miniatura de las imágenes del beneficiario 
    function preview(previewFoto,foto){

        var file = $('#'+ foto)[0].files[0];
        var reader = new FileReader();
        reader.onloadend = function () {
            $('#'+ previewFoto).attr("src",reader.result);
            $('#'+ previewFoto + " label").css({"display":"none"});
        }
        if (file) {
        reader.readAsDataURL(file);
        } else {
            $('#' + previewFoto).attr("src","");
        }

    }//-- función para generar la miniatura de las imágenes del beneficiario