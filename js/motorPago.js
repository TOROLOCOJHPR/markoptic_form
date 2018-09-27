$(document).ready(function(){

    //habilitar o deshabilitar monto establecido por el usuario
    $("input[name='donacionRBtn']").change(function(){
        var valorRBtn = $(this).val();
        if(valorRBtn == "otro"){
            $('#donacionTxt').attr({"disabled":false,"required":true});
            $('#cantidad-input').show(200);
        }else{
            $('#donacionTxt').attr({"disabled":true,"required":false});
            $('#cantidad-input').hide(200);
        }
    });
    
    //permitir solamente la entrada de números
    $('#donacionTxt').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
        if($(this).val() >=  100000){
            $('#btn-donacion').fadeOut(500,function(){
                $('#d-excedente').fadeIn(200);
            });
        }else{
            $('#d-excedente').fadeOut(500,function(){
                $('#btn-donacion').fadeIn(200);
            });
        }
    });
    //botón pagar
    $('#donar').submit(function(){
        //tomamos el valor del botón estatico
        var donacionBtn = $("input[name='donacionRBtn']:checked").val();
        var total;
        
        //verificamos si esta seleccionado el boton otro
        if(donacionBtn == "otro"){
            var donacionTxt = $('#donacionTxt').val();
            total = donacionTxt;
            //validar que el monto no sea menor a 50  y mayor a 100,000
            if(total >= 0){ //monto minimo permitido
                if(total >= 100000){//monto máximo excedido
                    // $('.excedente').modal('show');//mostrar modal con advertencia de monto excedido
                    $('#d-excedente').show(500);
                    return false;
                }
            }else{//monto minimo de donación no superado
                alert('Introduce un monto minimo de 50 mxn');
                return false;
            }
        }else{
            total = donacionBtn;
        }

        //verfificar de donde proviene la solicitud (apadrinamiento, donación)
        var path = location.pathname;
        var folio;
        if(path == "/donar"){
            folio = "f0";
        }else if(path == "/apadrina"){
            folio = get('b');
        }else{
            location.href ="/";
        }

        //variables necesarias para el motor de pagos
        var emailCliente = $('#emailCliente').val();
        var exito = "http://www.beta.markoptic.mx/recibir";// variable para el envío de variables por post
        // pagina de redirección al momento de realizar deposito exitoso
        // if(folio != "f0" ){//beneficiario
        //     var idBen = "http://www.markoptic.test/apadrina?b=" + folio;
        // }else{//página donar
        //     var idBen = "http://www.markoptic.test/donar";
        // }
        
        //asignación de valores a variables para el motor de pagos     
        var SW = new BwGateway({
            // Quitar o establecer a false cuando pase a produccion
            sandbox: true,
            // Nombre de usuario de Banwire
            user: 'pruebasbw',
            // Titulo de la entana
            title: "Fundación Markoptic A.C.",
            // Referencia
            reference: folio,
            // Concepto
            concept: 'Donación',
            // Opcional: Moneda
            currency: 'MXN',
            // Opcional: Tipo de cambio definido por el comercio (En caso de seleccionar una moneda que requiera mostrar el tipo de cambio a MXN. Solo informativo). Ejemplo: 15.00
            exchangeRate: '',
            // Total de la compra
            total:total,
            // Arreglo con los items de compra
            items: [
                {
                    name: "Donación",
                    desc: "Donación",
                    unitPrice: total
                }
            ],
            cust: {
                fname: "", //Nombre del comprador
                mname: "", //Apellido paterno del comprador
                lname: "", //Apeliido materno del comprador
                email: emailCliente, //Email del comprador
                phone: "", //Número telefónico del comprador
                addr: "", //Dirección del comprador (calle y número)
                city: "", //Ciudad del comprador
                state: "", //Estado del comprador (2 dígitos de acuerdo al formato ISO)
                country: "", //País del comprador (3 dígitos de acuerdo al formato ISO)
                zip: "" //Código de postal del comprador
            },
            // Opciones de pago, por defecto es "all". Puede incluir varias opciones separadas por comas
            paymentOptions: 'all', // visa,mastercard,amex,oxxo,speifast,all
            // Mostrar o no pagina de resumen de compra
            reviewOrder: true,
            // Mostrar o no mostrar los campos de envio
            showShipping: false,
            // URL donde se van a enviar todas las notificaciones por HTTP POST de manera asincróna
            notifyUrl: exito,
            // Handler en caso de exito en el pago
            // successPage: idBen,
            onSuccess: function(data){
                // alert("¡Gracias por tu pago!")
                console.log(data);
                //mostrar modal gracias al cerrar secure window banwire
                $('#modal-banwire').one('hidden.bs.modal', function (e) {
                    // do something...
                    $('#modal-final').modal('show');
                });
                $('#modal-banwire').modal('hide');
                
                $('#modal-final').one('hidden.bs.modal', function (e) {
                    // do something...
                    if(path == "/apadrina"){
                    // alert('recarga');
                    // location.reload();
                    porcentaje();
                }
                });
                //recargar porcentaje de apadrinación al finalizar la transacción
   
            },
            // Pago pendiente OXXO
            // pendingPage: 'http://yahoo.com',
            onPending: function(data){
                alert("El pago está pendiente por ser efectuado");
            },
            // Pago challenge
            // challengePage: 'http://challenge.com',
            onChallenge: function(data){
                alert("Pago enviado a validaciones de seguridad");
            },
            // Handler en caso de error en el pago
            // errorPage: idBen,
            onError: function(data){
                alert("Error en el pago");
            },
            // Cuando cierra el popup sin completar el proceso
            onCancel: function(data){
                console.log("Se cancelo el proceso");
            }
        });
    
        //llamar método de pago banwire
        pagar(SW);
        return false;
    
    });//botón pagar
    
});

//funcion para obtener valores get por url
function get(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

// función para completar la donación 
function pagar(SW) {
    // Podemos pagar con los valores por defecto
    SW.pay();
    
    /* O podemos modificar los valores antes de efectuar el pago
    SW.pay({
        total: 500,
        concept: "Concepto nuevo"
    });
    */
}