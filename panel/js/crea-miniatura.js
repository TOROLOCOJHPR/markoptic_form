$(document).ready(function(){
    $('#btnOcultar').click(function(){
        $('#datosBeneficiario').slideToggle(400);
    });

    $('#fotoUpload').change(()=>{
        validaImagen("preview","fotoUpload");
    });
});

//-- función para validar las imágenes del beneficiario
    function validaImagen(previewFoto,foto){

        // crear variables 
        var fotoFile = foto;
        // var eFoto = "efoto" + nFoto;//eFoto(error archivo no cargada)
        // var etmFoto = "etmfoto" + nFoto;//etmFoto(error tamaño de archivo)
        // var efiFoto = "efifoto" + nFoto;// efiFoto(error de formato invalido)
        var previewFoto = "preview";// id del archivo al cual se le creara su preview
        

        var tipo = $( '#' + fotoFile )[0].files[0].type;//tomar el tamaño de el archivo
        var t = $( '#' + fotoFile )[0].files[0].size;//tomar el tamaño de el archivo
        var tmb = ( t/1024 )/1024;// convertir de kilobytes a megabytes
        
        //ocultar los mensajes de error
        // $( '*[data-error="'+ eFoto +'"], *[data-error="' + etmFoto + '"], *[data-error="' + efiFoto + '"]' ).css({"display":"none"});

        //colocar imagen en blanco 
        $( '#' + previewFoto ).attr("src","/img/form/img-sin-foto.png");


        if( t > 2097152 ){//comprobar el tamaño de el archivo de la imagen
            alert('tamaño de foto excedido')
            // $( '*[data-error="' + etmFoto + '"]' ).css({"display":"inline-block"});//mostrar error de tamaño de archivo excedido

        }else{
            
            if( tipo == "image/jpeg" || tipo == "image/png" ){// comprobar si el archivo es una imagen

                preview(previewFoto,foto);// crear preview de archivo subido
            
            }else{
                alert('formato invalido');
                // $( '*[data-error="' + efiFoto + '"]' ).css({"display":"inline-block"});//mostrar error formato invalido
            
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