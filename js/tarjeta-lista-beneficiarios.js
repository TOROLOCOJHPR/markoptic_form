$(document).ready(()=>{

    //valores necesarios para poder renderizar las tarjetas de los beneficiarios
    //generados en archivo arreglo-solicitudes-estatus
        /*
            pagina -- de la cual proviene la solicitud(beneficiarios o apadrina)
            beneficiarios -- arreglo con solicitudes del criterio de busqueda
        */
    
    var mostrar = 8;//cantidad de tarjetas a mostrar
    var totalBeneficiarios = beneficiarios.length;//total de valores del arreglo beneficiarios generado en el archivo arreglo-solicitudes-estatus
    var cont = 0;//contador del recorrido del arreglo
    var arregloSolicitud = [];//arreglo para enviar solicitudes al servidor y renderizar las tarjetas

    //muestra y oculta la sección de filtros
    $('#filtroBtn').click(function(){
        $('#filtroPanel').slideToggle("slow");
    });

    //restaurar valores de campo del filtro
    $('#reset').click(function(){
        $('#filtro').find('input:text, input:password, select, textarea').val('');
    });

    //cargar y regresar valores de la posición recorrida en el arreglo
    cont = cargaBeneficiarios(mostrar,totalBeneficiarios,cont,arregloSolicitud);

    //generar nuevas tarjetas al momento de llegar el scroll al pie de página
    window.onscroll = function(ev) {
        if ( (window.innerHeight +  window.scrollY) >= document.body.scrollHeight)
        {

            //cargar y regresar valores de la posición recorrida en el arreglo
           cont = cargaBeneficiarios(mostrar,totalBeneficiarios,cont,arregloSolicitud);

        }
    };
    
        
});/*-- document ready --*/


//función para generar tarjetas de beneficiarios
function cargaBeneficiarios(mostrar,totalBeneficiarios,cont,arregloSolicitud)
{
    //vaciar arreglo secundario con solicitudes a enviar a servidor para renderizar las tarjetas
    arregloSolicitud =[];
    
    //comprobar si el arreglo principal(beneficiarios) no se encuentra vacio
    if(beneficiarios[0]['idSolicitud'] != 0)
    {
        
        // total de solicitudes restantes por mostrar
        var restaBeneficiarios = totalBeneficiarios - cont;
        
        //verificar si la posición del arreglo principal(beneficiarios) no se encuentra en el final
        if(restaBeneficiarios !=  0)
        {

            //generar el número de tarjetas a mostrar
            if(restaBeneficiarios < mostrar)
            {
                mostrar = restaBeneficiarios;
            }

            //generar valores del arreglo secundario
            for(i=0; i < mostrar;i++)
            {
                //insertar valores en arreglo secundario en la ultima posición recorrida en el arreglo principal(beneficiarios)
                arregloSolicitud.push( {"idSolicitud" : beneficiarios[cont]['idSolicitud'] });
                //incrementar ultima posición recorrida 
                cont = cont+1;
            }


            //enviar arreglo secundario a servidor para renderizar las tarjetas de los beneficiarios
            var parametros = {
                pagina: pagina,
                arreglo: arregloSolicitud,
            }

            $.ajax({
                data:parametros,
         	    url:'/inc/ajax-beneficiarios.php',
                type:'post',
                beforeSend: function(){

                    //mostrar animación de carga
                    $('#carga').show();

                },
                success:  function (response) {
                    
                    //ocultar animación de carga
                    $('#carga').hide();
                    //mostar tarjetas de beneficiarios
                    $('#tarjeta-lista-beneficiarios').append(response);
                    //mostar mensaje desplázate hacia abajo para mostrar más
                    $('#mostrar-mas').show();

                }//success

            });//ajax

        }//la posición del arreglo principal(beneficiarios) se encuentra en el final
        else
        {
            //ocultar mensaje desplazate hacia abajo para mostrar más
            $('#mostrar-mas').hide();
            //mostrar mensaje al final de las tarjetas mostradas(no existen más solicitudes para mostrar)
            $('#final').show();
        }

        //regresar la ultima posición recorrida en el arreglo principal(beneficiarios)
        return cont;
    
    }//arreglo no se encuentra vacio
    else
    {
        //mostrar mensaje no se encontraron solicitudes
        $('#sin-solicitudes').show();
        
        //ocultar animación de carga
        $('#carga').hide();
        
        //mostrar mensaje no se encontraron solicitudes
        $('#tarjeta-lista-beneficiarios').html(html);

    }

    //regresael la ultima posición recorrida en el arreglo principal(beneficiarios) sin modificaciones
    return cont;

}//cargaBeneficiarios