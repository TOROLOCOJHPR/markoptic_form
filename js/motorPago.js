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
    pagar(donacion);
    return false;
}
function pagar(donacion) {
    // Podemos pagar con los valores por defecto
    //SW.pay();
    // O podemos modificar los valores antes de efectuar el pago
    //var donacion = $('#donacion').val();
    var folio = $('#ben').attr('ben');
    var emailCliente = $('#emailCliente').val();
    // var email = $('#email').val();
    console.log('total de la donación' + donacion);
    // var url = "http://www.markoptic.text/apadrina?b="+ $('#ben').attr('ben');
    SW.pay({
        total: donacion,
        concept: "Donación",
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
        items: [
            {
                name: "Donación",
                //qty: 1,
                desc: "Donación",
                unitPrice: donacion
            }
        ],
        reference: folio,
    });

}
var idBen = "http://www.beta.markoptic.mx/apadrina?b=" + $('#ben').attr('ben');
var exito = "http://www.markoptic.test/response";
// código Banwire 
var SW = new BwGateway({
    // Quitar o establecer a false cuando pase a produccion
    sandbox: true,
    // Nombre de usuario de Banwire
    user: 'pruebasbw',
    // Titulo de la entana
    title: "Fundación Markoptic",

    currency: 'MXN',
    // Opcional: Tipo de cambio definido por el comercio (En caso de seleccionar una moneda que requiera mostrar el tipo de cambio a MXN. Solo informativo). Ejemplo: 15.00
    exchangeRate: '',

    // Opciones de pago, por defecto es "all". Puede incluir varias opciones separadas por comas
    paymentOptions: 'all', // visa,mastercard,amex,oxxo,speifast,all
    // Mostrar o no pagina de resumen de compra
    reviewOrder: true,
    // Mostrar o no mostrar los campos de envio
    showShipping: false,

    // URL donde se van a enviar todas las notificaciones por HTTP POST de manera asoncrónica
    notifyUrl: "http://www.beta.markoptic.mx/recibir",
    // notifyUrl: "http://www.markoptic.test/response.php",
    //notifyUrl: exito,
    // Handler en caso de exito en el pago
    successPage:idBen,
    onSuccess: function(data){
    },
    // Pago pendiente OXXO
    pendingPage: idBen,
    onPending: function(data){
        alert("El pago está pendiente por ser efectuado");
    },
    // Pago challenge
    challengePage: 'http://challenge.com',
    onChallenge: function(data){
        alert("Pago enviado a validaciones de seguridad");
    },
    // Handler en caso de error en el pago
    errorPage: idBen,
    onError: function(data){
        alert("Error en el pago");
    },
    // Cuando cierra el popup sin completar el proceso
    onCancel: function(data){
        console.log("Se cancelo el proceso");
    }
});