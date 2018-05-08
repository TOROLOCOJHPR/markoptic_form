$(document).ready(function(){
    //cantidad minima
    $('.minimo').click(function(){
        $('.minimo').removeClass('bg-primary');
        $('.minimo').addClass('bg-verde-menu');
        $(this).removeClass('bg-verde-menu');
        $(this).addClass('bg-primary');
        var monto = $(this).attr('m');
        if( monto != "otro" ){
            $('#donacionBoton').val(monto);
            $('#donacion').val("").attr("disabled",true);
        }else{
            $('#donacionBoton').val("");
            $('#donacion').val("");
            $('#donacion').attr("disabled",false);     
        }
    });

});

//función para verificar los datos antes de ser enviados a banwire 
function prePagar(){
    
    var cBtn = $('#donacionBoton').val(); //tomar el valor de los botones de donación con cantidad fija
    
    //comprobar si la cantidad fue fija o establecida
    if(cBtn == ""){//cantidad establecida, seleccionado botón otro
        
        var d = $('#donacion').val();//tomar el valor de la caja de texto

        //validar que el monto no sea menor a 50  y mayor a 100,000
        if(d >= 50){ //monto minimo permitido
            if(d >= 100000){//monto máximo excedido
                $('.excedente').modal('show');//mostrar modal con advertencia de monto excedido
                return false;
            }
        }else{//monto minimo de donación no superado
            alert('Introduce un monto minimo de 50 mxn');
            return false;
        }
    }else{//cantidad fija seleccionado botón con cantidad fija 
        var d = cBtn;
    }

    //convertir el valor de folio f0 a numero en caso de que te encuentres en la página de donación y no seas usuario
    var ben = $('#ben').attr('ben');
    var folio = ben.split("f").join("");

    //variables necesarias para el motor de pagos
    var emailCliente = $('#emailCliente').val();
    var exito = "http://www.beta.markoptic.mx/recibir";// variable para el envío de variables por post
    // pagina de redirección al momento de realizar deposito exitoso
    if(folio != 0 ){//beneficiario
        var idBen = "http://www.markoptic.test/apadrina?b=" + ben;
    }else{//página donar
        var idBen = "http://www.markoptic.test/donar";   
    }

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
        total:d,
        // Opcional: Meses sin intereses
        //months: [3,6,9,12],
        // Arreglo con los items de compra
        items: [
            {
                name: "Donación",
                desc: "Donación",
                unitPrice: d
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
        // ship: {
        //     addr: "Direccion 440", //Dirección de envío
        //     city: "Mexico", //Ciudad de envío
        //     state: "DF", //Estado de envío (2 dígitos de acuerdo al formato ISO)
        //     country: "MEX", //País de envío (3 dígitos de acuerdo al formato ISO)
        //     zip: "14145" //Código de postal del envío
        // },
        // Opciones de pago, por defecto es "all". Puede incluir varias opciones separadas por comas
        paymentOptions: 'all', // visa,mastercard,amex,oxxo,speifast,all
        // Mostrar o no pagina de resumen de compra
        reviewOrder: true,
        // Mostrar o no mostrar los campos de envio
        showShipping: true,
        // Solamente para pagos recurrentes o suscripciones
        // recurring: {
        //     // Cada cuanto se ejecutará el pago "month","year" o un entero representando numero de días
        //     interval: "month",
        //     // Opcional: Limitar el número de pagos (si no se pone entonces no tendrá limite)
        //     limit: 10, 
        //     // Opcional: Fecha del primer cargo (en caso de no especificar se ejecutará de inmediato)
        //     start: "2014-01-01", // Formaro YYYY-MM-DD
        //     // Opcional: En caso de que los pagos subsecuentes (después del primero)
        //     // tengan un monto distinto al inicial
        //     total: "50.00"
        // },
        // URL donde se van a enviar todas las notificaciones por HTTP POST de manera asoncrónica
        // notifyUrl: "http://www.beta.markoptic.mx/recibir",
        notifyUrl: exito,
        // Handler en caso de exito en el pago
        successPage: 'http://www.beta.markoptic.mx/donar',
        // successPage: idBen,
        onSuccess: function(data){
            alert("¡Gracias por tu pago!")
        },
        // Pago pendiente OXXO
        pendingPage: 'http://yahoo.com',
        onPending: function(data){
            alert("El pago está pendiente por ser efectuado");
        },
        // Pago challenge
        challengePage: 'http://challenge.com',
        onChallenge: function(data){
            alert("Pago enviado a validaciones de seguridad");
        },
        // Handler en caso de error en el pago
        errorPage: exito,
        onError: function(data){
            alert("Error en el pago");
        },
        // Cuando cierra el popup sin completar el proceso
        onCancel: function(data){
            console.log("Se cancelo el proceso");
        }
    });
    pagar(SW);
    return false;
}



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