$(document).ready(function(){
    var recorrido = 0;
    var cont = 0;
    var arregloAjax = [];
    var total = beneficiarios.length;
    recorrido = total-cont;
    mostrar = (mostrar > recorrido)?recorrido : mostrar ;
    var carga = 0;
    if(recorrido == 0){
        //console.log("no existen mas beneficiarios");
    }else{
        arregloAjax.length=0;
        //console.log("existen mas beneficiarios");
        for(i = 0; i<mostrar; i++){
            arregloAjax[i] = beneficiarios[cont]['id'];
            cont++;
        }
        //console.log(arregloAjax);
        var r = "div";
        // console.log(r);
        carga = carga;
        var parametros = {
            "formulario" : "datosBeneficiario",
            "carga" : carga,
            "pagina" : pagina,
            "arreglo" : arregloAjax
        }
        ajax(parametros,r);
        // console.log(cont);
        // console.log(carga);
    }
    //función para cargar mas beneficiarios
    $('#cargaMas').click(function(){
        arregloAjax.length=0;
        recorrido = total-cont;
        carga++;        
        mostrar = (mostrar > recorrido)?recorrido : mostrar ;
        if(recorrido == 0){
            //console.log("no existen mas beneficiarios");
        }else{
            //console.log("existen mas beneficiarios");
            for(i = 0; i<mostrar; i++){
                arregloAjax[i] = beneficiarios[cont]['id'];
                cont++;
            }
            carga = carga;
            var r = "div"+carga;
            //console.log(r);
            var parametros = {
                "formulario" : "datosBeneficiario",
                "carga"  : carga,
                "pagina" : pagina,
                "arreglo" : arregloAjax
            }
        ajax(parametros,r);
        //console.log(cont);
        //console.log(carga);        
        }
    });
    //toggle filtro
    $('#filtroBtn').click(function(){
        $('#filtroPanel').slideToggle("slow");
    });

    //función para seleccionar los estados del país
    // $('#pais').attr('required',false);
    // $('#estado').attr('required',false);
    // $('#ciudad').attr('required',false);
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
        if(p == ""){
            console.log('vacio');
            $('#estado option, #ciudad option').remove();
            // $('#ciudad option').remove();
            $('#estado').append('<option selected="selected" disabled="disabled">Selecciona un Estado</option>');
            $('#ciudad').append('<option selected="selected" disabled="disabled">Selecciona una Ciudad</option>');
            $('#estado , #ciudad').attr('disabled',true);
        }else{
            console.log('lleno');            
            $.ajax({
	            data:parametros,
             	url:'/back/ajax.php',
                type:'post',
            	beforeSend: function () {
                },
                success:  function (response) {
	        	    $("#beforeresultado").html("");
                    $('#ciudad option').remove();
                    $('#ciudad').append('<option selected="selected" disabled="disabled">Selecciona una Ciudad</option>');
                    // $('#estado').attr('required',false);
                    $('#estado').attr({'disabled':false});
                    options = JSON.parse(response);
                    for(var k in options) {
                        $('#estado').append('<option value="">'+ options[k].nombre +'</option>');
                    }

	        	    // $('#'+ resultado).html(response);
                }
            });
        }

        // ajax(parametros,r);
        // $('#ciudad option').remove();
        // $('#ciudad').append('<option selected="selected" disabled="disabled">Selecciona una Ciudad</option>');
        // $('#estado').attr('required',false);
        // $('#ciudad').attr('required',false);
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
        $('#estado').attr('required',false);
        $('#ciudad').attr('required',false);
    });

    //función para resetear los campos del formulario
    $('#reset').click(function(){
        $('#filtro').find('input:text, input:password, select, textarea').val('');
    });
    //función scroll para cargar mas beneficiarios
    $(window).scroll(function(){
    	var scrollHeight = $(document).height();
	    var scrollPosition = $(window).height() + $(window).scrollTop();
	    if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
            // when scroll to bottom of the page
            // console.log('bottom');
            arregloAjax.length=0;
            recorrido = total-cont;
            carga++;        
            mostrar = (mostrar > recorrido)?recorrido : mostrar ;
            if(recorrido == 0){
                //console.log("no existen mas beneficiarios");
            }else{
                //console.log("existen mas beneficiarios");
                for(i = 0; i<mostrar; i++){
                    arregloAjax[i] = beneficiarios[cont]['id'];
                    cont++;
                }
                carga = carga;
                var r = "div"+carga;
                //console.log(r);
                var parametros = {
                    "formulario" : "datosBeneficiario",
                    "carga"  : carga,
                    "pagina" : pagina,
                    "arreglo" : arregloAjax
                }
            ajax(parametros,r);
            //console.log(cont);
            //console.log(carga);        
            }
        }
    });
});