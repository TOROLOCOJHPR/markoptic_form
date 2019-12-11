$(document).ready(function(){


    // inicializar kendo ui combobox para lista país
    $("#pais").kendoDropDownList({
        optionLabel: "Selecciona un pais...",
        // dataTextField: "text",// nombre de la opción de la lista
        // dataValueField: "value",// valor de la opción de la lista
        filter: "contains",// busqueda dentro de los nombres de las opciones de la lista, pueden ser startswith, endswith and contains
        noDataTemplate: 'País no encontrado',// etiqueta que se muestra al no encontrar resultados de busqueda
        change: function(e){
            console.log('hola mundo');
            console.log(this);
            if(this.value() == ""){
                console.log(this.value());
                $('#errorPais').addClass("d-block");
                $('#estado').prop('disabled', true);
                $('#estado').value('')
                $('#ciudad').prop('disabled', true);
                $('#ciudad').value('');
            }else{            
                $('#errorPais').removeClass("d-block");  
                $('#estado').prop('disabled', false);
            }
        }

    });// inicializar kendo ui combobox para lista país


    // inicializar kendo ui combobox para lista estado
    $("#estado").kendoDropDownList({
        dataTextField: "text",// nombre de la opción de la lista
        dataValueField: "value",// valor de la opción de la lista
        filter: "contains",// busqueda dentro de los nombres de las opciones de la lista, pueden ser starswith, endswith and contains 
        noDataTemplate: 'Estado no encontrado',// etiqueta que se muestra al no encontrar resultados de busqueda
        optionLabel: "Selecciona un estado...",//etiqueta que se muetra cuando no se encuentra seleccionada ningúna opción 
    });// inicializar kendo ui combobox para lista estado


    //inicializar kendo ui combobox para lista ciudad
    $("#ciudad").kendoDropDownList({
        optionLabel: "Selecciona una Ciudad...",// etiqueta que se muestra cuando no se encuentra seleccionada ningúna opción 
        dataTextField: "text",// nombre de la opción de la lista
        dataValueField: "value",// valor de la opción de la lista
        filter: "contains",// busqueda dentro de los nombres de las opciones de la lista, pueden ser starswith, endswith and contains
        noDataTemplate: 'Ciudad no encontrada'// etiqueta que se muestra al no encontrar resultados de busqueda
    });//inicializar kendo ui combobox para lista ciudad

    
    //llenar opciones de lista estados inicialmente con estados de México
    // if( $('#pais').val() == 42  && $("#estado").data("kendoComboBox").value() == "" ){
        
    //     paisEstado();// función encargada de cambiar los valores de la opción de la lista estado al seleccionar un país diferente
        
    // }//llenar opciones de lista estados inicialmente con estados de México


    //ejecutar función al cambiar la selección del país
    var comboboxPais = $("#pais").data("kendoDropDownList");// tomar parametros de atributo data de lista país
    comboboxPais.bind("change", comboboxPaisEstado);//ejecutar función comboboxPaisEstado al seleccionar un país diferente
    //ejecutar función al cambiar la selección del país


    //ejecutar función al cambiar la selección del estado
    var comboboxEstado = $("#estado").data("kendoDropDownList");// tomar parametros de atributo data de lista estado
    comboboxEstado.bind("change", comboboxEstadoCiudad);// ejecutar función comboboxEstadoCiudad al seleccionar un estado diferente
    //ejecutar función al cambiar la selección del estado
            
});//document ready


    // función que se ejecuta al seleccionar un país diferente
    function comboboxPaisEstado(e) {

        paisEstado();// función encargada de cambiar los valores de la opción de la lista estado al seleccionar un país diferente
    
    }// función que rellena la lista de estados al seleccionar un país diferente


    //función que se ejecuta al seleccionar un estado diferente
    function comboboxEstadoCiudad(e) {
        
        //parametros de busqueda ajax
        let parametros ={
            "form": "muestraCiudades",// valor por el cual se filtra la función a utilizar en el archivo ajax
            "id" : $('#estado').val()// valor del estado seleccionado
        }
        
        //método ajax
        $.ajax({
	        data:parametros,
         	url:'/inc/ajax-ubicacion.php', type:'post',
        	beforeSend: function () {
            },
            success:  function (response) {
                
                var dataCiudad = JSON.parse(response);

                $("#ciudad").data("kendoDropDownList").value("");// borrar la selección del usuario para la lista ciudad
                
                // añadir valores a las opciones de la lista de ciudad del estado seleccionado
                $("#ciudad").data("kendoDropDownList").setDataSource( dataCiudad );
            }
        });
    
    }//función que se ejecuta al seleccionar un estado diferente


    // función que realiza consulta ajax para recolectar los estados del país seleccionado
    function paisEstado(){
        
        // parametros de busqueda ajax
        let parametros ={
            "form": "muestraEstados",// valor por el cual se filtra la función a utilizar en el archivo ajax
            "id" : $("#pais").val(),// valor del país seleccionado
        }

        //método ajax
        $.ajax({
	        data:parametros, url:'/inc/ajax-ubicacion.php', type:'post',
        	beforeSend: function () {
             },
             success:  function (response) {
                var dataEstado = JSON.parse(response);// tomar los valores de los estados y convertirlos a JSON
                
                $("#estado").data("kendoDropDownList").value("");// borrar la selección del usuario para la lista estado
                $("#ciudad").data("kendoDropDownList").value("");// borrar la selección del usuario para la lista ciudad
    
                // añadir valores a las opciones de la lista de estado del país seleccionado
                $("#estado").data("kendoDropDownList").setDataSource( dataEstado );
            }
        });

    }// función que realiza consulta ajax para recolectar los estados del país seleccionado