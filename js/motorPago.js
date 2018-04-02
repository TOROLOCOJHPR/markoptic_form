//código de motor de pagos
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
function prePagar(){
    var folio = $('#ben').attr('ben');
    
    if($('#donacion').val() >= 50){
        var donacion = $('#donacion').val();
    }else if($('#donacionBoton').val() >= 50){
        var donacion = $('#donacionBoton').val();
    }else{
        alert('Introduce un monto minimo de 50 mxn');
        return false;
    }
    if($('#emailCliente').val() != "" ){
        var emailCliente = $('#emailCliente').val();
        $.ajax({
            type: "POST",
            data: { 'formulario': "validaEmail","email":emailCliente},
            url: "/back/ajax.php",
            success : function(data) {
                var v = JSON.parse(data);
                if(v[0].valor == "false"){
                    alert("introduce una dirección de correo valida");
                    console.log("false");
                    return false;
                }
            }
        });
    }else{
        alert("Introduce un email");
        return false;
    }
    var folio = $('#ben').attr('ben');
    var ben = folio.split("f").join("");
    var emailCliente = $('#emailCliente').val();
    var exito = "http://www.beta.markoptic.mx/recibir";
    if(ben != 0 ){
        var idBen = "http://www.markoptic.test/apadrina?b=" + ben;
    }else{
        var idBen = "http://www.markoptic.test/donar";   
    }

    var SW = new BwGateway({
        // Quitar o establecer a false cuando pase a produccion
        sandbox: true,
        // Nombre de usuario de Banwire
        user: 'pruebasbw',
        // Titulo de la ventana
        title: "Fundación Markoptic",
        // Referencia
        reference: folio,
        // Concepto
        concept: 'Donación',
        // Opcional: Moneda
        currency: 'MXN',
        // Total de la compra
        total: donacion,
        // articulos comprados
        items: [
            {
                name: "Donación",
                qty: 1,
                desc: "donación",
                unitPrice: donacion
            },
        ],
        //datos customer
        cust: {
            fname: "jesus", //Nombre del comprador
            mname: "parra", //Apellido paterno del comprador
            lname: "ruiz", //Apeliido materno del comprador
            email: emailCliente, //Email del comprador
            phone: "526677304760", //Número telefónico del comprador
            addr: "solidaridad", //Dirección del comprador (calle y número)
            city: "culiacan", //Ciudad del comprador
            state: "sinaloa", //Estado del comprador (2 dígitos de acuerdo al formato ISO)
            country: "mexico", //País del comprador (3 dígitos de acuerdo al formato ISO)
            zip: "" //Código de postal del comprador
        },
        // Opciones de pago, por defecto es "all". Puede incluir varias opciones separadas por comas
        paymentOptions: 'all', // visa,mastercard,amex,oxxo,speifast,all
        // Mostrar o no pagina de resumen de compra
        reviewOrder: true,
        // Mostrar o no mostrar los campos de envio
        showShipping: false,
        // Solamente para pagos recurrentes o suscripciones
        // URL donde se van a enviar todas las notificaciones por HTTP POST de manera asoncrónica
        notifyUrl: exito,
        // Handler en caso de exito en el pago
        successPage: idBen,
    });
    pagar(SW);
    return false;
}
function pagar(SW) {
    // Podemos pagar con los valores por defecto
    SW.pay();
    
    /* O podemos modificar los valores antes de efectuar el pago
    SW.pay({
        // Nombre de usuario de Banwire
        user: 'pruebasbw',
        total: donacion,
        concept: "Donación"
    });*/
}