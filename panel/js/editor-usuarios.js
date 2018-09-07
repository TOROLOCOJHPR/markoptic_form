$(document).ready(()=>{
    // // inicializar kendo ui combobox para lista país
    // $("#actualiza-kendo").kendoComboBox({
    //     placeholder: "Selecciona un Usuario",//etiqueta que se muestra cuando no se encuentra seleccionada ningúna opción
    //     dataTextField: "text",// nombre de la opción de la lista
    //     dataValueField: "value",// valor de la opción de la lista
    //     filter: "contains",// busqueda dentro de los nombres de las opciones de la lista, pueden ser startswith, endswith and contains
    //     suggest: false,// sugerencias de busqueda dehabilitadas, por motivo de mal funcionamiento al momento de escribir la busqueda
    //     noDataTemplate: 'Usuario no encontrado',// etiqueta que se muestra al no encontrar resultados de busqueda
    // });// inicializar kendo ui combobox para lista país

    //crear usuario
    $('#crea-form').submit(()=>{
                
        $('#crea-submit').attr('disabled',true);

        $.ajax({
	        data:$('#crea-form').serialize(),
         	url:'/panel/inc/ajax-usuario.php',
            type:'post',
        	beforeSend: function () {
            },
            success:  function (response) {
    
                //quitar color a mensaje
                $('#crea-alert').removeClass('alert-danger');
                $('#crea-alert').removeClass('alert-success');

                //tomar valor devuelto por ajax
                let result = JSON.parse(response);

                //colorear mensaje
                if( result[0]['success'] == true){
                    $('#crea-form')[0].reset();
                    $('#crea-alert').addClass('alert-success');
                    recargaUsuarios();
                }else{
                    $('#crea-alert').addClass('alert-danger');                            
                }

                // //colocar mensaje en alerta
                $('#crea-message').html(result[0]['message']);

                $('#crea-alert').show();

                $('#crea-submit').attr('disabled',false);

            }//success

        });//ajax
            
        return false;

    });//submit crea


    //actuliza
    $('#actualiza-form').submit(()=>{

        // $('#actualiza-submit').attr('disabled',true);
        // $("#actualiza-kendo").data("kendoComboBox")
        $.ajax({
	        data:$('#actualiza-form').serialize(),
  	        url:'/panel/inc/ajax-usuario.php',
            type:'post',
  	        beforeSend: function () {
            },
            success:  function (response) {
                //quitar color a mensaje
                $('#actualiza-alert').removeClass('alert-danger');
                $('#actualiza-alert').removeClass('alert-success');
                //tomar valor devuelto por ajax
                let result = JSON.parse(response);
                //colorear mensaje
                if( result[0]['success'] == true){
                    $('#actualiza-form')[0].reset();
                    $('#actualiza-fieldset').attr('disabled',true);
                    $('#actualiza-fieldset-rol').attr('disabled',true);
                    $('#actualiza-submit').addClass('d-none');
                    $('#actualiza-edita').removeClass('d-none');
                    $('#actualiza-alert').addClass('alert-success'); 
                }else{
                    $('#actualiza-alert').addClass('alert-danger');                 
                }
                //colocar mensaje en alerta
                $('#actualiza-message').html(result[0]['message']);
                $('#actualiza-alert').show();
                $('#actualiza-submit').attr('disabled',false);
            }//success

        });//ajax
            
        return false;
               
    });//submit actualiza


    //elimina usuario
    $('#actualiza-elimina').click(()=>{
        
        let confirma = confirm("realmente desea eliminar el usuario seleccionado");
        
        if(confirma == true){
            
            $('#actualiza-elimina').attr('disabled',true);

            var parametros ={
                envio:'elimina',
                id:$('#actualiza-id').val()
            }
            $.ajax({
	           data:parametros,
  	              url:'/panel/inc/ajax-usuario.php',
                  type:'post',
  	           beforeSend: function () {
                  },
                  success:  function (response) {
                    var result = JSON.parse(response);
                    if(result[0]['success'] == true){
                        $('#actualiza-form')[0].reset();
                        $('#actualiza-fieldset').attr('disabled',true);
                        $('#actualiza-fieldset-rol').attr('disabled',true);
                        $('#actualiza-submit').addClass('d-none');
                        $('#actualiza-edita').removeClass('d-none');
                        $('#actualiza-alert').addClass('alert-success');
                        $('#actualiza-alert').removeClass('alert-danger');
                        $('#actualiza-elimina').attr('disabled',true);
                        $('#actualiza-elimina').addClass('btn-secondary');
                        $('#actualiza-elimina').removeClass('btn-danger');
                        recargaUsuarios();
                    }else{
                        $('#actualiza-alert').addClass('alert-danger');
                        $('#actualiza-alert').removeClass('alert-success');
                        $('#actualiza-elimina').attr('disabled',false);
                    }
                    //colocar mensaje en alerta
                    $('#actualiza-message').html(result[0]['message']);
                    $('#actualiza-alert').show();
                    
               }//success
            });//ajax

        }//confirma
    
    });

    //activa botón para eliminar al usuario
    $('#actualiza-id').change(()=>{
        if($('#actualiza-id').val() !== ""){
            $('#actualiza-elimina').attr('disabled',false);
            $('#actualiza-elimina').addClass('btn-danger');
            $('#actualiza-elimina').removeClass('btn-secondary');
        }else{
            $('#actualiza-elimina').attr('disabled',true);
            $('#actualiza-elimina').addClass('btn-secondary');
            $('#actualiza-elimina').removeClass('btn-danger');

        }
    });


    //habilita la edición del usuario logeado
    $('#actualiza-edita').click(()=>{
        $('#actualiza-fieldset , #actualiza-fieldset-rol').attr('disabled',false);
        $('#actualiza-submit').removeClass('d-none');
        $('#actualiza-edita').addClass('d-none');
    });

    //previene que se destruya el mensaje de alerta del dom actualiza usuario
    $('#actualiza-alert').on("close.bs.alert", function () {
          $('#actualiza-alert').hide();
          return false;
    });
    
    //previene que se destruya el mensaje de alerta del dom crea usuario
    $('#crea-alert').on("close.bs.alert", function () {
          $('#crea-alert').hide();
          return false;
    });

    

});//document ready 

    //recarga la lista de usuarios existentes
    function recargaUsuarios(){
        var parametros = {
            envio:"recargaUsuarios",
        }
        $.ajax({
	        data:parametros,
            url:'/panel/inc/ajax-usuario.php',
            type:'post',
  	        beforeSend: function () {
            },
            success:  function (response) {
                var result = JSON.parse(response);
                
                $('#actualiza-id').empty();
                $('#actualiza-id').append('<option value="" class="text-muted">Selecciona un usuario</option>');
                $.each(result,function(key,value){
                    console.log(value.id);
                    $('#actualiza-id').append('<option value="' + value.id +'">'+value.user+'</option>')
                });
                //colocar mensaje en alerta
                 
            }//success
        });//ajax
    }//recargar la lista de usuarios existentes